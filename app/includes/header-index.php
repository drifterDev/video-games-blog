<!-- 
Autor: Mateo Álvarez Murillo
Fecha de creación: 2023

Este código se proporciona bajo la Licencia MIT.
Para más información, consulta el archivo LICENSE en la raíz del repositorio. 
-->
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
      <?php
      $categories = getCategories($db);
      if (mysqli_num_rows($categories) > 0) :
        while ($category = mysqli_fetch_assoc($categories)) :
      ?>
          <li>
            <a href="categories/get-category.php?id=<?= $category["id"] ?>"><?= $category["nombre"] ?></a>
          </li>
      <?php
        endwhile;
      endif; ?>
    </ul>
  </nav>
</header>