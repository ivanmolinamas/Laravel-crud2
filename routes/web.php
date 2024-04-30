<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;


Route::get('/', function () {
    return view('proyectos.index');})->name("main");

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
//Route::view("alumnos", "alumnos.index")->name("alumnos");

require __DIR__.'/auth.php';

//rutas alumnos
Route::resource("alumnos",AlumnoController::class)
->middleware("auth"); //se necesita estar logeado para acceder
