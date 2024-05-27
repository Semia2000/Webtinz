<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SubscriptionplanController;
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

// subscription

Route::get('/subscription', [SubscriptionplanController::class, 'showsubscriptionform'])->name('addsubscription');
Route::post('/subscription.store', [SubscriptionplanController::class, 'addsubscription'])->name('subscription.store');
Route::get('subscriptionlist', [SubscriptionplanController::class, 'listsubscription'])->name('subscriptionlist');
Route::get('subscription/{id}/view', [SubscriptionplanController::class, 'view'])->name('subscription.view');
Route::get('subscription/{id}/edit', [SubscriptionplanController::class, 'edit'])->name('subscription.edit');
Route::post('subscription/{id}/update', [SubscriptionplanController::class, 'update'])->name('subscription.update');
Route::delete('/subscription/{id}', [SubscriptionplanController::class, 'destroy'])->name('subscription.delete');
