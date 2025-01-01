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
        <h5 class="mb-0">Modifier la commande numéro {{ $command->id }}</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('commands.update', $command->id) }}" method="post">
          @csrf
          @method('PUT')
  
          <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" name="date" id="date" value="{{ old('name', $command->date) }}" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="total" class="form-label">Total:</label>
            <input type="text" name="total" value="{{ $command->total }}" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="client_id" class="form-label">Client ID:</label>
            <input type="text" name="client_id" value="{{ $command->client_id }}" class="form-control">
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
  