<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use image;
use DB;
USE Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pelanggan()
    {
        $data = DB::table('tb_member')->get();
        $jml = count($data);
        return view('member.list_member', [
            'data' => $data,
            'jml' => $jml,
        ]);
    }
}
