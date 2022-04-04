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


Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('user/verify','UserController@getVerify');
//

Route::post('user/otp','UserController@postOtp');
Route::post('user/otpforgot','UserController@postOtpforgot');

Route::post('user/savepassword','UserController@postResetpass');
Route::post('userpromotion/addpromotionauto','UserpromotionController@postAddpromotionauto');
Route::post('userpromotion/addpromotion','UserpromotionController@postAddpromotion');
Route::post('userpromotion/addmission','UserpromotionController@postAddmission');
Route::post('userpromotion/addcoupon','UserpromotionController@postCouponcode');
Route::post('userpromotion/addpromotioncoins','UserpromotionController@postAddpromotioncoins');

Route::post('userturnover/addclaimwinloss','GetreturnController@postAddclaimwinloss');

Route::post('diamondshop/buyproduct','DiamondshopController@buyproduct');

Route::post('withdraw/addwithdraw','WithdrawController@postAddwithdraw');


Route::post('wheellogs/addwheelresult','WheellogsController@postAddwheelresult');

Route::post('userpromotion/removepro','UserpromotionController@postRemovepromotion');


Route::post('affiliate/addpromotionrefer','AffiliateController@postAddpromotionrefer');



Route::get("seamless/launch", function(Request $request) {
    include public_path().'/seamless/launch.php';
});


