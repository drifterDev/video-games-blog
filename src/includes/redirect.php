<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

if (!isset($_SESSION)) session_start();

if (!isset($_SESSION["user"])) {
  header("Locartion: index.php");
}
