<?php
$home = "Home";
$menu = array(
	'titulo' => 'Home',
	'href' => 'index.php'
);

?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<?php
			echo "<li class='nav-item active'>
						<a class='nav-link text-white' href=" . $menu["href"] . ">" . $menu["titulo"] . "</a>
					</li>";
			?>
		</ul>
	</div>
</nav>