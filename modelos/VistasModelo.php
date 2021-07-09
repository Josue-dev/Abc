<?php
	class VistasModelo
	{
		protected function obtenerVistasModelo($vistas ){
		if ($vistas =="index" || $vistas == "login") {
			$contenido = "login";
		}else{
			$listaBlanca=[ "admin", "home","agenttimeline", "myaccount", "mydata", "catalogo", "producto","contenedor", "proveedor", "productoList"];
		if (in_array($vistas, $listaBlanca)) {
			if (is_file("./vistas/contenidos/".$vistas."-view.php")) {
				$contenido = "./vistas/contenidos/".$vistas."-view.php";
				}else{
				$contenido = "login";
			}

			}else{
				$contenido="404";
			}
	}	

		return $contenido;
	}
				
}	

		
