<?php

namespace App;

class Db
{
  private $server = "localhost";
  private $user = "";
  private $password = "";
  private $dbase = "";
  private $mysqli;
  // private $description = "";
  // private $estado = "";
  // private $update = false;


  public function __construct($dbase = "test")
  {
    $this->user = "root";
    $this->dbase = $dbase;
    $this->mysqli = new \mysqli($this->server,  $this->user, $this->password, $this->dbase);

    if ($this->mysqli->connect_errno) {
      header("location:404.php");
    }
  }
  public function listarTickets()
  {
    $resultado = $this->mysqli->query("SELECT * FROM ticket");
    if ($resultado == false) {
      header("Location:404.php?msg=cualquier vaina");
    }
    return $resultado;
  }
  // public function editarTickets()
  // {
  //   if (isset($_GET['edit'])) {
  //     $id = $_GET['edit'];
  //     $this->update = true;
  //     $result = $$this->mysqli->query("SELECT * FROM ticket WHERE id=$id") or die($$this->mysqli->error());
  //     return $result;
  //     if (count($result) == 1) {
  //       $value = $result->fetch_array();
  //       $this->description = $value['descripcion'];
  //       $this->estado = $value['estado'];
  //     }
  //   }
  // }
  // public function agregarTickets()
  // {
  //   $resultado = $this->mysqli->query("INSERT INTO ticket FROM tickets");
  //   if ($resultado == false) {
  //     header("Location:404.php?msg=cualquier vaina");
  //   }
  //   return $resultado;
  // }
}
