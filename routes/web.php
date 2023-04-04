<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;


Route::resource('mahasiswa',MahasiswaController::class);
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route search
Route::get('/search', [MahasiswaController::class, 'search'])->name('search');
