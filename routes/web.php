<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\PrincipalDBController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('autorizacion');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');

Route::get('/principal/consulta', [PrincipalController::class, 'consulta'])->name('principal.consulta');


Route::get('/principaldb', [PrincipalDBController::class, 'index'])->name('principalDb.index');
Route::get('/principaldb/query', [PrincipalDBController::class, 'query'])->name('principalDb.query');
Route::post('/principaldb/filtro', [PrincipalDBController::class, 'busqueda'])->name('principalDb.filtro');
Route::get('tiempo', [PrincipalDBController::class, 'tiempo'])->name('tiempo');
