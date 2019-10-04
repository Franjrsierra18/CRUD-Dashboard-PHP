<?php
if (isset($_GET["id"])) {
  $id=$_GET["id"];
}
$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
  echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$resultado = $mysqli->query("SELECT * FROM practica");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Noticias PHP</title>
</head>

<body>

  <header>
    <?php include 'menu.php'; ?>
  </header>

  <section>
    <?php
    foreach ($resultado as $a) {
      if ($a["id"] == $id) {
        echo "<div class='jumbotron jumbotron-fluid'>
          <div class='container'>
            <h1 class='display-4'>" . $a['titulo'] . "</h1>
            <h4>" . $a['subtitulo'] . "</h4>
            <p class='lead'>" . $a['noticia'] . "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque corrupti repellat odio omnis est suscipit rerum porro inventore odit, molestiae labore officia sint rem voluptatum, amet nemo nulla quam magnam. Repellat quia exercitationem excepturi. Enim impedit, nesciunt molestiae illo numquam cupiditate id neque, eveniet tempore inventore a delectus consectetur necessitatibus exercitationem voluptatibus veniam, quam iste placeat vel natus dolore eum minima nulla. Veniam nulla laboriosam corrupti voluptate, veritatis ex voluptatem distinctio? Vel eius praesentium assumenda illum fugiat veritatis voluptates vitae velit voluptatibus, corporis recusandae optio facere dolores voluptatem deleniti. Porro.</p>
            <small>" . $a['fecha'] . "</small>
          </div>
        </div>";
      }
    }
    ?>
  </section>

  <footer class="bg-dark text-white">
    Francisco Sierra 2019
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>