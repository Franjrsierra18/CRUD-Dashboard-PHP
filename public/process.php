<?php

$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysqli_error($mysqli));

if (isset($_POST['submit'])){
  $description = $_POST['description'];
  $estado = $_POST['estado'];

  $mysqli->query("INSERT INTO ticket (descripcion, estado) VALUES ('$description', '$estado')") or die($mysqli->error);
}