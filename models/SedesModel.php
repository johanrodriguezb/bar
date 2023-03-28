<?php
	
	class Sedes_model {
		
		private $db;
		private $sedes;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->sedes = array();
		}
		
		public function get_sedes()
		{
			
			$sql = "SELECT * FROM sede";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->sedes[] = $row;
			}
			return $this->sedes;
		}
		
		public function insertar($id,$nombre,$direccion,$ciudad,$fecha_registro)
		{

				$resultado = $this->db->query("INSERT INTO sede(idSede,NombreSede,Dirección,Ciudad,fecha) VALUES ($id,'$nombre','$direccion','$ciudad','$fecha_registro')");
				
				//echo "INSERT INTO sede(idSede,NombreSede,Dirección,Ciudad,fecha) VALUES ($id,'$nombre','$direccion','$ciudad','$fecha_registro')";	
		}

	
		public function modificar($id,$nombre,$direccion,$ciudad,$fecha_registro)
		{
			
			$resultado = $this->db->query("UPDATE sede SET NombreSede = '$nombre', Dirección = '$direccion', Ciudad = '$ciudad', fecha = '$fecha_registro' WHERE idSede = $id");			
			$resultado=null;
			//echo "UPDATE sede SET NombreSede = '$nombre', Dirección = '$direccion', Ciudad = '$ciudad', fecha = '$fecha_registro' WHERE idSede = $id";
		}
		
		public function eliminar($id)
		{
			
			$resultado = $this->db->query("UPDATE sede SET estado = 0 WHERE idSede = '$id'");
			$resultado=null;
			
		}
		
		public function get_sede($id)
		{
			$sql = "SELECT * FROM sede WHERE idSede = $id";
			$resultado = $this->db->query($sql);
			$sql=null;
			$row = $resultado->fetch_assoc();
			$resultado=null;

			return $row;
		}
		
	}
