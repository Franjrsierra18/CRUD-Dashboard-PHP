<?php
session_start();

$description = "";
$estado = "";
$update = false;
$id = 0;

$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysqli_error($mysqli));

if (isset($_POST['submit'])) {
  $description = $_POST['descripcion'];
  $estado = $_POST['estado'];

  $mysqli->query("INSERT INTO ticket (descripcion, estado) VALUES ('$description', '$estado')") or die($mysqli->error());

  $_SESSION['message'] = "Ticket Guardado";
  $_SESSION['msg_type'] = "success";

  header('location: index.php');
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $mysqli->query("DELETE FROM ticket WHERE id=$id") or die($mysqli->error());

  $_SESSION['message'] = "Ticket Eliminado";
  $_SESSION['msg_type'] = "danger";

  header('location: index.php');
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM ticket WHERE id=$id") or die($mysqli->error());

  var_dump($result);

  if (isset($result)) {
    $value = $result->fetch_array();
    $description = $value['descripcion'];
    $estado = $value['estado'];
  }
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $description = $_POST['descripcion'];
  $estado = $_POST['estado'];

  $mysqli->query("UPDATE ticket SET descripcion='$description', estado='$estado' WHERE id=$id") or die($mysqli->error());

  $_SESSION['message'] = "Ticket Editado";
  $_SESSION['msg_type'] = "warning";
  header('location: index.php');
}

?>
<section class="m-3 p-5 bg-light">
  <form action="index.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <h1 class="text-center pb-5">Agrega Ticket</h1>

    <div class="input-group mb-3 px-5">
      <div class="input-group-prepend">
        <span class="input-group-text">Descripcion</span>
      </div>
      <input type="text" class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripcion..." value="<?php echo $description ?>">
    </div>

    <div class="input-group mb-3 px-5">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">Estado</span>
      </div>
      <input type="text" class="form-control" placeholder="Estado" aria-label="Recipient's username" aria-describedby="basic-addon2" name="estado" value="<?php echo $estado ?>">
    </div>
    <?php
    if ($update == true) : ?>
      <div class="input-group mb-3">
        <input type="submit" class="m-auto btn btn-info" value="Editar" name="update">
      </div>
    <?php else : ?>
      <div class="input-group mb-3">
        <input type="submit" class="m-auto btn btn-primary" value="registrar" name="submit">
      </div>
    <?php endif; ?>
  </form>
</section>