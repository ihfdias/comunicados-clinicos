@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Comunicados ao Corpo Clínico</h1>

    @if ($comunicados->isEmpty())
        <div class="alert alert-info text-center">Nenhum comunicado publicado.</div>
    @endif

    @foreach ($comunicados as $comunicado)
    <div class="card shadow-sm mb-4 {{ $comunicado->urgente ? 'border-danger' : '' }}">
        <div class="card-body">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                {{ $comunicado->titulo }}
                @if ($comunicado->urgente)
                    <span class="badge bg-danger">URGENTE</span>
                @endif
            </h5>

            <p class="text-muted mb-2">
                Publicado em {{ $comunicado->created_at->format('d/m/Y \à\s H:i') }}
            </p>

            <p class="card-text">{!! Str::limit(strip_tags($comunicado->conteudo), 150) !!}</p>

            <a href="{{ route('comunicados.publico_show', $comunicado->id) }}" class="btn btn-sm btn-outline-primary">
                Ler mais
            </a>
        </div>
    </div>
    @endforeach

    @if ($comunicados->hasPages())
        <div class="mt-4">
    <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
        <div class="mb-2 mb-md-0 text-muted">
            Mostrando {{ $comunicados->firstItem() }} até {{ $comunicados->lastItem() }} de {{ $comunicados->total() }} comunicados
        </div>
        <div>
            {{ $comunicados->links() }}
        </div>
    </div>
</div>

    @endif
</div>
@endsection
