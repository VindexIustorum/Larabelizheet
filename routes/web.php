<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;



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

Route::middleware(['auth'])->group(function(){

Route::resource('usuarios',UserController::class);
Route::resource('roles', RoleController::class);
Route::patch('usuarios/{usuario}/toggle', [UserController::class, 'toggleStatus'])->name('usuarios.toggle');
Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::post('logout', function(){
    Auth::logout();
    return redirect('/login');
})->name('logout');

});




Route::middleware(['guest'])->group(function(){

Route::get('login', function(){
    return view('autenticacion.login');})->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
});
