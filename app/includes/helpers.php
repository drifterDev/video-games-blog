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
  unset($_SESSION["errors"]);
  unset($_SESSION["Cgeneral"]);
  unset($_SESSION["Dgeneral"]);
  unset($_SESSION["Pgeneral"]);
  unset($_SESSION["error_login"]);
  unset($_SESSION["complete"]);
  unset($_SESSION["Dcomplete"]);
  unset($_SESSION["Pcomplete"]);
  unset($_SESSION["Ccomplete"]);
  // $_SESSION["errors"] = null;
  // $delete = session_unset();
  // return $delete;
}

function getCategories($db)
{
  $sql = "SELECT * FROM categorias ORDER BY id ASC";
  $categories = mysqli_query($db, $sql);
  if ($categories && mysqli_num_rows($categories) > 0) {
    return $categories;
  }
  return array();
}

function getPosts($db)
{
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e" .
    " INNER JOIN categorias c ON e.categoria_id=c.id" .
    " ORDER BY e.id DESC LIMIT 4";
  $posts = mysqli_query($db, $sql);
  if ($posts && mysqli_num_rows($posts) >= 0) {
    return $posts;
  }
  return array();
}
