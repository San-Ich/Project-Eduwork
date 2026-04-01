<?php
include "koneksi.php";

// cek apakah ada filter kategori
if(isset($_GET['category'])){
    $category = $_GET['category'];
    $query = "SELECT * FROM products WHERE category='$category'";
}else{
    $query = "SELECT * FROM products";
}

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Commerce</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">My Products</h2>

<!-- FILTER KATEGORI -->
<div class="text-center mb-4">

<a href="index.php" class="btn btn-outline-primary">All</a>

<a href="index.php?category=electronics" class="btn btn-outline-primary">
Electronics
</a>

<a href="index.php?category=fashion" class="btn btn-outline-primary">
Fashion
</a>

<a href="index.php?category=home" class="btn btn-outline-primary">
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

</div>

</div>

</div>

<?php
}
?>

</div>

</div>

</body>
</html>