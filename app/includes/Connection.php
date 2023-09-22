<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio. 

$server = "localhost";
$database = "dbs_blog";
$username = "root";
$password = "";
$db = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_error()) {
  die("Falló la conexión: " . mysqli_connect_error());
}
