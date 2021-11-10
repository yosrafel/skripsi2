<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths/login');
    }

    public function postlogin(Request $req)
    {
        if(Auth::attempt($req->only('email', 'password'))){
            return redirect('/');
        }

        return redirect('/login')->with('error','Email dan Password yang anda masukan salah !');;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
