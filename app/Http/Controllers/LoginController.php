<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Fascades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index', [
            'tile' => 'Login'
        ]);
    }

    public function user(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->success($credentials);
        }

        return back()->withErrors($credentials);
    }
    
    public function admin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->success($credentials);
        }

        return back()->withErrors($credentials);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()-regenerateToken();

        return redirect ('/');
    }
}
