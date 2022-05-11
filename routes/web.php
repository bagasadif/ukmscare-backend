<?php

use App\Http\Controllers\UkmController;
use App\Http\Controllers\UkmRegistrationController;
use App\Http\Controllers\ArticleController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
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

Route::prefix('profiles')->group(function(){
    Route::get('/{id}', [ProfileController::class, 'read'])->middleware(['auth', 'is_verify_email']);
    Route::post('/edit/{id}', [ProfileController::class, 'update']);
});

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'postRegistrationForm'])->name('register.post');
Route::get('login', [AuthController::class, 'showLoginUser'])->name('loginUser')->middleware('guest');
Route::post('login', [AuthController::class, 'postLoginUser'])->name('loginUser.post');
Route::get('login-admin', [AuthController::class, 'showLoginAdmin'])->name('loginAdmin')->middleware('guest');
Route::post('login-admin', [AuthController::class, 'postLoginAdmin'])->name('loginAdmin.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');