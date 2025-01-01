<x-nav></x-nav>
<div class="container mt-4">
 <div class="card shadow-sm">
   <div class="card-header bg-light d-flex justify-content-between align-items-center">
     <h5 class="mb-0">Fiche categorie #{{$categorie->id}}</h5>
     <a href="{{route('categories.index')}}" class="btn btn-outline-secondary btn-sm">
       Retour vers la liste
     </a>
   </div>
   <div class="card-body">
     <div class="mb-3">
       <label class="fw-bold">Name:</label>
       <p class="mb-3">{{$categorie->name}}</p>
     </div>

     <div class="mb-3">
       <label class="fw-bold">Description:</label>
       <p class="mb-0">{{$categorie->description}}</p>
     </div>
   </div>
 </div>
</div>