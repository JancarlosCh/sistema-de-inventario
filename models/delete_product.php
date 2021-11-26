<?php
require_once '../models/database.php';
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $query = "DELETE FROM products WHERE product_id='$product_id'";
    $result = $connection->query($query);

    if (!isset($_SESSION['deleted'])) {
        $_SESSION['deleted'] = true;
    }

    header('location: ../views/products.php');
    exit();
}
?>
