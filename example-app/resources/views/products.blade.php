@extends('layouts.app')

@section('content')

<h2>Daftar Produk</h2>

<div class="row">

@foreach($products as $product)

<div class="col-md-4 mb-4">
    <div class="card">
        <div class="card-body">

            <h5>{{ $product->name }}</h5>

            <p>{{ $product->description }}</p>

            <p>Stok: {{ $product->stock }}</p>

            <span class="badge bg-secondary">
                {{ $product->category->name ?? 'No Category' }}
            </span>

        </div>
    </div>
</div>

@endforeach

</div>

@endsection