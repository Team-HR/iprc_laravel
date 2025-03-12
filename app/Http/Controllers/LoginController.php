<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\SpmsAccounts;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function __constuct(){

    }

    function showForm(){
        return view('ipcr/login/LoginForm');
    }

    function authenticateUser(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('employee/dashboard');
        }else{
            return back()->withErrors([
                'message' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->intended('login');
    }

}
