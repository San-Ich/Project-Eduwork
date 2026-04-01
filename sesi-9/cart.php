<?php
session_start();
require_once 'koneksi.php';
require_once 'components/template.php';

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $product_id = intval($_POST['product_id'] ?? 0);

    if ($action === 'add' && $product_id > 0) {
        // Ambil data produk
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $product_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);

        if ($product) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += 1;
            } else {
                $_SESSION['cart'][$product_id] = [
                    'product' => $product,
                    'quantity' => 1
                ];
            }
        }
    } elseif ($action === 'update' && $product_id > 0) {
        $quantity = intval($_POST['quantity'] ?? 0);
        if ($quantity > 0) {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$product_id]);
        }
    } elseif ($action === 'remove' && $product_id > 0) {
        unset($_SESSION['cart'][$product_id]);
    } elseif ($action === 'clear') {
        unset($_SESSION['cart']);
    }
}

// Calculate total
$total = 0;
$cart_items = $_SESSION['cart'] ?? [];

foreach ($cart_items as $item) {
    $total += $item['product']['price'] * $item['quantity'];
}

$title = 'Shopping Cart';
ob_start();
?>

<div class="container mt-4">
    <h1 class="mb-4">Keranjang Belanja</h1>

    <?php if (empty($cart_items)): ?>
        <div class="alert alert-info">
            Keranjang Anda kosong. <a href="home.php">Lanjut Belanja</a>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $id => $item): ?>
                        <tr>
                            <td>
                                <?php if (!empty($item['product']['image'])): ?>
                                    <img src="<?php echo htmlspecialchars($item['product']['image']); ?>" alt="<?php echo htmlspecialchars($item['product']['name']); ?>" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                                <?php else: ?>
                                    <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($item['product']['name']); ?></td>
                            <td>Rp <?php echo number_format($item['product']['price'], 0, ',', '.'); ?></td>
                            <td>
                                <form method="post" class="d-inline">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="form-control d-inline" style="width: 80px;">
                                    <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                                </form>
                            </td>
                            <td>Rp <?php echo number_format($item['product']['price'] * $item['quantity'], 0, ',', '.'); ?></td>
                            <td>
                                <form method="post" class="d-inline">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus item ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <h4>Total: Rp <?php echo number_format($total, 0, ',', '.'); ?></h4>
            <div>
                <form method="post" class="d-inline">
                    <input type="hidden" name="action" value="clear">
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Kosongkan keranjang?');">Kosongkan Keranjang</button>
                </form>
                <a href="checkout.php" class="btn btn-success ms-2">Checkout</a>
            </div>
        </div>
    <?php endif; ?>

    <div class="mt-4">
        <a href="home.php" class="btn btn-primary">Lanjut Belanja</a>
    </div>
</div>

<?php
$content = ob_get_clean();
render_template($title, $content, 'home');
?>