<?php
require_once '../models/database.php';
require_once '../models/update.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/plugins/sweetalert2/dist/sweetalert2.min.css">
    <title>Nuevo producto</title>
  </head>
  <body>
    <main class="main_content">
      <form action="../models/update.php" method="POST" class="new_product">
        <input type="hidden" name="product_id" value="<?= $_GET["id"]?>">
        <div class="row">
           <div class="item">
            <label for="product_name">Nombre</label>
            <input type="text" name="product_name" id="product_name" value="<?= $row["product_name"]?>"/>
          </div>
          <div class="item">
            <label for="price">Precio</label>
            <input type="number" name="price" id="price" value="<?= $row["price"]?>">
          </div>
        </div>
        <div class="row">
          <div class="item">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?= $row["stock"]?>">
          </div>
            <div class="item">
              <label for="provider">Proveedor</label>
              <select name="provider" id="provider" class="options">
                <option value="<?= $row["provider_id"]?>"><?= $row["provider_id"]?></option>
              </select>
            </div>
        </div>
        <div class="row">
          <div class="item">
            <label for="category">Categoría</label>
            <select name="category" id="category" class="options">
              <option value="<?= $row["category_id"]?>"><?= $row["category_id"]?></option>
            </select
          </div>
        </div>
        <div class="row product_description">
          <div class="product_description">
            <textarea name="product_description" id="product_description" cols="70" rows="10"><?= $row["product_description"]?></textarea>
          </div>
        </div>
        <div class="row">
          <input type="submit" value="Cancelar" name="cancelar" class="btn btn-danger " id="cancel">
          <input type="submit" value="Guardar" name="guardar" class="btn btn-primary" id="save">
        </div>
      </form>
    </main>
  </body>
  <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
</html>