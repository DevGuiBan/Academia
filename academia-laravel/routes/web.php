<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AlunoController;
use App\Http\Controllers\Users\AdministradorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/teste', function(){
    return view('teste');
})->middleware(['auth']);

Route::post('/sign-in',[AdministradorController::class, 'register'])->name('sign-in');
Route::post('/authenticate',[AdministradorController::class, 'login']);