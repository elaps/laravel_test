<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::view('/','welcome')->name('home');

Route::get('login',[\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login',[\App\Http\Controllers\LoginController::class, 'store'])->name('login');


Route::prefix('user')->middleware('admin')->as('user.')->group( function () {
    Route::resource('posts',\App\Http\Controllers\user\PostController::class);
});

Route::prefix('blog')->as('blog')->group( function () {
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('');
    Route::get('/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('.show');
});

/*
Route::fallback(function(){
    return 'Fallback';
});
*/
