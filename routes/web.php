<?php

use App\Http\Controllers\ExperiencesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('experiences.index');
});
Route::resource('experiences', ExperiencesController::class,);
Route::post('/experiences/{experience}/like', [ExperiencesController::class, 'like'])->name('experiences.like');