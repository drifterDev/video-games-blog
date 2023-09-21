<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

require_once("includes/Connection.php");
if (!isset($_SESSION)) session_start();
$errors = array();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"] ?? '';
  if (!empty($name) && !is_numeric($name)) {
    $sql = "INSERT INTO categorias (nombre) VALUES (?)";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      try {
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["Ccomplete"] = "Nueva categoría creada.";
        // header("Location: index.php");
      } catch (\Throwable $th) {
        $errors["Cgeneral"] = "Error al ingresar la categoria";
      }
    }
  } else {
    $errors["Ccategory"] = "La categoría no es válida.";
  }
}
$_SESSION["errors"] = $errors;
header("Location: categories.php");
