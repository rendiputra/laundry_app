<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Validator;
use Hash;

use App\models\Member;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPelanggan()
    {
        $data = DB::table('tb_member')
                ->where([
                    ['status', '=', 1],
                ])->simplePaginate(10);
        $jml = count($data);
        return view('member.list_member', [
            'data' => $data,
            'jml' => $jml,
        ]);
    }

    public function updatePelanggan($id)
    {
        $data = DB::table('tb_member')
                ->where([
                    ['id_member', '=', $id],
                ])->first();
                // dd($data);
        if (!empty($data)){
            return view('member.member_edit', ['data'=>$data]);
        }else{
            return redirect()->route('getPelanggan')->with('error','Permintaan tidak valid!');
        }
    }

    /**
     * Update dilakukan jika nilai $id sama dengan yang ada di $req->_id
     *
     * @param Integer $id
     * @param  \Illuminate\Http\Request  $req
     * @var _id Illuminate\Support\Facades\Hash  
     * @return string
     */
    public function updatePelangganAction($id, Request $req)
    {
        $req->validate([
            '_id' => 'required',
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'JK' => 'required',
            'notelp' => 'required|numeric',
        ]);

        // validasi id_member
        if (Hash::check($id, $req->_id)){
            $update = DB::table('tb_member')
                    ->where([
                        ['id_member', '=', $id],
                    ])->update([
                        'nama' => $req->nama,
                        'alamat' => $req->alamat,
                        'jenis_kelamin' => $req->JK,
                        'tlp' => $req->notelp,
                    ]);
            if($update){
                return redirect()->route('getPelanggan')->with('sukses','Berhasil update data pelanggan.');
            }else{
                return redirect()->route('getPelanggan')->with('error','Gagal update data pelanggan.');
            }
        } else {
            return redirect()->route('getPelanggan')->with('invalid','Permintaan tidak valid');
        }
    }

    public function createPelanggan(){
        return view('member.member_input');
    }

    public function createPelangganAction(Request $req)
    {
        $req->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'JK' => 'required',
            'notelp' => 'required|numeric',
        ]);

        $data = new Member;
        $data->nama = $req->nama;
        $data->alamat = $req->alamat;
        $data->jenis_kelamin = $req->JK;
        $data->tlp = $req->notelp;

        if ($data->save()){
            return redirect()->route('getPelanggan')->with('sukses','Berhasil input data pelanggan.');
        }else{
            return redirect()->route('getPelanggan')->with('error','Gagal input data pelanggan.');
        }
    }

    public function deletePelanggan($id)
    {
        $update = DB::table('tb_member')
            ->where([
                ['id_member', '=', $id],
            ])->update([
                'status' => 0,
            ]);
        return redirect()->route('getPelanggan')->with('sukses','Sukses delete data pelanggan.');
    }
}
