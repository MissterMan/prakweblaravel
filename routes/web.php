<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authcoba']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'adminDashboard'])->middleware('auth');
Route::get('/table', [AdminController::class, 'adminTable'])->name('table')->middleware('auth');
Route::get('/form', [AdminController::class, 'create'])->middleware('auth');
Route::post('/posts', [AdminController::class, 'store'])->middleware('auth');
Route::get('/getupdate/{id}', [AdminController::class, 'getupdate'])->middleware('auth');
Route::post('/update/{id}', [AdminController::class, 'updatenews'])->middleware('auth');
Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('delete')->middleware('auth');

Route::get('/profile', [NewsController::class, 'profile']);
Route::get('/', [NewsController::class, 'home']);
Route::get('/{news:news_slug}', [NewsController::class, 'show']);
Route::get('/categories/{category:category_slug}', [NewsController::class, 'showCategories']);
