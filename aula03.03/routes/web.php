<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckLog;

Route::middleware([CheckLog::class])->group(function(){
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/',[MainController::class, 'index'])->name('home');
    Route::get('/new',[MainController::class, 'new'])->name('new');
    Route::get('/editNote/{id}',[MainController::class, 'editNote'])->name('edit');
    Route::get('/deleteNote/{id}',[MainController::class, 'deleteNote'])->name('delete');
    Route::post('/newSubmit', [MainController::class,'newSubmit'])->name('newSubmit');
    Route::get('/cadastro',[MainController::class, 'cadastro'])->name('cadastro');
    Route::post('/cadastroSubmit',[MainController::class, 'cadastroSubmit'])->name('cadastroSubmit');
});
Route::get('/cadastro',[MainController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastroSubmit',[MainController::class, 'cadastroSubmit'])->name('cadastroSubmit');
Route::get('/login',[AuthController::class, 'login']);
Route::post('/loginSubmit',[AuthController::class, 'loginSubmit']);