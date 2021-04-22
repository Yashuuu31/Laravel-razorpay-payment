<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\PostLivewire;
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

Route::get('', [PostController::class, 'index'])->name('post.index');
Route::post('payment', [PostController::class, 'payment'])->name('payment');