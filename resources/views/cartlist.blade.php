@extends('master')
@section('content')

<div class="container my-5 cart-list">
    <h2 class="text-center mb-4">My Cart</h2>

    @if(count($products) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price (₹)</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $product->gallery) }}" 
                                     alt="{{ $product->name }}" 
                                     class="img-fluid rounded" 
                                     style="height: 80px; width: 80px;">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>₹ {{ number_format($product->price, 2) }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>
                                <form action="{{ url('removecart', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this product from the cart?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Remove to Cart
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="/all-products" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Continue Shopping
            </a>
            <a href="ordernow" class="btn btn-success">
               Order Now
            </a>
        </div>
    @else
        <div class="alert alert-warning text-center mt-4">
            <h5>Your cart is empty!</h5>
            <a href="/all-products" class="btn btn-primary mt-2">Shop Now</a>
        </div>
    @endif
</div>

@endsection
