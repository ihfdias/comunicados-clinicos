<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PainelController;
use App\Models\User;

Route::get('/', [ComunicadoController::class, 'publico'])->name('publico');
Route::get('/comunicado/{id}', [ComunicadoController::class, 'publicoShow'])->name('comunicados.publico_show');
Route::get('/comunicados/busca', [ComunicadoController::class, 'busca'])->name('comunicados.busca');

Route::patch('/usuarios/{id}/toggle-admin', [UsuarioController::class, 'toggleAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('usuarios.toggleAdmin');

Route::get('/dashboard', function () {
    return redirect()->route('comunicados.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('comunicados', ComunicadoController::class)->except('publico');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/painel', [PainelController::class, 'index'])->name('painel.index');
});

Route::get('/mongo-teste', function () {
    return User::create([
        'name' => 'Teste Mongo',
        'email' => 'teste@mongo.com',
        'password' => bcrypt('12345678'),
    ]);
});

require __DIR__.'/auth.php';

