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
    <form action="sign-up.php" class="formulario flex flex-col" method="POST">
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