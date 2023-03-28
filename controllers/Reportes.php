<?php
	
	class ReportesController {
		
		public function __construct(){
			require_once "models/PedidosModel.php";
		}
		
		public function index(){
			
			require_once "views/reportes/reporte.php";	
		}

		public function index2(){
			
			require_once "views/reportes/reporte2.php";	
		}
	}
?>