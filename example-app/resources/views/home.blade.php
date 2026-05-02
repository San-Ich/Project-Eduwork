<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">Welcome to My E-Commerce</h1>
                    <p class="text-lg mb-6">Ini adalah halaman utama aplikasi e-commerce kami. Klik produk untuk melihat detail lengkap.</p>

                    <div class="mb-6">
                        <a href="{{ route('product.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Lihat Semua Produk
                        </a>
                    </div>

                    @if($products->isEmpty())
                        <div class="rounded-xl border border-dashed border-gray-300 p-6 text-center text-gray-500">
                            Belum ada produk tersedia.
                        </div>
                    @else
                        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                            @foreach($products as $product)
                                <a href="{{ route('product.show', $product->id) }}" class="block overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                    <div class="h-48 bg-gray-100">
                                        @if($product->image)
                                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover" />
                                        @else
                                            <div class="flex h-full items-center justify-center text-sm text-gray-500">No Image</div>
                                        @endif
                                    </div>
                                    <div class="p-5">
                                        <div class="flex items-center justify-between mb-3">
                                            <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                            <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">
                                                {{ $product->category->name ?? 'No Category' }}
                                            </span>
                                        </div>

                                        <p class="text-sm text-gray-600 line-clamp-3">{{ $product->description }}</p>

                                        <div class="mt-4 flex items-center justify-between text-sm text-gray-700">
                                            <span>Stok: {{ $product->stock }}</span>
                                            <span class="font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
