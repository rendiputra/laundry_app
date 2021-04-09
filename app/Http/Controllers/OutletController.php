<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Validator;

use App\models\Outlet;

class OutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getOutlet()
    {
        $data = DB::table('tb_Outlet')
                ->where([
                    ['status', '=', 1],
                ])->simplePaginate(10);
        $jml = count($data);
        return view('outlet.list_outlet', [
            'data' => $data,
            'jml' => $jml,
        ]);
    }

    public function updateOutlet($id)
    {
        $data = DB::table('tb_Outlet')
                ->where([
                    ['id_outlet', '=', $id],
                    ['status', '=', 1],
                ])->first();
        if (!empty($data)){
            return view('outlet.outlet_edit', ['data'=>$data]);
        }else{
            return redirect()->route('getOutlet')->with('error','Permintaan tidak valid!');
        }
    }

    public function updateOutletAction($id, Request $req)
    {
        $req->validate([
            'id_' => 'required',
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'notelp' => 'required|numeric',
        ]);
        if ($id == $req->id_){
            $update = DB::table('tb_outlet')
                    ->where([
                        ['id_outlet', '=', $id],
                    ])->update([
                        'nama' => $req->nama,
                        'alamat' => $req->alamat,
                        'tlp' => $req->notelp,
                    ]);
            if($update){
                return redirect()->route('getOutlet')->with('sukses','Berhasil update data outlet.');
            }else{
                return redirect()->route('getOutlet')->with('error','Gagal update data outlet.');
            }
        } else {
            return redirect()->route('getOutlet')->with('invalid','Permintaan tidak valid');
        }
    }

    public function createOutlet(){
        return view('outlet.outlet_input');
    }

    public function createOutletAction(Request $req)
    {
        $req->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'notelp' => 'required|numeric',
        ]);

        $data = new Outlet;
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->tlp = $req->notelp;

        if ($data->save()){
            return redirect()->route('getOutlet')->with('sukses','Berhasil input data outlet.');
        }else{
            return redirect()->route('getOutlet')->with('error','Gagal input data outlet.');
        }
    }
<<<<<<< HEAD

    public function deleteOutlet($id)
    {
        $update = DB::table('tb_outlet')
            ->where([
                ['id_outlet', '=', $id],
            ])->update([
                'status' => 0,
            ]);
        return redirect()->route('getOutlet')->with('sukses','Sukses delete data outlet.');
    }
=======
>>>>>>> parent of b80a788... create delete outlet
}
