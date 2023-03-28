<?php
session_start();
if (!$_SESSION['verifica']) {
	header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina Principial</title>
	<?php include 'scripts.php'; ?>

</head>

<body>
	<!-- barra principal -->
	<div class="full-width navBar">
		<?php include 'barraprincipal.php';  ?>
	</div>
	<!-- barraLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<?php include 'barralateral.php';  ?>
		
	</section>
	<!-- Contenido -->
	<section class="full-width pageContent">
		<section class="full-width text-center" style="padding: 40px 0;">
		<br>
		<br>
		<br>
		<br>
			<h3 class="text-center tittles">CATEGORIAS</h3>
			<!-- Tiles -->
			<article class="full-width tile">
				<a href="index3.php">
					<div class="tile-text">
						<span class="text-condensedLight">
							<br>
							<small>Mesas</small>
						</span>
					</div>
					<i class="zmdi zmdi-account-box tile-icon"></i>
				</a>
			</article>
			<article class="full-width tile">
				<a href="index4.php">
					<div class="tile-text">
						<span class="text-condensedLight">
							<br>
							<small>Sedes</small>
						</span>
					</div>
					<i class="zmdi zmdi-graphic-eq tile-icon"></i>
				</a>
			</article>
			<article class="full-width tile">
				<a href="index6.php">
					<div class="tile-text">
						<span class="text-condensedLight">
							<br>
							<small>Pedidos</small>
						</span>
					</div>
					<i class="zmdi zmdi-money-box tile-icon"></i>
				</a>
			</article>
		</section>
	</section>
</body>

</html>