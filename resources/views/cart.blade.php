<x-nav></x-nav>

<div class="container mt-4">
    <h2>Shopping Cart</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($cart && count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach($cart as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/'.$details['image']) }}" 
                                         alt="{{ $details['name'] }}"
                                         style="width: 50px; height: 50px; object-fit: cover"
                                         class="me-2">
                                    {{ $details['name'] }}
                                </div>
                            </td>
                            <td>{{ number_format($details['price'], 2) }} €</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ number_format($details['price'] * $details['quantity'], 2) }} €</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td><strong>{{ number_format($total, 2) }} €</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        
        <div class="text-end mt-3">
            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to empty your cart?')">
                    <i class="bi bi-trash"></i> Empty Cart
                </button>
            </form>
            <a href="{{ route('home') }}" class="btn btn-secondary">Continue Shopping</a>
            <button  class="btn btn-success" {{ $cart ? '' : 'disabled' }}>
                <a href="{{ route("clients.create")}}" class="text-white">
                    Commander
                </a>
                
            </button>
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-cart-x h1"></i>
            <h3>Your cart is empty</h3>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Continue Shopping</a>
        </div>
    @endif
</div>