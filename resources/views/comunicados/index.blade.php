@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Comunicados</h1>
    <a href="{{ route('comunicados.create') }}" class="btn btn-primary">Novo Comunicado</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@foreach ($comunicados as $comunicado)
    <div class="card mb-3 {{ $comunicado->urgente ? 'border-danger' : '' }}">
        <div class="card-body">
            <h5 class="card-title">
                {{ $comunicado->titulo }}
                @if ($comunicado->urgente)
                    <span class="badge bg-danger">URGENTE</span>
                @endif
            </h5>
            <p class="card-text">{!! Str::limit(strip_tags($comunicado->conteudo), 150) !!}</p>
            <p class="text-muted small mb-2">Publicado em {{ $comunicado->created_at->format('d/m/Y H:i') }}</p>
            <a href="{{ route('comunicados.show', $comunicado) }}" class="btn btn-outline-primary btn-sm">Ver</a>
            <a href="{{ route('comunicados.edit', $comunicado) }}" class="btn btn-outline-secondary btn-sm">Editar</a>
        </div>
    </div>
@endforeach

{{-- Paginação Bootstrap 5 --}}
<div class="d-flex justify-content-center mt-4">
    {{ $comunicados->links('pagination::bootstrap-5') }}
</div>
@endsection
