@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Usuários do Sistema</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Admin?</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if ($usuario->is_admin)
                            <span class="badge bg-success">Sim</span>
                        @else
                            <span class="badge bg-secondary">Não</span>
                        @endif
                    </td>
                    <td>
                        @if (auth()->id() !== $usuario->id)
                            <form action="{{ route('usuarios.toggleAdmin', $usuario->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm {{ $usuario->is_admin ? 'btn-warning' : 'btn-success' }}">
                                    {{ $usuario->is_admin ? 'Remover Admin' : 'Tornar Admin' }}
                                </button>
                            </form>
                        @else
                            <em>Você</em>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
