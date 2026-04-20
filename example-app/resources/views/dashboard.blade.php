<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 p-8 shadow-xl shadow-slate-200/10 text-white">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h1 class="text-3xl font-semibold">Dashboard Admin</h1>
                            <p class="mt-2 text-slate-300 max-w-2xl">Ringkasan kinerja produk dan kategori kamu. Lihat total item, interaksi pengguna, dan akses cepat untuk manajemen.</p>
                        </div>
                        <div class="rounded-3xl bg-slate-950/70 px-6 py-4 ring-1 ring-white/10">
                            <p class="text-xs uppercase tracking-[0.24em] text-slate-400">Diperbarui</p>
                            <p class="mt-2 text-2xl font-semibold">{{ now()->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-3 mb-8">
                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-slate-500">Total Produk</p>
                                <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalProducts }}</p>
                            </div>
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10m0-10l8-4m-8 4l-8 4" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-6 rounded-2xl bg-blue-50 p-4 text-blue-700">
                            <p class="text-sm">Produk yang tersedia saat ini. Tambah atau edit produk untuk meningkatkan katalog.</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-slate-500">Total Kategori</p>
                                <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalCategories }}</p>
                            </div>
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16h10V4M7 4H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2h-2m0 0V2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-6 rounded-2xl bg-emerald-50 p-4 text-emerald-700">
                            <p class="text-sm">Jumlah kategori yang saat ini aktif untuk mengelompokkan produk.</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-slate-500">Total Klik Produk</p>
                                <p class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalClicks }}</p>
                            </div>
                            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-6 rounded-2xl bg-violet-50 p-4 text-violet-700">
                            <p class="text-sm">Total interaksi pengguna pada produk. Ideal untuk melihat engagement.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-slate-900">Akses Cepat</h3>
                        <p class="mt-2 text-sm text-slate-500">Kelola produk dan kategori dari satu tempat dengan cepat.</p>
                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            <a href="{{ route('product.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-50 p-5 transition hover:border-slate-300 hover:bg-slate-100">
                                <p class="text-sm font-semibold text-slate-900">📦 Produk</p>
                                <p class="mt-2 text-sm text-slate-500">Lihat dan edit daftar produk.</p>
                            </a>
                            <a href="{{ route('product-category.index') }}" class="block rounded-3xl border border-slate-200 bg-slate-50 p-5 transition hover:border-slate-300 hover:bg-slate-100">
                                <p class="text-sm font-semibold text-slate-900">📂 Kategori</p>
                                <p class="mt-2 text-sm text-slate-500">Kelola kategori produk.</p>
                            </a>
                            <a href="{{ route('product.create') }}" class="block rounded-3xl border border-slate-200 bg-slate-50 p-5 transition hover:border-slate-300 hover:bg-slate-100">
                                <p class="text-sm font-semibold text-slate-900">➕ Produk Baru</p>
                                <p class="mt-2 text-sm text-slate-500">Tambah produk baru.</p>
                            </a>
                            <a href="{{ route('product-category.create') }}" class="block rounded-3xl border border-slate-200 bg-slate-50 p-5 transition hover:border-slate-300 hover:bg-slate-100">
                                <p class="text-sm font-semibold text-slate-900">➕ Kategori Baru</p>
                                <p class="mt-2 text-sm text-slate-500">Tambah kategori baru.</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-slate-900">Insight Cepat</h3>
                        <div class="mt-6 space-y-4">
                            <div class="rounded-3xl bg-slate-50 p-5">
                                <p class="text-sm font-semibold text-slate-900">Jumlah Produk</p>
                                <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $totalProducts }}</p>
                                <p class="mt-2 text-sm text-slate-500">Cari peluang untuk menambah katalog dengan kategori baru.</p>
                            </div>
                            <div class="rounded-3xl bg-slate-50 p-5">
                                <p class="text-sm font-semibold text-slate-900">Jumlah Kategori</p>
                                <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $totalCategories }}</p>
                                <p class="mt-2 text-sm text-slate-500">Pastikan kategori tetap relevan dengan produk Anda.</p>
                            </div>
                            <div class="rounded-3xl bg-slate-50 p-5">
                                <p class="text-sm font-semibold text-slate-900">Total Klik Produk</p>
                                <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $totalClicks }}</p>
                                <p class="mt-2 text-sm text-slate-500">Gunakan metrik ini untuk mengevaluasi minat pengguna.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
