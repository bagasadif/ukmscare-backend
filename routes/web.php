<?php

use App\Http\Controllers\UkmController;
use App\Http\Controllers\UkmRegistrationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
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
Auth::routes(['verify' => true]);

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

Route::prefix('auth')->group(function(){
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'loginUser'])->middleware('guest');
    Route::post('/login', [LoginController::class, 'user']);
    Route::get('/login-admin', [LoginController::class, 'loginAdmin'])->middleware('guest');
    Route::post('/login-admin', [LoginController::class, 'admin']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::prefix('profiles')->group(function(){
    Route::get('/{id}', [ProfileController::class, 'read']);
    Route::post('/edit/{id}', [ProfileController::class, 'update']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');