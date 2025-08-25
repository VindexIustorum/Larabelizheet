<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// // Route::get('/app', function () {
// //     return view('plantilla.app');

// // });

// Route::get('/app', function () {
//     return view('usuario.index');

// });

// Route::get('/action', function () {
//     return view('usuario.action');
// });

Route::resource('usuarios',UserController::class);