<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
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

//public page
Route::get('/', [ContactController::class, 'index'])->name('website.contact.home');

//login page
Route::get('/login', [LoginController::class, 'index'])->name('login');
//login controller
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.user');
//logout route
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    //create new contact
    Route::get('/contact/create', [AdminContactController::class, 'create'])->name('admin.contact.create');
    //admin home page
    Route::get('/admin', [AdminContactController::class, 'index'])->name('admin.contact.home');
    //get contact by id
    Route::get('/contact/{id}', [ContactController::class, 'show'])->name('website.contact.show');
    //update contact
    Route::put('/contact/update/{id}', [AdminContactController::class, 'update'])->name('admin.contact.update');
    //store new contact
    Route::post('/contact', [AdminContactController::class, 'store'])->name('admin.contact.store');
    //delete contact
    Route::delete('/contact/destroy/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');
});
