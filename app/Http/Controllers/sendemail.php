<?php

namespace App\Http\Controllers;

use App\Mail\welcomemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class sendemail extends Controller
{
    public function sendemail(Request $request){
        $data=['fullname'=> $request->fullname];
        Mail::to($request->email)->send(new welcomemail( $data ));
        return redirect()->route('win')->with('data' , $data);
    }
}
