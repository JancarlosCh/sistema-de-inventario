<?php 
require_once '../models/database.php';
session_start();

if (isset($_POST['registrar'])) {
    $insert = "INSERT INTO products (product_id, product_name, product_description, price, stock, category_id, provider_id, state) ";

    $product_id = random_int(1000, 90000);
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $category_id = $_POST["category"];
    $provider_id = $_POST["provider"];

    ($stock > 0) ? $state = true : $state = false;

    $values = "VALUES ('$product_id', '$product_name', '$product_description', '$price', '$stock', '$category_id', '$provider_id', '$state')";

    $query = $insert . $values;
    $result = $connection->query($query);

    if (!isset($_SESSION["registered"])) {

      $_SESSION["registered"] = false;

      if ($connection->affected_rows > 0) {
        $_SESSION["registered"] = true;
      }   
    }

    header('location: ../views/new_product.php');
    exit();
}

if (isset($_POST['cancelar'])) {
    header('location: ../views/products.php');
    exit();
}
?>