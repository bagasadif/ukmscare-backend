<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UserVerify;
use App\Models\User;
use Session;
use Hash;
use Mail;
use DB; 

class AuthController extends Controller
{
    public function showLoginUser()
    {
        // return view('auth.loginUser');
        return response()->success('Halaman Login User');
    }

    public function postLoginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('dashboard')->withSuccess('Berhasil Login!');
            // return response()->postSuccess($credentials, 'Berhasil login!');
            $user = DB::table('users')->where(['email' => $request->email])           
            ->get(['id', 'email', 'password']);
            return response()->postSuccess($user, 'Berhasil login!');
        }
        // return redirect("login")->withSuccess('Email dan Password Salah!');
        return response()->failed('Object not found', 404);
    }
    
    public function showLoginAdmin()
    {
        // return view('auth.loginAdmin');
        return response()->success('Halaman Login Admin');
    }

    public function postLoginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('dashboard')->withSuccess('Berhasil Login!');
            // return response()->postSuccess($credentials, 'Berhasil login!');
            $user = DB::table('users')->where(['username' => $request->username])
            ->join('ukms', 'users.name', '=', 'ukms.name')            
            ->get(['users.id', 'username', 'password', 'ukms.name', 'ukms.id']);
            return response()->postSuccess($user, 'Berhasil login!');
        }
        // return redirect("login")->withSuccess('Username dan Password Salah!');
        return response()->failed('Object not found', 404);
    }

    public function showRegistrationForm()
    {
        // return view('auth.register');
        return response()->success('Halaman Registrasi');
    }

    public function postRegistrationForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        $data = $request->all();
        $createUser = $this->create($data);

        $token = Str::random(64);
  
        UserVerify::create([
              'user_id' => $createUser->id, 
              'token' => $token
        ]);
  
        Mail::send('email.emailVerification', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
        });       
        // return redirect("login")->withSuccess('Registrasi Berhasil, Silakan Login!');
        return response()->submitSuccess($data, $token, 'Registrasi berhasil, silakan login!');
    }

    public function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Email tidak terdaftar!';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Email terverifikasi, silakan login.";
            } else {
                $message = "Email sudah terverifikasi, silakan login.";
            }
        }
  
    //   return redirect()->route('loginUser')->with('message', $message);
      return response()->success($message);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Login Dulu!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        // return redirect('login');
        return response()->success('Berhasil logout');
    }
}