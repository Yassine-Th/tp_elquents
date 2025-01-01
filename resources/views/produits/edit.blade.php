<x-nav></x-nav>
<div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Modifier le produit numéro {{ $produit->id }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('produits.update', $produit->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom:</label>
                    <input type="text" name="name" id="name" value="{{ $produit->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" name="description" id="description" value="{{ $produit->description }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prix:</label>
                    <input type="text" name="price" id="price" value="{{ $produit->price }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="text" name="stock" id="stock" value="{{ $produit->stock }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="categorie_id" class="form-label">Catégorie:</label>
                    <select name="categorie_id" id="categorie_id" class="form-select">
                        <option value="{{ $produit->categorie()->find($produit->categorie_id)->id }}">
                            {{ $produit->categorie()->find($produit->categorie_id)->name }}
                        </option>
                        @foreach ($cat as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
