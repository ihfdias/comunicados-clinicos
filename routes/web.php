<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComunicadoController;


Route::get('/', [ComunicadoController::class, 'publico'])->name('publico');
Route::get('/comunicado/{id}', [ComunicadoController::class, 'publicoShow'])->name('comunicados.publico_show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('comunicados', ComunicadoController::class)->except('publico');
});


require __DIR__.'/auth.php';
