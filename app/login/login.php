<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

require_once("../includes/Connection.php");
if (!isset($_SESSION)) session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $password = $_POST["password"];

  $sql = "SELECT * FROM usuarios WHERE email = ?";
  $stmt = mysqli_prepare($db, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $data = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $data["password"])) {
        $_SESSION["user"] = $data;
      } else {
        $_SESSION["error_login"] = "Correo electrónico o contraseña incorrectos.";
      }
    } else {
      $_SESSION["error_login"] = "Error al iniciar sesión.";
    }
    mysqli_stmt_close($stmt);
  } else {
    $_SESSION["error_login"] = "Error al iniciar sesión.";
  }
}

header("Location: ../index.php");
exit();
