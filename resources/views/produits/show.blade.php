<x-nav></x-nav>
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Fiche Produit - Numéro {{ $produit->id }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $produit->name }}</p>
            <p><strong>Description :</strong> {{ $produit->description }}</p>
            <p><strong>Prix :</strong> {{ $produit->price }}</p>
            <p><strong>Stock :</strong> {{ $produit->stock }}</p>
            <p><strong>Catégorie :</strong> {{ $produit->categorie()->find($produit->categorie_id)->name }}</p>
            <div>
               <strong>Image :</strong>
            <img src="{{ asset('storage/'.$produit->image) }}" alt="" class="img-fluid h-25"> 
            </div>
            
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Retour vers la liste
            </a>
        </div>
    </div>           
     {{-- <img src="{{asset("atorage/products/images/977Wx9q3KvNs3kKEv3fkNP07bJD9E8SBpGcWznK8.jpg")}}" alt=""> --}}

</div>
