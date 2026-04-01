<?php
require_once __DIR__ . '/../../koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: read.php');
    exit;
}

$id = intval($_GET['id']);

// Ambil path gambar jika ada
$sql = "SELECT image FROM products WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);

if ($product && !empty($product['image'])) {
    $imagePath = __DIR__ . '/../../' . $product['image'];
    if (file_exists($imagePath)) {
        @unlink($imagePath);
    }
}

// Hapus data
$deleteSql = "DELETE FROM products WHERE id = ?";
$deleteStmt = mysqli_prepare($conn, $deleteSql);
mysqli_stmt_bind_param($deleteStmt, 'i', $id);

if (mysqli_stmt_execute($deleteStmt)) {
    echo "<script>alert('Produk berhasil dihapus.');window.location.href='read.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus produk.');window.location.href='read.php';</script>";
}
