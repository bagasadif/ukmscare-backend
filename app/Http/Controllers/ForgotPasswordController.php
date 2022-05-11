<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request; 
use App\Models\User; 
use Carbon\Carbon; 
use Hash;
use Mail; 
use DB; 

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        // return view('auth.forgetPassword');
        return response()->success('Halaman Forget Password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        // return back()->with('message', 'Link reset password telah dikirim!');
        return response()->success($token);
    }

    public function showResetPasswordForm($token) 
    { 
        // return view('auth.forgetPasswordLink', ['token' => $token]);
        return response()->getSuccess('Halaman Reset Passwod', $token);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            // return back()->withInput()->with('error', 'Invalid token!');
            return response()->success('Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        // return redirect('/login')->with('message', 'Password berhasil dirubah!');
        return response()->success('Password berhasil dirubah!');
    }
}
