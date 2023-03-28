<?php
	
	class MesasController {
		
		public function __construct(){
			require_once "models/MesasModel.php";
		}
		
		public function index(){
			
			
			$Mesas = new Mesas_model();
			$data["titulo"] = "Mesas";
			$data["Mesas"] = $Mesas->get_Mesas();
			
			require_once "views/mesas/mesas.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Mesas";
			require_once "views/mesas/mesas_nuevo.php";
		}
		
		public function guarda()
		{

			$sede = $_POST['sede'];
			$mesa_nombre = $_POST['nombre'];
			$responsable = $_POST['id_respon'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');
			
			$inventarios = new Mesas_model();
			$inventarios->insertar($sede,$mesa_nombre,$responsable,$fecha_registro);
			$data["titulo"] = "Mesas";
			$this->index();
		}
		
		public function modificar($id){
			
			$mesas = new Mesas_model();
			
			$data["id_mesa"] = $id;
			$data["Mesas"] = $mesas->get_mesa($id);
			$data["titulo"] = "Editar Mesas";
			require_once "views/mesas/mesas_modifica.php";
		}
		
		public function actualizar()
		{
			$id = $_POST['id_mesa'];
			$sede = $_POST['sede'];
			$nombre = $_POST['nombre'];
			$responsable = $_POST['id_respon'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');

			$mesas = new Mesas_model();
			$mesas->modificar($id,$sede,$nombre,$responsable,$fecha_registro);
			$data["titulo"] = "Mesas";
			$this->index();
		}
		
		public function eliminar($id){
			
			$mesas = new Mesas_model();
			$mesas->eliminar($id);
			$data["titulo"] = "Mesas";
			$this->index();
		}	

        public function asignar($id){
			
			$mesas = new Mesas_model();
			$mesas->asignar($id);
			$data["titulo"] = "Mesas";
			$this->index();
		}	
	}
?>