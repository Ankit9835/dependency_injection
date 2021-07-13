<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/edit/post/{id}', [App\Http\Controllers\PostController::class, 'edit'])->middleware('auth');
Route::post('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/remove/post/{id}', [App\Http\Controllers\PostController::class, 'remove']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
