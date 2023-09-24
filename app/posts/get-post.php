<!-- 
Autor: Mateo Álvarez Murillo
Fecha de creación: 2023

Este código se proporciona bajo la Licencia MIT.
Para más información, consulta el archivo LICENSE en la raíz del repositorio. 
-->

<?php require_once("../includes/Connection.php") ?>
<?php require_once("../includes/helpers.php") ?>
<?php if (!isset($_SESSION)) session_start() ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog de videojuegos</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/output.css">
</head>

<body class="bg-[url('../img/cubes.png')]">

  <?php require_once("../includes/header.php") ?>
  <div id="container" class="flex flex-wrap">
    <!-- Caja principal -->
    <main id="main" class="w-full m-5 lg:my-8 lg:ml-8 lg:w-[66%] md:w-[62%] p-5 md:p-8 bg-white">
      <?php
      $post = getPost($db, $_GET["id"]);
      if (!isset($post)) {
        header("Location: ../index.php");
        exit();
      }
      ?>
      <h1 class="text-2xl md:text-3xl font-bold mb-4"> <?= $post["titulo"] ?></h1>
      <article class="post">
        <a class="categoria" href="../categories/get-category.php?id=<?= $post["categoria_id"] ?>">
          <?= $post["categoria"] ?>
        </a>
        <span>Creado por <?= $post["usuario"] ?> en <?= $post["fecha"] ?></span>
        <p><?= $post["descripcion"] ?></p>
        <?php if ($post["id"] % 2 == 0) : ?>
          <div class="flex justify-center mb-5">
            <img src="../assets/img/post.jpg" alt="Imagen del post" class="w-full max-w-2xl rounded">
          </div>
        <?php else : ?>
          <div class="flex justify-center mb-5">
            <img src="../assets/img/post2.jpg" alt="Imagen del post" class="w-full max-w-2xl rounded">
          </div>
        <?php endif; ?>
        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["id"] == $post["usuario_id"]) : ?>
          <div class="w-full flex justify-center flex-wrap">
            <div class="mx-5 md:w-64 flex md:justify-center">
              <a href="edit-post.php?id=<?= $post["id"] ?>" class="w-48 boton boton-amarillo">Editar entrada</a>
            </div>
            <div class="mx-5 md:w-64 flex md:justify-center">
              <a href="delete-post.php?id=<?= $post["id"] ?>" class="w-48 boton boton-rojo">Borrar entrada</a>
            </div>
          </div>
        <?php endif; ?>
      </article>
    </main>
    <?php require_once("../includes/right-bar.php") ?>
  </div>
  <?php require_once("../includes/footer.php") ?>
</body>

</html>