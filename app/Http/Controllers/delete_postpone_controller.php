<?php

namespace App\Http\Controllers;
use App\Models\delete_postpone_model;
use Illuminate\Http\Request;

class delete_postpone_controller extends Controller
{
    public function index() {
        $data = delete_postpone_model::all();
        return view('delete/delete_postpone_index', ['data' => $data]);
    }
    public function show(Request $request){
        $id = $request->id;
        $person = delete_postpone_model::find($id,['*']);
        return view('show/delete_index', ['person'=> $person]);
    }
    public function delete(Request $request){
        $id = $request->id;
        $person = delete_postpone_model::find($id,['*']);
        $person->delete();
        return redirect()->route('delete_postpone_index');
    }
}
