<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;

class ComunicadoController extends Controller
{
    public function publico()
    {
        $comunicados = Comunicado::latest()->get();
        return view('comunicados.publico', compact('comunicados'));
    }

    public function index()
    {
        $comunicados = Comunicado::latest()->paginate(10);
        return view('comunicados.index', compact('comunicados'));
    }

    public function create()
    {
        return view('comunicados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        Comunicado::create($request->only('titulo', 'conteudo'));

        return redirect()->route('comunicados.index')->with('success', 'Comunicado criado com sucesso!');
    }

    public function edit(Comunicado $comunicado)
    {
        return view('comunicados.edit', compact('comunicado'));
    }

    public function update(Request $request, Comunicado $comunicado)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        $comunicado->update($request->only('titulo', 'conteudo'));

        return redirect()->route('comunicados.index')->with('success', 'Comunicado atualizado com sucesso!');
    }

    public function destroy(Comunicado $comunicado)
    {
        $comunicado->delete();
        return redirect()->route('comunicados.index')->with('success', 'Comunicado excluído!');
    }
}
