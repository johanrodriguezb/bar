<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Pediddo</title>
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

            <form id="nuevo" name="nuevo" method="POST" action="index6.php?c=Pedidos&a=actualizar" autocomplete="off">

                <?php
                require_once "ConexionDatos.php";
                $conex     = new conexiondatos();
                $con1      = $conex->conectar();
                $resultado = mysqli_query($con1, "SELECT * FROM combos");
                $resultado1 = mysqli_num_rows($resultado);
                ?>
                <div class="form-group">
                    <label>Combo: </label>
                    <select class="form-control" name="combo" id="combo">
                        <option value="<?php echo $data["Pedidos"]["id_combo"]; ?>"><?php echo $data["Pedidos"]["descripcion"] ?></option>
                        <?php
                        if ($resultado1 > 0) {
                            while ($sede = mysqli_fetch_array($resultado)) {
                        ?>
                                <option value="<?php echo $sede["id_combo"]; ?>"><?php echo $sede["descripcion"] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>


                <input type="hidden" class="form-control" id="responsable" name="responsable" value="<?php echo $_SESSION['id']; ?>"/>
                <input type="hidden" class="form-control" name= "id_pedido" value="<?php echo $data["Pedidos"]["id_pedido"]; ?>">
                
                <div class="form-group">
                    <label for="Identificacion">cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $data["Pedidos"]["cantidad"]?>"/>
                </div>

                <div class="form-group">
                    <label for="Identificacion">Nombre del cliente</label>
                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="<?php echo $data["Pedidos"]["nombre_cliente"]?>"/>
                </div>


                <button id="guardar" name="guardar" type="submit" class="btn btn-success">Guardar</button>

            </form>
        </div>
    </section>
</body>

</html>