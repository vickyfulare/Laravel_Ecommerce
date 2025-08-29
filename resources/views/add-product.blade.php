@extends('master')

@section('content')
<div class="container mt-5 add-product">
    <h2 class="mb-4">Add New Product</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="addproduct" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter product name" value="{{ old('name') }}">
        </div>

        <div class="form-group mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
        </div>

        <div class="form-group mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" placeholder="Enter category" value="{{ old('category') }}">
        </div>

        <div class="form-group mb-3">
            <label>Product Image</label>
            <input type="file" name="gallery" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
