@extends('master')

@section('content')
<div class="container my-5 search-result">
    <h2 class="text-center mb-4">Search Products</h2>

    @if(count($products) > 0)
        <div class="row">
            @foreach($products as $item)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $item->gallery) }}" 
                             class="card-img-top" 
                             alt="Product Image" 
                             style="height:200px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text"><strong>Price:</strong> ₹{{ $item->price }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $item->category }}</p>
                            <p class="card-text">{{ Str::limit($item->description, 50) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url('detail/'.$item->id) }}" class="btn btn-primary btn-sm">View Details</a>
                            <a href="#" class="btn btn-success btn-sm">Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center">
            <h4>No products found for your search!</h4>
        </div>
    @endif
</div>
@endsection
