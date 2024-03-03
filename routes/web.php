<?php

use Illuminate\Support\Facades\Route;
use App\Models\Publication;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;



Route::get('/', [SiteController::class, 'home'])->name('home');

Route::get('about_us', [SiteController::class, 'about'])->name('about_us');

Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');

Route::get('/publications/{id}', [PublicationController::class, 'show'])
->whereNumber('id')
->name('publications.show');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show_user');

Route::get('/publications/create', [PublicationController::class, 'create']);

Route::post('/publications', [PublicationController::class, 'store'])->name('publications.store');

Route::get('post/{publication}/edit', [PublicationController::class, 'edit'])->name('publications.edit');
Route::put('post/{publication}', [PublicationController::class, 'update'])->name('publications.update');

Route::delete('publications/{publication}', [PublicationController::class, 'destroy'])->name('publications.destroy');

Route::get('/register', function () {
    return view('users.register');
})->name('register');

Route::post('users/store', [UserController::class, 'store'])->name('UsersStore');


Route::get('users/login', [AuthController::class, 'form'])->name('login_user');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/publications/create', 'PublicationController@create')->name('publication.create');
});

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');

Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');











 










