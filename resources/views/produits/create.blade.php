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
        <h5 class="mb-0">Ajouter un nouveau produit</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('produits.store') }}" method="post">
          @csrf
  
          <div class="mb-3">
            <label for="name" class="form-label">Nom:</label>
            <input required type="text" name="name" id="name" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input required type="text" name="description" id="description" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="price" class="form-label">Prix:</label>
            <input required type="text" name="price" id="price" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <input required type="text" name="stock" id="stock" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie:</label>
            <select name="categorie_id" class="form-select">
              @foreach ($cat as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="text-end">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-plus-circle"></i> Ajouter
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  