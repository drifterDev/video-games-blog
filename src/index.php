<?php require_once("includes/Connection.php") ?>
<?php if (!isset($_SESSION)) session_start() ?>

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
      <h1 class="text-2xl md:text-3xl font-bold mb-4">Ultimas entradas</h1>
      <article class="entrada">
        <h2>Título de la entrada</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi vel rem hic illo fuga nulla? Sunt vitae ad consequatur neque.</p>
      </article>
      <article class="entrada">
        <h2>Título de la entrada</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi vel rem hic illo fuga nulla? Sunt vitae ad consequatur neque.</p>
      </article>
      <article class="entrada">
        <h2>Título de la entrada</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi vel rem hic illo fuga nulla? Sunt vitae ad consequatur neque.</p>
      </article>
      <article class="entrada">
        <h2>Título de la entrada</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi vel rem hic illo fuga nulla? Sunt vitae ad consequatur neque.</p>
      </article>
      <article class="entrada">
        <h2>Título de la entrada</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi vel rem hic illo fuga nulla? Sunt vitae ad consequatur neque.</p>
      </article>
      <article class="entrada">
        <h2>Título de la entrada</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi vel rem hic illo fuga nulla? Sunt vitae ad consequatur neque.</p>
      </article>
      <div class="w-full flex justify-center">
        <a href="index.php" class="boton text-lg font-bold">Ver todas las entradas</a>

      </div>
    </main>
    <?php require_once("includes/rigth-bar.php") ?>
  </div>
  <?php require_once("includes/footer.php") ?>
</body>

</html>