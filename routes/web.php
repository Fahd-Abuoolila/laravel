<?php

use Illuminate\Support\Facades\Route;
use App\Models\Users;
use App\Http\Controllers\employee_specific_controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',function (){
    return Users::all();
});

Route::get('/specific',[employee_specific_controller::class, 'index'])->name('specific');