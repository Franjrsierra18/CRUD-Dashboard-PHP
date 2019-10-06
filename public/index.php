<?php
session_start();
require_once dirname(__DIR__) . '/vendor/autoload.php';
require 'Registro/database.php';
use App\Db;

$dbase = new Db();

$resultado = $dbase->listarTickets();

if (isset($_SESSION['user_id'])) {
	$records = $conn->prepare('SELECT id, email, password FROM users WHERE id= :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = '';

	if (count($results) > 0) {
		$user = $results;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>PHP</title>
</head>

<body>

	<header>
		<?php include 'menu.php'; ?>
	</header>
	<section class="px-5 mt-5">

	<?php
	if (!empty($user)): ?>

	<div class="alert alert-success?">
		Welcome <?= $user['email'] ?>
		<br>
		<small>You are successfully log in</small>
		<a href="Registro/logout.php">Logout</a>
	</div>
	<?php endif ?>

	<?php
	if (isset($_SESSION['message'])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">

	<?php
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	?>
	</div>
	<?php endif ?>
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th scope="col">Fecha</th>
					<th scope="col">Descripcion</th>
					<th scope="col">Estado</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($resultado as $value) {
					echo "<tr>
					<th scope='row'>" . $value["fecha"] . "</th>
					<td>" . $value["descripcion"] . "</td>
					<td>" . $value["estado"] . "</td>
					<td>
					<button type='button' class='close' aria-label='Close'>
					<span aria-hidden='true'><a href='index.php?delete=".$value["id"]."'>❌</a></span>
				</button>
				</td>
					<td>
					<button type='button' class='close' aria-label='Close'>
					<span aria-hidden='true'><a href='index.php?edit=".$value["id"]."'>✏️</a></span>
				</button>
				</td>
				</tr>";
				}
				?>
			</tbody>
		</table>
	</section>

	<section class="m-3 p-5 bg-light">
	<?php include 'nuevoTicket.php'; ?>
	</section>

	<footer class="bg-dark text-white fixed-bottom">
		Francisco Sierra 2019
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>