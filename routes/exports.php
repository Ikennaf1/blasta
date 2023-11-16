<?php

use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register post routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/post/{post}', [ExportController::class, 'exportPost']);
Route::post('/page/{post}', [ExportController::class, 'exportPage']);
Route::get('/homepage', [ExportController::class, 'exportHomepage']);
Route::get('/assets', [ExportController::class, 'exportAssets']);
Route::get('/posts', [ExportController::class, 'exportPosts']);

Route::get('/', [ExportController::class, 'index']);
