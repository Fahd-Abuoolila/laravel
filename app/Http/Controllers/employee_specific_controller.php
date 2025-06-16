<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee_specific_model;

class employee_specific_controller extends Controller
{
    public function index()
    {
        $data = Employee_specific_model::all();
        return view('employee_specific', ['data' => $data]);
    }
    public function show(Request $request){
        $id = $request->id;
        $person = Employee_specific_model::find($id,['*']);
        return view('show/specific', ['person'=> $person]);
    }
}
