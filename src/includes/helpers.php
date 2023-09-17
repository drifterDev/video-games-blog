<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio.

function show_errors($errors, $field)
{
  $alert = "";
  if (isset($errors[$field]) && !empty($field)) {
    $alert = "<div class='alerta alerta-error'>" . $errors[$field] . "</div>";
  }
  return $alert;
}

function delete_errors()
{
  // $_SESSION["errors"] = null;
  $delete = session_unset();
  return $delete;
}
