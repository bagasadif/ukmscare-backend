<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function($data){
            return response()->json([
                'success'=>true,
                'data'=>$data
            ]);
        });

        Response::macro('failed', function($error, $status_code){
            return response()->json([
                'success'=>false,
                'error'=>$error
            ], $status_code);
        });

        Response::macro('postSuccess', function($data, $message){
            return response()->json([
                'success'=>true,
                'data'=>$data,
                'message'=>$message,
            ]);
        });
        
        Response::macro('submitSuccess', function($data, $token, $message){
            return response()->json([
                'success'=>true,
                'data'=>$data,
                'token'=>$token,
                'message'=>$message
            ]);
        });
    }
}
