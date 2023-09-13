<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog videojuegos</title>
  <link rel="stylesheet" href="../dist/output.css">
</head>

<body>
  <!-- Cabecera -->
  <header id="header">
    <!-- Logo -->
    <div id="logo">
      <a href="index.php">
        Blog de videojuegos
      </a>
    </div>
    <!-- Menu -->
    <nav id="nav">
      <ul>
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

  <div id="container">
    <!-- Barra lateral -->
    <aside id="sidebar">
      <!-- login -->
      <div id="login">
        <h3>Identificate</h3>
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
        <h3>Registrate</h3>
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
    <!-- Caja principal -->
    <main id="main">
      <h1>Ultimas entradas</h1>
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
    </main>
  </div>

  <!-- Footer -->
  <footer id="footer">
    <p>Desarrollado por Mateo Álvarez &copy; 2023</p>
  </footer>
</body>

</html>