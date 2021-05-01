<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\UsersController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [UsersController::class, 'index'])->name('user.index');
Route::post('/register', [UsersController::class, 'register'])->name('user.register');
Route::post('/login', [UsersController::class, 'login'])->name('user.login');


Route::get('/todos', [TodosController::class, 'index'])->name('todos.index');
Route::post('/todos', [TodosController::class, 'store'])->name('todos.create');
Route::get('/destroy/{id}', [TodosController::class, 'destroy'])->name('todos.destroy');
