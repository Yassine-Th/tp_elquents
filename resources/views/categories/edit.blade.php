<x-nav></x-nav>
<div class="container mt-4">
 @if ($errors->any())
   <div class="alert alert-danger">
     <ul class="list-unstyled mb-0">
       @foreach ($errors->all() as $e)
         <li>
           <i class="bi bi-exclamation-circle me-2"></i>
           {{$e}}
         </li>
       @endforeach
     </ul>
   </div>
 @endif

 <div class="card shadow-sm">
   <div class="card-header bg-light">
     <h5 class="card-title mb-0">Modifier la categorie #{{$categorie->id}}</h5>
   </div>
   <div class="card-body">
     <form action="{{route('categories.update',$categorie->id)}}" method="post">
       @csrf
       @method("PUT")
       <div class="mb-3">
         <label for="name" class="form-label">Name:</label>
         <input type="text" 
           class="form-control" 
           name="name" 
           id="name" 
           value="{{old('name',$categorie->name)}}"
           placeholder="Entrez le nom de la catégorie">
       </div>

       <div class="mb-3">
         <label for="description" class="form-label">Description:</label>
         <textarea class="form-control" 
           name="description" 
           id="description" 
           rows="4"
           placeholder="Entrez la description">{{trim(old('description',$categorie->description))}}</textarea>
       </div>

       <div class="d-flex gap-2">
         <button type="submit" class="btn btn-primary">
           Modifier
         </button>
         <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
           Annuler
         </a>
       </div>
     </form>
   </div>
 </div>
</div>