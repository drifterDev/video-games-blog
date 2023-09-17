<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

require_once("includes/Connection.php");
if (!isset($_SESSION)) session_start();
if (isset($_POST)) {
  $email = trim($_POST["email"]) ?? false;
  $password = $_POST["password"] ?? false;

  // Comprobar contraseña
  $sql = "SELECT * FROM usuarios where email= '$email'";
  $login = mysqli_query($db, $sql);

  if ($login && mysqli_num_rows($login) == 1) {
    $data = mysqli_fetch_assoc($login);
    $verify = password_verify($password, $data["password"]);
    if ($verify) {
      echo "Funciono";
      $_SESSION["user"] = $data;
      if (isset($_SESSION["error_login"])) {
        session_unset();
      }
    } else {
      $_SESSION["error_login"] = "Error al iniciar sesión";
    }
  } else {
    // Error
    $_SESSION["error_login"] = "Error al iniciar sesión";
  }
}
header("Location: index.php");
