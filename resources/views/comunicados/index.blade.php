@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Comunicados</h1>
        <a href="{{ route('comunicados.create') }}" class="btn btn-primary">Novo Comunicado</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($comunicados as $comunicado)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $comunicado->titulo }}</h5>
                <p class="card-text">{{ Str::limit($comunicado->conteudo, 150) }}</p>
                <small class="text-muted">{{ $comunicado->created_at->format('d/m/Y H:i') }}</small>

                <div class="mt-2">
                    <a href="{{ route('comunicados.edit', $comunicado) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('comunicados.destroy', $comunicado) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mt-3">
        {{ $comunicados->links() }}
    </div>
@endsection
