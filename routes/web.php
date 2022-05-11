<?php

use App\Http\Controllers\UkmController;
use App\Http\Controllers\UkmRegistrationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return response()->success(csrf_token()); 
});

Auth::routes();

Route::prefix('ukms')->group(function(){
    Route::prefix('registrations')->group(function(){
        Route::get('/', [UkmRegistrationController::class, 'read']);
        Route::post('/', [UkmRegistrationController::class, 'register']);
        Route::get('/export/{ukm_id}', [UkmRegistrationController::class, 'export']);
        Route::get('/ukm/{ukm_id}', [UkmRegistrationController::class, 'readUkm']);
        Route::get('/status/{ukm_id}', [UkmRegistrationController::class, 'checkStatus']);
        Route::post('/status/{ukm_id}', [UkmRegistrationController::class, 'changeStatus']);
        Route::post('/field/add', [UkmRegistrationController::class, 'addColumn']);
        Route::post('/field/delete', [UkmRegistrationController::class, 'deleteColumn']);
        Route::get('/field/{ukm_id}', [UkmRegistrationController::class, 'getRegistDescription']);
        Route::get('/{id}', [UkmRegistrationController::class, 'readId']);
    });

    Route::get('/', [UkmController::class, 'read']);
    Route::get('/category/{category}', [UkmController::class, 'readCategory']);
    Route::get('/search/{key}', [UkmController::class, 'search']);
    Route::post('/edit/{id}', [UkmController::class, 'update']);
    Route::get('/{id}', [UkmController::class, 'readId']);
});

Route::prefix('articles')->group(function(){
    Route::get('/', [ArticleController::class, 'read']);
    Route::post('/', [ArticleController::class, 'create'])->middleware(['auth', 'user-access:admin']);
    Route::get('/ukm/{ukm_id}', [ArticleController::class, 'readUkm']);
    Route::get('/category/{category}', [ArticleController::class, 'readCategory']);
    Route::get('/search/{key}', [ArticleController::class, 'search']);
    Route::post('/edit/{id}', [ArticleController::class, 'update'])->middleware(['auth', 'user-access:admin']);
    Route::get('/{id}', [ArticleController::class, 'readId']);
    Route::delete('/{id}', [ArticleController::class, 'delete'])->middleware(['auth', 'user-access:admin']);
});

Auth::routes(['verify' => true]);

Route::prefix('register')->group(function(){
    Route::get('/', [RegisterController::class, 'index']);
    Route::post('/', [RegisterController::class, 'store']);
});

Route::prefix('login')->group(function(){
    Route::get('/', [LoginController::class, 'login'])->middleware('guest');
    Route::post('/', [LoginController::class, 'user']);
    Route::post('/admin', [LoginController::class, 'admin']);
});

Route::post('/logout', [LoginController::class, 'logout']);

Route::prefix('profiles')->group(function(){
    Route::get('/', [ArticleController::class, 'read'])->middleware(['auth', 'user-access:user']);
    Route::post('/', [ArticleController::class, 'update']);
});