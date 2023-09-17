<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.


if (isset($_POST)) {
  require_once("includes/Connection.php");
  if (!isset($_SESSION)) session_start();

  $name = mysqli_real_escape_string($db, $_POST["name"]) ?? false;
  $surnames = mysqli_real_escape_string($db, $_POST["surnames"]) ?? false;
  $email = mysqli_real_escape_string($db, trim($_POST["email2"])) ?? false;
  $password = mysqli_real_escape_string($db, $_POST["password2"]) ?? false;

  // Validar datos
  $errors = array();
  $valid_name = true;
  $valid_surnames = true;
  $valid_email = true;
  $valid_password = true;

  // Validar nombre
  if (empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)) {
    $valid_name = false;
    $errors["name"] = "Nombre ingresado no es valido.";
  }

  // Validar apellidos
  if (empty($surnames) || is_numeric($surnames) || preg_match("/[0-9]/", $surnames)) {
    $valid_surnames = false;
    $errors["surnames"] = "Apellidos ingresados no son validos.";
  }

  // Validar email
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $valid_email = false;
    $errors["email"] = "Correo ingresado no es valido.";
  }

  // Validar password
  if (empty($password)) {
    $valid_password = false;
    $errors["password"] = "Contraseña ingresada no es valida.";
  }

  $save_user = false;
  if (count(($errors)) == 0) {
    // Insertar nuevo registro
    $save_user = true;
    // Cifrando la contraseña 
    $secure_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, fecha_registro) VALUES (?, ?, ?, ?, CURDATE())";

    // Preparando la consulta
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ssss", $name, $surnames, $email, $secure_password);
      try {
        mysqli_stmt_execute($stmt);
        $_SESSION["complete"] = "Registro completado con éxito.";
      } catch (\Throwable $th) {
        $_SESSION["errors"]["general"] = "Error al guardar registro.";
      }
      mysqli_stmt_close($stmt);
    } else {
      $_SESSION["errors"]["general"] = "Error al guardar registro.";
    }
  } else {
    $_SESSION["errors"] = $errors;
  }
}
header("Location: index.php");
