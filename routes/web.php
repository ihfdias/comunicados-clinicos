<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComunicadoController;

// Página pública de comunicados (acessível por médicos não logados)
Route::get('/', [ComunicadoController::class, 'publico'])->name('publico');

// Dashboard (apenas se quiser manter, acessível por usuários autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Área autenticada: perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Área de administração (apenas para admins com is_admin = true)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('comunicados', ComunicadoController::class)->except('publico');
});

// Autenticação (Laravel Breeze)
require __DIR__.'/auth.php';
