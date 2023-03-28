<?php
session_start();
	class Mesas_model {
		
		private $db;
		private $mesas;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->mesas = array();
		}
		
		public function get_mesas()
		{
			$id_sede = $_SESSION['sede'];
			$sql = "SELECT a.id_mesa,a.nombre,a.sede,a.fecha,b.NombreSede,b.idSede,a.estado  FROM mesas a inner join sede b on a.sede = b.idSede WHERE a.estado in (1,2) AND a.sede = $id_sede";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->mesas[] = $row;
			}
			return $this->mesas;
		}
		
		public function insertar($sede,$mesa_nombre,$responsable,$fecha_registro)
		{

				$resultado = $this->db->query("INSERT INTO mesas(nombre,sede,usuario,fecha) VALUES ('$mesa_nombre',$sede,$responsable,'$fecha_registro')");
				
				//echo "INSERT INTO mesas(nombre,sede,usuario,fecha) VALUES ('$mesa_nombre',$sede,$responsable,'$fecha_registro')";	
		}

	
		public function modificar($id,$sede,$nombre,$responsable,$fecha_registro)
		{
			
			$resultado = $this->db->query("UPDATE mesas SET  nombre = '$nombre', sede = $sede, usuario = $responsable, fecha = '$fecha_registro' WHERE id_mesa = $id");			
			$resultado=null;
			//echo "UPDATE mesas SET  nombre = '$nombre', sede = $sede, usuario = $responsable, fecha = '$fecha_registro' WHERE id_mesa = $id";
		}
		
		public function eliminar($id)
		{
			
			$resultado = $this->db->query("UPDATE mesas SET estado = 0 WHERE id_mesa = '$id'");
			$resultado=null;
			
		}

        public function asignar($id)
		{
			
			$resultado = $this->db->query("UPDATE mesas SET estado = 2 WHERE id_mesa = '$id'");
			$resultado=null;
			
		}
		
		public function get_mesa($id)
		{
			$sql = "SELECT a.id_mesa,a.nombre,a.sede,a.fecha,b.NombreSede,b.idSede  FROM mesas a inner join sede b on a.sede = b.idSede WHERE id_mesa = $id";
			$resultado = $this->db->query($sql);
			$sql=null;
			$row = $resultado->fetch_assoc();
			$resultado=null;

			return $row;
		}
		
	}
