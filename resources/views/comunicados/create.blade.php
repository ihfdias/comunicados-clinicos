@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Novo Comunicado</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('comunicados.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <input id="conteudo" type="hidden" name="conteudo" value="{{ old('conteudo') }}">
            <trix-editor input="conteudo"></trix-editor>
        </div>

        <div class="form-check mb-3">
            <input type="hidden" name="urgente" value="0"> {{-- Para garantir envio se desmarcado --}}
            <input class="form-check-input" type="checkbox" name="urgente" id="urgente" value="1" {{ old('urgente') ? 'checked' : '' }}>
            <label class="form-check-label" for="urgente">Marcar como urgente</label>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Comunicado</button>
        <a href="{{ route('comunicados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
