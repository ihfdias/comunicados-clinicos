@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Novo Comunicado</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('comunicados.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Título -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <!-- Conteúdo -->
        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <input id="conteudo" type="hidden" name="conteudo" required>
            <trix-editor input="conteudo" class="form-control"></trix-editor>
        </div>

        <!-- Urgente -->
        <div class="form-check mb-3">
            <input type="checkbox" name="urgente" id="urgente" class="form-check-input">
            <label class="form-check-label" for="urgente">Marcar como urgente</label>
        </div>

        <!-- Anexo -->
        <div class="mb-3">
            <label for="anexo" class="form-label">Anexo</label>
            <input type="file" name="anexo" class="form-control">
        </div>

        <!-- Botão -->
        <button type="submit" class="btn btn-primary">Salvar Comunicado</button>
    </form>

</div>
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.umd.min.js"></script>
@endpush
@endsection