@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Comunicados ao Corpo Clínico</h1>

    @forelse ($comunicados as $comunicado)
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">{{ $comunicado->titulo }}</h5>
            </div>
            <div class="card-body">
                <p class="text-muted">
                    Publicado em {{ $comunicado->created_at->format('d/m/Y H:i') }}
                </p>

                <p>
                    {{ \Illuminate\Support\Str::limit(strip_tags($comunicado->conteudo), 200, '...') }}
                </p>

                <a href="{{ route('comunicados.publico_show', $comunicado->id) }}" class="btn btn-sm btn-outline-primary">
                    Ler mais
                </a>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">
            Nenhum comunicado disponível no momento.
        </div>
    @endforelse
@endsection
