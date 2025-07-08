@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Comunicados</h1>
    <a href="{{ route('comunicados.create') }}" class="btn btn-primary">Novo Comunicado</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('comunicados.index') }}" class="row mb-4">
    <div class="col-md-6">
        <input type="text" name="search" class="form-control" placeholder="Buscar por título ou conteúdo" value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="urgente" id="urgente" value="1" {{ request('urgente') ? 'checked' : '' }}>
            <label class="form-check-label" for="urgente">Somente urgentes</label>
        </div>
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-primary">Filtrar</button>
        <a href="{{ route('comunicados.index') }}" class="btn btn-secondary">Limpar</a>
    </div>
</form>

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
        <a href="{{ route('comunicados.show', $comunicado) }}" class="btn btn-outline-primary btn-sm">Ver</a>
        <a href="{{ route('comunicados.edit', $comunicado) }}" class="btn btn-outline-secondary btn-sm">Editar</a>
        <form action="{{ route('comunicados.destroy', $comunicado) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este comunicado?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
        </form>
    </div>
</div>
@endforeach

@endsection