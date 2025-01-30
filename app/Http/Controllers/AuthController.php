<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $R)
    {
        if(Auth::attempt(['email'=>$R->email,'password'=>$R->password]))
        {
            return redirect()->route('home');
        }else{
            return redirect()->back()->withErrors(['login'=>"error in make login"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
