<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController\Index::class, 'index'])->name('posts');

Route::get('/posts/create', [PostController\Create::class, 'index'])->name('posts.create');
Route::post('/posts/create', [PostController\Create::class, 'store'])->name('posts.create');

Route::get('/posts/update/{post}', [PostController\Update::class, 'index'])->name('posts.update');
Route::put('/posts/update/{post}', [PostController\Update::class, 'update'])->name('posts.update');

Route::delete('/posts/delete/{post}', [PostController\Delete::class, 'destroy'])->name('posts.destroy');
