<?php
	
	class SedesController {
		
		public function __construct(){
			require_once "models/SedesModel.php";
		}
		
		public function index(){
			
			
			$sedes = new Sedes_model();
			$data["titulo"] = "Sedes";
			$data["sedes"] = $sedes->get_sedes();
			
			require_once "views/sedes/sedes.php";	
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Nueva Sede";
			require_once "views/sedes/sedes_nuevo.php";
		}
		
		public function guarda()
		{   
            $id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            
			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');
			
			$inventarios = new Sedes_model();
			$inventarios->insertar($id,$nombre,$direccion,$ciudad,$fecha_registro);
			$data["titulo"] = "Sedes";
			$this->index();
		}
		
		public function modificar($id){
			
			$sedes = new Sedes_model();
			
			$data["idSede"] = $id;
			$data["sedes"] = $sedes->get_sede($id);
			$data["titulo"] = "Editar Sedes";
			require_once "views/sedes/sedes_modifica.php";
		}
		
		public function actualizar()
		{
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];

			date_default_timezone_set("america/bogota"); 
			$fecha_registro = date('Y-m-d');

			$sedes = new Sedes_model();
			$sedes->modificar($id,$nombre,$direccion,$ciudad,$fecha_registro);
			$data["titulo"] = "Sedes";
			$this->index();
		}
		
		public function eliminar($id){
			
			$sedes = new Sedes_model();
			$sedes->eliminar($id);
			$data["titulo"] = "Sedes";
			$this->index();
		}	

	}
?>