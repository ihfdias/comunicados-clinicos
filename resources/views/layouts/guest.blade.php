<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistema de Comunicados</title>

    <!-- Bootstrap 5 (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container" style="max-width: 400px;">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/novalogo.png') }}" alt="Hospital" style="height: 60px;">
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsd
