<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BlastaDashboard;

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
|
| Here is where you can register post routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('/all', [PostController::class, 'all'])
    ->middleware(BlastaDashboard::class);

Route::get('/create', [PostController::class, 'create'])
    ->middleware(BlastaDashboard::class);

Route::post('/store', [PostController::class, 'store'])
    ->name('post.store');

Route::get('/edit/{post}', [PostController::class, 'edit'])
    ->middleware(BlastaDashboard::class);

Route::post('/update/{post}', [PostController::class, 'update'])
    ->name('post.update');

Route::get('/delete/{post}', [PostController::class, 'delete'])
    ->name('post.delete');

Route::get('/all/{filter}', [PostController::class, 'all'])
    ->middleware(BlastaDashboard::class);

Route::get('/{post}', [PostController::class, 'show']);