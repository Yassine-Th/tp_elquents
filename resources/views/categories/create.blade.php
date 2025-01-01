<x-nav></x-nav>
<div class="container mt-4">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $e)
          <li>
            <i class="bi bi-exclamation-circle me-2"></i>
            {{$e}}
          </li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card shadow-sm">
    <div class="card-header bg-light">
      <h5 class="card-title mb-0">Ajouter une nouvelle categorie</h5>
    </div>
    <div class="card-body">
      <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" 
            class="form-control" 
            name="name" 
            id="name" 
            value="{{ old('name') }}"
            placeholder="Entrez le nom de la catégorie">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description:</label>
          <textarea class="form-control" 
            name="description" 
            id="description" 
            rows="4"
            placeholder="Entrez la description">{{ old('description') }}</textarea>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">
            Ajouter
          </button>
          <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            Annuler
          </a>
        </div>
      </form>
    </div>
  </div>
</div>