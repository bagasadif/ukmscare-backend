<?php

use App\Http\Controllers\UkmController;
use App\Http\Controllers\UkmRegistrationController;
use App\Http\Controllers\ArticleController;
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
    return csrf_token(); 
});

Route::prefix('ukms')->group(function(){
    Route::get('/register', [UkmRegistrationController::class, 'register']);
    Route::prefix('registrations')->group(function(){
        Route::get('/', [UkmRegistrationController::class, 'read']);
        Route::get('/ukm/{ukm_id}', [UkmRegistrationController::class, 'readUkm']);
        Route::get('/status/{ukm_id}', [UkmRegistrationController::class, 'checkStatus']);
        Route::post('/status/{ukm_id}', [UkmRegistrationController::class, 'changeStatus']);
        Route::post('/column/add', [UkmRegistrationController::class, 'addColumn']);
        Route::post('/column/delete', [UkmRegistrationController::class, 'deleteColumn']);
        Route::get('/description/{ukm_id}', [UkmRegistrationController::class, 'getRegistDescription']);
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
    Route::post('/', [ArticleController::class, 'create']);
    Route::get('/ukm/{ukm_id}', [ArticleController::class, 'readUkm']);
    Route::get('/category/{category}', [ArticleController::class, 'readCategory']);
    Route::get('/search/{key}', [ArticleController::class, 'search']);
    Route::post('/edit/{id}', [ArticleController::class, 'update']);
    Route::get('/{id}', [ArticleController::class, 'readId']);
    Route::delete('/{id}', [ArticleController::class, 'delete']);
});
