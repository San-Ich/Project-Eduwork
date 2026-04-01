<?php
require_once __DIR__ . '/../../koneksi.php';
require_once __DIR__ . '/../../components/template.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: read.php');
    exit;
}

$id = intval($_GET['id']);

// Ambil data produk
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    echo "<script>alert('Produk tidak ditemukan.');window.location.href='read.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['product_name']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $stock = intval($_POST['stock']);
    $imagePath = $product['image'];

    if (!empty($_FILES['product_image']['name'])) {
        $uploadsDir = __DIR__ . '/../../uploads';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
        }

        $tmpName = $_FILES['product_image']['tmp_name'];
        $originalName = basename($_FILES['product_image']['name']);
        $ext = pathinfo($originalName, PATHINFO_EXTENSION);
        $safeName = uniqid('prod_', true) . '.' . $ext;
        $destination = $uploadsDir . '/' . $safeName;

        if (move_uploaded_file($tmpName, $destination)) {
            if (!empty($imagePath) && file_exists(__DIR__ . '/../../' . $imagePath)) {
                @unlink(__DIR__ . '/../../' . $imagePath);
            }
            $imagePath = 'uploads/' . $safeName;
        } else {
            echo "<script>alert('Gagal mengunggah gambar.');</script>";
        }
    }

    if (empty($name) || empty($price) || empty($description) || empty($category) || empty($stock)) {
        echo "<script>alert('Semua field wajib diisi.');</script>";
    } else {
        $updateSql = "UPDATE products SET name = ?, price = ?, description = ?, category = ?, stock = ?, image = ? WHERE id = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($updateStmt, 'ssdsssi', $name, $price, $description, $category, $stock, $imagePath, $id);

        if (mysqli_stmt_execute($updateStmt)) {
            echo "<script>alert('Produk berhasil diperbarui.');window.location.href='read.php';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal update produk.');</script>";
        }
    }
}

$title = 'Edit Product';
ob_start();
?>

<div class="container mt-4">
    <div class="row col-md-6 mx-auto">
        <h1 class="mb-5">Edit Product</h1>
        <form action="update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="electronics" <?php echo $product['category'] === 'electronics' ? 'selected' : ''; ?>>Electronics</option>
                    <option value="fashion" <?php echo $product['category'] === 'fashion' ? 'selected' : ''; ?>>Fashion</option>
                    <option value="home" <?php echo $product['category'] === 'home' ? 'selected' : ''; ?>>Home</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock Quantity</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*">
                <?php if (!empty($product['image'])): ?>
                    <img src="<?php echo '../../' . htmlspecialchars($product['image']); ?>" alt="product" class="img-thumbnail mt-2" style="max-width: 120px;" />
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="read.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
render_template($title, $content, 'home', '../../');
