@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary fw-bold"><i class="bi bi-megaphone"></i> Comunicados</h1>
        <a href="{{ route('comunicados.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle-fill"></i> Novo Comunicado
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('comunicados.index') }}" class="mb-4 d-flex gap-2">
        <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar comunicados..." autocomplete="off">
    </form>

    <div id="lista-comunicados">
        @include('comunicados._lista', ['comunicados' => $comunicados])
    </div>

    <div id="paginacao" class="d-flex justify-content-center mt-4">
        {{ $comunicados->links() }}
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputBusca = document.getElementById('busca');
    const lista = document.getElementById('lista-comunicados');
    const paginacao = document.getElementById('paginacao');

    inputBusca.addEventListener('input', function () {
        const termo = this.value;

        fetch(`/comunicados/busca?q=${encodeURIComponent(termo)}`)
            .then(response => response.text())
            .then(html => {
                lista.innerHTML = html;
                paginacao.style.display = 'none'; 
            });
    });
});
</script>
@endsection
