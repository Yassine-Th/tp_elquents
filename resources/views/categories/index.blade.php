@vite([ 'resources/css/app.css', 'resources/js/app.js', 'resources/js/delete.js']),
<x-nav></x-nav>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Liste des categories</h1>
        <a href="{{route('categories.create')}}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Ajouter une categorie
        </a>
    </div>

    @if (count($categories)==0)
        <div class="alert alert-info" role="alert">
            Aucune categorie
        </div>
    @else
<div class="card shadow-sm">
    <div class="card-header bg-light">
        <span class="fw-bold">Nombre des categories : {{count($categories)}}</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col" class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
            <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{route('categories.show',$item->id)}}" 
                        class="btn btn-sm btn-outline-primary">
                        Details
                    </a>
                    <a href="{{route('categories.edit',['id'=>$item->id])}}" 
                        class="btn btn-sm btn-outline-secondary">
                        Modifier
                    </a>
                    <form action="{{route('categories.destroy',$item->id)}}" 
                            method="post" class="d-inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" id="delete" class="btn btn-sm btn-outline-danger"
                                onclick="handelDelete(event, '{{ $item->name }}',this)" >
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