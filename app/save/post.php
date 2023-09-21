<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

if (!isset($_SESSION)) session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  require_once("../includes/Connection.php");
  $title = mysqli_real_escape_string($db, $_POST["title"]) ?? '';
  $description = mysqli_real_escape_string($db, $_POST["description"]) ?? '';
  $category = (int)$_POST["category"] ?? '';
  $user = $_SESSION["user"]["id"];

  $errors = array();
  if (empty($title)) {
    $errors["Ptitle"] = "El título no es válido.";
  }
  if (empty($description)) {
    $errors["Pdescription"] = "La descripción no es válido.";
  }
  if (empty($category) && !is_numeric($category)) {
    $errors["Pcategory"] = "La categoría no es válida.";
  }

  if (count($errors) == 0) {
    $sql = "INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion, fecha) VALUES" .
      " (?,?,?,?,CURDATE())";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "iiss", $user, $category, $title, $description);
      try {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["Pcomplete"] = "Nueva entrada creada.";
      } catch (\Throwable $th) {
        $errors["Pgeneral"] = "Error al insertar registro.";
        mysqli_stmt_close($stmt);
      }
    }
  }
  $_SESSION["errors"] = $errors;
}
header("Location: ../posts.php");
exit();
