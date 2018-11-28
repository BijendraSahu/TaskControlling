<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminLogINout extends Controller
{
    public function adminlogin(Request $request){
        $username=$request->input('username');
        $password=$request->input('password');
        $login = DB::table('admin')->where(["username" => $username, "password" => $password])->first();
        if(isset($login)){
                \Illuminate\Support\Facades\Session::put('admin',$login);
                return 'done';

        }else{
            return 'notdone';
        }
    }
    public function adminLogout(Request $request){
        $request->session()->flush();
        return view('NewAdminLogin');
    }
    function getingsession(Request $request){
//        $value= $request->session()->get('admin')->id;
        $value = $request->session()->get('admin')->isAdmin;
//        if ($value == 0) {
//            {
//                abort(403, 'Unauthorized action.');
//            }
        return response()->json($value);


    }
}
