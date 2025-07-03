@extends('layouts.app')

@section('content')
    <h1>Novo Comunicado</h1>

    <form action="{{ route('comunicados.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" rows="5" class="form-control" required></textarea>
        </div>

        <button class="btn btn-success">Publicar</button>
        <a href="{{ route('comunicados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
