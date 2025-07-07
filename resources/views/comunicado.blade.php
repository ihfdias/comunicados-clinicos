<h2>Comunicado Urgente</h2>
<p><strong>{{ $comunicado->titulo }}</strong></p>
<p>{{ $comunicado->mensagem }}</p>
<a href="{{ route('comunicados.publico_show', $comunicado->id) }}">
    Ver comunicado completo
</a>
