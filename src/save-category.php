<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

require_once("includes/Connection.php");
if (!isset($_SESSION)) session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"] ?? '';
  if (!empty($name) && !is_numeric($name)) {
    $sql = "INSERT INTO categorias (nombre) VALUES (?)";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "s", $name);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
  }
}

header("Location: index.php");
