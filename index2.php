<?php
	
	require_once ("config/config.php");
	require_once ("core/routes.php");
	require_once ("config/database.php");
	require_once ("controllers/Inventarios.php");

	if(isset($_GET['c'])){
		
		$controlador = cargarControlador($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccion($controlador, $_GET['a']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPAL_I);
		}
		
		} else {
		
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL_I);
		$accionTmp = ACCION_PRINCIPAL_I;
		$controlador->$accionTmp();
	}

	if(isset($_GET['c'])){
		
		$controlador = cargarControlador($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccion($controlador, $_GET['a']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPAL_C);
		}
		
		} else {
		
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL_C);
		$accionTmp = ACCION_PRINCIPAL_C;
		$controlador->$accionTmp();
	}
?>