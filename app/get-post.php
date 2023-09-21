<!-- 
Autor: Mateo Álvarez Murillo
Fecha de creación: 2023

Este código se proporciona bajo la Licencia MIT.
Para más información, consulta el archivo LICENSE en la raíz del repositorio. 
-->

<?php require_once("includes/Connection.php") ?>
<?php require_once("includes/helpers.php") ?>
<?php if (!isset($_SESSION)) session_start() ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog de videojuegos</title>
  <link rel="stylesheet" type="text/css" href="assets/css/output.css">
</head>

<body class="bg-[url('../img/cubes.png')]">

  <?php require_once("includes/header.php") ?>
  <div id="container" class="flex flex-wrap">
    <!-- Caja principal -->
    <main id="main" class="w-full m-5 lg:mt-8 lg:ml-8 lg:w-[66%] md:w-[62%] p-5 md:p-8 bg-white">
      <?php
      $category = getCategory($db, $_GET["id"]);
      if (empty($category) || !isset($category["id"])) {
        header("Location: index.php");
        exit();
      }
      ?>
      <h1 class="text-2xl md:text-3xl font-bold mb-4">Entradas de <?= $category["nombre"] ?></h1>

      <?php
      $posts = getPosts($db, false, $category["id"]);
      if ($posts instanceof mysqli_result && mysqli_num_rows($posts) > 0) :
        while ($post = mysqli_fetch_assoc($posts)) :
      ?>
          <article class="entrada">
            <h2>
              <a href="get-post?id=<?= $post["id"] ?>">
                <?= $post["titulo"] ?>
              </a>
            </h2>
            <span><?= $post["categoria"] . " | " . $post["fecha"] ?></span>
            <p><?= $post["descripcion"] ?></p>
          </article>
      <?php
        endwhile;
      endif;
      ?>
      <div class="w-64">
        <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "getPost") : "" ?>
      </div>
    </main>
    <?php require_once("includes/rigth-bar.php") ?>
  </div>
  <?php require_once("includes/footer.php") ?>
</body>

</html>