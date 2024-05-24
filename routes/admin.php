<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;

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