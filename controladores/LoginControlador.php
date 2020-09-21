<?php  
if ($peticionAjax) {
	require_once "../modelos/LoginModelo.php";
}else{
	require_once "./modelos/LoginModelo.php";
}

class LoginControlador extends LoginModelo {
	
	public function iniciarSesionControlador(){
		$usuario=MainModel::limpiarCadena($_POST['usuario']);
		$clave=MainModel::limpiarCadena($_POST['clave']);

		$clave = MainModel::encriptar($clave);

		$datosLogin = [
			"Usuario"=>$usuario,
			"Clave"=>$clave
		];

		$datosCuenta=LoginModelo::iniciarSesionModelo($datosLogin);

		if ($datosCuenta->rowCount() == 1) {
			$row=$datosCuenta->fetch();

			$fechaActual=date("Y-m-d");
			$yearActual=date("Y");
			$horaActual=date("h:i:s a");

			$consulta1=MainModel::ejecutarConsultaSimple("SELECT id FROM bitacora");
			$numero=($consulta1->rowCount())+1;
			$codigoB=MainModel::generarCodigoAleatorio("CB", 7, $numero);
			$datosBitacora=[
				"Codigo" => $codigoB,
				"Fecha" => $fechaActual,
				"HoraInicio" => $horaActual,
				"HoraFinal" => "Sin Registro",
				"Tipo" => $row['CuentaTipo'],
				"Year" => $yearActual,
				"CuentaCodigo" => $row['CuentaCodigo']
			];
			$insertarBitacora=MainModel::guardarBitacora($datosBitacora);
			if ($insertarBitacora->rowCount()==1) {
				session_start(['name' => 'SBP']);
				$_SESSION['usuario_sbp'] = $row['CuentaUsuario'];
				$_SESSION['tipo_sbp'] = $row['CuentaTipo'];
				$_SESSION['privilegio_sbp'] = $row['CuentaPrivilegio'];
				$_SESSION['foto_sbp'] = $row['CuentaFoto'];
				//Vamos a crear un toquen para cada sesion
				$_SESSION['token_sbp'] = md5(uniqid(mt_rand(), true));
				$_SESSION['codigo_cuenta_sbp'] = $row['CuentaCodigo'];
				$_SESSION['codigo_bitacora_sbp']=$codigoB;
				if ($row['CuentaTipo'] == "Administrador") {
					$url=SERVERURL."home/";
				}else{
					$url=SERVERURL."catalog/";
				}
				
				return $urlLocation='<script>
					window.location="'.$url.'"
				</script>';
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido iniciar la sesion por problemas tecnicos, por favor intente nuevamente",
					"Tipo"=>"error"
				];
			return MainModel::sweetAlert($alerta);
			}
		}else{
			$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El nombre de usuario o contraseña no son correctos o su cuenta puede estar deshabilitada".$clave,
					"Tipo"=>"error"
				];
			return MainModel::sweetAlert($alerta);
		}


	}

	public function cerrarSesionControlador(){
		session_start(['name' => 'SBP']);
		$token=MainModel::desencriptar($_GET['Token']);
		$hora=date("h:i:s a");
		$datos=[
			"Usuario"=>$_SESSION['usuario_sbp'],
			"Token_S"=>$_SESSION['token_sbp'],
			"Token"=>$token,
			"Codigo"=>$_SESSION['codigo_bitacora_sbp'],
			"Hora"=>$hora
		];
		return LoginModelo::cerrarSesionModelo($datos);
	}

		public function forzarCierreSessionControlador(){
		session_destroy();
		return header("Location: ".SERVERURL."login/");
	}
	
}