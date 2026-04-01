<?php
require_once __DIR__ . '/../../components/template.php';

$title = 'Add Product';
ob_start();
?>

<div class="container mt-4">
    <div class="row col-md-6 mx-auto">
        <h1 class="mb-5">Form Input Product</h1>
        <!-- Form Input Product -->
        <form action="../../proses_produk.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="name" placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Enter product price" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter product description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" name="category" id="category" required>
                    <option selected>Select category</option>
                    <option value="electronics">Electronics</option>
                    <option value="fashion">Fashion</option>
                    <option value="home">Home</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock Quantity:</label>
                <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter stock quantity" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" class="form-control" name="product_image" id="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
render_template($title, $content, 'add', '../../');
