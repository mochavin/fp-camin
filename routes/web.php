<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('logout', function () {
  Auth::logout();
  return redirect()->route('login');
})->name('logout');

Route::post('tasklist/{id}/add', [TaskListController::class, 'addTask'])->name('tasklist.add');
Route::get('/tasklist/{id}', [TaskListController::class, 'show'])->name('tasklist.show');
Route::get('tasklist/{id}/edit', [TaskListController::class, 'edit'])->name('tasklist.edit');
Route::put('tasklist/{id}', [TaskListController::class, 'update'])->name('tasklist.update');
Route::delete('tasklist/{id}', [TaskListController::class, 'destroy'])->name('tasklist.destroy');
Route::delete('task/{id}', [TaskController::class, 'delete'])->name('task.delete');
Route::post('tasklist/add', [TaskListController::class, 'store'])->name('tasklist.store');
// Route::get('tasklist/edit', [TaskListController::class, 'editview'])->name('tasklist.edit');
Route::get('tasklist/{id}/edit', [TaskListController::class, 'edit'])->name('tasklist.edit');
Route::put('tasklist/{id}', [TaskListController::class, 'update'])->name('tasklist.update');

Route::get('task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('task/{id}', [TaskController::class, 'update'])->name('task.update');
Route::get('/task/search', [TaskController::class, 'search'])->name('task.search');
Route::get('/task/status/{status}', [TaskController::class, 'index'])->name('task.index');
