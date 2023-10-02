<!-- 
Autor: Mateo Álvarez Murillo
Fecha de creación: 2023

Este código se proporciona bajo la Licencia MIT.
Para más información, consulta el archivo LICENSE en la raíz del repositorio. 
-->

<?php if (!isset($_SESSION)) session_start() ?>
<?php require_once("../includes/redirect.php") ?>
<?php require_once("../includes/Connection.php") ?>
<?php require_once("../includes/helpers.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog de videojuegos</title>
  <link rel="stylesheet" href="../assets/css/output.css">
</head>

<body class="bg-[url('../img/cubes.png')]">

  <?php require_once("../includes/header.php") ?>
  <div id="container" class="flex flex-wrap">
    <!-- Caja principal -->
    <main id="main" class="w-full m-5 lg:my-8 lg:ml-8 lg:w-[66%] md:w-[62%] p-5 md:p-8 bg-white">
      <h1 class="text-2xl md:text-3xl font-bold mb-4">Crea nuevas entradas</h1>
      <p class="mb-5">Añade nuevas entradas para el blog de videojuegos, para que los otros usuarios puedan leer y disfrutar de ellas.</p>
      <form action="create.php?val=create" method="POST">
        <div class="flex w-full flex-col">
          <div class="w-64">
            <?php if (isset($_SESSION["Pcomplete"])) : ?>
              <div class="alerta alerta-exito">
                <?= $_SESSION["Pcomplete"] ?>
              </div>
            <?php endif ?>
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Pgeneral") : "" ?>
          </div>
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Ptitle") : "" ?>
          </div>
          <label for="title" class="w-full block mb-1 md:mb-2">Título</label>
          <input type="text" id="title" name="title" class=" px-2 py-1 inline w-full max-w-xl mb-2 md:mb-5 border-2 border-gray-600 rounded">
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Pdescription") : "" ?>
          </div>
          <label for="description" class="w-full block mb-1 md:mb-2">Descripción</label>
          <textarea name="description" id="description" cols="20" rows="5" class=" px-2 py-1 inline w-full max-w-xl mb-2 md:mb-5 border-2 border-gray-600 rounded"></textarea>
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Pcategory") : "" ?>
          </div>
          <label for="category" class="w-full block mb-1 md:mb-2">Categoría</label>
          <select name="category" id="category" class=" px-2 py-1 inline w-64 mb-2 md:mb-5 border-2 border-gray-600 rounded">
            <?php
            $categories = getCategories($db);
            if (mysqli_num_rows($categories) > 0) :
              while ($category = mysqli_fetch_assoc($categories)) :
            ?>
                <option value="<?= $category["id"] ?>"><?= $category["nombre"] ?></option>
            <?php
              endwhile;
            endif; ?>
          </select>
        </div>
        <div class="w-full flex">
          <input type="submit" value="Guardar" class="boton boton-azul">
        </div>
      </form>

    </main>
    <?php require_once("../includes/right-bar.php") ?>
  </div>
  <?php require_once("../includes/footer.php") ?>
</body>

</html>