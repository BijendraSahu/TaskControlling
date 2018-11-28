<?php

namespace App\Http\Controllers;

use App\addCustomer;
use App\Admin;
use App\getPaymentDetail;
use App\service_package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class viewList extends Controller
{
    public function customerList(Request $request)
    {
        $getCustomerlist = addCustomer::paginate(10);
        return view('Admin.CustomerList')->with(['result' => $getCustomerlist]);
    }

    public function customerdetailsforedit(Request $request)
    {
        $myid = $request->input('id');
        $data = addCustomer::find($myid);
        return view('Admin.editCustomer')->with(['data' => $data]);
    }

    public function customerListformakepayment(Request $request)
    {
        $currentdate = $request = Carbon::now()->format('Y-m-d');
//        $getCustomerlist = addCustomer::orderBy('CustomerFirstname', 'asc')->paginate(10);
        $getCustomerlist = addCustomer::orderBy('CustomerFirstname', 'asc')->whereNull('nextPaymentDate')->paginate(10);

//        $ifPaymentDone=DB::select("SELECT * from paymentdetails WHERE `attend_date`='$attend_date'");
        return view('Admin.MakePayment')->with(['result' => $getCustomerlist, 'currentdate' => $currentdate]);

    }

    public function customerListWhoPaid(Request $request)
    {
        $currentdate = $request = Carbon::now()->format('Y-m-d');
//        $getCustomerlist = addCustomer::orderBy('CustomerFirstname', 'asc')->paginate(10);
        $getCustomerlist = addCustomer::orderBy('CustomerFirstname', 'asc')->whereNotNull('nextPaymentDate')->paginate(10);

//        $ifPaymentDone=DB::select("SELECT * from paymentdetails WHERE `attend_date`='$attend_date'");
        return view('Admin.view_paidCustomer')->with(['result' => $getCustomerlist, 'currentdate' => $currentdate]);

    }

    public function getMakepaymentform(Request $request)
    {
        $id = $request->input('id');
        $request->session()->put('customerid', $id);
        $obj = addCustomer::where('id', $id)->first();
        $data = service_package::where(['is_deleted' => 0])->get();


//return $obj->lastdueamt;
        return view('Admin.addPayment')->with(['obj' => $obj, 'service_package' => $data]);
//    return view('Admin.addpaymentforMobile')->with(['obj'=>$obj,'service_package'=>$data]);
    }

    public function getsesson()
    {
        $value = session('customerid');
        echo $value;
    }

    public function keepidinsession(Request $request)
    {
        $idforssession = $request->input('ID');
        $request->session()->put('sessionid', $idforssession);
        return 'done';

    }

    public function getOldRecords(Request $request, $from, $to)
    {

        $id = $request->session()->get('sessionid');

//        $adminId=getPaymentDetail::select("AdminId")->where('CustomerId',$id)->get();
//        $packageid=getPaymentDetail::select("Packagetype")->where('CustomerId',$id)->get();

//        echo json_encode($packageid);
//        return json_encode([$packageid,$adminId]);


        $getRecord = DB::table('paymentdetails')
            ->join('admin', 'paymentdetails.AdminId', '=', 'admin.id')
            ->join('customerinfo', 'paymentdetails.CustomerId', '=', 'customerinfo.id')
            ->join('package','paymentdetails.Packagetype','=','package.id')
            ->whereBetween('paymentDate', [$from, $to])
            ->where([['paymentdetails.CustomerId', '=', $id],])
            ->select('paymentdetails.*', 'admin.*', 'customerinfo.*','package.PackageName')
            ->get();
//        echo print_r($getRecord);
////        echo '<pre>';
////        print_r($getRecord);
        return view('Admin.Oldrecord')->with(['records' => $getRecord,'from'=>$from,'to'=>$to]);
    }
    function adminuserrecords(Request $request){
        $result= DB::table('paymentdetails')
            ->join('admin','paymentdetails.AdminId','=', 'admin.id')
            ->join('customerinfo','paymentdetails.CustomerId','=','customerinfo.id')

            ->where([['paymentdetails.AdminId','=','4']])

            ->select('paymentdetails.*','sum(paymentdetails.Ammount) ',
                'admin.*', 'customerinfo.*')
            ->selectRaw('sum(paymentdetails.Ammount) as paymentdetails.totalCollection')
            ->get();
//        return view('Admin.adminUserRecords')->with(['records' => $result]);
        echo '<pre>';
     print_r($result);
//     dd($result);
    }
    public function updateCustomerDetail(Request $request)
    {
        $firstname = $request->input('firstname1');
        $lastname = $request->input('lastname1');
        $email = $request->input('email1');
        $number = $request->input('number1');
        $address = $request->input('address1');
        $landmark = $request->input('landmark1');
        $city = $request->input('city1');
        $id = $request->input('id');
        addCustomer::where('id', $id)->update(['CustomerFirstname' => $firstname, 'CustomerLastname' => $lastname, 'CustomerEmail' => $email,
            'CustomerMobile' => $number, 'CustomerAddress' => $address, 'CustomerLandmark' => $landmark, 'CustomerCity' => $city]);
        return 'done';
    }

//    ---------------search-----------------
    function searchthis(Request $request)
    {
        $search = $request->input('value');
//        $result=addCustomer::where('CustomerFirstname','LIKE','%'.$search.'%')->get();
        $result = DB::table('customerinfo')
            ->where('CustomerFirstname', 'like', '%' . $search . '%')
            ->orWhere('CustomerLastname', 'like', '%' . $search . '%')
            ->orWhere('CustomerMobile', 'like', '%' . $search . '%')
            ->orWhere('CustomerEmail', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('Admin.searchView')->with(['Result' => $result])->withQuery($search);
    }

    function searchmakepaymentlist(Request $request){
        $search = $request->input('value');
        $currentdate = $request = Carbon::now()->format('Y-m-d');
//        $search = $request->input('value');
        $result = DB::table('customerinfo')
            ->where('CustomerFirstname', 'like', '%' . $search . '%')
//            ->orWhere('CustomerLastname', 'like', '%' . $search . '%')
            ->whereNull('nextPaymentDate')->paginate(10);

        return view('Admin.makepaymentfilterlist')->with(['result'=>$result,'currentdate' => $currentdate])->withQuery($search);
    }

    function searchthispaid(Request $request)
    {
        $search = $request->input('value');
        $todaysdate = $request = Carbon::now()->format('Y-m-d');
//        $result=addCustomer::where('CustomerFirstname','LIKE','%'.$search.'%')->get();
        $result = DB::table('customerinfo')
            ->where('CustomerFirstname', 'like', '%' . $search . '%')
            ->whereNotNull('nextPaymentDate')
            ->paginate(10);
//return $result;
        return view('Admin.searchPaidCustomer')->with(['Result' => $result, 'todaysdate' => $todaysdate]);
    }

    public function getpackageList(Request $request)
    {
        $getPackagedetails = service_package::all();
        return view('Admin.AddPackage')->with(['Package' => $getPackagedetails]);
    }

    public function packageForEdit(Request $request)
    {
        $myid = $request->input('id');
        $data = service_package::find($myid);
        return view('Admin.editPackage')->with(['Package' => $data]);
    }

    public function updatePackage(Request $request)
    {
        $id = $request->input('id');
        $packageName1 = $request->input('packageName1');
        $ammount1 = $request->input('ammount1');
        $packageduration1 = $request->input('packageduration1');
        service_package::where('id', $id)->update(['PackageName' => $packageName1, 'PackageAmmount' => $ammount1, 'packageDuration' => $packageduration1]);
        return 'done';
    }

    //--------------------------user list------------------------------//
    public function userlist(Request $request)
    {
        $getUser = Admin::where('isAdmin', '!=', 1)->paginate(10);
        return view('Admin.userDetailpage')->with(['user' => $getUser]);
    }

}
