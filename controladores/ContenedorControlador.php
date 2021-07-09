

<?php
	if ($peticionAjax) {
		require_once "../modelos/ContenedorModelo.php";
	}else{
		require_once "./modelos/ContenedorModelo.php";
	}
	class ContenedorControlador extends ContenedorModelo{

		public function agregarContenedorControlador(){
			$usuario = MainModel::limpiarCadena($_POST['usuario-reg']);
			$nombre = MainModel::limpiarCadena($_POST['nombre-reg']);
			$fecha=MainModel::limpiarCadena($_POST['fecha-reg']);
			$cantidad=MainModel::limpiarCadena($_POST['cantidad-reg']);
			$producto=MainModel::limpiarCadena($_POST['producto-reg']);
			$descripcion=MainModel::limpiarCadena($_POST['descripcion-reg']);
			$estado =1;


			$consulta=MainModel::ejecutarConsultaSimple("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".DB."' AND TABLE_NAME = 'contenedor'");
			$sigIdContenedor=$consulta->fetch(PDO::FETCH_ASSOC);
			$sigIdContenedor=$sigIdContenedor['AUTO_INCREMENT'];

			$codigo=mainModel::generarCodigoAleatorio("CON", 7,$sigIdContenedor);


		

			$datos = [
				"usuario" => $usuario,
				"nombre" => $nombre,
				"fecha" => $fecha,
				"cantidad" => $cantidad,
				"producto" => $producto,
				"estado" => $estado,
				"descripcion"=>$descripcion
			];

			$guardar = ContenedorModelo::agregarContenedorModelo($datos);
			if($guardar->rowCount()>=1) {
				$alerta=[
					"Alerta"=>"limpiar",
					"Titulo"=>"Contenedor Registrado",
					"Texto"=>"El Contenedor se registro con éxito",
					"Tipo"=>"success"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido registrar el Contenedor",
					"Tipo"=>"error"
				];
			}
			return MainModel::sweetAlert($alerta);
		}





	}

?>