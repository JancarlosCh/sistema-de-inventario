<?php
require_once '../models/database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/plugins/sweetalert2/dist/sweetalert2.min.css">
    <title>Nuevo producto</title>
  </head>
  <body>
    <main class="main_content">
      <form action="../models/add_product.php" method="POST" class="new_product">
        <div class="row">
           <div class="item">
            <label for="product_name">Nombre</label>
            <input type="text" name="product_name" id="product_name"/>
          </div>
          <div class="item">
            <label for="price">Precio</label>
            <input type="text" name="price" id="price">
          </div>
        </div>
        <div class="row">
          <div class="item">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock">
          </div>
            <div class="item">
              <label for="provider">Proveedor</label>
              <select name="provider" id="provider" class="options">
                <option value="0">Seleccionar</option>
                <?php 
                  $result = $connection->query("SELECT provider_id, provider_name FROM providers");

                  while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row["provider_id"] . '">' . $row["provider_name"] .'</option>';
                  }
                ?>
              </select>
            </div>
        </div>
        <div class="row">
          <div class="item">
            <label for="category">Categoría</label>
            <select name="category" id="category" class="options">
              <option value="0">Seleccionar</option>
              <?php 
                $result = $connection->query("SELECT category_id, category_name from categories");

                while ($row = mysqli_fetch_array($result)) {
                  echo '<option value="' . $row["category_id"] . '">' . $row["category_name"] .'</option>';
                }
              ?>
            </select
          </div>
        </div>
        <div class="row product_description">
          <div class="product_description">
            <textarea name="product_description" id="product_description" cols="70" rows="10">Descripción</textarea>
          </div>
        </div>
        <div class="row">
          <input type="submit" value="Cancelar" name="cancelar" class="btn btn-danger " id="cancel">
          <input type="submit" value="Registrar" name="registrar" class="btn btn-primary" id="register">
        </div>
      </form>
    </main>
  </body>
  <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="../assets/js/alerts.js"></script> 
  <?php 
    if (isset($_SESSION["registered"]) && $_SESSION["registered"] == true) {
      echo '<script type="text/javascript">window.onload = function(){registered();}</script>';
      unset($_SESSION["registered"]);
    }

    if (isset($_SESSION["registered"]) && $_SESSION["registered"] == false) {
      echo '<script type="text/javascript">window.onload = function(){unregistered();}</script>';
      unset($_SESSION["registered"]);
    }
  ?>
</html>
