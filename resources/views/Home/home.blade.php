<x-nav></x-nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Products Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach ($produits as $produit)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/'.$produit->image) }}" 
                         class="card-img-top"
                         alt="{{ $produit->name }}"
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->name }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($produit->description, 100) }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h5 text-primary mb-0">{{ number_format($produit->price, 2) }} €</span>
                            <span class="badge bg-{{ $produit->stock > 0 ? 'success' : 'danger' }}">
                                {{ $produit->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>

                        <form action="{{ route('cart.add', $produit) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="btn btn-primary w-100 {{ $produit->stock <= 0 ? 'disabled' : '' }}">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>