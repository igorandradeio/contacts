<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\ContactController;
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

Route::delete('/contact/destroy/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');

Route::get('/', [ContactController::class, 'index'])->name('website.contact.home');
Route::get('/admin', [AdminContactController::class, 'index'])->name('admin.contact.home');

Route::get('/contact/create', [AdminContactController::class, 'create'])->name('admin.contact.create');

Route::get('/contact/{id}', [ContactController::class, 'show'])->name('website.contact.show');


Route::put('/contact/update/{id}', [AdminContactController::class, 'update'])->name('admin.contact.update');

Route::post('/contact', [AdminContactController::class, 'store'])->name('admin.contact.store');
