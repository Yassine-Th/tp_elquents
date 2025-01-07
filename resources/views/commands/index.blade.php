<x-nav></x-nav>
<div class="container mt-4">

<div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Liste des Commands</h1>
        <a href="{{route('commands.create')}}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Ajouter une Comamnds
        </a>
    </div>
@if (count($commands) == 0)
<div class="alert alert-info">
<p>Aucune commande disponible.</p>
</div>
@else
<div class="d-flex justify-content-center align-items-center mb-4">
    <div class="form-group">
    <h4>
		filtrer les command :
	</h4>
	<select id="etatFilter" class="form-select" onchange="handleEtatFilter(this)">
        <option value="all">All</option>
        <option value="confirme">Confirme</option>
        <option value="livrer">Livrer</option>
        <option value="recu">Recu</option>
        <option value="refuser">Refuser</option>
    </select>
    </div>
	
</div>
<div class="card shadow-sm">
    <div class="card-header bg-light">
    <h5 class="mb-0">Nombre des commandes : {{ count($commands) }}</h5>
</div>
    <div class="card-body">
<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Total</th>
                <th>Client ID</th>
                <th>Etat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="commandsTableBody">
            @foreach ($commands as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->client_id }}</td>
                    <td> {{$item->etat}} </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('commands.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                Détails
                            </a>
                            <a href="{{ route('commands.edit', ['command' => $item->id]) }}" class="btn btn-sm btn-outline-secondary">
                                Modifier
                            </a>
                            <form action="{{ route('commands.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                onclick="handelDelete(event, '{{ $item->name }}',this)">
                                    Supprimer
                                </button>
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

<script>
    function handleEtatFilter(e) {
        const etat = e.value;
        let url = "/commands/filter/";
        if (etat !== "all") {
            url += etat;
        }else{
            url += "all";
        }

        fetch(url, {
            method: "GET",
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tbody = document.getElementById("commandsTableBody");
            tbody.innerHTML = ""; // Clear existing rows

            data.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td>${item.date}</td>
                    <td>${item.total}</td>
                    <td>${item.client_id}</td>
                    <td>${item.etat}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('commands.show', '') }}/${item.id}" class="btn btn-sm btn-outline-primary">Détails</a>
                            <a href="{{ route('commands.edit', '') }}/${item.id}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                            <form action="{{ route('commands.destroy', '') }}/${item.id}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="handleDelete(event, '${item.name}', this)">Supprimer</button>
                            </form>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
</script>