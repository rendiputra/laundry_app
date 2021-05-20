<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Hash;
use Validator;
use Illuminate\Validation\Rule;

use App\models\User;


class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getpengguna()
    {
        $data = DB::table('users')
                ->join('tb_outlet', 'users.id_outlet', 'tb_outlet.id_outlet')
                ->select('users.id', 'users.name', 'users.email', 'users.isAdmin', 'tb_outlet.nama')
                ->where([
                    ['users.status', '!=', 0],
                ])->simplePaginate(10);
        $jml = count($data);
        return view('pengguna.list_pengguna', [
            'data' => $data,
            'jml' => $jml,
        ]);
    }

    public function createPengguna()
    {
        $data = DB::table('tb_outlet')
            ->select('id_outlet', 'nama')
            ->get();

        return view('pengguna.pengguna_input', compact('data'));
    }

    public function createPenggunaAction(Request $req) 
    {
        /** untuk validasi id_outlet */
        $data = DB::table('tb_outlet')
            ->select('id_outlet')
            ->where('status', '=', 1)
            ->get();
        $arr = array();
        $no = 0;
        foreach ($data as $d){
            $arr[$no] = $d->id_outlet;
            $no++;
        }

        /** untuk validasi form input */
        $validasi = Validator::make($req->all(), [
            'nama' => 'required|max:100',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => ['required', 'string', 'confirmed'],
            'outlet' => ['required', Rule::in($arr)],
            'hak_akses' => ['required', Rule::in([0, 1, 2])]
        ]);
        if($validasi->fails()){
            return redirect()->route('createPengguna')
                ->withErrors($validasi)
                ->withInput();
        }

        /** Store pengguna baru */
        $pengguna = new User;
        $pengguna->id_outlet = $req->outlet;
        $pengguna->name = $req->nama;
        $pengguna->email = $req->email;
        $pengguna->password = Hash::make($req->password);
        $pengguna->isAdmin = $req->hak_akses;
        if($pengguna->save()){
            return redirect()->route('getPengguna')->with('Sukses', 'Berhasil input pengguna baru.');
        } else {
            return redirect()->route('getPengguna')->with('Error', 'Gagal input pengguna baru.');
        }
    }

    public function updatePengguna($id)
    {
        $outlet = DB::table('tb_outlet')
            ->select('id_outlet', 'nama')
            ->get();

        $data = DB::table('users')
            ->join('tb_outlet', 'users.id_outlet', '=', 'tb_outlet.id_outlet')
            ->select('users.id', 'users.name', 'users.email', 'users.isAdmin', 'tb_outlet.id_outlet', 'tb_outlet.nama')
            ->where([
                ['users.id', '=', $id ],
                ['users.status', '=', 1]
            ])->first();

        if($data){
            return view('pengguna.edit_pengguna', compact('data', 'outlet'));
        }else{
            return redirect()->route('getPengguna')->with('Invalid', 'Permintaan tidak sah!');
        }

    }


    /**
     * Update dilakukan jika nilai $id sama dengan nilai yang ada di $req->_id
     *
     * @param Integer $id
     * @param  Illuminate\Http\Request  $req
     * @var _id Illuminate\Support\Facades\Hash  
     * @return string
     */
    public function updatePenggunaAction($id, Request $req)
    {
        /** untuk validasi id_outlet */
        $data = DB::table('tb_outlet')
            ->select('id_outlet')
            ->where('status', '=', 1)
            ->get();
        $arr = array();
        $no = 0;
        foreach ($data as $d){
            $arr[$no] = $d->id_outlet;
            $no++;
        }

        /** untuk validasi form */
        $validasi = Validator::make($req->all(), [
            'nama' => 'required|max:100',
            'outlet' => ['required', Rule::in($arr)],
            'hak_akses' => ['required', Rule::in([0, 1, 2])]
        ]);
        if($validasi->fails()){
            return redirect()
                ->back()
                ->withErrors($validasi)
                ->withInput();
        }

        /** validasi id user yang akan diupdate */
        if (Hash::check($id, $req->_id)){
            $update = DB::table('users')
                    ->where([
                        ['id', '=', $id]
                    ])->update([
                        'id_outlet' => $req->outlet,
                        'name'=> $req->nama,
                        'isAdmin' => $req->hak_akses
                    ]);
            if($update){
                return redirect()->route('getPengguna')->with('Sukses', 'Berhasil update data user.');
            } else {
                return redirect()->route('getPengguna')->with('Error', 'Gagal update data user!');
            }

        } else {
            return redirect()->back()->with('Invalid', 'Permintaan tidak sah!')->withInput();
        }
    }

    public function deletePengguna($id)
    {
        $update = DB::table('users')
            ->where([
                ['id', '=', $id],
                ['status', '=', 1],
            ])->update([
                'status' => 0,
            ]);
        return redirect()->route('getPengguna')->with('sukses','Sukses delete data user.');
    }
}