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
        <h5 class="mb-0">Ajouter une nouvelle catégorie</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('categories.store') }}" method="post">
          @csrf
  
          <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" name="date" id="date" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="total" class="form-label">Total:</label>
            <input type="text" name="total" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="client_id" class="form-label">Client ID:</label>
            <input type="text" name="client_id" class="form-control">
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
  