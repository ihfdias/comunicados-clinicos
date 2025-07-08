@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2>
            {{ $comunicado->titulo }}
            @if ($comunicado->urgente)
                <span class="badge bg-danger">URGENTE</span>
            @endif
        </h2>
        <p class="text-muted">Publicado em {{ $comunicado->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="mb-5">
        {!! $comunicado->conteudo !!}
    </div>

    <a href="{{ route('comunicados.index') }}" class="btn btn-secondary">← Voltar</a>
</div>
@endsection
