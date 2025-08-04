<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId;

class ComunicadoController extends Controller
{
    public function publico(Request $request)
    {
        $query = Comunicado::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('titulo', 'like', '%' . $request->search . '%')
                    ->orWhere('conteudo', 'like', '%' . $request->search . '%');
            });
        }

        $comunicados = $query->latest()->paginate(10);

        return view('comunicados.publico', compact('comunicados'));
    }

    public function publicoShow($id)
{
    try {
        $comunicado = Comunicado::findOrFail(new ObjectId($id));
    } catch (\Exception $e) {
        abort(404);
    }

    $usuario_id = Auth::check() ? Auth::id() : null;

    return view('comunicados.show', compact('comunicado', 'usuario_id'));
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

        if ($request->filled('data_inicio')) {
            $query->whereDate('created_at', '>=', $request->data_inicio);
        }

        if ($request->filled('data_fim')) {
            $query->whereDate('created_at', '<=', $request->data_fim);
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
            'anexo' => 'nullable|file|max:2048',
        ]);

        $caminho = null;

        if ($request->hasFile('anexo')) {
            $caminho = $request->file('anexo')->store('anexos', 'public');
        }

        Comunicado::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'urgente' => $request->has('urgente'),
            'anexo' => $caminho,
        ]);

        return redirect()->route('comunicados.index')->with('success', 'Comunicado criado com sucesso!');
    }

    public function edit($id)
{
    $comunicado = Comunicado::findOrFail(new ObjectId($id));
    return view('comunicados.edit', compact('comunicado'));
}
    public function update(Request $request, $id)
{
    $comunicado = Comunicado::findOrFail(new ObjectId($id));

    $request->validate([
        'titulo' => 'required|string|max:255',
        'conteudo' => 'required|string',
    ]);

    $comunicado->update([
        'titulo' => $request->titulo,
        'conteudo' => $request->conteudo,
        'urgente' => $request->urgente,
    ]);

    return redirect()->route('comunicados.index')->with('success', 'Comunicado atualizado com sucesso!');
}

    public function destroy($id)
{
    $comunicado = Comunicado::findOrFail(new ObjectId($id));
    $comunicado->delete();

    return redirect()->route('comunicados.index')->with('success', 'Comunicado excluído com sucesso!');
}

   public function show($id)
{
    $comunicado = Comunicado::findOrFail(new ObjectId($id));
    return view('comunicados.show', compact('comunicado'));
}

    public function busca(Request $request)
    {
        $termo = $request->q;

        $comunicados = Comunicado::where('titulo', 'like', "%{$termo}%")
            ->orWhere('conteudo', 'like', "%{$termo}%")
            ->latest()
            ->get(['id', 'titulo', 'conteudo', 'created_at', 'urgente']);

        return view('comunicados._lista', compact('comunicados'))->render();
    }
}
