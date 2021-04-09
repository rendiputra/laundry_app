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
}
