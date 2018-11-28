<?php

namespace App\Http\Controllers;

use App\addCustomer;
use App\service_package;
use Illuminate\Http\Request;

class deleteController extends Controller
{
    public function deleteCustomer (Request $request)
    {
            try {
//        task01_mod::where('staff_id', $request->input('ID'))->delete();
                addCustomer::where('id', $request->input('ID'))->delete();
                return 'done';
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }
    public function deletePackage (Request $request)
    {
        try {
//        task01_mod::where('staff_id', $request->input('ID'))->delete();
            service_package::where('id', $request->input('ID'))->delete();
            return 'done';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
