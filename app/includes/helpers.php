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
  $delete = ["errors", "Cgeneral", "Dgeneral", "Pgeneral", "error_login", "complete", "Dcomplete", "Pcomplete", "Ccomplete"];
  foreach ($delete as $key => $value) {
    unset($_SESSION[$value]);
  }
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

function getPosts($db, $limit = false, $category = null)
{
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e" .
    " INNER JOIN categorias c ON ";
  if (isset($category) && !empty($category)) {
    $sql .= "e.categoria_id=$category AND ";
  }
  $sql .= "e.categoria_id=c.id ORDER BY e.id DESC ";
  if ($limit) {
    $sql .= "LIMIT 4";
  }
  $posts = mysqli_query($db, $sql);
  if ($posts && mysqli_num_rows($posts) > 0) {
    return $posts;
  }
  $_SESSION["errors"]["getPost"] = "No hay entradas en esta categoría.";
  return array();
}

function getCategory($db, $id)
{
  $sql = "SELECT * FROM categorias WHERE id=$id";
  try {
    $category = mysqli_query($db, $sql);
    if ($category && mysqli_num_rows($category) > 0) {
      return $category->fetch_assoc();
    } else {
      return null;
    }
  } catch (\Throwable $th) {
    return null;
  }
}

function getPost($db, $id)
{
  if (!isset($id)) return null;
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
    "INNER JOIN categorias c ON e.categoria_id=c.id WHERE e.id=$id";
  try {
    $post = mysqli_query($db, $sql);
    if ($post && mysqli_num_rows($post) > 0) {
      return $post->fetch_assoc();
    } else {
      return null;
    }
  } catch (\Throwable $th) {
    return null;
  }
}
