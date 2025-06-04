<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\AltaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\RRHHController;
use App\Http\Controllers\JefeController;
use App\Http\Controllers\SistemasController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'rol:Admin'])->get('/admin', function () {
    return view('admin.index'); // recursos/views/admin/index.blade.php
})->name('admin.index');

Route::middleware(['auth', 'rol:Sistemas'])->get('/sistemas', function () {
    return view('sistemas.index');
})->name('sistemas.index');

Route::middleware(['auth', 'rol:Jefe'])->get('/jefe', function () {
    return view('jefe.index');
})->name('jefe.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/altas/index', [AltaController::class, 'create'])->name('altas.index');
    Route::resource('altas', AltaController::class)->only(['index', 'create', 'store']);
});

Route::get('/sistemas', [SistemasController::class, 'index'])->name('sistemas.index')->middleware('auth', 'rol:Sistemas');
Route::get('/jefe', [JefeController::class, 'index'])->name('jefe.index')->middleware('auth', 'rol:Jefe');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth', 'rol:Admin');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*----------------------------------------------------*/

/* ADMIN */
Route::middleware(['auth', 'rol:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    // DataController
    Route::get('/data/create', [DataController::class, 'create'])->name('data.create');
    Route::post('/data', [DataController::class, 'store'])->name('data.store');
});

Route::middleware(['auth', 'rol:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('usuarios', UsuarioController::class);
});



/* RRHH */
Route::middleware(['auth', 'rol:RRHH'])->group(function () {
    Route::get('/rrhh/altas', [App\Http\Controllers\RRHH\AltaController::class, 'index'])->name('rrhh.altas');
});

Route::middleware(['auth', 'rol:RRHH'])->prefix('rrhh')->name('rrhh.')->group(function () {
    Route::get('/', [RRHHController::class, 'index'])->name('index');
    Route::get('/altas', [RRHHController::class, 'altas'])->name('altas');
    Route::get('/calendario', [RRHHController::class, 'calendario'])->name('calendario');
    Route::get('/editar/{id}', [RRHHController::class, 'edit'])->name('edit');
    Route::put('/editar/{id}', [RRHHController::class, 'update'])->name('update');
    Route::get('/estadisticas', [RRHHController::class, 'estadisticas'])->name('estadisticas');
    Route::delete('/altas/{id}', [RRHHController::class, 'destroy'])->name('altas.destroy');
    Route::get('/contacto', [RRHHController::class, 'contacto'])->name('contacto');
    Route::get('/pdf', [RRHHController::class, 'pdf'])->name('pdf.index');  // <-- aquí cambia index por altas
    Route::get('/pdf/{alta}', [RRHHController::class, 'show'])->name('pdf.show');  
    Route::get('/pdf/{alta}/descargar', [RRHHController::class, 'descargarPdfRRHH'])->name('pdf.descargarPdfRRHH');
});



/* JEFE */
Route::middleware(['auth', 'rol:Jefe'])->prefix('jefe')->name('jefe.')->group(function () {
    Route::get('/', [JefeController::class, 'index'])->name('index');
    Route::get('calendario', [JefeController::class, 'calendario'])->name('calendario');
    Route::get('contacto', [JefeController::class, 'contacto'])->name('contacto');
});


/* SISTEMAS */
Route::middleware(['auth', 'rol:Sistemas'])->prefix('sistemas')->name('sistemas.')->group(function () {
    Route::get('/', [SistemasController::class, 'index'])->name('index');
    Route::get('/altas', [SistemasController::class, 'altas'])->name('altas.index');  // <-- aquí cambia index por altas
    Route::get('/altas/{alta}', [SistemasController::class, 'show'])->name('altas.show');  // ruta para show
    Route::get('/altas/{alta}/equipo/create', [SistemasController::class, 'createEquipo'])->name('equipos.create');
    Route::post('/altas/{alta}/equipo', [SistemasController::class, 'storeEquipo'])->name('equipos.store');
    Route::get('/altas/{alta}/descargar-pdf', [SistemasController::class, 'descargarPdf'])->name('altas.descargarPdf');
    Route::get('/calendario', [SistemasController::class, 'calendario'])->name('calendario');
    Route::get('/estadisticas', [SistemasController::class, 'estadisticas'])->name('estadisticas');
    Route::get('/contacto', [SistemasController::class, 'contacto'])->name('contacto');
});


require __DIR__.'/auth.php';
