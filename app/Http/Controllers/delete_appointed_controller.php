<?php

namespace App\Http\Controllers;
use App\Models\delete_appointed_model;
use Illuminate\Http\Request;

class delete_appointed_controller extends Controller
{
    public function index() {
        $data = delete_appointed_model::all();
        return view('delete/delete_appointed_index', ['data' => $data]);
    }
    public function show(Request $request){
        $id = $request->id;
        $person = delete_appointed_model::find($id,['*']);
        return view('show/delete_appointed', ['person'=> $person]);
    }
    public function delete(Request $request){
        $id = $request->id;
        $person = delete_appointed_model::find($id,['*']);
        $person->delete();
        return redirect()->route('delete_appointed_index');
    }
}
