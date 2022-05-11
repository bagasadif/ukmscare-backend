<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]); 
    }

    public function store()
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' =>  'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User:create($validateData);

        return response()->success($validateData);
    }
}
