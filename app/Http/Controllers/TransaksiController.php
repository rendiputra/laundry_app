<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Hash;
use Validator;
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
                    ['tb_transaksi.id_outlet', '=', Auth::User()->id_outlet]
                ])->orderBy('tb_transaksi.id_transaksi', 'desc')
                ->get();
                
        $cekEmpty = empty($data);
        
        return view('transaksi.list_transaksi', compact('data', 'cekEmpty'));
    }


}
