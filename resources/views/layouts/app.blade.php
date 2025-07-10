<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Comunicados</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Trix Editor CSS -->
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

    <style>
        :root {
            --azul-principal: #005A8C;
            --azul-secundario: #0074B7;
            --amarelo-destaque: #D6A10D;
        }

        .btn-azul {
            background-color: var(--azul-secundario);
            color: #fff;
        }

        .btn-azul:hover {
            background-color: #005f99;
        }

        .badge-urgente {
            background-color: var(--amarelo-destaque);
            color: #fff;
        }

        footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
            text-align: center;
            color: #6c757d;
            margin-top: 3rem;
            font-size: 0.9rem;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        trix-editor {
            min-height: 200px;
            background-color: #fff;
            border: 1px solid #ced4da;
            padding: 1rem;
            border-radius: .375rem;
        }

        /* Evita que Trix esconda os botões em alguns casos */
        trix-toolbar {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/novalogo.png') }}" alt="Hospital" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comunicados.index') }}">Comunicados</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Sair</button>
                        </form>
                    </li>
                    @else
                    
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Hospital PUC-Campinas - Sistema de Comunicados
    </footer>

    <!-- Scripts no final da página -->
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.js"></script>
</body>

</html>