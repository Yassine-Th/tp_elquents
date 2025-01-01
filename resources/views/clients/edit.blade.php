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
            <h5 class="mb-0">Modifier le client numéro {{ $client->id }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.update', $client->id) }}" method="post">
                @csrf
                @method("PUT")

                <div class="mb-3">
                    <label for="firstName" class="form-label">Prénom:</label>
                    <input type="text" name="firstName" id="firstName" value="{{ $client->firstName }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Nom:</label>
                    <input type="text" name="lastName" id="lastName" value="{{ $client->lastName }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone:</label>
                    <input type="tel" name="phone" id="phone" value="{{ $client->phone }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Ville:</label>
                    <input type="text" name="city" id="city" value="{{ $client->city }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="birthDay" class="form-label">Date de Naissance:</label>
                    <input type="date" name="birthDay" id="birthDay" value="{{ $client->birthDay }}" class="form-control">
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
