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
    <main id="main" class="w-full m-5 lg:my-8 lg:ml-8 lg:w-[66%] lg:min-h-[500px] md:w-[62%] p-5 md:p-8 bg-white">
      <?php
      $post = getPost($db, $_GET["id"]);
      if (!isset($post) || $post["usuario_id"] != $_SESSION["user"]["id"]) {
        header("Location: ../index.php");
        exit();
      }
      ?>
      <h1 class="text-2xl md:text-3xl font-bold mb-4">Edita la información de tu entrada "<?= $post["titulo"] ?>"</h1>
      <p class="mb-5">En esta sección de la página web podrás editar o actualizar la información de la entrada seleccionada.</p>
      <form action="create.php?val=edit&id=<?= $post["id"] ?>" method="POST">
        <div class="flex w-full flex-col">
          <div class="w-64">
            <?php if (isset($_SESSION["Ecomplete"])) : ?>
              <div class="alerta alerta-exito">
                <?= $_SESSION["Ecomplete"] ?>
              </div>
            <?php endif ?>
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Egeneral") : "" ?>
          </div>
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Etitle") : "" ?>
          </div>
          <label for="title" class="w-full block mb-1 md:mb-2">Nuevo título</label>
          <input type="text" id="title" name="title" class=" px-2 py-1 inline w-64 mb-2 md:mb-5 border-2 border-gray-600 rounded" value="<?= $post["titulo"] ?>">
        </div>
        <div class="w-full flex flex-col">
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Edescription") : "" ?>
          </div>
          <label for="description" class="w-full block mb-1 md:mb-2">Nueva descripción</label>
          <textarea name="description" id="description" cols="20" rows="5" class=" px-2 py-1 inline w-full max-w-2xl mb-2 md:mb-5 border-2 border-gray-600 rounded"><?= $post["descripcion"] ?></textarea>
        </div>
        <div class="w-full flex flex-col">
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Ecategory") : "" ?>
          </div>
          <label for="category" class="w-full block mb-1 md:mb-2">Nueva categoría</label>
          <select name="category" id="category" class=" px-2 py-1 inline w-64 mb-2 md:mb-5 border-2 border-gray-600 rounded">
            <?php
            $categories = getCategories($db);
            if (mysqli_num_rows($categories) > 0) :
              while ($category = mysqli_fetch_assoc($categories)) :
            ?>
                <?php if ($category["id"] == $post["categoria_id"]) : ?>
                  <option selected value="<?= $category["id"] ?>"><?= $category["nombre"] ?></option>
                <?php else : ?>
                  <option value="<?= $category["id"] ?>"><?= $category["nombre"] ?></option>
                <?php endif; ?>
            <?php
              endwhile;
            endif; ?>
          </select>
        </div>
        <input type="submit" value="Guardar" class="boton boton-azul">
      </form>
    </main>
    <?php require_once("../includes/right-bar.php") ?>
  </div>
  <?php require_once("../includes/footer.php") ?>
  <?php delete_errors() ?>
</body>

</html>