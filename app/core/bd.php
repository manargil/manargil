<?php

class bd{

  private $host;
  private $db;
  private $user;
  private $password;
  private $charset;

  function __construct(){
    $this->host = constant('HOST');
    $this->db = constant('DB');
    $this->user = constant('USER');
    $this->password = constant('PASSWORD');
    $this->charset = constant('CHARSET');
  }

  function conectar(){
    try {
      $connection= "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
      $options= [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
      ];
      $pdo = new PDO($connection, $this->user, $this->password, $options);

      return $pdo;
    } catch (PDOException $e) {
        echo("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        die();
      }
  }

}

?>
