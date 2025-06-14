<?php

use Illuminate\Support\Facades\Route;
use App\Models\Users;
use App\Http\Controllers\employee_specific_controller;
use App\Http\Controllers\create_employee_controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',function (){
    return Users::all();
});

Route::get('/specific',[employee_specific_controller::class, 'index'])->name('specific');
Route::get('/create',[create_employee_controller::class, 'create'])->name('create');
Route::post('/store_new_employee',[create_employee_controller::class, 'store'])->name('store_new_employee');
