<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row col-md-6 mx-auto">
            <h1 class="mb-5">Form Input Product</h1>
                <!-- Form Input Product -->
                <form action="proses_produk.php" method="post">
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
                        <textarea class="form-control" name="description"  id="description" rows="3" placeholder="Enter product description" required  ></textarea>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
</body>
</html>