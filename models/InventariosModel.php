<?php
	
	class Inventarios_model {
		
		private $db;
		private $inventarios;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->inventarios = array();
		}
		
		public function get_inventarios()
		{
			
			$sql = "SELECT a.id_producto, a.nombre, a.proveedor,a.sede, a.cantidad, a.precio, a.fecha, a.id_responsable, a.estado as estadoP, b.Nombres,b.Apellidos,c.NombreSede, d.nombre FROM productos a inner join usuarios b on a.id_responsable = b.idUsuario inner join sede c on a.sede = c.idSede inner join proveedores d on a.proveedor = d.id_proveedor WHERE a.estado = 1";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->inventarios[] = $row;
			}
			return $this->inventarios;
		}

		public function get_inventariosC()
		{
			
			$sql = "SELECT * FROM combos WHERE estado = 1";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->combos[] = $row;
			}
			return $this->combos;
		}

		public function insertar($sede,$proveedor,$nombre,$precio,$cantidad,$responsable,$fecha_registro)
		{

				$resultado = $this->db->query("INSERT INTO productos(nombre,proveedor,sede,cantidad,precio,fecha,id_responsable) VALUES ('$nombre',$proveedor,$sede,$cantidad,$precio,'$fecha_registro',$responsable)");
				
				//echo "INSERT INTO productos(nombre,proveedor,sede,cantidad,precio,fecha,id_responsable) VALUES ('$nombre',$proveedor,$sede,$cantidad,$precio,'$fecha_registro',$responsable)";	
		}

		public function insertarC($nombre,$precio,$descrip,$fecha_registro)
		{

				$resultado = $this->db->query("INSERT INTO combos(nombre,precio,descripcion,fecha) VALUES ('$nombre',$precio,'$descrip','$fecha_registro')");
				
				//echo "INSERT INTO combos(nombre,precio,descripcion,fecha) VALUES ('$nombre',$precio,'$descrip','$fecha_registro')";	
		}
	
		public function modificar($id, $sede,$proveedor,$nombre,$precio,$cantidad,$responsable,$fecha_registro)
		{
			
			$resultado = $this->db->query("UPDATE productos SET nombre = '$nombre', proveedor = $proveedor, sede = $sede , cantidad = $cantidad, precio = $precio, fecha = '$fecha_registro', id_responsable = $responsable WHERE id_producto = $id");			
			$resultado=null;
			//echo "UPDATE productos SET nombre = '$nombre', proveedor = $proveedor, sede = $sede , cantidad = $cantidad, precio = $precio, fecha = '$fecha_registro', id_responsable = $responsable WHERE id_producto = $id";
		}
		
		public function modificarC($id,$nombre,$precio,$descrip,$fecha_registro)
		{
			
			$resultado = $this->db->query("UPDATE combos SET nombre = '$nombre', precio = $precio, descripcion = '$descrip', fecha = '$fecha_registro' WHERE id_combo = $id");			
			$resultado=null;
			//echo "UPDATE productos SET nombre = '$nombre', proveedor = $proveedor, sede = $sede , cantidad = $cantidad, precio = $precio, fecha = '$fecha_registro', id_responsable = $responsable WHERE id_producto = $id";
		}

		public function eliminar($id)
		{
			
			$resultado = $this->db->query("UPDATE productos SET estado = 0 WHERE id_producto = '$id'");
			$resultado=null;
			
		}

		public function eliminarC($id)
		{
			
			$resultado = $this->db->query("UPDATE combos SET estado = 0 WHERE id_combo = '$id'");
			$resultado=null;
			
		}
		
		public function get_inventario($id)
		{
			$sql = "SELECT a.id_producto, a.nombre as nombreP, a.precio, a.proveedor as idProveedor,a.cantidad,a.fecha,b.Nombres, b.Apellidos, c.NombreSede as nomSede, d.nombre as nomPro, a.sede as idSede FROM productos a inner join usuarios b on a.id_responsable = b.idUsuario inner join sede c on a.sede = c.idSede inner join proveedores d on a.proveedor = d.id_proveedor WHERE id_producto = $id";
			$resultado = $this->db->query($sql);
			$sql=null;
			$row = $resultado->fetch_assoc();
			$resultado=null;

			return $row;
		}

		public function get_combo($id)
		{
			$sql = "SELECT * FROM combos WHERE id_combo = $id";
			$resultado = $this->db->query($sql);
			$sql=null;
			$row = $resultado->fetch_assoc();
			$resultado=null;

			return $row;
		}
		
	}
