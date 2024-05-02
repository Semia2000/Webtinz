<?php

use Illuminate\Support\Facades\Route;

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
    return view('front_include.home');
})->name('home');
Route::get('letstart', function () {
    return view('front_include.letstart');
})->name('letstart');
Route::get('signup', function () {
    return view('front_include.signup');
})->name('signup');
Route::get('otpverif', function () {
    return view('front_include.otpverif');
})->name('otpverif');
Route::get('choosetemplates', function () {
    return view('front_include.choosetemplates');
})->name('choosetemplates');
Route::get('payement', function () {
    return view('front_include.payement');
})->name('payement');
Route::get('contactinfo', function () {
    return view('front_include.contactinfo');
})->name('contactinfo');
Route::get('paysuccessful', function () {
    return view('front_include.paysuccessful');
})->name('paysuccessful');
Route::get('payement-process', function () {
    return view('front_include.payement-process');
})->name('payement-process');
Route::get('formsaboutcompany', function () {
    return view('front_include.formsaboutcompany');
})->name('formsaboutcompany');
Route::get('formsecom', function () {
    return view('front_include.formsecom');
})->name('formsecom');
Route::get('summarywebsite', function () {
    return view('front_include.summarywebsite');
})->name('summarywebsite');
Route::get('summaryecom', function () {
    return view('front_include.summaryecom');
})->name('summaryecom');
Route::get('layoutuser', function () {
    return view('dashboarduser.layoutuser');
})->name('layoutuser');
Route::get('dashboard', function () {
    return view('dashboarduser.dashboard');
})->name('dashboard');
Route::get('companyurl', function () {
    return view('dashboarduser.companyurl');
})->name('companyurl');
Route::get('subscription', function () {
    return view('dashboarduser.subscription');
})->name('subscription');
Route::get('viewtemplates', function () {
    return view('dashboarduser.viewtemplates');
})->name('viewtemplates');
Route::get('myprofile', function () {
    return view('dashboarduser.myprofile');
})->name('myprofile');
Route::get('bankdetail', function () {
    return view('dashboarduser.bankdetail');
})->name('bankdetail');

