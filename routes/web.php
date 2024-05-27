<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CustumdigitalisationController;
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
})->name('welcome');
// Route::get('letstart', function () {
//     return view('front_include.letstart');
// })->name('letstart');
Route::get('login', function () {
    return view('front_include.login');
})->name('login');
Route::get('signup', function () {
    return view('front_include.signup');
})->name('signup');
// Route::get('otpverif', function () {
//     return view('otp.otpverif');
// })->name('otpverif');
// Route::get('choosetemplates', function () {
//     return view('front_include.choosetemplates');
// })->name('choosetemplates');
Route::get('payement', function () {
    return view('front_include.payement');
})->name('payement');
// Route::get('contactinfo', function () {
//     return view('front_include.contactinfo');
// })->name('contactinfo');
// Route::get('custumform', function () {
//     return view('front_include.custumform');
// })->name('custumform');
Route::get('paysuccessful', function () {
    return view('front_include.paysuccessful');
})->name('paysuccessful');
Route::get('payement-process', function () {
    return view('front_include.payement-process');
})->name('payement-process');
// Route::get('formsaboutcompany', function () {
//     return view('front_include.formsaboutcompany');
// })->name('formsaboutcompany');
// Route::get('formsecom', function () {
//     return view('front_include.formsecom');
// })->name('formsecom');
// Route::get('summarywebsite', function () {
//     return view('front_include.summarywebsite');
// })->name('summarywebsite');

Route::get('layoutuser', function () {
    return view('dashboarduser.layoutuse');
})->name('layoutuser');
// Route::get('dashboard', function () {
//     return view('dashboarduser.dashboard');
// })->name('dashboard');
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
Route::get('layoutuse', function () {
    return view('dashboarduser.layoutuse');
})->name('layoutuse');


Route::group(['middleware' => ['web']], function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/contactinfo', [UserController::class, 'showcontactinfo'])->name('contactinfo');
    Route::post('/storecontactinfo', [UserController::class, 'storeContactInfo'])->name('storecontactinfo');
    // User dashboard
    Route::get('/dashboarduser', [UserController::class, 'dashboarduserview'])->name('dashboarduser');
    // Services
    Route::get('/letstart', [UserController::class, 'startservices'])->name('letstart');
});




// Otp
Route::get('/otpverif', [OtpController::class, 'show'])->name('otpverif');
Route::post('/otpverif.verify', [OtpController::class, 'verify'])->name('otpverif.verify');
Route::get('/successOtp', [OtpController::class, 'successOtp'])->name('successOtp');



// website
Route::get('formsaboutcompany',[WebsiteController::class , 'showForm'])->name('formsaboutcompany');
Route::post('formsaboutcompany.store',[WebsiteController::class , 'storeForm'])->name('formsaboutcompany.store');
Route::get('summarywebsite',[WebsiteController::class , 'showsummarypage'])->name('summarywebsite');
Route::post('updateSummary/{companyId}/{websiteId}', [WebsiteController::class, 'updateSummary'])->name('updateSummary');

// Ecom
Route::get('formsecom', function () {
    return view('ecom.formsecom');
})->name('formsecom');
Route::get('summaryecom', function () {
    return view('front_include.summaryecom');
})->name('summaryecom');

// Template choose
Route::get('/showallTemplate', [TemplateController::class, 'showallTemplate'])->name('showallTemplate');
Route::get('templates/{template}/preview', [TemplateController::class, 'preview'])->name('templates.preview');

// custum
Route::get('/custumform', [CustumdigitalisationController::class, 'index'])->name('custumform');
Route::post('/custumform.store', [CustumdigitalisationController::class, 'store'])->name('custumform.store');

// subscription

Route::get('/subscription', [CustumdigitalisationController::class, 'index'])->name('subscription');
Route::post('/subscription.store', [CustumdigitalisationController::class, 'store'])->name('sbscription.store');



// admin
