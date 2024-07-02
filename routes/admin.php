<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SubscriptionplanController;
use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\TypetemplateController;
use App\Http\Controllers\SectorbusinessController;
use App\Http\Controllers\Admin\UsermanageController;
use App\Http\Controllers\Admin\AdminController;




use Illuminate\Support\Facades\Auth;

// Admin routes 


Route::middleware(['logout.inactive', 'check.otp' , 'role:master_admin,admin_manager,sale_manager,technical_manager'])->get('/backoffice', [AdminController::class, 'backofficeAccess'])->name('backoffice');


Route::get('/adminlogin', [AdminController::class, 'adminLogin'])->name('adminlogin');

Route::middleware(['auth','logout.inactive', 'check.otp' , 'role:master_admin,admin_manager,sale_manager,technical_manager'])->group(function () {

Route::get('/subscription', [SubscriptionplanController::class, 'showsubscriptionform'])->name('addsubscription');
Route::post('/subscription.store', [SubscriptionplanController::class, 'addsubscription'])->name('subscription.store');
Route::get('subscriptionlist', [SubscriptionplanController::class, 'listsubscription'])->name('subscriptionlist');
Route::get('subscription/{id}/view', [SubscriptionplanController::class, 'view'])->name('subscription.view');
Route::get('subscription/{id}/edit', [SubscriptionplanController::class, 'edit'])->name('subscription.edit');
Route::post('subscription/{id}/update', [SubscriptionplanController::class, 'update'])->name('subscription.update');
Route::get('/subscription/{id}/delete', [SubscriptionplanController::class, 'destroy'])->name('subscription.delete');

    // services management
    Route::get('/serviceslist', [AdminController::class, 'listservices'])->name('serviceslist');
    Route::get('/serviceslist/{id}/view', [AdminController::class, 'show'])->name('serviceslist.show');
    // join sales or tech
    Route::get('/joinsalesortech/{id}/join', [AdminController::class, 'joinSalesOrTech'])->name('joinsalesortech.join');
    Route::post('/joinsales/{id}/join', [AdminController::class, 'joinSales'])->name('joinsales.join');
    Route::post('/jointech/{id}/join', [AdminController::class, 'jointech'])->name('jointech.join');
    

});

Route::middleware(['auth','logout.inactive', 'check.otp', 'role:master_admin'])->group(function () {

    // Template management

    Route::get('addtemplates', [TemplateController::class, 'create'])->name('addtemplates');
    Route::get('templateslist', [TemplateController::class, 'TemplateList'])->name('templateslist');
    Route::post('templates', [TemplateController::class, 'store'])->name('templates.store');
    Route::get('templates/{id}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
    Route::get('templates/{id}/view', [TemplateController::class, 'view'])->name('templates.view');
    Route::post('templates/{id}/update', [TemplateController::class, 'update'])->name('templates.update');
    Route::get('/templates/{id}', [TemplateController::class, 'destroy'])->name('templates.delete');
 

    // Product Category

    Route::get('/productcategory', [ProductcategoryController::class, 'create'])->name('addproductcategory');
    Route::post('/productcategory.store', [ProductcategoryController::class, 'store'])->name('productcategory.store');
    Route::get('productcategorylist', [ProductcategoryController::class, 'list'])->name('productcategorylist');
    Route::get('productcategory/{id}/edit', [ProductcategoryController::class, 'edit'])->name('productcategory.edit');
    Route::post('productcategory/{id}/update', [ProductcategoryController::class, 'update'])->name('productcategory.update');

    // Type Template

    Route::get('/typetemplate', [TypetemplateController::class,'create'])->name('addtypetemplate');
    Route::post('/typetemplate.store', [TypetemplateController::class, 'store'])->name('typetemplate.store');
    Route::get('typetemplatelist', [TypetemplateController::class, 'list'])->name('typetemplatelist');
    Route::get('typetemplate/{id}/edit', [TypetemplateController::class, 'edit'])->name('typetemplate.edit');
    Route::post('typetemplate/{id}/update', [TypetemplateController::class, 'update'])->name('typetemplate.update');


});

// Sale Manager routes
Route::middleware(['auth','logout.inactive', 'check.otp' , 'role:master_admin,sale_manager,technical_manager'])->group(function () {

    //User Management addstafmem 

    Route::get('/staffmanage', [AdminController::class, 'index'])->name('staffmanage');
    Route::get('viewstaffmanage', [AdminController::class, 'list'])->name('viewstaffmanage');
    Route::get('/addstafmem', [AdminController::class, 'create'])->name('addstafmem');
    Route::post('/addstafmem', [AdminController::class, 'store'])->name('addstafmem.store');
    Route::get('/addstafmem/{id}/edit', [AdminController::class, 'edit'])->name('addstafmem.edit');
    Route::post('/addstafmem/{id}/update', [AdminController::class, 'update'])->name('addstafmem.update');
    Route::post('/addstafmem/{id}/updatestatus', [AdminController::class, 'updateStatus'])->name('addstafmem.updatestatus');

});


// Technical Manager  routes
// Route::middleware(['auth','logout.inactive', 'check.otp' , 'role:technical_manager'])->group(function () {

// });

// Technical Manager  routes
// Route::middleware(['auth','logout.inactive', 'check.otp' , 'role:admin_manager'])->group(function () {

// });

    // Route::get('listtemplates', function () {
    //     return view('admin.template.listtemplate');
    // })->name('listtemplates');
    // Route::get('addtemplates', function () {
    //     return view('admin.template.addtemplate');
    // })->name('addtemplates');

    // Route::get('addtemplates', function () {
    // return view('admin.template.addtemplate');
    // })->name('addtemplates');



// SEctor business
Route::get('/sectorbusiness', [SectorbusinessController::class, 'create'])->name('addsectorbusiness');
Route::post('/sectorbusiness.store', [SectorbusinessController::class, 'store'])->name('sectorbusiness.store');
Route::get('sectorbusinesslist', [SectorbusinessController::class, 'list'])->name('sectorbusinesslist');
Route::get('sectorbusiness/{id}/edit', [SectorbusinessController::class, 'edit'])->name('sectorbusiness.edit');
Route::post('sectorbusiness/{id}/update', [SectorbusinessController::class, 'update'])->name('sectorbusiness.update');

// Type Template


// Uer Manage
// User subscription manage
Route::get('/usersubscriptionmanage', [UsermanageController::class,'UserSubscription'])->name('usersubscriptionmanage');
Route::get('/usersubscription/{service_id}/{action}', [UsermanageController::class,'toggleDeployment']) ->name('toggledeployment')
->where('action', 'deployed|nodeployed');

// User account manage
// activate and desactivate user
Route::get('/userlist', [UsermanageController::class,'userlist'])->name('userlist');
Route::get('/users/{user}/activate', [UsermanageController::class,'activate'])->name('users.activate');
Route::get('/users/{user}/deactivate', [UsermanageController::class,'deactivate'])->name('users.deactivate');

// User purchase history
Route::get('/userpurchasehistory', [UsermanageController::class,'userpurchasehistory'])->name('userpurchasehistory');
Route::get('/viewpurchasehistory/{id}/history', [UsermanageController::class, 'viewpurchasehistory'])
    ->name('viewpurchasehistory.history');


// sendnewsletter
Route::get('/send-email', [AdminController::class,  'shownewsletterForm'])->name('send.email.form');
Route::post('/send-email', [AdminController::class, 'sendnewsletter'])->name('send.email');
