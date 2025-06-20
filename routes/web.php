<?php

use App\Models\employee_specific_model;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employee_specific_controller;
use App\Http\Controllers\create_employee_controller;
use App\Http\Controllers\delete_specific_controller;
use App\Http\Controllers\employee_appointed_controller;
use App\Http\Controllers\delete_appointed_controller;
use App\Http\Controllers\employee_postpone_controller;
use App\Http\Controllers\delete_postpone_controller;
use App\Http\Controllers\setting_controller;
use App\Http\Controllers\sendemail;
use App\Http\Controllers\print_generate_pdf_controller;

// Route::get('/', function () {
//     return view('login');
// });

Route::post('/indexPDF',[print_generate_pdf_controller::class, 'indexPDF'])->name('indexPDF');
Route::post('/appointedPDF',[print_generate_pdf_controller::class, 'appointedPDF'])->name('appointedPDF');
Route::post('/postponePDF',[print_generate_pdf_controller::class, 'postponePDF'])->name('postponePDF');
Route::post('/del_indexPDF',[print_generate_pdf_controller::class, 'del_indexPDF'])->name('del_indexPDF');
Route::post('/del_appointedPDF',[print_generate_pdf_controller::class, 'del_appointedPDF'])->name('del_appointedPDF');
Route::post('/del_postponePDF',[print_generate_pdf_controller::class, 'del_postponePDF'])->name('del_postponePDF');

Route::get('/create',[create_employee_controller::class, 'create'])->name('create');
Route::get('/win',[create_employee_controller::class, 'win'])->name('win');
Route::post('/store_new_employee',[create_employee_controller::class, 'store'])->name('store_new_employee');
Route::post('/send',[sendemail::class,'sendemail'])->name('send');

// --------------------
// --------------------
Route::get('/specific',[employee_specific_controller::class, 'index'])->name('specific');
Route::post('/show_specific',[employee_specific_controller::class, 'show'])->name('show_specific');
Route::post('/delete_specific',[employee_specific_controller::class, 'delete'])->name('delete_specific');
Route::post('/appointed_specific',[employee_specific_controller::class, 'appointed'])->name('appointed_specific');
Route::post('/postpone_specific',[employee_specific_controller::class, 'postpone'])->name('postpone_specific');

Route::get('/delete/delete_specific_index',[delete_specific_controller::class, 'index'])->name('delete_specific_index');
Route::post('/show_delete_specific_index',[delete_specific_controller::class, 'show'])->name('show_delete_specific_index');
Route::post('/delete_specific_forever',[delete_specific_controller::class, 'delete'])->name('delete_specific_forever');
// --------------------
// --------------------
Route::get('/appointed',[employee_appointed_controller::class, 'index'])->name('appointed');
Route::post('/show_appointed',[employee_appointed_controller::class, 'show'])->name('show_appointed');
Route::post('/delete_appointed',[employee_appointed_controller::class, 'delete'])->name('delete_appointed');
Route::post('/postpone_appointed',[employee_appointed_controller::class, 'postpone'])->name('postpone_appointed');

Route::get('/delete/delete_appointed_index',[delete_appointed_controller::class, 'index'])->name('delete_appointed_index');
Route::post('/show_delete_appointed_index',[delete_appointed_controller::class, 'show'])->name('show_delete_appointed_index');
Route::post('/delete_appointed_forever',[delete_appointed_controller::class, 'delete'])->name('delete_appointed_forever');
// --------------------
// --------------------
Route::get('/postpone',[employee_postpone_controller::class, 'index'])->name('postpone');
Route::post('/show_postpone',[employee_postpone_controller::class, 'show'])->name('show_postpone');
Route::post('/delete_postpone',[employee_postpone_controller::class, 'delete'])->name('delete_postpone');
Route::post('/appointed_postpone',[employee_postpone_controller::class, 'appointed'])->name('appointed_postpone');

Route::get('/delete/delete_postpone_index',[delete_postpone_controller::class, 'index'])->name('delete_postpone_index');
Route::post('/show_delete_postpone_index',[delete_postpone_controller::class, 'show'])->name('show_delete_postpone_index');
Route::post('/delete_postpone_forever',[delete_postpone_controller::class, 'delete'])->name('delete_postpone_forever');
// --------------------
// --------------------
Route::get('/setting',[setting_controller::class, 'index'])->name('setting');
Route::post('/setting_create',[setting_controller::class, 'create'])->name('setting_create');
Route::post('/setting_edit',[setting_controller::class, 'go_edit'])->name('setting_edit');
Route::post('/setting_update',[setting_controller::class, 'update'])->name('setting_update');
Route::post('/setting_delete',[setting_controller::class, 'delete'])->name('setting_delete');
// --------------------
// --------------------
Route::fallback( function () {
    return view('not_found');
});
