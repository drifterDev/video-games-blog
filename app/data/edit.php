<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

if (!isset($_SESSION)) session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  require_once("../includes/Connection.php");
  $name = mysqli_real_escape_string($db, $_POST["name"]) ?? false;
  $surnames = mysqli_real_escape_string($db, $_POST["surnames"]) ?? false;
  $email = mysqli_real_escape_string($db, trim($_POST["email"])) ?? false;

  $errors = array();
  if (empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)) {
    $errors["Dname"] = "Nombre ingresado no es valido.";
  }
  if (empty($surnames) || is_numeric($surnames) || preg_match("/[0-9]/", $surnames)) {
    $errors["Dsurnames"] = "Apellidos ingresados no son validos.";
  }
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["Demail"] = "Correo ingresado no es valido.";
  }

  if (count($errors) == 0) {
    $sql = "UPDATE usuarios SET nombre =?,apellidos = ?,email=? WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "sssi", $name, $surnames, $email, $_SESSION["user"]["id"]);
      try {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["Dcomplete"] = "Actualización de datos exitosa.";
        $_SESSION["user"]["email"] = $email;
        $_SESSION["user"]["nombre"] = $name;
        $_SESSION["user"]["apellidos"] = $surnames;
      } catch (\Throwable $th) {
        $errors["Dgeneral"] = "Error al actualizar los datos.";
        mysqli_stmt_close($stmt);
      }
    }
  }
  $_SESSION["errors"] = $errors;
}
header("Location: edit-data.php");
exit();
