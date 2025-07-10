@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Comunicado</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('comunicados.update', $comunicado->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $comunicado->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <input id="conteudo" type="hidden" name="conteudo" value="{{ old('conteudo', $comunicado->conteudo) }}">
            <trix-editor input="conteudo"></trix-editor>
        </div>

        <div class="form-check mb-4">
            <input type="hidden" name="urgente" value="0">
            <input class="form-check-input" type="checkbox" name="urgente" id="urgente" value="1" {{ old('urgente', $comunicado->urgente) ? 'checked' : '' }}>
            <label class="form-check-label" for="urgente">Marcar como urgente</label>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-azul">Atualizar Comunicado</button>
            <a href="{{ route('comunicados.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
