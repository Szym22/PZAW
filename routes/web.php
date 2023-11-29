<?php

use Illuminate\Support\Facades\Route;
use App\Models\Publication;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;


Route::get('/', [SiteController::class, 'home'])->name('home');

Route::get('about_us', [SiteController::class, 'about'])->name('about_us');

Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');

Route::get('/publications/{id}', [PublicationController::class, 'show'])
->whereNumber('id')
->name('publications.show');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show_user');













