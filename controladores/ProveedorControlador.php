<?php
	if ($peticionAjax) {
		require_once "../modelos/ProveedorModelo.php";
	}else{
		require_once "./modelos/ProveedorModelo.php";
	}
	class ProveedorControlador extends ProveedorModelo{

		public function agregarProveedorControlador(){
			$usuario = MainModel::limpiarCadena($_POST['usuario-reg']);
			$nombre = MainModel::limpiarCadena($_POST['nombre-reg']);
			$direccion=MainModel::limpiarCadena($_POST['direccion-reg']);
			$nit=MainModel::limpiarCadena($_POST['nit-reg']);
			$contacto=MainModel::limpiarCadena($_POST['contacto-reg']);
			$web=MainModel::limpiarCadena($_POST['web-reg']);
			$contactoCel=MainModel::limpiarCadena($_POST['contactoCel-reg']);
			$telefono=MainModel::limpiarCadena($_POST['telefono-reg']);
			$correo=MainModel::limpiarCadena($_POST['correo-reg']);
			$pago=MainModel::limpiarCadena($_POST['pago-reg']);
			$descripcionProducto=MainModel::limpiarCadena($_POST['producto-reg']);
			$descripcion=MainModel::limpiarCadena($_POST['descripcion-reg']);
			$estado =1;


			$datos = [
				"usuario" => $usuario,
				"nombre" => $nombre,
				"direccion" => $direccion,
				"nit" => $nit,
				"contacto" => $contacto,
				"web" => $web,
				"correo"=>$correo,
				"pago"=>$pago,
				"producto"=>$descripcionProducto,
				"descripcion"=>$descripcion,
				"estado"=>$estado,
				"telefono"=>$telefono,
				"contactoCel"=>$contactoCel
			];

			$guardar = ProveedorModelo::agregarProveedorModelo($datos);
			if($guardar->rowCount()>=1) {
				$alerta=[
					"Alerta"=>"limpiar",
					"Titulo"=>"Proveedor Registrado",
					"Texto"=>"El Proveedor se registro con éxito",
					"Tipo"=>"success"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido registrar el Proveedor",
					"Tipo"=>"error"
				];
			}
			return MainModel::sweetAlert($alerta);
		}





	}

?>