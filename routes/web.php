<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.searchplaces');
});

Route::get('admin', function (\Illuminate\Http\Request $request) {
    if(!session()->exists('admin')){
        return view('NewAdminLogin');
    }else{
        return back()->with('status', 'You are already logged in!');
    }

});

Route::group(['middleware' => 'usersession'], function () {
    Route::get('admin-index', function () {
        return view('Admin.AdminIndex');
    });
    Route::group(['middleware' => 'admin'], function () {
        Route::get('adminaddusers', 'addNew@Adminaddusers');
        Route::get('userlist', 'viewList@userlist');
        Route::get('add-customer', function () {
            return view('Admin.AddCustomer');
        });
        Route::get('add-user', function () {
            return view('Admin.userDetailPage');
        });
        Route::get('addnewcustomer', 'addNew@addnewCustomer');
        Route::get('numberExist', 'addNew@checkExistMobileNumber');
        Route::get('customerList', 'viewList@customerList');

        Route::get('deletesingle', 'deleteController@deleteCustomer');
        Route::get('deletesinglepackage', 'deleteController@deletePackage');
        Route::get('detailsforedit_', 'viewList@customerdetailsforedit');
//    -----------------package route------------------------
        Route::get('package', 'viewList@getpackageList');
        Route::get('package_edit_', 'viewList@packageForEdit');
        Route::get('updatepackage', 'viewList@updatePackage');

        Route::get('addnewpackage', 'makePaymentCont@addpackage');
        Route::get('openmodalwithsession', 'viewList@keepidinsession');


        Route::get('getOldRecords/{from}/{to}/getOldRecords', 'viewList@getOldRecords');
//        Route::get('getOldRecords', 'viewList@getOldRecords');
        Route::get('updateCustomerDetail', 'viewList@updateCustomerDetail');
    });
//---------------------search route-----------------------
    Route::get('searchforcustomer','viewList@searchthis');
    Route::get('serachnameformakepayment','viewList@searchmakepaymentlist');

    Route::get('searchforpaidcustomer','viewList@searchthispaid');
//-----------------------rout for payment----------------------------
    Route::get('AddPaymentForm', 'viewList@getMakepaymentform');
    Route::get('formakepaymentlist', 'viewList@customerListformakepayment');
    Route::get('addpayment', 'makePaymentCont@makepayment');
    Route::get('getpayment', 'makePaymentCont@getPayment');
    Route::get('paynexttime', 'makePaymentCont@paynexttime');
    Route::get('forwhopaidlist', 'viewList@customerListWhoPaid');
});
Route::get('adminuserrecords', 'viewList@adminuserrecords');


Route::get('adminlogin', 'adminLogINout@adminlogin');
Route::get('getingsession', 'adminLogINout@getingsession');



Route::get('adminlogout', 'adminLogINout@adminLogout');

