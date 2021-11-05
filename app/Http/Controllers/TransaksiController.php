<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Hash;
use Validator;
use App\Models\Transaksi;

use Carbon\Carbon;
use Illuminate\Validation\Rule;

use App\models\User;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getTransaksi() 
    {
        $data = DB::table('tb_transaksi')
                ->selectRaw('tb_transaksi.id_transaksi, tb_member.nama, tb_transaksi.tgl, SUM(tb_detail_transaksi.biaya) as total, tb_transaksi.dibayar')
                ->leftJoin('tb_detail_transaksi', 'tb_detail_transaksi.id_transaksi', 'tb_transaksi.id_transaksi')
                ->leftJoin('tb_member', 'tb_transaksi.id_member', 'tb_member.id_member')
                ->join('tb_outlet', 'tb_transaksi.id_outlet', 'tb_outlet.id_outlet')
                ->groupBy('tb_detail_transaksi.id_transaksi')
                ->where([
                    ['tb_transaksi.status', '<>', 'batal'],
                    ['tb_transaksi.id_outlet', '=', Auth::User()->id_outlet],
                    ['tb_outlet.status', '=', 1]
                ])->orderBy('tb_transaksi.id_transaksi', 'desc')
                ->get();
                
        $cekEmpty = empty($data);
        
        return view('transaksi.list_transaksi', compact('data', 'cekEmpty'));
    }

    public function createTransaksi() {
        $dataUser = DB::table('users')
                ->selectRaw('id, id_outlet, name, status')
                ->where([
                    ['status', '<>', 0],
                    ['id_outlet', '=', Auth::User()->id_outlet],
                ])->orderBy('name', 'asc')
                ->get();
        return view('transaksi.transaksi_input', compact('dataUser'));
    }


    public function createTransaksiAction(Request $req) {
        /** untuk validasi form */
        // $validasi = Validator::make($req->all(), [

        // ]);
        // dd(Auth::User());

        /** Simpan transaksi */
        $transaksi = Transaksi::create([
            'id_outlet' => Auth::User()->id_outlet,
            'kode_invoice' => rand(100_000_000,999_999_999),
            'id_member' => $req->member,
            'id_user' => Auth::User()->id,
            'tgl' => Carbon::now()->addDays(7),
            'batas_waktu' => $req->batas_waktu,
            'biaya_tambahan' => $req->biaya_tambahan,
            'diskon' => ($req->diskon / 100),
            'status' => $req->status,
            'dibayar' => $req->dibayar
        ]);

        return redirect()->route('getDetailTransaksi', $transaksi->id_transaksi)->with('Sukses', 'Berhasil input transaksi baru.');
    }

    public function getDetailTransaksi($id) {
        $data = DB::table('tb_detail_transaksi')
                ->join('tb_transaksi', 'tb_detail_transaksi.id_transaksi', 'tb_transaksi.id_transaksi')
                ->get();
    }


}
