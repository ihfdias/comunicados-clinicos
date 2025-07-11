@forelse ($comunicados as $comunicado)
    @include('comunicados._item', ['comunicado' => $comunicado])
@empty
    <p>Nenhum comunicado encontrado.</p>
@endforelse
