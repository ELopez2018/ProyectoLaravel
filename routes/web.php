<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrincipalController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('autorizacion');
Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
Route::get('/principal/consulta', [PrincipalController::class, 'consulta'])->name('principal.consulta');
