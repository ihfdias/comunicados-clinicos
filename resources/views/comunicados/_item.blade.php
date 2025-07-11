<div class="card mb-3 {{ $comunicado->urgente ? 'border-danger' : '' }}">
    <div class="card-body">
        <h5 class="card-title">
            {{ $comunicado->titulo }}
            @if ($comunicado->urgente)
                <span class="badge bg-danger">URGENTE</span>
            @endif
        </h5>
        <p class="card-text text-muted small">
            Publicado em {{ $comunicado->created_at->format('d/m/Y H:i') }}
        </p>
        <p class="card-text">{!! Str::limit(strip_tags($comunicado->conteudo), 150) !!}</p>

        <a href="{{ route('comunicados.show', $comunicado) }}" class="btn btn-outline-primary btn-sm">Ver</a>
        <a href="{{ route('comunicados.edit', $comunicado) }}" class="btn btn-outline-secondary btn-sm">Editar</a>
        <form action="{{ route('comunicados.destroy', $comunicado) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
        </form>
    </div>
</div>
