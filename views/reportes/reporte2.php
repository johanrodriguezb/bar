<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte por inventarios</title>
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
                    sencilla para generar reportes en archivo xslx.
                </p>
            </div>
        </section>
        <section class="full-width text-center">
            <form id="nuevo" name="nuevo" method="POST" action="" autocomplete="off">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Identificacion">Fecha Inicial</label>
                                <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Identificacion">Fecha Final</label>
                                <input type="date" class="form-control" id="fecha_final" name="fecha_final" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <button id="guardar" name="guardar" type="submit" class="btn btn-success">Generar Archivo</button>
                            <input type="hidden" name="ejecutar" value="operar">
                        </div>
                    </div>
                </div>

            </form>
        </section>

        <section>
            <?php
            if (isset($_POST['ejecutar'])) {
                $finicial = $_POST['fecha_inicial'];
                $ffinal = $_POST['fecha_final'];
                require_once "ConexionDatos.php";
                $conex     = new conexiondatos();
                $con1      = $conex->conectar();
                $resultado = mysqli_query($con1, "SELECT a.id_producto, a.nombre, a.proveedor,a.sede, a.cantidad, a.precio, a.fecha, a.id_responsable, a.estado as estadoP, b.Nombres,b.Apellidos,c.NombreSede, d.nombre FROM productos a inner join usuarios b on a.id_responsable = b.idUsuario inner join sede c on a.sede = c.idSede inner join proveedores d on a.proveedor = d.id_proveedor where a.fecha BETWEEN '$finicial' and '$ffinal'");
                //echo "SELECT * FROM pedidos where fecha BETWEEN '$finicial' and '$ffinal'";
                $resultado1 = mysqli_num_rows($resultado);
            ?>
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">

                                <button type="button" class="btn btn-success" onclick="exportTableToExcel('tabla_pedidos_general', 'tabla_pedidos_general')">Descargar Archivo</button>


                                <table class="table table-bordered hidden" id="tabla_pedidos_general">
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Proveedor</td>
                                        <td>Sede</td>
                                        <td>Cantidad</td>
                                        <td>Precio</td>
                                        <td>Fecha</td>
                                        <td>Responsable</td>
                                    </tr>
                                    <?php
                                    if ($resultado1 > 0) {
                                        while ($reporte = mysqli_fetch_array($resultado)) {
                                    ?>
                                            <tr>

                                                <td><?php echo $reporte["nombre"]; ?></td>
                                                <td><?php echo $reporte["nombre"]; ?></td>
                                                <td><?php echo $reporte["NombreSede"]; ?></td>
                                                <td><?php echo $reporte["cantidad"]; ?></td>
                                                <td><?php echo $reporte["precio"]; ?></td>
                                                <td><?php echo $reporte["fecha"]; ?></td>
                                                <td><?php echo $reporte["Nombres"]; ?></td>

                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
        </section>
    </section>
</body>

</html>
<script type="text/javascript">
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>