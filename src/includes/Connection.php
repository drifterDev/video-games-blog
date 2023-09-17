<?php

// Autor: Mateo Álvarez Murillo
// Fecha de creación: 2023

// Este código se proporciona bajo la Licencia MIT.
// Para más información, consulta el archivo LICENSE en la raíz del repositorio. 

namespace Src\includes;

class Connection
{
  private $connection;
  private static $instance;

  private function __construct()
  {
    $this->make_connection();
  }

  public static function getInstance()
  {
    if (!self::$instance instanceof self)
      self::$instance = new self();
    return self::$instance;
  }

  private function  make_connection()
  {
    $server = "localhost";
    $database = "dbs_blog";
    $username = "root";
    $password = "";
    $db = mysqli_connect($server, $username, $password, $database);

    if (mysqli_connect_error()) {
      die("Falló la conexión: " . mysqli_connect_error());
    }

    mysqli_query($db, "SET NAMES 'utf-8';");

    $this->connection = $db;
  }

  public function get_database_instance()
  {
    return $this->connection;
  }
}
