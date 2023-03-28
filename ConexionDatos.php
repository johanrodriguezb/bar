<?php
class conexiondatos
{
	public $server = 'localhost';
	public $usuario = 'root';
	public $contrasena = '';
	public $BaseDeDatos = 'bar';
	public $conexion;


      public function conectar()
      {
	
	     $conexion = mysqli_connect($this->server, $this->usuario, $this->contrasena, $this->BaseDeDatos)or die("Error en la conexion con la base de datos");
		

	        if($conexion)
			{
				echo"";
				
				 
			}else{
				echo"error";
			}

			return $conexion;
		      
      }
}
