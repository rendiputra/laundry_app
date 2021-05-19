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
            'outlet' => ['required', Rule::in([0, 1, 2])],
            'hak_akses' => ['required', Rule::in($arr)]
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
}