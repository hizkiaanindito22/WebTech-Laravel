<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); });
Route::get('/layanan', function () { return view('layanan'); });
Route::get('/tentang-kami', function () { return view('tentang'); });
Route::get('/kontak', function () { return view('kontak'); });
Route::get('/berita', function () { return view('berita'); });
Route::get('/mitra', function () { 
    return view('mitra'); 
});