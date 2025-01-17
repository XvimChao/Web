<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrisonerController;

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
})->name('home');;

Route::get('/advanced_search', function () {
    return view('advanced_search');
})->name('advanced_search');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/tokenAuth.php';

Route::get('/search/prisoners', [PrisonerController::class, 'search'])->name('search.prisoners');
Route::get('/advanced_search/prisoners', [PrisonerController::class, 'advanced_search'])->name('advanced_search.prisoners');
