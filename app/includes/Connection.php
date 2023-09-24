<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio. 

define("SERVER", "localhost");
define("DATABASE", "dbs_blog");
define("USERNAME", "root");
define("PASSWORD", "");


$db = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

if (mysqli_connect_error()) {
  die("Falló la conexión: " . mysqli_connect_error());
}
