<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.


session_destroy();
if (!isset($_SESSION)) {
  session_start();
}
session_destroy();
header("Location: index.php");
