<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use Auth;
use DB;
use Validator;
use Hash;

use App\models\Paket;

class PaketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPaket() {
        $data = DB::table('tb_paket')
        ->join('tb_outlet', 'tb_paket.id_paket', '=', 'tb_outlet.id_outlet')
        ->where([
            ['tb_paket.id_outlet', '=', Auth::User()->id_outlet],
            ['tb_paket.status', '=', 1],
            ['tb_outlet.status', '=', 1],
        ])->simplePaginate(10);

        $jml = count($data);

        return view('paket.list_paket', \compact('data', 'jml'));
    }

    public function createPaket()
    {
        return view('paket.paket_input');
    }

    public function createPaketAction(Request $req) {
        $validasi = Validator::make($req->all(), [
            'nama_paket' => 'required|max:100',
            'jenis' => [
                'required',
                Rule::in(['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain']),
            ],
            'harga' => 'required|numeric',
        ]);
        
        if($validasi->fails()){
            return redirect('paket/create')
                ->withErrors($validasi)
                ->withInput();
        }

        $paket = new Paket;
        $paket->id_outlet = Auth::user()->id_outlet;
        $paket->nama_paket = $req->nama_paket;
        $paket->jenis = $req->jenis;
        $paket->harga = $req->harga;

        if($paket->save()){
            return \redirect()->route('getPaket')->with('sukses', 'Berhasil input Paket Produk.');
        }else{
            return \redirect()->route('getPaket')->with('error', 'Gagal input Paket Produk.');
        }
    }   


    public function updatePaket($id) {
        $data = DB::table('tb_paket')
            ->where([
                ['id_paket', '=', $id],
                ['id_outlet', '=', Auth::user()->id_outlet],
                ['status', '=', 1]
            ])->first();
        
        if(!empty($data)){
            return view('paket.edit_paket', \compact('data'));
        }else{
            return \redirect()->route('getPaket')->with('error', 'Permintaan tidak valid!');
        }
    }

    public function updatePaketAction($id, Request $req) {
        $validasi = Validator::make($req->all(), [
            '_id' => 'required',
            'nama_paket' => 'required|max:100',
            'jenis' => [
                'required',
                Rule::in(['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain']),
            ],
            'harga' => 'required|numeric',
        ]);
        if($validasi->fails()){
            return back()
                ->withErrors($validasi)
                ->withInput();
        }
        
        // validasi id_paket
        if (Hash::check($id, $req->_id)){
            $update = DB::table('tb_paket')
                    ->where([
                        ['id_paket', '=', $id],
                    ])->update([
                        'nama_paket' => $req->nama_paket,
                        'jenis' => $req->jenis,
                        'harga' => $req->harga,
                    ]);
            if($update){
                return redirect()->route('getPaket')->with('sukses','Berhasil update data Paket.');
            }else{
                return redirect()->route('getPaket')->with('error','Gagal update data Paket.');
            }
        } else {
            return redirect()->route('getPaket')->with('invalid','Permintaan tidak valid');
        }
    }

    public function deletePaket($id)
    {
        $update = DB::table('tb_paket')
            ->where([
                ['id_paket', '=', $id],
                ['status', '=', 1],
            ])->update([
                'status' => 0,
            ]);
        return redirect()->route('getPaket')->with('sukses','Sukses delete data paket.');
    }
}