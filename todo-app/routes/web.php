<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('/rekap', [TodoController::class, 'recap'])->name('todos.recap'); // Halaman Kalender & Rekap
Route::get('/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
Route::patch('/{id}/toggle', [TodoController::class, 'toggleComplete'])->name('todos.toggle');