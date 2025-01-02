<x-nav></x-nav>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Liste des Produits</h1>
    <a href="{{route('produits.create')}}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Ajouter une produits
    </a>
</div>    @if (count($produits) == 0)
        <div class="alert alert-info">
            <p>Aucun produit disponible.</p>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Nombre des produits : {{ count($produits) }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Catégorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->categorie()->find($item->categorie_id)->name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('produits.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                                Détails
                                            </a>
                                            <a href="{{ route('produits.edit', ['produit' => $item->id]) }}" class="btn btn-sm btn-outline-secondary">
                                                Modifier
                                            </a>
                                            <form action="{{ route('produits.destroy', $item->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="handelDelete(event, '{{ $item->name }}',this)">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/delete.js']),
