<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

require_once("includes/Connection.php");
if (!isset($_SESSION)) session_start();
if (isset($_SESSION["user"]) && isset($_GET["id"])) {
  $sql = "DELETE FROM entradas WHERE usuario_id=" . $_SESSION["user"]["id"] . " AND id=" . $_GET["id"];
  try {
    mysqli_query($db, $sql);
    $_SESSION["success"] = "Entrada eliminada correctamente.";
  } catch (\Throwable $th) {
  }
}
header("Location: index.php");
exit();
