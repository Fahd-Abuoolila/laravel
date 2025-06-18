<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting_model;

class setting_controller extends Controller
{
    public function index(){
        $data = setting_model::all();
        return view('setting', ['data' => $data]);
    }
}
