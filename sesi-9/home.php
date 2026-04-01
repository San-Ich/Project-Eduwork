<?php
require_once "koneksi.php";

// cek apakah ada filter kategori
if(isset($_GET['category'])){
    $category = $_GET['category'];
    $query = "SELECT * FROM products WHERE category='$category'";
}else{
    $query = "SELECT * FROM products";
}

$result = mysqli_query($conn,$query);

$title = 'E-Commerce - Home';

ob_start();
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">My Products</h2>
    <!-- FILTER KATEGORI -->
    <div class="text-center mb-4">
        <a href="home.php" class="btn btn-outline-primary">All</a>
        <a href="home.php?category=electronics" class="btn btn-outline-primary">
        Electronics
        </a>
        <a href="home.php?category=fashion" class="btn btn-outline-primary">
        Fashion
        </a>
        <a href="home.php?category=home" class="btn btn-outline-primary">
        Home
        </a>
    </div>
    <div class="row">
    <?php
    // LOOPING DATA PRODUK
    while($row = mysqli_fetch_assoc($result)){
    ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row['name']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo $row['description']; ?>
                    </p>
                    <p class="fw-bold text-primary">
                        Rp <?php echo number_format($row['price']); ?>
                    </p>
                    <span class="badge bg-secondary">
                        <?php echo $row['category']; ?>
                    </span>
                    <span class="badge bg-success">
                        <?php echo $row['stock']; ?> in stock
                    </span>
                    <form method="post" action="cart.php" class="mt-2">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
}
?>
</div>
</div>

<?php
$content = ob_get_clean();
include 'components/template.php';
?>