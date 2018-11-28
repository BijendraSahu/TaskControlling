<?php

namespace App\Http\Controllers;

use App\addCustomer;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addNew extends Controller
{
    public function addnewCustomer(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $number = $request->input('number');
        $address = $request->input('address');
        $landmark = $request->input('landmark');
        $city = $request->input('city');
        $ifExistEmail = DB::table('customerinfo')->where(["CustomerMobile" => $number])->first();
        if (isset($ifExistEmail)) {
            return 'notdone';
        } else {
            $cableCustomer = new addCustomer();
            $cableCustomer->CustomerFirstname = $firstname;
            $cableCustomer->CustomerLastname = $lastname;
            $cableCustomer->CustomerEmail = $email;
            $cableCustomer->CustomerMobile = $number;
            $cableCustomer->CustomerAddress = $address;
            $cableCustomer->CustomerLandmark = $landmark;
            $cableCustomer->CustomerCity = $city;
            $cableCustomer->save();
            return 'done';
        }
    }
    public function checkExistMobileNumber(Request $request){
        $number=$request->input('value');
        $ifExistEmail = DB::table('customerinfo')->where(["CustomerMobile" => $number])->first();
        if(isset($ifExistEmail)){
            return 'done';
        }
        else{
            return'not done';
        }
    }
    public function Adminaddusers(Request $request){
        $name=$request->input('name');
        $username=$request->input('username');
        $password=$request->input('password');
        $phonnumber=$request->input('number');
        $address=$request->input('address');
        $city=$request->input('city');
        $obj= new Admin();
        $obj->name = $name;
        $obj->username = $username;
        $obj-> password= $password;
        $obj->phoneNumber = $phonnumber;
        $obj->Address = $address;
        $obj->city = $city;
        $obj-> save();
        return 'done';
    }
}
