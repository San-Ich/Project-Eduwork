<x-app-layout>

    <h2>Daftar Produk</h2>

    @foreach($products as $product)
        <p>{{ $product->name }}</p>
    @endforeach

</x-app-layout>