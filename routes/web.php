<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/issue',[IssueController::class, 'index'])->name('issue.index');
Route::post('/issue',[IssueController::class, 'store'])->name('issue.store');
Route::put('/issue/{id}',[IssueController::class, 'update'])->name('issue.update');
Route::delete('/issue/{id}',[IssueController::class, 'destroy'])->name('issue.destroy');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
