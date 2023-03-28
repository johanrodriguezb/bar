<?php
	
	class InventariosController {
		
		public function __construct(){
			require_once "models/InventariosModel.php";
		}
		
		public function index(){
			
			
			$inventarios = new Inventarios_model();
			$data["titulo"] = "Inventarios";
			$data["inventarios"] = $inventarios->get_inventarios();
			
			require_once "views/inventarios/inventarios.php";	
		}

		public function indexC(){
			
			$combos = new Inventarios_model();
			$data["titulo"] = "Combos";
			$data["combos"] = $combos->get_inventariosC();
			
			require_once "views/inventarios/combos.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Inventarios";
			require_once "views/inventarios/inventarios_nuevo.php";
		}

		public function nuevoC(){
			
			$data["titulo"] = "Nuevo Combo";
			require_once "views/inventarios/combos_nuevo.php";
		}
		
		
		public function guarda()
		{

			$sede = $_POST['sede'];
			$proveedor = $_POST['proveedor'];
			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$cantidad = $_POST['cantidad'];
			$responsable = $_POST['id_respon'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');
			
			$inventarios = new Inventarios_model();
			$inventarios->insertar($sede,$proveedor,$nombre,$precio,$cantidad,$responsable,$fecha_registro);
			$data["titulo"] = "Inventarios";
			$this->index();
		}

		public function guardaC()
		{

			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$descrp = $_POST['area'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');
			
			$inventarios = new Inventarios_model();
			$inventarios->insertarC($nombre,$precio,$descrp,$fecha_registro);
			$data["titulo"] = "Inventarios";
			$this->indexC();
		}
		
		public function modificar($id){
			
			$inventarios = new Inventarios_model();
			
			$data["id_producto"] = $id;
			$data["inventarios"] = $inventarios->get_inventario($id);
			$data["titulo"] = "Editar Productos";
			require_once "views/inventarios/inventarios_modifica.php";
		}
		
		public function modificarC($id){
			
			$combo = new Inventarios_model();
			
			$data["id_combo"] = $id;
			$data["combos"] = $combo->get_combo($id);
			$data["titulo"] = "Editar Combos";
			require_once "views/inventarios/combos_modifica.php";
		}

		public function actualizar()
		{
			$id = $_POST['idProducto'];
			$sede = $_POST['sede'];
			$proveedor = $_POST['proveedor'];
			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$cantidad = $_POST['cantidad'];
			$responsable = $_POST['id_respon'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');

			$inventarios = new Inventarios_model();
			$inventarios->modificar($id, $sede,$proveedor,$nombre,$precio,$cantidad,$responsable,$fecha_registro);
			$data["titulo"] = "Inventarios";
			$this->index();
		}

		public function actualizarC()
		{
			$id = $_POST['idCombo'];
			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$descrip = $_POST['area'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');

			$combos = new Inventarios_model();
			$combos->modificarC($id,$nombre,$precio,$descrip,$fecha_registro);
			$data["titulo"] = "Combos";
			$this->indexC();
		}
		
		
		public function eliminar($id){
			
			$inventarios = new Inventarios_model();
			$inventarios->eliminar($id);
			$data["titulo"] = "Inventarios";
			$this->index();
		}	

		public function eliminarC($id){
			
			$combos = new Inventarios_model();
			$combos->eliminarC($id);
			$data["titulo"] = "Combos";
			$this->indexC();
		}
	}
?>