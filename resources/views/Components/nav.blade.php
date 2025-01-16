<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand fw-bold" href="#">Navbar</a>
            
            <ul class="navbar-nav d-flex flex-row gap-4 mb-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/clients">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produits">Produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/commands">Commands</a>
                </li>
                <!-- In your nav component -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="bi bi-cart"></i> Cart
                        @if(session()->has('cart'))
                            <span class="badge bg-primary">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>