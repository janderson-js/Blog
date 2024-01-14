<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        auth()->attempt(['email' => $request->email, 'password' => $request->password]);

        return \redirect('/dashboard');
    }
}
