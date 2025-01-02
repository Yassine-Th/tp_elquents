<x-nav></x-nav>
<script src="resources/js/delete.js"></script>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Liste des clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Ajouter une clients
        </a>
    </div>

    @if (count($clients) == 0)
        <div class="alert alert-info" role="alert">
            <p>Aucune clients</p>
        </div>
    @else
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <span class="fw-bold">Nombre des clients :</span> {{ count($clients) }}
        </div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->firstName }}</td>
                        <td>{{ $item->lastName }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->city }}</td>
                        <td>{{ $item->birthDay }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('clients.show', $item->id) }}">Details</a>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('clients.edit', $item->id) }}">Modifier</a>
                                <form action="{{ route('clients.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <input class="btn btn-sm btn-outline-danger" type="submit" value="supprimer" 
                                    onclick="handelDelete(event, '{{ $item->name }}',this)">
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
