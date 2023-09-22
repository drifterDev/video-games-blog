<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

if (!isset($_SESSION)) session_start();
if (isset($_SESSION["user"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["category"])) {
  require_once("../includes/Connection.php");
  $title = mysqli_real_escape_string($db, $_POST["title"]) ?? '';
  $description = mysqli_real_escape_string($db, $_POST["description"]) ?? '';
  $category = (int)$_POST["category"] ?? '';
  $user = $_SESSION["user"]["id"];

  $errors = array();
  if (empty($title)) {
    $errors["Ptitle"] = "El título no es válido.";
    $errors["Etitle"] = "El título no es válido.";
  }
  if (empty($description)) {
    $errors["Pdescription"] = "La descripción no es válido.";
    $errors["Edescription"] = "La descripción no es válido.";
  }
  if (empty($category) && !is_numeric($category)) {
    $errors["Pcategory"] = "La categoría no es válida.";
    $errors["Ecategory"] = "La categoría no es válida.";
  }

  if (count($errors) == 0 && $_GET["val"] == "create") {
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
  } else if (count($errors) == 0 && $_GET["val"] == "edit" && isset($_GET["id"])) {
    $sql = "UPDATE entradas SET categoria_id=?, titulo=?, descripcion=?, fecha=CURDATE() WHERE id=? AND usuario_id=?";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "issii", $category, $title, $description, $_GET["id"], $user);
      try {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["Ecomplete"] = "Entrada actualizada.";
      } catch (\Throwable $th) {
        $errors["Egeneral"] = "Error al actualizar la entrada.";
        mysqli_stmt_close($stmt);
      }
    }
  }
  $_SESSION["errors"] = $errors;
}
if (isset($_GET["val"]) && $_GET["val"] == "edit") {
  header("Location: ../edit-post.php?id=" . $_GET["id"]);
} else {
  header("Location: ../posts.php");
}
exit();
