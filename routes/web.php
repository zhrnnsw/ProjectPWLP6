<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;


Auth::routes();

Route::resource('home',HomeController::class);
Route::get('/', function () {
    return view('welcome');
});
Route::resource('mahasiswa',MahasiswaController::class);
Route::get('/profile', [HOmeController::class, 'profile'])->name('profile');
//Route search
Route::get('/search', [MahasiswaController::class, 'search'])->name('search');
