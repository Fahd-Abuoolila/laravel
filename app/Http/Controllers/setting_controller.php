<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use App\Models\setting_model;
use App\Models\create_settings_model;
use Illuminate\Support\Facades\Hash;

class setting_controller extends Controller
{
    public function index(){
        $data = setting_model::all();
        $mood_sended = "create";
        return view('setting', ['data' => $data,'mood'=>$mood_sended]);
    }
    public function create(Request $request){
        $insert = [
            'name' => $request-> input('name'),
            'email' => $request-> input('email'),
            'password' => Hash::make($request-> input('password')),
            'ability' => $request-> input('ability'),
            'job' => $request-> input('job'),
            'active' => $request-> input('active'),
        ];

        create_settings_model::create($insert);
        return redirect()->route('setting');
    }
    public function go_edit(Request $request){
        $id = $request->id;
        $num = $request->num;
        $person = setting_model::find($id, ['*']);
        $mood_sended = "update";
        $data = setting_model::all();
        return view('setting', ['data_edit'=>$person,'mood_sended'=>$mood_sended,'data' => $data,'num'=>$num]);
    }
    public function update(Request $request){
        $id = $request->id;
        $person = setting_model::find($id , ['*']);

        $person->update([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'ability'=> $request->input('ability'),
            'job'=> $request->input('job'),
            'active'=> $request->input('active'),
        ]);
        return redirect()->route('setting');
    }
    public function delete(Request $request){
        $id = $request->id;
        $person = setting_model::find($id , ['*']);
        $person->delete();
        return redirect()->route('setting');
    }
}
