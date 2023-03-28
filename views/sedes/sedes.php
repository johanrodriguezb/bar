<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado de Sedes</title>
	<link rel="stylesheet" type="text/css" href="estilodelistas.css">
	<?php include 'scripts.php'; ?>
	<link rel="stylesheet" href="estilodelistas.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/estilo.css">
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
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Bienvenido señ@r Usuario a continuación encontrará una interfaz<br>
					sencilla para la administración de sedes.
				</p>
			</div>
		</section>
		<p class="text-left">
			<a href="index4.php?c=Sedes&a=nuevo" class="btn-agregar">
				<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-adAdmin">
					<i class="zmdi zmdi-plus"></i>
				</button>
			</a>
		<div class="mdl-tooltip" for="btn-adAdmin">Agregar Sede</div>
		</p>
		<section class="full-width text-center">
			<?php foreach ($data["sedes"] as $dato) {
				$estado = $dato["estado"];
				if ($estado == 1) {
					$frase = 'Activa';
				}
				if ($estado == 0) {
					$frase = 'Inactiva';
				}
				echo "
					<div class='mdl-card mdl-shadow--4dp full-width product-card'>
						<div class='mdl-card__title'>
						<img src='imagenes/mapa.jpg' class='img-responsive'/>
						</div>
						<div class='mdl-card__supporting-text'>
							<small> Numero de Sede: " . $dato["idSede"] . "</small><br>
                            <small> Nombre de Sede: " . $dato["NombreSede"] . "</small><br>
                            <small> Dirección: " . $dato["Dirección"] . "</small><br>
                            <small> Ciudad: " . $dato["Ciudad"] . "</small><br>
                            <small> Estado Sede: " . $frase . "</small><br>
						</div>
						
					";
				if ($_SESSION['rol'] == 'Administrador') {
					echo "		
					<div class='mdl-card__actions mdl-card--border'>
							<a href='index4.php?c=Sedes&a=modificar&id=" . $dato["idSede"] . "'>
							<button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
								<i class='zmdi zmdi-comment-edit'></i>
							</button>
							</a>
                            <a href='index4.php?c=Sedes&a=eliminar&id=" . $dato["idSede"] . "'>
							<button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
								<i class='zmdi zmdi-delete'></i>
							</button>
							</a>
					";
				}
				echo "		
						</div>
					</div>";
				
			}
			?>
		</section>
	</section>
</body>

</html>