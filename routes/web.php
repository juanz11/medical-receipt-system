<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultationController;

// Home page with consultations list
Route::get('/', [ConsultationController::class, 'index'])->name('home');

// Routes for consultations
Route::get('/consultations/create', [ConsultationController::class, 'create'])->name('consultations.create');
Route::post('/consultations', [ConsultationController::class, 'store'])->name('consultations.store');
Route::get('/consultations/{consultation}/download', [ConsultationController::class, 'download'])->name('consultations.download');
Route::get('/consultations/{consultation}/pdf', [ConsultationController::class, 'stream'])->name('consultations.pdf');
Route::get('/consultations/{consultation}/print', [ConsultationController::class, 'print'])->name('consultations.print');
