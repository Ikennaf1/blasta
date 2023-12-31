<?php

use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BlastaDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ThemeController::class, 'index'])
    ->middleware(BlastaDashboard::class);

Route::post('/activate/{theme}', [ThemeController::class, 'activate']);




// Route::get('/list', [PageController::class, 'list']);
// Route::get('/all', [PageController::class, 'all'])
//     ->middleware(BlastaDashboard::class);
// Route::get('/all/{filter}', [PageController::class, 'all'])
//     ->middleware(BlastaDashboard::class);

// Route::get('/{page}', [PageController::class, 'show']);
