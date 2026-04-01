<?php
require_once 'koneksi.php';

$name = $_POST['product_name'] ?? '';
$price = $_POST['price'] ?? '';
$description = $_POST['description'] ?? '';
$category = $_POST['category'] ?? '';
$stock = $_POST['stock'] ?? '';

$imagePath = '';

if (!empty($_FILES['product_image']['name'])) {
    $uploadsDir = __DIR__ . '/uploads';

    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0755, true);
    }

    $tmpName = $_FILES['product_image']['tmp_name'];
    $originalName = basename($_FILES['product_image']['name']);
    $ext = pathinfo($originalName, PATHINFO_EXTENSION);
    $safeName = uniqid('prod_', true) . '.' . $ext;
    $destination = $uploadsDir . '/' . $safeName;

    if (move_uploaded_file($tmpName, $destination)) {
        $imagePath = 'uploads/' . $safeName;
    } else {
        echo "<script>alert('Gagal mengunggah gambar.'); window.history.back();</script>";
        exit;
    }
}

if (empty($name) || empty($price) || empty($description) || empty($category) || empty($stock) || empty($imagePath)) {
    echo "<script>alert('Semua data harus diisi termasuk gambar.'); window.history.back();</script>";
    exit;
}

// Simpan data ke database
$sql = "INSERT INTO products (name, price, description, category, stock, image) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sdssis', $name, $price, $description, $category, $stock, $imagePath);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Data Saved Successfully'); window.location.href='home.php';</script>";
} else {
    echo "<script>alert('Gagal menyimpan data: " . mysqli_error($conn) . "'); window.history.back();</script>";
}
?>