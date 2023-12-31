<!-- 
Autor: Mateo Álvarez Murillo
Fecha de creación: 2023

Este código se proporciona bajo la Licencia MIT.
Para más información, consulta el archivo LICENSE en la raíz del repositorio. 
-->


<!-- Barra lateral -->
<aside id="sidebar" class="w-full lg:w-[28%] md:w-[32%]">
  <!-- Account -->
  <?php if (isset($_SESSION["user"])) : ?>
    <div class="bg-white p-5 mx-5 mb-5 md:mt-5 lg:mt-8 flex justify-center md:justify-start flex-wrap">
      <div class="w-full">
        <h3 class="ml-3 md:ml-0 text-lg md:text-xl font-bold text-center">
          <?= "¡Bienvenido, " . $_SESSION["user"]["nombre"] . " " . $_SESSION["user"]["apellidos"] . "!" ?>
        </h3>
      </div>
      <?php if (isset($_SESSION["success"])) : ?>
        <div class='alerta alerta-exito'><?= $_SESSION["success"] ?></div>
      <?php endif; ?>
      <div class="mx-3 md:mx-0 md:w-full flex md:justify-center">
        <a href="posts/create-post.php" class="w-48 boton boton-verde">Crear entradas</a>
      </div>
      <div class="mx-3 md:mx-0 md:w-full flex md:justify-center">
        <a href="categories/create-categories.php" class="w-48 boton boton-azul">Crear categorias</a>
      </div>
      <div class="mx-3 md:mx-0 md:w-full flex md:justify-center">
        <a href="data/edit-data.php" class="w-48 boton boton-amarillo">Mis datos</a>
      </div>
      <div class="mx-3 md:mx-0 md:w-full flex md:justify-center">
        <a href="login/logout.php" class="w-48 boton boton-rojo">Cerrar sesión</a>
      </div>
    </div>
  <?php endif; ?>

  <div id="buscardor" class="bg-white p-5 mx-5 mb-5 md:mt-5 lg:mt-8 flex flex-col">
    <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-5">Busca</h3>
    <form action="find.php" class="formulario flex flex-col" method="POST">
      <div class="entrada-formulario">
        <label for="value">Entrada</label>
        <input type="value" name="value" id="value" />
      </div>
      <div class="w-full flex justify-center md:justify-start">
        <input type="submit" class="boton boton-azul" value="Buscar">
      </div>
    </form>
  </div>
  <?php if (!isset($_SESSION["user"])) : ?>
    <!-- Login -->
    <div id="login" class="bg-white p-5 mx-5 mb-5 md:mt-5 lg:mt-8 flex flex-col">
      <?php if (isset($_SESSION["error_login"])) : ?>
        <h3 class="text-xl md:text-2xl font-bold mb-2">Identificate</h3>
        <div class="alerta alerta-error">
          <?= $_SESSION["error_login"] ?>
          <!-- botones -->
        </div>
      <?php else : ?>
        <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-5">Identificate</h3>
      <?php endif; ?>
      <form action="login/login.php" class="formulario flex flex-col" method="POST">
        <div class="entrada-formulario">
          <label for="email">Correo</label>
          <input type="email" name="email" id="email" />
        </div>
        <div class="entrada-formulario">
          <label for="password">Contraseña</label>
          <input type="password" name="password" id="password" />
        </div>
        <div class="w-full flex justify-center md:justify-start">
          <input type="submit" class="boton boton-azul" value="Entrar">
        </div>
      </form>
    </div>
    <!-- register -->
    <div id="register" class="bg-white p-5 mx-5 mb-5 md:mb-8">
      <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-5">Registrate</h3>
      <!-- Mostar alertas -->
      <?php if (isset($_SESSION["complete"])) : ?>
        <div class="alerta alerta-exito">
          <?= $_SESSION["complete"] ?>
        </div>
      <?php elseif (isset($_SESSION["errors"])) : ?>
        <?= show_errors($_SESSION["errors"], "general") ?>
      <?php endif; ?>
      <form action="login/sign-up.php" class="formulario flex flex-col" method="POST">
        <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "name") : "" ?>
        <div class="entrada-formulario">
          <label for="name">Nombre</label>
          <input type="text" name="name" id="name">

        </div>
        <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "surnames") : "" ?>
        <div class="entrada-formulario">
          <label for="surnames">Apellidos</label>
          <input type="text" name="surnames" id="surnames">

        </div>
        <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "email") : "" ?>
        <div class="entrada-formulario">
          <label for="email2">Correo</label>
          <input type="email2" name="email2" id="email2" />

        </div>
        <?= isset($_SESSION["errors"]) ? show_errors($_SESSION["errors"], "password") : "" ?>
        <div class="entrada-formulario">
          <label for="password2">Contraseña</label>
          <input type="password2" name="password2" id="password2" />

        </div>
        <div class="w-full flex justify-center md:justify-start">
          <input type="submit" name="submit" class="boton boton-azul" value="Registrarse">
        </div>
      </form>
      <?php delete_errors() ?>
    </div>
  <?php endif; ?>
</aside>