<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UrlsController;

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

Route::get('/', UrlsController::class)
    ->name('url')
    ->middleware('auth');

Auth::routes();
Auth::routes(['register' => false]);
