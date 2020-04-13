<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*(Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}));*/

Route::resource('usuarios_domicilios', 'UsersDomiciliosController', ['except' => ['create', 'edit'], 'names' => [
    'index' => 'users_domicilios.index',
    'show' => 'users_domicilios.show',
    'update' => 'users_domicilios.update',
    'store' => 'users_domicilios.store',
    'destroy' => 'users_domicilios.destroy'
]]);

Route::resource('usuarios', 'UsersController', ['except' => ['create', 'edit'], 'names' => [
    'index' => 'users.index',
    'show' => 'users.show',
    'update' => 'users.update',
    'store' => 'users.store',
    'destroy' => 'users.destroy'
]]);
