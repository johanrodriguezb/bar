<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Combo</title>
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

            <form id="nuevo" name="nuevo" method="POST" action="index4.php?c=Inventarios&a=guardaC" autocomplete="off">

                <div class="form-group">
                    <label for="Identificacion">Nombre Combo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" />
                </div>

                <div class="form-group">
                    <label for="Identificacion">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" />
                </div>

                <div class="form-group">
                    <label for="Identificacion">Descrpicion</label>
                    <textarea class="form-control" name="area" id="" cols="30" rows="10"></textarea>
                </div>

                <button id="guardar" name="guardar" type="submit" class="btn btn-success">Guardar</button>

            </form>
        </div>
    </section>
</body>

</html>