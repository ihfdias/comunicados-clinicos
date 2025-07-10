@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow p-4" style="max-width: 800px; width: 100%; background-color: #ffffff;">

        <h2 class="card-title mb-3">
            {{ $comunicado->titulo }}
            @if ($comunicado->urgente)
                <span class="badge bg-danger">URGENTE</span>
            @endif
        </h2>

        <p class="text-muted mb-2">
            Publicado em {{ $comunicado->created_at->format('d/m/Y \à\s H:i') }}
        </p>

        <hr>

        <div class="card-text">
            {!! $comunicado->conteudo !!}
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>

            @auth
                @if(auth()->user()->is_admin)
                    <div class="d-flex gap-2">
                        <a href="{{ route('comunicados.edit', $comunicado) }}" class="btn btn-outline-primary">Editar</a>

                        <form action="{{ route('comunicados.destroy', $comunicado) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este comunicado?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Excluir</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection
