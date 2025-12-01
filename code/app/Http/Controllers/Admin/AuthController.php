<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (auth()->guard('admin')->attempt($credentials)) {
            if(auth()->guard('admin')->user()->role_id != '1'){
                auth()->guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors(['You do not have admin access.']);
            }
            return redirect()->route('admin.index');
        }

        return redirect()->route('admin.login')->withErrors(['Invalid credentials provided.']);
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
