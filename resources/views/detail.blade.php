@extends('master')

@section('content')
<div class="container my-5 detail-product">
    <div class="row bg-white p-4 rounded shadow-lg">

        <!-- Product Image Section -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('storage/' . $product['gallery']) }}" 
                 alt="{{ $product->name }}" 
                 class="img-fluid rounded" 
                 style="max-height: 400px; object-fit: cover;">
        </div>

        <!-- Product Details Section -->
        <div class="col-md-6">
            <h2 class="mb-3">{{ $product->name }}</h2>
            <h4 class="text-success mb-3">₹ {{ number_format($product->price, 2) }}</h4>
            <p><strong>Category:</strong> {{ $product->category }}</p>
            <p class="text-muted">{{ $product->description }}</p>

            <!-- Action Buttons -->
            <div class="d-flex flex-column mt-4">
                <form method="post" action="/add_to_cart">
                    @csrf
                <input type="hidden" name="product_id" value="{{$product['id']}}" >
                <button class="btn btn-success btn-lg mb-3 w-100">
                    <i class="fas fa-cart-plus"></i> Add to Cart
                </button>
                </form>
                <button class="btn btn-primary btn-lg mb-3">
                    <i class="fas fa-cart-plus"></i> Buy Now
                </button>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-4">
        <a href="/all-products" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>
    </div>
</div>
@endsection
