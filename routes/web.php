<?php

use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\UtilisateursController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('experiences.index');
});
Route::resource('experiences', ExperiencesController::class,);
Route::post('/experiences/{experience}/like', [ExperiencesController::class, 'like'])
->name('experiences.like');

Route::get('/login', [UtilisateursController::class, 'loginpage'])->name('utilisateurs.loginpage');
Route::post('/login', [UtilisateursController::class, 'login'])->name('login');
Route::get('/register', [UtilisateursController::class, 'register'])->name('register');
Route::post('/register', [UtilisateursController::class, 'store'])->name('utilisateurs.registerStore');
Route::delete('/logout', [UtilisateursController::class, 'logout'])->name('utilisateurs.logout');
Route::resource('utilisateurs', UtilisateursController::class)->except(['create', 'store']);

