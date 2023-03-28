<?php
	
	class Usuarios_model {
		
		private $db;
		private $usuarios;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}
		
		public function get_usuarios()
		{
			//require("paginacion.php");
			$sql = "SELECT idUsuario, NombreSede,NombreRol,NombreIdentificacion,Identificacion ,Nombres,Apellidos,Direccion,Telefono,Usuario,Fecha_Registro From usuarios INNER JOIN rol ON Rol_idRol = idRol INNER JOIN tipoidentificacion ON TipoIdentificacion_idTipoIdentificacion = idTipoidentificacion INNER JOIN sede ON Sede_idSede = idSede WHERE usuarios.Estado = 1 ORDER BY idUsuario ";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->usuarios[] = $row;
			}
			return $this->usuarios;
		}
		
		public function insertar($sede,$rol,$ti,$nidentificacion,$nombre,$apellido,$direccion,$telefono,$usuario,$contrasena,$fecha_registro){
			
			$consulta= $this->db->query("SELECT * FROM usuarios Where Identificacion = '$nidentificacion' ");
			$resultado = mysqli_fetch_array($consulta);
			$consulta=null;

			if ($resultado > 0) {
				echo '<script>
				alert("Usuario Ya Registrado");
				window.history.go(-1);
				</script>';
			}
			else{
				$contrasena = $_POST['Contrasena'];
				date_default_timezone_set("america/bogota"); 
				$fecha_registro  =date('Y-m-d H:i:s');
				$pass_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
				$resultado = $this->db->query("INSERT INTO usuarios(Sede_idSede,Rol_idRol,TipoIdentificacion_idTipoIdentificacion,Identificacion,Nombres,Apellidos,Direccion,Telefono,Usuario,Contrasena,Fecha_registro) VALUES ($sede,$rol,$ti,$nidentificacion,'$nombre','$apellido','$direccion',$telefono,'$usuario','$pass_cifrada','$fecha_registro')");
				//echo "INSERT INTO usuarios(Sede_idSede,Rol_idRol,TipoIdentificacion_idTipoIdentificacion,Identificacion,Nombres,Apellidos,Direccion,Telefono,Usuario,Contrasena,Fecha_registro) VALUES ($sede,$rol,$ti,$nidentificacion,'$nombre','$apellido','$direccion',$telefono,'$usuario','$pass_cifrada','$fecha_registro')";
			}
		}

		public function ingresa($usuario,$contrasena){
			try
			{ 
				//echo 'estamos en UsuariosModel.php';
				$contador = 0;
				

				$usuario=htmlentities(addslashes($_POST["Usuario"]));
				$contrasena=htmlentities(addslashes($_POST["Contrasena"]));
				//$usuario=$_POST["Usuario"];
				//$contrasena_form=$_POST["Contrasena"];
				echo $usuario.$contrasena;
				//$base=new PDO('mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_3a692436df94fce','be189203f0cc93','191bdf26908897b');
				$base=new PDO("mysql:host=localhost; dbname=bar","root","");
  
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				  
				$sql="SELECT * FROM usuarios WHERE Usuario= :usuario";		 
				//echo $sql; 

				$resultado=$base->prepare($sql);
				//$sql=null; 
				$resultado->execute(array(':usuario'=>$usuario));
				//echo $contrasena;
				while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) 
				{	
					//echo 'ingresamos al ciclo';
					//$contrasena_base = $registro['Contrasena'];
					//echo $contrasena_base;
					//echo "Usuario:" . $registro['Usuario'] . "Contraseña" . $registro['Contrasena'];
					if (password_verify($contrasena, $registro['Contrasena'])) 
					{
						//session_start();
						//$_SESSION['usuari']=$registro['Nombres'];
						//$_SESSION[]=$registro['rol'];
						$contador++;
					}
				}

				if ($contador > 0) 
				{
					session_start();
					$sql = "SELECT idUsuario, NombreSede,NombreRol,NombreIdentificacion,Identificacion ,Nombres,Apellidos,Direccion,Usuario,Fecha_Registro,Sede_idSede From usuarios INNER JOIN rol ON Rol_idRol = idRol INNER JOIN tipoidentificacion ON TipoIdentificacion_idTipoIdentificacion = idTipoidentificacion INNER JOIN sede ON Sede_idSede = idSede WHERE Usuario= '$usuario'";
					$resultado = $this->db->query($sql);
					$fila= $resultado->fetch_assoc();
					$_SESSION['usuari']=$fila['Nombres'];
					$_SESSION['rol']=$fila['NombreRol'];
					$_SESSION['nom']=$fila['Usuario'];
					$_SESSION['id']=$fila['idUsuario'];
					$_SESSION['sede']=$fila['Sede_idSede'];
					$_SESSION['verifica']=true;
					header("Location:home.php");
				}
				
				else
				{
					echo '<script>
				      alert("La contraseña o correo de Usuario no son correctos");
				      window.history.go(-1);
				      </script>';
				}
				echo 'Contador'. $contador;
			}
			catch(Exception $e)
			{
				die("Error:" . $e ->getMessage());
			}

		}


		public function modificar($id,$sede,$rol,$ti,$nidentificacion,$nombre,$apellido,$direccion,$usuario){
			
			$resultado = $this->db->query("UPDATE usuarios SET Sede_idSede=$sede, Rol_idRol=$rol, TipoIdentificacion_idTipoIdentificacion=$ti, Identificacion=$nidentificacion, Nombres='$nombre', Apellidos='$apellido', Direccion='$direccion', Usuario='$usuario' WHERE idUsuario = '$id'");			
			$resultado=null;
			//echo "UPDATE usuarios SET Sede_idSede=$sede, Rol_idRol=$rol, TipoIdentificacion_idTipoIdentificacion=$ti, Identificacion=$nidentificacion, Nombres='$nombre', Apellidos='$apellido', Direccion='$direccion', Telefono=$telefono, Correo='$correo', Usuario='$usuario', Ambiente=$ambiente WHERE idUsuario = '$id'";
		}
		
		public function eliminar($id){
			
			$resultado = $this->db->query("UPDATE usuarios SET Estado = 0 WHERE idUsuario = '$id'");
			$resultado=null;
			
		}
		
		public function get_usuario($id)
		{
			$sql = "SELECT idUsuario,Sede_idSede,TipoIdentificacion_idTipoIdentificacion,Rol_idRol, NombreSede,NombreRol,NombreIdentificacion,Identificacion ,Nombres,Apellidos,Direccion,Usuario,Fecha_Registro From usuarios INNER JOIN rol ON Rol_idRol = idRol INNER JOIN tipoidentificacion ON TipoIdentificacion_idTipoIdentificacion = idTipoidentificacion INNER JOIN sede ON Sede_idSede = idSede WHERE idUsuario='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$sql=null;
			$row = $resultado->fetch_assoc();
			$resultado=null;

			return $row;
		}
	}
