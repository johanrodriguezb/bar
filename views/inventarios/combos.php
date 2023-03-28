<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado de Combos</title>
	<link rel="stylesheet" type="text/css" href="estilodelistas.css">
	<?php include 'scripts.php'; ?>
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
					Bienvenido <?php echo $_SESSION['usuari']; ?> a continuación encontrará una interfaz <br>
					sencilla con la lista de combos registrados en el sistema.
				</p>
			</div>
		</section>
		<section class="full-width text-center" style="padding: 5px;">
			<div class="full-width panel mdl-shadow--2dp">
				<div class="full-width panel-tittle bg-primary text-center tittles">
					Comobos Registrados
				</div>
			</div>
			<p class="text-left">
				<a href="index5.php?c=Inventarios&a=nuevoC" class="btn-agregar">
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-adAdmin">
						<i class="zmdi zmdi-plus"></i>
					</button>
				</a>
			<div class="mdl-tooltip" for="btn-adAdmin">Agregar Combo</div>
			</p>

			<div class="table-responsive">
				<table class="tabla_datos">
					<thead>
						<tr id='titulo'>
							<td>ID</td>
							<td>Nombre</td>
							<td>Precio</td>
							<td>Descripción</td>
							<td>Fecha</td>
							<td colspan="2">Acciones</td>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($data["combos"] as $dato) {
							echo "<tr>";
							echo "<td>" . $dato["id_combo"] . "</td>";
							echo "<td>" . $dato["nombre"] . "</td>";
							echo "<td>" . $dato["precio"] . "</td>";
							echo "<td>" . $dato["descripcion"] . "</td>";
							echo "<td>" . $dato["fecha"] . "</td>";
							echo "<td><a href='index5.php?c=Inventarios&a=modificarC&id=" . $dato["id_combo"] . "' class='btn btn-warning'>Modificar</a></td>";
							echo "<td><a href='index5.php?c=Inventarios&a=eliminarC&id=" . $dato["id_combo"] . "' class='btn btn-danger'>Eliminar</a></td>";
							echo "</tr>";
						}
						?>
					</tbody>

				</table>
			</div>

		</section>
	</section>
</body>

</html>