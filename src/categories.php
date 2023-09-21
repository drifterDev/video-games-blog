<!-- 
Autor: Mateo Álvarez Murillo
Fecha de creación: 2023

Este código se proporciona bajo la Licencia MIT.
Para más información, consulta el archivo LICENSE en la raíz del repositorio. 
-->

<?php if (!isset($_SESSION)) session_start() ?>
<?php require_once("includes/redirect.php") ?>
<?php require_once("includes/Connection.php") ?>
<?php require_once("includes/helpers.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog de videojuegos</title>
  <link rel="stylesheet" href="../dist/output.css">
</head>

<body class="bg-[url('../assets/img/cubes.png')]">

  <?php require_once("includes/header.php") ?>
  <div id="container" class="flex flex-wrap">
    <!-- Caja principal -->
    <main id="main" class="w-full m-5 lg:mt-8 lg:ml-8 lg:w-[66%] md:w-[62%] p-5 md:p-8 bg-white">
      <h1 class="text-2xl md:text-3xl font-bold mb-4">Crea nuevas categorías</h1>
      <p class="mb-5">Añade nuevas categorías para el blog de videojuegos y para que los otros usuarios puedan crear sus entradas en base a las nuevas categorías creadas.</p>
      <form action="save-category.php" method="POST">
        <div class="w-64">
          <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "general") : "" ?>
        </div>
        <div class="w-64">
          <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "category") : "" ?>
        </div>
        <div class="flex w-full flex-col">
          <label for="name" class="w-full block mb-1 md:mb-2">Nombre</label>
          <input type="text" id="name" name="name" class=" px-2 py-1 inline w-64 mb-2 md:mb-5 border-2 border-gray-600 rounded">
        </div>
        <div class="w-full flex">
          <input type="submit" value="Guardar" class="boton boton-azul">
        </div>
      </form>

    </main>
    <?php require_once("includes/rigth-bar.php") ?>
  </div>
  <?php require_once("includes/footer.php") ?>
</body>

</html>