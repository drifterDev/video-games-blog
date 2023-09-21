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
    <main id="main" class="w-full m-5 lg:my-8 lg:ml-8 lg:w-[66%] md:w-[62%] p-5 md:p-8 bg-white">
      <?php
      $post = getPost($db, $_GET["id"]);
      if (!isset($post)) {
        header("Location: index.php");
        exit();
      }
      ?>
      <h1 class="text-2xl md:text-3xl font-bold mb-4"> <?= $post["titulo"] ?></h1>
      <article class="post">
        <a href="get-category.php?id=<?= $post["categoria_id"] ?>">
          <?= $post["categoria"] ?>
        </a>
        <span><?= $post["fecha"] ?></span>
        <p><?= $post["descripcion"] ?></p>
        <div class="flex justify-center">
          <img src="assets/img/post.jpg" alt="Imagen del post" class="w-full max-w-2xl rounded">
        </div>
      </article>
    </main>
    <?php require_once("includes/rigth-bar.php") ?>
  </div>
  <?php require_once("includes/footer.php") ?>
</body>

</html>