<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('proyectos.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view("index","proyectos.index")->name("index");
Route::view("about", "proyectos.about")->name("about");
Route::view("proyectos", "proyectos.proyectos")->name("proyectos");
Route::view("alumnos", "alumnos.index")->name("alumnos");

require __DIR__.'/auth.php';

Route::resource("alumnos",\App\Http\Controllers\AlumnoController::class);
