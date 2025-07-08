@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Comunicados ao Corpo Clínico</h1>

    @foreach ($comunicados as $comunicado)
    <div class="card mb-3 {{ $comunicado->urgente ? 'border-danger' : '' }}">
        <div class="card-body">
            <h5 class="card-title">
                {{ $comunicado->titulo }}
                @if ($comunicado->urgente)
                    <span class="badge bg-danger">URGENTE</span>
                @endif
            </h5>

            {{-- Data da publicação --}}
            <p class="text-muted mb-1">
                Publicado em {{ $comunicado->created_at->format('d/m/Y \à\s H:i') }}
            </p>

            {{-- Conteúdo resumido --}}
            <p class="card-text">{!! Str::limit(strip_tags($comunicado->conteudo), 150) !!}</p>

            <a href="{{ route('comunicados.publico_show', $comunicado->id) }}" class="btn btn-sm btn-outline-primary">Ler mais</a>
        </div>
    </div>
@endforeach

    @if ($comunicados->isEmpty())
        <div class="alert alert-info">Nenhum comunicado publicado.</div>
    @endif
</div>

<div class="mt-4">
    {{ $comunicados->links() }}
</div>
@endsection
