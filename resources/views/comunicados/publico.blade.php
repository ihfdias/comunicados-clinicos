@extends('layouts.app')

@section('content')
    <h1>Comunicados ao Corpo Clínico</h1>

    @forelse($comunicados as $comunicado)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $comunicado->titulo }}</h5>
                <p class="card-text">{{ $comunicado->conteudo }}</p>
                <small class="text-muted">Publicado em {{ $comunicado->created_at->format('d/m/Y H:i') }}</small>
            </div>
        </div>
    @empty
        <p>Nenhum comunicado disponível.</p>
    @endforelse
@endsection
