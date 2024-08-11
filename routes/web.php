<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;

Route::get('/', function () {
    return redirect()->route('kursus');
});

//Route Kursus
Route::get('/kursus', [KursusController::class, 'kursus'])->name('kursus');
Route::get('/kursus/create', [KursusController::class, 'create'])->name('kursus.create');
Route::post('/kursus', [KursusController::class, 'store'])->name('kursus.store');
Route::get('/kursus/{kursuses}/edit', [KursusController::class, 'edit'])->name('kursus.edit');
Route::put('/kursus/{kursuses}', [KursusController::class, 'update'])->name('kursus.update');
Route::delete('/kursus/{kursuses}', [KursusController::class, 'destroy'])->name('kursus.destroy');


//Route Materi
Route::get('/materi', [MateriController::class, 'materi'])->name('materi');
Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');
Route::put('/materi/{id}', [MateriController::class, 'update'])->name('materi.update');
Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');