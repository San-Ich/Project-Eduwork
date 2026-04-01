<?php
require_once __DIR__ . '/../../koneksi.php';
require_once __DIR__ . '/../../components/template.php';

$title = 'Product List';

$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $query);

ob_start();
?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Produk</h1>
        <a href="create.php" class="btn btn-primary">Tambah Produk</a>
    </div>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td>Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($row['category']); ?></td>
                            <td><?php echo htmlspecialchars($row['stock']); ?></td>
                            <td>
                                <?php if (!empty($row['image'])): ?>
                                    <img src="<?= '../../' . htmlspecialchars($row['image']) ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" style="max-width: 80px; max-height: 80px; object-fit: cover;" />
                                <?php else: ?>
                                    <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">Tidak ada produk yang tersedia. Silakan tambahkan data produk baru.</div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
render_template($title, $content, 'home', '../../');
