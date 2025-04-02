<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');

Route::post('/tasks/create', [TaskController::class, 'store'])->name('task.store');
Route::put('/tasks/{task}/edit', [TaskController::class, 'update'])->name('task.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
