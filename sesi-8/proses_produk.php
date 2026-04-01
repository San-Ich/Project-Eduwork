<?php
$name = $_POST['product_name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$stock = $_POST['stock'];


if(empty($name) || empty($price) || empty($description) || empty($category) || empty($stock)){

    echo "Data cannot be empty!";

}else{

    echo "<script>alert('Data Saved Successfully');</script>";

}
if(isset($_POST['simpan'])){
}
?>