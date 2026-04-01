<?php
session_start();
require_once 'koneksi.php';
require_once 'components/template.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit;
}

$title = 'Checkout';
ob_start();
?>

<div class="container mt-4">
    <h1 class="mb-4">Checkout</h1>
    <p>Terima kasih telah berbelanja! Fitur checkout lengkap akan diimplementasikan selanjutnya.</p>
    <a href="home.php" class="btn btn-primary">Kembali ke Home</a>
</div>

<?php
$content = ob_get_clean();
render_template($title, $content, 'home');
?>