<?php

namespace App\Http\Controllers;

use App\addCustomer;
use App\service_package;
use Carbon\Carbon;
use App\getPayment;
use App\makePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class makePaymentCont extends Controller
{
    public function getPayment(Request $request)
    {
        $Packagetype = $request->input('Packagetype');

        return service_package::where('id', $Packagetype)->first();
//        return view('Admin.addPayment')->with(['Data'=>$getpayment]);

    }

    public function makepayment(Request $request)
    {
        $admin = $request->session()->get('admin')->id;
        $Packagetype = $request->input('Packagetype');
        $paymentAmmount = $request->input('paymentAmmount');
        $packageduration = $request->input('packageduration');
        $id = $request->session()->get('customerid');
        $currentdate = $request = Carbon::now()->format('Y-m-d');
        $nextPaymentDate = Carbon::parse($currentdate)->addMonths($packageduration);
//        echo print_r($id);
//        $nextPaymentDate = $request = date('Y-m-d', strtotime('+ %C $packageduration month'));
//        DB::insert("INSERT INTO `paymentdetails`(`nextPaymentDate`) VALUES ADD(CURDATE(), INTERVAL %C $packageduration MONTH)");
        addCustomer::where('id', $id)->update(['nextPaymentDate' => $nextPaymentDate, 'lastpaymentDate'=>$currentdate,'lastdueamt'=>0,'paymentDueMonthcount'=>0]);

        $makepayment = new makePayment();
        $makepayment->Packagetype = $Packagetype;
        $makepayment->Ammount = $paymentAmmount;
        $makepayment->AdminId = $admin;
        $makepayment->CustomerId = $id;
        $makepayment->paymentDate = $currentdate;
        $makepayment->nextPaymentDate = $nextPaymentDate;
        $makepayment->save();
        return 'done';
    }

    function addpackage(Request $request)
    {
        $packageName = $request->input('packageName');
        $ammount = $request->input('ammount');
        $packageduration = $request->input('packageduration');
        $package = new service_package();
        $package->PackageName = $packageName;
        $package->PackageAmmount = $ammount;
        $package->packageDuration = $packageduration;
        $package->save();
        return 'done';
    }

    function paynexttime(Request $request)
    {
//        $Packagetype = $request->input('Packagetype');
//        $paymentAmmount = $request->input('paymentAmmount');
//        $packageduration = $request->input('packageduration');
        $id = $request->session()->get('customerid');
        $currentdate = $request = Carbon::now()->format('Y-m-d');
        $data = addCustomer::where(['id' => $id])->first();
//        $data->lastdueamt == '' ? 0 :$data->paymentDueMonthcount == '' ? 0 :
            $summ = $data->lastdueamt + request('paymentAmmount');
        $data->lastdueamt = $summ;
//        $data->save();
//        $monthdata = addCustomer::where(['id' => $id])->first();
        $countmonth =  $data->paymentDueMonthcount + request('packageduration');
       $data->paymentDueMonthcount=$countmonth;
        $data->save();
        $nextPaymentDate = Carbon::parse($currentdate)->addMonths(request('packageduration'));
        addCustomer::where('id', $id)->update(['nextPaymentDate' => $nextPaymentDate]);
        return 'done';
    }
}
