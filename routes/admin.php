<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SubscriptionplanController;
use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\TypetemplateController;
use App\Http\Controllers\SectorbusinessController;
use App\Http\Controllers\Admin\UsermanageController;
use App\Http\Controllers\Admin\AdminController;



// routes/admin.php


Route::get('/backoffice', function () {
    return view('admin.dashboard');
})->name('backoffice');
// Route::get('listtemplates', function () {
//     return view('admin.template.listtemplate');
// })->name('listtemplates');
// Route::get('addtemplates', function () {
//     return view('admin.template.addtemplate');
// })->name('addtemplates');

// Route::get('addtemplates', function () {
// return view('admin.template.addtemplate');
// })->name('addtemplates');

Route::get('addtemplates', [TemplateController::class, 'create'])->name('addtemplates');
Route::get('templateslist', [TemplateController::class, 'TemplateList'])->name('templateslist');
Route::post('templates', [TemplateController::class, 'store'])->name('templates.store');
Route::get('templates/{id}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
Route::get('templates/{id}/view', [TemplateController::class, 'view'])->name('templates.view');
Route::post('templates/{id}/update', [TemplateController::class, 'update'])->name('templates.update');
Route::get('/templates/{id}', [TemplateController::class, 'destroy'])->name('templates.delete');

// subscription

Route::get('/subscription', [SubscriptionplanController::class, 'showsubscriptionform'])->name('addsubscription');
Route::post('/subscription.store', [SubscriptionplanController::class, 'addsubscription'])->name('subscription.store');
Route::get('subscriptionlist', [SubscriptionplanController::class, 'listsubscription'])->name('subscriptionlist');
Route::get('subscription/{id}/view', [SubscriptionplanController::class, 'view'])->name('subscription.view');
Route::get('subscription/{id}/edit', [SubscriptionplanController::class, 'edit'])->name('subscription.edit');
Route::post('subscription/{id}/update', [SubscriptionplanController::class, 'update'])->name('subscription.update');
Route::get('/subscription/{id}/delete', [SubscriptionplanController::class, 'destroy'])->name('subscription.delete');

// Product Category

Route::get('/productcategory', [ProductcategoryController::class, 'create'])->name('addproductcategory');
Route::post('/productcategory.store', [ProductcategoryController::class, 'store'])->name('productcategory.store');
Route::get('productcategorylist', [ProductcategoryController::class, 'list'])->name('productcategorylist');
Route::get('productcategory/{id}/edit', [ProductcategoryController::class, 'edit'])->name('productcategory.edit');
Route::post('productcategory/{id}/update', [ProductcategoryController::class, 'update'])->name('productcategory.update');

// SEctor business
Route::get('/sectorbusiness', [SectorbusinessController::class, 'create'])->name('addsectorbusiness');
Route::post('/sectorbusiness.store', [SectorbusinessController::class, 'store'])->name('sectorbusiness.store');
Route::get('sectorbusinesslist', [SectorbusinessController::class, 'list'])->name('sectorbusinesslist');
Route::get('sectorbusiness/{id}/edit', [SectorbusinessController::class, 'edit'])->name('sectorbusiness.edit');
Route::post('sectorbusiness/{id}/update', [SectorbusinessController::class, 'update'])->name('sectorbusiness.update');

// Type Template

Route::get('/typetemplate', [TypetemplateController::class,'create'])->name('addtypetemplate');
Route::post('/typetemplate.store', [TypetemplateController::class, 'store'])->name('typetemplate.store');
Route::get('typetemplatelist', [TypetemplateController::class, 'list'])->name('typetemplatelist');
Route::get('typetemplate/{id}/edit', [TypetemplateController::class, 'edit'])->name('typetemplate.edit');
Route::post('typetemplate/{id}/update', [TypetemplateController::class, 'update'])->name('typetemplate.update');

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
