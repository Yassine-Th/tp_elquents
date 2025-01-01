<x-nav></x-nav>
<div class="container mt-4">
    <div class="card shadow-sm">
      <div class="card-header bg-light">
        <h5 class="mb-0">Fiche Commande - Numéro {{ $command->id }}</h5>
      </div>
      <div class="card-body">
        <p><strong>Date :</strong> {{ $command->date }}</p>
        <p><strong>Total :</strong> {{ $command->total }}</p>
        <p><strong>Client ID :</strong> {{ $command->client_id }}</p>
      </div>
      <div class="card-footer text-end">
        <a href="{{ route('commands.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Retour vers la liste
        </a>
      </div>
    </div>
  </div>
  