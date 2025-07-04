@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('publico') }}" class="btn btn-secondary btn-sm">← Voltar</a>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $comunicado->titulo }}</h3>
        </div>
        <div class="card-body">
            <p class="text-muted">
                Publicado em {{ $comunicado->created_at->format('d/m/Y H:i') }}
            </p>

            <div class="mt-3">
                {!! nl2br(e($comunicado->conteudo)) !!}
            </div>
        </div>
    </div>
@endsection
