<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function toggleAdmin($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->is_admin = !$usuario->is_admin;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Permissão atualizada com sucesso.');
    }
}
