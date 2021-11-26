<?php
  require_once '../models/database.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/plugins/sweetalert2/dist/sweetalert2.min.css">
    <title>Productos</title>
  </head>
  <body>
    <header>
      <a href="new_product.php" class="btn-new btn-primary">Nuevo</a>
    </header>
    <main>
      <table>
        <caption>Lista de productos</caption>
        <thead>
          <th>id</th>
          <th>nombre</th>
          <th>descripción</th>
          <th>precio</th>
          <th>cantidad</th>
          <th>categoría</th>
          <th>proveedor</th>
          <th>acción</th>
        </thead>
        <tbody>
          <?php
              $select = "SELECT product_id, product_name, product_description AS description, price, stock, category_name, provider_name FROM products ";
              $inner_join_1 = "INNER JOIN categories ON products.category_id = categories.category_id ";
              $inner_join_2 = "INNER JOIN providers ON products.provider_id = providers.provider_id";

              $result = $connection->query($select . $inner_join_1 . $inner_join_2);

              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>" .  $row['product_id'] . "</td>";
                  echo "<td>" .  $row['product_name'] . "</td>";
                  echo "<td>" .  $row['description'] . "</td>";
                  echo "<td>" .  number_format($row['price'], 0,",", ".") . "</td>";
                  echo "<td>" .  $row['stock'] . "</td>";
                  echo "<td>" .  $row['category_name'] . "</td>";
                  echo "<td>" .  $row['provider_name'] . "</td>";
                  echo "<td>";
                  echo '<a href="./update_product.php?id=' . $row['product_id'] . '" class="btn-update btn-warning" id="update">Editar</a>';
                  echo '<a href="../models/delete_product.php?id=' . $row['product_id'] . '" class="btn-delete btn-danger" id="delete">Eliminar</a>';
                  echo "</td>";
                  echo "</tr>";
                }
              } 
            ?>
        </tbody>
      </table>
  </body>
  <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="../assets/js/alerts.js"></script> 
  <?php 
    if (isset($_SESSION["deleted"]) && $_SESSION["deleted"] == true) {
      echo '<script type="text/javascript">window.onload = function(){deleted();}</script>';
      unset($_SESSION["deleted"]);
    }

    if (isset($_SESSION["updated"]) && $_SESSION["updated"] == true) {
      echo '<script type="text/javascript">window.onload = function(){updated();}</script>';
      unset($_SESSION["updated"]);
    }
  ?>
</html
