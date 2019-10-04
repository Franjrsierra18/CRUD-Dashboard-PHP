<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysqli_error($mysqli));

if (isset($_POST['submit'])){
  $description = $_POST['descripcion'];
  $estado = $_POST['estado'];

  $mysqli->query("INSERT INTO ticket (descripcion, estado) VALUES ('$description', '$estado')") or die($mysqli->error);

  $_SESSION['message'] = "Ticket Guardado";
  $_SESSION['msg_type'] = "success";

  header('location: index.php');
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $mysqli->query("DELETE FROM ticket WHERE id=$id") or die($mysqli->error);

  $_SESSION['message'] = "Ticket Eliminado";
  $_SESSION['msg_type'] = "danger";

  header('location: index.php');
}

?>
<section class="m-3 p-5 bg-light">
  <form action="index.php" method="post">
    <h1 class="text-center pb-5">Agrega Ticket</h1>

    <div class="input-group mb-3 px-5">
      <div class="input-group-prepend">
        <span class="input-group-text">Descripcion</span>
      </div>
      <textarea class="form-control" aria-label="With textarea" name="descripcion"></textarea>
    </div>

    <div class="input-group mb-3 px-5">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">Estado</span>
      </div>
      <input type="text" class="form-control" placeholder="Estado" aria-label="Recipient's username" aria-describedby="basic-addon2" name="estado">
    </div>

    <div class="input-group mb-3">
      <input type="submit" class="m-auto btn btn-primary" value="registrar" name="submit">
    </div>
  </form>
</section>