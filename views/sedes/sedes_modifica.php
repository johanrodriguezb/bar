<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Sede</title>
    <link rel="stylesheet" type="text/css" href="estilodelistas.css">
    <?php include 'scripts.php'; ?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
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
        <div class="container">
            <h2><?php echo $data["titulo"]; ?></h2>

            <form id="nuevo" name="nuevo" method="POST" action="index4.php?c=Sedes&a=actualizar" autocomplete="off">

                <div class="form-group">
                    <label for="Identificacion">Identificador de Sede</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data["sedes"]["idSede"]?>"/>
                </div>

                <div class="form-group">
                    <label for="Identificacion">Nombre Sede</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data["sedes"]["NombreSede"]?>"/>
                </div>

                <div class="form-group">
                    <label for="Identificacion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $data["sedes"]["Dirección"]?>"/>
                </div>

                <div class="form-group">
                    <label for="Identificacion">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $data["sedes"]["Ciudad"]?>"/>
                </div>

                <button id="guardar" name="guardar" type="submit" class="btn btn-success">Guardar</button>

            </form>
        </div>
    </section>
</body>

</html>