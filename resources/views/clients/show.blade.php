<x-nav></x-nav>
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h2 class="h5 mb-0">Fiche Client</h2>
            <span class="text-muted">Numéro : {{$client->id}}</span>
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{$client->firstName}}</p>
            <p><strong>Prénom :</strong> {{$client->lastName}}</p>
            <p><strong>Téléphone :</strong> {{$client->phone}}</p>
            <p><strong>Ville :</strong> {{$client->city}}</p>
            <p><strong>Date de Naissance :</strong> {{$client->birthDay}}</p>
        </div>
        <div class="card-footer bg-light text-end">
            <a href="{{ route('clients.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Retour vers la liste
            </a>
        </div>
    </div>
</div>
