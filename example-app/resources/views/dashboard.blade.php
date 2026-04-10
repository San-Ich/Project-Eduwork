<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Produk -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Total Produk</p>
                                <p class="text-4xl font-bold text-blue-600 mt-2">{{ $totalProducts }}</p>
                            </div>
                            <div class="bg-blue-100 rounded-full p-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10m0-10l8-4m-8 4l-8 4"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('products.index') }}" class="inline-block mt-4 text-blue-600 text-sm font-medium hover:text-blue-800">
                            Lihat Detail →
                        </a>
                    </div>
                </div>

                <!-- Total Kategori -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Total Kategori</p>
                                <p class="text-4xl font-bold text-green-600 mt-2">{{ $totalCategories }}</p>
                            </div>
                            <div class="bg-green-100 rounded-full p-4">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16h10V4M7 4H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2h-2m0 0V2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('categories.index') }}" class="inline-block mt-4 text-green-600 text-sm font-medium hover:text-green-800">
                            Lihat Detail →
                        </a>
                    </div>
                </div>

                <!-- Total Klik Produk -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Total Klik Produk</p>
                                <p class="text-4xl font-bold text-purple-600 mt-2">{{ $totalClicks }}</p>
                            </div>
                            <div class="bg-purple-100 rounded-full p-4">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-500 text-xs mt-4">Jumlah interaksi pengguna</p>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Akses Cepat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <a href="{{ route('products.index') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-blue-50 transition">
                            <p class="font-medium text-blue-600">📦 Produk</p>
                            <p class="text-sm text-gray-600">Kelola produk</p>
                        </a>
                        <a href="{{ route('categories.index') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-green-50 transition">
                            <p class="font-medium text-green-600">📂 Kategori</p>
                            <p class="text-sm text-gray-600">Kelola kategori</p>
                        </a>
                        <a href="{{ route('products.create') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-yellow-50 transition">
                            <p class="font-medium text-yellow-600">➕ Produk Baru</p>
                            <p class="text-sm text-gray-600">Tambah produk</p>
                        </a>
                        <a href="{{ route('categories.create') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-purple-50 transition">
                            <p class="font-medium text-purple-600">➕ Kategori Baru</p>
                            <p class="text-sm text-gray-600">Tambah kategori</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
