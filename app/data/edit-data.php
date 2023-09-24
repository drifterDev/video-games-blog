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
      <h1 class="text-2xl md:text-3xl font-bold mb-4">Actualiza tu información personal</h1>
      <p class="mb-5">En esta sección de la página web podrás actualizar tu información personal en cualquier momento.</p>
      <form action="edit.php" method="POST">
        <div class="flex w-full flex-col">
          <div class="w-64">
            <?php if (isset($_SESSION["Dcomplete"])) : ?>
              <div class="alerta alerta-exito">
                <?= $_SESSION["Dcomplete"] ?>
              </div>
            <?php endif ?>
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Dgeneral") : "" ?>
          </div>
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Dname") : "" ?>
          </div>
          <label for="name" class="w-full block mb-1 md:mb-2">Nuevo nombre</label>
          <input type="text" id="name" name="name" class=" px-2 py-1 inline w-64 mb-2 md:mb-5 border-2 border-gray-600 rounded" value="<?= $_SESSION["user"]["nombre"] ?>">
        </div>
        <div class="w-full flex flex-col">
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Dsurnames") : "" ?>
          </div>
          <label for="surnames" class="w-full block mb-1 md:mb-2">Nuevos apellidos</label>
          <input type="text" id="surnames" name="surnames" class=" px-2 py-1 inline w-64 mb-2 md:mb-5 border-2 border-gray-600 rounded" value="<?= $_SESSION["user"]["apellidos"] ?>">
        </div>
        <div class="w-full flex flex-col">
          <div class="w-64">
            <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "Demail") : "" ?>
          </div>
          <label for="email" class="w-full block mb-1 md:mb-2">Nuevo correo</label>
          <input type="text" id="email" name="email" class=" px-2 py-1 inline w-64 mb-2 md:mb-5 border-2 border-gray-600 rounded" value="<?= $_SESSION["user"]["email"] ?>">
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