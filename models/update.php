<?php 
require_once '../models/database.php';
session_start();

$product_id = $_GET["id"];

$select = "SELECT product_name, product_description, price, stock, category_id, provider_id FROM products WHERE product_id = '$product_id'";

$result = $connection->query($select);
$row = mysqli_fetch_array($result);

if (isset($_POST['guardar'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $product_description = $_POST['product_description'];

    $category_id = $_POST["category"];
    $provider_id = $_POST["provider"];

    $update = 'UPDATE products ';
    $set = "SET product_name = '$product_name', product_description = '$product_description', price = '$price', stock = '$stock', category_id= '$category_id', provider_id='$provider_id'";
    $condition = 'WHERE product_id=' . $product_id;

    $query = $update . $set . $condition;
    $result = $connection->query($query);

    if (!isset($_SESSION["updated"])) {
      $_SESSION["updated"] = true;
    }

    header('location: ../views/products.php');
    exit();
}

if (isset($_POST['cancelar'])) {
    header('location: ../views/products.php');
    exit();
}
?>