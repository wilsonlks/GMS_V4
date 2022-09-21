<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sender;

class LoginController extends Controller
{
    public function Login(){

    return view('Login');

    }

    public function login(Request $request){

        $sender = sender ::where('acid',$request ->input('acid')) -> get();

    }
}
