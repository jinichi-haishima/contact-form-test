<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contact/back', [ContactController::class, 'back']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/search', [AdminController::class, 'index']);
Route::get('/reset', [AdminController::class, 'index']);
Route::get('/export', [AdminController::class, 'export']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');