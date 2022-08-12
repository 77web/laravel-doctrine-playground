<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/new', [Controllers\TodoController::class, 'new'])->name('todo.new');
Route::post('/create', [Controllers\TodoController::class, 'create'])->name('todo.create');

Route::get('/dummy-login', [Controllers\AuthController::class, 'login'])->name('login');
Route::get('/dummy-logout', [Controllers\AuthController::class, 'logout'])->name('logout');
