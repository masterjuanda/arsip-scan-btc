<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;

Route::get('/', [ReportController::class, 'index'])->name('reports.index');
Route::get('/upload', [ReportController::class, 'create'])->name('reports.create');
Route::post('/upload', [ReportController::class, 'store'])->name('reports.store');
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
