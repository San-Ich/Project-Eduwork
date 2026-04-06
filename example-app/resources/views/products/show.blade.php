@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $product->name }}</h3>
                    <div>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">Back to Products</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @if($product->image)
                                <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 300px;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>Description</h5>
                            <p>{{ $product->description }}</p>

                            <h5>Stock</h5>
                            <p>{{ $product->stock }}</p>

                            <h5>Category</h5>
                            <p>{{ $product->category->name ?? 'N/A' }}</p>

                            <h5>Created At</h5>
                            <p>{{ $product->created_at->format('d M Y, H:i') }}</p>

                            <h5>Last Updated</h5>
                            <p>{{ $product->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection