<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts/data/{post}', [PostController\Update::class, 'getData'])->name('posts.update.data');

Route::post('/posts/create', [PostController\Create::class, 'store'])->name('posts.create');

Route::put('/posts/update/{post}', [PostController\Update::class, 'update'])->name('posts.update');


Route::post('/posts/media/upload', [PostController\Upload::class, 'store'])->name('posts.media.upload');
Route::get('/posts/media/data/{post}', [PostController\Upload::class, 'getData'])->name('posts.media.data');
