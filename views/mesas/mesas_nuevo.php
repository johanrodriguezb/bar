<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nueva Mesa</title>
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

            <form id="nuevo" name="nuevo" method="POST" action="index3.php?c=Mesas&a=guarda" autocomplete="off">
                <?php
                require_once "ConexionDatos.php";
                $conex     = new conexiondatos();
                $con1      = $conex->conectar();
                $resultado = mysqli_query($con1, "SELECT * FROM sede");
                $resultado1 = mysqli_num_rows($resultado);
                ?>
                <div class="form-group">
                    <label>Sede en la que está ubicada</label>
                    <select class="form-control" name="sede" id="sede">
                        <option value="">Seleccione Ubicación...</option>
                        <?php
                        if ($resultado1 > 0) {
                            while ($sede = mysqli_fetch_array($resultado)) {
                        ?>
                                <option value="<?php echo $sede["idSede"]; ?>"><?php echo $sede["NombreSede"] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Identificacion">Nombre Mesa</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" />
                </div>

                <input type="hidden" name="id_respon" value="<?php echo $_SESSION['id']; ?>">

                <button id="guardar" name="guardar" type="submit" class="btn btn-success">Guardar</button>

            </form>
        </div>
    </section>
</body>

</html>