<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog videojuegos</title>
  <link rel="stylesheet" href="../dist/output.css">
</head>

<body class="bg-[url('../assets/img/cubes.png')]">
  <!-- Cabecera -->
  <header id="header" class="bg-blue-500 text-white pt-5 pb-3 md:py-5">
    <!-- Logo -->
    <div id="logo" class="md:text-5xl text-4xl font-bold pl-5 ease-in-out duration-300  hover:text-blue-200 cursor-pointer">
      <a href="index.php">
        Blog de videojuegos
      </a>
    </div>

    <!-- Menu -->
    <nav id="nav" class="w-full px-5 mt-5">
      <ul class="flex flex-wrap border-t-2 pt-3 md:pt-5">
        <li class="text-sm md:text-base p-2 md:p-3 hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out">
          <a href="index.php">Inicio</a>
        </li>
        <li class="text-sm md:text-base p-2 md:p-3 hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out">
          <a href="index.php">Categoria 1</a>
        </li>
        <li class="text-sm md:text-base p-2 md:p-3 hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out">
          <a href="index.php">Categoria 2</a>
        </li>
        <li class="text-sm md:text-base p-2 md:p-3 hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out">
          <a href="index.php">Categoria 3</a>
        </li>
        <li class="text-sm md:text-base p-2 md:p-3 hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out">
          <a href="index.php">Categoria 4</a>
        </li>
        <li class="text-sm md:text-base p-2 md:p-3 hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out">
          <a href="index.php">Sobre mí</a>
        </li>
        <li class="text-sm md:text-base p-2 md:p-3 hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out">
          <a href="index.php">Contacto</a>
        </li>
      </ul>
    </nav>
  </header>

  <div id="container" class="flex">
    <!-- Caja principal -->
    <main id="main" class="w-2/3 p-4">
      <h1 class="text-3xl font-bold mb-4">Ultimas entradas</h1>
      <article class="entrada mb-6">
        <h2 class="text-2xl font-semibold">Título de la entrada</h2>
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
    </main>
    <!-- Barra lateral -->
    <aside id="sidebar" class="w-1/3 bg-gray-100 p-4">
      <!-- login -->
      <div id="login" class="mb-6">
        <h3 class="text-xl font-bold mb-2">Identificate</h3>
        <form action="login.php" method="POST">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" />

          <label for="password">Contraseña</label>
          <input type="password" name="password" id="password" />

          <input type="submit" value="Entrar">
        </form>
      </div>
      <!-- register -->
      <div id="register">
        <h3 class="text-xl font-bold mb-2">Registrate</h3>
        <form action="register.php" method="POST">
          <label for="name">Nombre</label>
          <input type="text" name="name" id="name">

          <label for="apellidos">Apellidos</label>
          <input type="text" name="apellidos" id="apellidos">

          <label for="email">Email</label>
          <input type="email" name="email" id="email" />

          <label for="password">Contraseña</label>
          <input type="password" name="password" id="password" />

          <input type="submit" value="Registrarse">
        </form>
      </div>
    </aside>

  </div>

  <!-- Footer -->
  <footer id="footer" class="text-sm md:text-base bg-blue-500 text-white text-center py-4">
    <p>Desarrollado por Mateo Álvarez Murillo &copy; 2023</p>
  </footer>
</body>

</html>