<?php
session_start();
class Pedidos_model
{

    private $db;
    private $pedidos;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->pedidos = array();
    }

    public function get_pedidos()
    {
        $id = $_SESSION['id'];
        $sql = "SELECT a.id_pedido,a.descripción,a.cantidad,a.id_combo,a.pago,a.responsable,a.sede,a.fecha,a.nombre_cliente,b.Nombres,b.Apellidos,c.nombre,c.descripcion FROM pedidos a inner join usuarios b on a.responsable = b.idUsuario inner join combos c on a.id_combo = c.id_combo WHERE a.responsable = $id";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->pedidos[] = $row;
        }
        return $this->pedidos;
    }


    public function insertar($sede, $combo, $responsable, $cantidad, $nombre_cliente, $fecha_registro)
    {
        require_once "ConexionDatos.php";
        $conex     = new conexiondatos();
        $con1      = $conex->conectar();
        $resultado = mysqli_query($con1, "SELECT * FROM combos WHERE id_combo = $combo");
        $resultado1 = mysqli_num_rows($resultado);

        if ($resultado1 > 0) {
            while ($combo_data = mysqli_fetch_array($resultado)) {
                $precio = $combo_data['precio'];
            }
        }

        $total = $precio * $cantidad;

        $resultado = $this->db->query("INSERT INTO pedidos(descripción,cantidad,id_combo,pago,responsable,sede,fecha,nombre_cliente) VALUES ($combo,$cantidad,$combo,$total,$responsable,$sede,'$fecha_registro','$nombre_cliente')");

        //echo "INSERT INTO pedidos(descripcion,cantidad,id_combo,responsable,sede,fecha,nombre_cliente) VALUES ($combo,$cantidad,$combo,$responsable,$sede,'$fecha_registro','$nombre_cliente')";	
    }


    public function modificar($id,$combo,$responsable,$cantidad,$nombre_cliente,$fecha_registro)
    {
        require_once "ConexionDatos.php";
        $conex     = new conexiondatos();
        $con1      = $conex->conectar();
        $resultado = mysqli_query($con1, "SELECT * FROM combos WHERE id_combo = $combo");
        $resultado1 = mysqli_num_rows($resultado);

        if ($resultado1 > 0) {
            while ($combo_data = mysqli_fetch_array($resultado)) {
                $precio = $combo_data['precio'];
            }
        }

        $total = $precio * $cantidad;

        $resultado = $this->db->query("UPDATE pedidos SET descripción = $combo, cantidad = $cantidad, id_combo = $combo, pago = $total, responsable = $responsable, fecha = '$fecha_registro', nombre_cliente = '$nombre_cliente' WHERE id_pedido = $id");
        $resultado = null;
        //echo "UPDATE pedidos SET descripción = $combo, cantidad = $cantidad, id_combo = $combo, pago = $total, responsable = $responsable, fecha = '$fecha_registro', nombre_cliente = '$nombre_cliente' WHERE id_pedido = $id";
    }

    public function get_pedido($id)
    {
        $sql = "SELECT a.id_pedido,a.descripción,a.cantidad,a.id_combo,a.pago,a.responsable,a.sede,a.fecha,a.nombre_cliente,b.Nombres,b.Apellidos,c.nombre,c.descripcion FROM pedidos a inner join usuarios b on a.responsable = b.idUsuario inner join combos c on a.id_combo = c.id_combo WHERE id_pedido = $id";
        $resultado = $this->db->query($sql);
        $sql = null;
        $row = $resultado->fetch_assoc();
        $resultado = null;

        return $row;
    }
}
