@extends('layouts.app')

@section('content')
    <h1>Editar Comunicado</h1>

    <form action="{{ route('comunicados.update', $comunicado) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $comunicado->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" rows="5" class="form-control" required>{{ $comunicado->conteudo }}</textarea>
        </div>

        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('comunicados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
