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
        <h5 class="mb-0">Ajouter un nouveau client</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('saveCommand') }}" method="post">
          @csrf
  
          <div class="mb-3">
            <label for="firstName" class="form-label">Prénom:</label>
            <input  type="text" name="firstName" required id="firstName" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="lastName" class="form-label">Nom de famille:</label>
            <input  type="text" name="lastName" id="lastName" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="phone" class="form-label">Téléphone:</label>
            <input  type="tel" name="phone" id="phone" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="city" class="form-label">Ville:</label>
            <input  type="text" name="city" id="city" class="form-control">
          </div>
  
          <div class="mb-3">
            <label for="birthDay" class="form-label">Date de naissance:</label>
            <input  type="date" name="birthDay" id="birthDay" class="form-control">
          </div>
          <input type="hidden" name="total" value="{{ $total }}">
          <div class="text-end">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-person-plus"></i> Ajouter
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  