<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;

class ComunicadoController extends Controller
{
    // Exibição pública
    public function publico()
    {
        $comunicados = Comunicado::latest()->get();
        return view('comunicados.publico', compact('comunicados'));
    }

    public function publicoShow($id)
    {
        $comunicado = Comunicado::findOrFail($id);
        return view('comunicados.show', compact('comunicado'));
    }

    public function index(Request $request)
    {
        $query = Comunicado::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('titulo', 'like', '%' . $request->search . '%')
                    ->orWhere('conteudo', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('urgente')) {
            $query->where('urgente', true);
        }

        $comunicados = $query->latest()->paginate(10);

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

        Comunicado::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'urgente' => $request->has('urgente'),
        ]);

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

        $comunicado->update([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'urgente' => $request->has('urgente'),
        ]);

        return redirect()->route('comunicados.index')->with('success', 'Comunicado atualizado com sucesso!');
    }

    public function destroy(Comunicado $comunicado)
    {
        $comunicado->delete();
        return redirect()->route('comunicados.index')->with('success', 'Comunicado excluído com sucesso!');
    }

    public function show(Comunicado $comunicado)
    {
        return view('comunicados.show', compact('comunicado'));
    }
}
