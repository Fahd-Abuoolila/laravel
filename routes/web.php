<?php

use App\Models\employee_specific_model;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employee_specific_controller;
use App\Http\Controllers\create_employee_controller;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/dashboard',function (){
    return employee_specific_model::all();
});

Route::get('/specific',[employee_specific_controller::class, 'index'])->name('specific');
Route::get('/create',[create_employee_controller::class, 'create'])->name('create');
Route::post('/store_new_employee',[create_employee_controller::class, 'store'])->name('store_new_employee');
Route::post('/show',[employee_specific_controller::class, 'show'])->name('show');

Route::fallback( function () {
    return view('not_found');
});
