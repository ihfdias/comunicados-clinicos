@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center text-primary fw-bold">
        <i class="bi bi-megaphone-fill"></i> Comunicados ao Corpo Clínico
    </h1>

    <form method="GET" action="{{ route('publico') }}" class="mb-4 d-flex gap-2 justify-content-center">
        <input type="text" id="busca" name="busca" class="form-control w-50" placeholder="Buscar comunicados..." autocomplete="off">
    </form>

    <div id="lista-comunicados">
        @foreach ($comunicados as $comunicado)
        <div class="card shadow-sm mb-4 {{ $comunicado->urgente ? 'border-danger' : 'border-0' }}">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-between align-items-center">
                    {{ $comunicado->titulo }}
                    @if ($comunicado->urgente)
                    <span class="badge bg-danger"><i class="bi bi-exclamation-triangle-fill"></i> URGENTE</span>
                    @endif
                </h5>
                <p class="text-muted small mb-2">
                    Publicado em {{ $comunicado->created_at->format('d/m/Y \à\s H:i') }}
                </p>
                <p class="card-text">{!! Str::limit(strip_tags($comunicado->conteudo), 150) !!}</p>
                <a href="{{ route('comunicados.publico_show', $comunicado->id) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-eye-fill"></i> Ler mais
                </a>
            </div>
        </div>
        @endforeach
    </div>

    @if ($comunicados->hasPages())
    <div class="mt-4 d-flex justify-content-between align-items-center flex-column flex-md-row">
        <div class="mb-2 text-muted small">
            Mostrando {{ $comunicados->firstItem() }} até {{ $comunicados->lastItem() }} de {{ $comunicados->total() }} comunicados
        </div>
        <div>
            {{ $comunicados->links() }}
        </div>
    </div>
    @endif
</div>

<!-- Bootstrap Icons (se ainda não estiver no layout) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputBusca = document.getElementById('busca');

        inputBusca.addEventListener('input', function () {
            const termo = this.value;

            fetch(`/comunicados/busca?q=${encodeURIComponent(termo)}`)
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('lista-comunicados');
                    container.innerHTML = '';

                    if (data.length === 0) {
                        container.innerHTML = '<div class="alert alert-info text-center">Nenhum comunicado encontrado.</div>';
                        return;
                    }

                    data.forEach(comunicado => {
                        const urgenteBadge = comunicado.urgente
                            ? '<span class="badge bg-danger"><i class="bi bi-exclamation-triangle-fill"></i> URGENTE</span>'
                            : '';

                        container.innerHTML += `
                            <div class="card shadow-sm mb-4 ${comunicado.urgente ? 'border-danger' : 'border-0'}">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between align-items-center">
                                        ${comunicado.titulo}
                                        ${urgenteBadge}
                                    </h5>
                                    <p class="text-muted small mb-2">
                                        Publicado em ${new Date(comunicado.created_at).toLocaleString('pt-BR')}
                                    </p>
                                    <p class="card-text">${comunicado.conteudo.substring(0, 150)}...</p>
                                    <a href="/comunicado/${comunicado.id}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye-fill"></i> Ler mais
                                    </a>
                                </div>
                            </div>
                        `;
                    });
                });
        });
    });
</script>
@endsection
