<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio. 

define("SERVER", "localhost");
define("DATABASE", "nombre_de_la_base_de_datos");
define("USERNAME", "tu_usuario");
define("PASSWORD", "tu_contraseña");


$db = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

if (mysqli_connect_error()) {
  die("Falló la conexión: " . mysqli_connect_error());
}
