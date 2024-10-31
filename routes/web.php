<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/halley', function () {
    return view('halley');
});

Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index'); // Rota para listar usuários
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create'); // Rota para criar usuário
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store'); // Rota para armazenar usuário
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit'); // Rota para editar usuário
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update'); // Rota para atualizar usuário
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); // Rota para excluir usuário