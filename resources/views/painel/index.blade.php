@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Painel de Estatísticas</h1>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Comunicados</h5>
                    <p class="fs-3">{{ $totalComunicados }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-danger shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Urgentes</h5>
                    <p class="fs-3">{{ $totalUrgentes }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Leituras registradas</h5>
                    <p class="fs-3">{{ $totalLeituras }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-secondary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Médicos que leram ao menos um comunicado</h5>
                    <p class="fs-3">{{ $usuariosQueLeram }}</p>
                </div>
            </div>
        </div>

        @if($ultimoComunicado)
        <div class="col-md-6">
            <div class="card border-info shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Último Comunicado</h5>
                    <p class="mb-1"><strong>{{ $ultimoComunicado->titulo }}</strong></p>
                    <small class="text-muted">Publicado em {{ $ultimoComunicado->created_at->format('d/m/Y H:i') }}</small>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
