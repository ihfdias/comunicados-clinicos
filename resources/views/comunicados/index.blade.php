@extends('layouts.app')

@section('content')
<div class="container">
    <!-- ...seu conteúdo HTML aqui... -->

    <form method="GET" action="{{ route('comunicados.index') }}" class="mb-4 d-flex gap-2">
        <input type="text" id="busca" name="busca" class="form-control" placeholder="Buscar comunicados..." value="{{ request('busca') }}">
        <button type="submit" class="btn btn-azul">Buscar</button>
    </form>

    <div id="lista-comunicados">
        @foreach ($comunicados as $comunicado)
            @include('comunicados._item', ['comunicado' => $comunicado])
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $comunicados->links() }}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputBusca = document.getElementById('busca');
    const lista = document.getElementById('lista-comunicados');

    if (inputBusca) {
        inputBusca.addEventListener('input', function () {
            const termo = this.value;

            fetch(`{{ route('comunicados.busca') }}?q=${encodeURIComponent(termo)}`)
                .then(response => response.json())
                .then(data => {
                    lista.innerHTML = '';

                    if (data.length === 0) {
                        lista.innerHTML = '<p>Nenhum comunicado encontrado.</p>';
                        return;
                    }

                    data.forEach(comunicado => {
                        const urgenteBadge = comunicado.urgente
                            ? '<span class="badge bg-danger">URGENTE</span>'
                            : '';

                        lista.innerHTML += `
                            <div class="card mb-3 ${comunicado.urgente ? 'border-danger' : ''}">
                                <div class="card-body">
                                    <h5 class="card-title">${comunicado.titulo} ${urgenteBadge}</h5>
                                    <p class="card-text text-muted small">
                                        Publicado em ${new Date(comunicado.created_at).toLocaleString()}
                                    </p>
                                    <p class="card-text">${comunicado.conteudo.substring(0, 150)}...</p>
                                    <a href="/comunicados/${comunicado.id}" class="btn btn-outline-primary btn-sm">Ver</a>
                                    <a href="/comunicados/${comunicado.id}/edit" class="btn btn-outline-secondary btn-sm">Editar</a>
                                    <form action="/comunicados/${comunicado.id}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        `;
                    });
                });
        });
    }
});
</script>
@endsection
