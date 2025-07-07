@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Comunicados ao Corpo Clínico</h1>

    @foreach ($comunicados as $comunicado)
        <div class="card mb-3 {{ $comunicado->urgente ? 'border-danger' : '' }}">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-between align-items-center">
                    {{ $comunicado->titulo }}
                    @if ($comunicado->urgente)
                        <span class="badge bg-danger">URGENTE</span>
                    @endif
                </h5>
                <p class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($comunicado->conteudo), 150, '...') !!}</p>
                <a href="{{ route('comunicados.publico_show', $comunicado->id) }}" class="btn btn-outline-primary btn-sm">
                    Ler Comunicado
                </a>
            </div>
        </div>
    @endforeach

    @if ($comunicados->isEmpty())
        <div class="alert alert-info">Nenhum comunicado publicado.</div>
    @endif
</div>
@endsection
