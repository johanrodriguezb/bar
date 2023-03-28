<?php
	
	class PedidosController {
		
		public function __construct(){
			require_once "models/PedidosModel.php";
		}
		
		public function index(){
			
			
			$Pedidos = new Pedidos_model();
			$data["titulo"] = "Pedidos";
			$data["pedidos"] = $Pedidos->get_pedidos();
			
			require_once "views/pedidos/pedidos.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Nuevo Pedido";
			require_once "views/pedidos/pedidos_nuevo.php";
		}
		
		public function guarda()
		{

			$sede = $_POST['sede'];
			$combo = $_POST['combo'];
			$responsable = $_POST['responsable'];
            $nombre_cliente = $_POST['nombre_cliente'];
            $cantidad = $_POST['cantidad'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');
			
			$pedidos = new Pedidos_model();
			$pedidos->insertar($sede,$combo,$responsable,$cantidad,$nombre_cliente,$fecha_registro);
			$data["titulo"] = "Pedidos";
			$this->index();
		}
		
		public function modificar($id){
			
			$pedidos = new Pedidos_model();
			
			$data["id_pedido"] = $id;
			$data["Pedidos"] = $pedidos->get_pedido($id);
			$data["titulo"] = "Editar Pedidos";
			require_once "views/pedidos/pedidos_modifica.php";
		}
		
		public function actualizar()
		{
            $id = $_POST['id_pedido'];
			$combo = $_POST['combo'];
			$responsable = $_POST['responsable'];
            $nombre_cliente = $_POST['nombre_cliente'];
            $cantidad = $_POST['cantidad'];
			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');

			$pedidos = new pedidos_model();
			$pedidos->modificar($id,$combo,$responsable,$cantidad,$nombre_cliente,$fecha_registro);
			$data["titulo"] = "Pedidos";
			$this->index();
		}	
	}
?>