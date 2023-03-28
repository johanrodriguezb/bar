<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listado de Pedidos</title>
		<link rel="stylesheet" type="text/css" href="estilodelistas.css">
		<?php include 'scripts.php'; ?>
		<link rel="stylesheet" href="estilodelistas.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/bootstrap.min.js" ></script>
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
						sencilla para la administración de Pedidos.
					</p>
				</div>
			</section>
            <p class="text-left">
				<a href="index6.php?c=Pedidos&a=nuevo" class="btn-agregar">
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-adAdmin">
						<i class="zmdi zmdi-plus"></i>
					</button>
				</a>
			<div class="mdl-tooltip" for="btn-adAdmin">Crear Pedido</div>
			</p>
            <section class="full-width text-center">
				<?php foreach($data["pedidos"] as $dato) {
					echo"
					<div class='mdl-card mdl-shadow--4dp full-width product-card'>
						<div class='mdl-card__title'>
						<h3>Pedido #".$dato["id_pedido"]."</h3>
						</div>
						<div class='mdl-card__supporting-text'>
							<small> Nombre del Cliente: ".$dato["nombre_cliente"]."</small><br>
                            <small> Responsable: ".$dato["Nombres"].' ' .$dato["Apellidos"]."</small><br>
                            <small> Precio: ".$dato["pago"]."</small><br>
                            <small> Cantidad: ".$dato["cantidad"]."</small><br>
                            <small> Descripción: ".$dato["descripcion"]."</small><br>
                            <small> Nombre del Combo: ".$dato["nombre"]."</small><br>
                            <small> Fecha Pedido: ".$dato["fecha"]."</small><br>
						</div>
						<div class='mdl-card__actions mdl-card--border'>
							<a href='index6.php?c=Pedidos&a=modificar&id=" . $dato["id_pedido"] . "'>
							<button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
								<i class='zmdi zmdi-comment-edit'></i>
							</button>
							</a>
						</div>
					</div>";
					}
				?>
			</section>
		</section>	
	</body>
</html>