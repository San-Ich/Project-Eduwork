@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Daftar Produk</h2>
                    <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        + Tambah Produk
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Nama</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Stok</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Harga</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Gambar</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">{{ Str::limit($product->description, 50) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->stock }}</td>
                                    <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($product->price) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if($product->image)
                                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded text-sm hover:bg-yellow-600 mr-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                        Belum ada produk
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection