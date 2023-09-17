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
      <ul class="barra-navegacion">
        <li>
          <a href="index.php">Inicio</a>
        </li>
        <li>
          <a href="index.php">Categoria 1</a>
        </li>
        <li>
          <a href="index.php">Categoria 2</a>
        </li>
        <li>
          <a href="index.php">Categoria 3</a>
        </li>
        <li>
          <a href="index.php">Categoria 4</a>
        </li>
        <li>
          <a href="index.php">Sobre mí</a>
        </li>
        <li>
          <a href="index.php">Contacto</a>
        </li>
      </ul>
    </nav>
  </header>

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
    <!-- Barra lateral -->
    <aside id="sidebar" class="w-full lg:w-[28%] md:w-[32%]">
      <!-- login -->
      <div id="login" class="bg-white p-5 mx-5 mb-5 md:mt-5 lg:mt-8 flex flex-col">
        <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-5">Identificate</h3>
        <form action="login.php" class="formulario flex flex-col" method="POST">
          <div class="entrada-formulario">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
          </div>
          <div class="entrada-formulario">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" />
          </div>
          <input type="submit" class="boton" value="Entrar">
        </form>
      </div>
      <!-- register -->
      <div id="register" class="bg-white p-5 mx-5 mb-5">
        <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-5">Registrate</h3>
        <form action="register.php" class="formulario flex flex-col" method="POST">
          <div class="entrada-formulario">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">

          </div>
          <div class="entrada-formulario">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos">

          </div>
          <div class="entrada-formulario">
            <label for="email2">Email</label>
            <input type="email2" name="email2" id="email2" />

          </div>
          <div class="entrada-formulario">
            <label for="password2">Contraseña</label>
            <input type="password2" name="password2" id="password2" />

          </div>
          <input type="submit" class="boton" value="Registrarse">
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