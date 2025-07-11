@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Comunicados</h1>
        <a href="{{ route('comunicados.create') }}" class="btn btn-primary">Novo Comunicado</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('comunicados.index') }}" class="mb-4 d-flex gap-2">
        <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar comunicados...">
    </form>

    <div id="lista-comunicados">
        @include('comunicados._lista', ['comunicados' => $comunicados])
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $comunicados->links() }}
    </div>
</div>

<script>
    document.getElementById('busca').addEventListener('input', function() {
        const termo = this.value;

        fetch(`/comunicados/busca?q=${encodeURIComponent(termo)}`)
            .then(response => response.text()) // ← Espera HTML
            .then(html => {
                document.getElementById('lista-comunicados').innerHTML = html;
            });
    });
</script>
@endsection