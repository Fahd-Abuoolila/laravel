<?php

namespace App\Http\Controllers;
use App\Models\delete_specific_model;
use Illuminate\Http\Request;

class delete_specific_controller extends Controller
{
    public function index() {
        $data = delete_specific_model::all();
        return view('delete/delete_specific_index', ['data' => $data]);
    }
    public function show(Request $request){
        $id = $request->id;
        $person = delete_specific_model::find($id,['*']);
        return view('show/delete_index', ['person'=> $person]);
    }
    public function delete(Request $request){
        $id = $request->id;
        $person = delete_specific_model::find($id,['*']);
        $person->delete();
        return redirect()->route('delete_specific_index');
    }
}
