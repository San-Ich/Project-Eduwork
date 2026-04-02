<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        return view('products');
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('tambah_produk');
    }

    // Menyimpan data produk
    public function store(Request $request)
    {
        // ambil data dari form
        $nama = $request->nama_produk;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;

        // sementara tampilkan saja
        return "Produk berhasil ditambahkan: " . $nama;
    }

    // Menampilkan detail produk
    public function show($id)
    {
        return "Detail produk ID: " . $id;
    }

    // Menampilkan form edit
    public function edit($id)
    {
        return "Form edit produk ID: " . $id;
    }

    // Update data produk
    public function update(Request $request, $id)
    {
        return "Produk ID $id berhasil diupdate";
    }

    // Hapus produk
    public function destroy($id)
    {
        return "Produk ID $id berhasil dihapus";
    }
}