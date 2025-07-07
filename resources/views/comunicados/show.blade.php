@extends('layouts.app')

@section('content')
<div class="container">
    <h2>
        {{ $comunicado->titulo }}
        @if ($comunicado->urgente)
            <span class="badge bg-danger">URGENTE</span>
        @endif
    </h2>

    <hr>

    <div class="mb-4">
        {!! $comunicado->conteudo !!}
    </div>

    <a href="{{ route('publico') }}" class="btn btn-secondary">← Voltar</a>
</div>
@endsection
