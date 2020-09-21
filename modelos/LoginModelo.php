<?php  
if ($peticionAjax) {
	require_once "../core/MainModel.php";
}else{
	require_once "./core/MainModel.php";
}

class LoginModelo extends MainModel{
	protected function iniciarSesionModelo($datos){
		$sql=MainModel::conectar()->prepare("SELECT * FROM cuenta WHERE CuentaUsuario=:Usuario AND CuentaClave=:Clave AND CuentaEstado='Activo'");
		$sql->bindParam(':Usuario', $datos['Usuario']);
		$sql->bindParam(':Clave', $datos['Clave']);
		$sql->execute();
		return $sql;
	}

	protected function cerrarSesionModelo($datos){
		if ($datos['Usuario'] != "" && $datos['Token_S'] == $datos['Token']) {
			$Abitacora=MainModel::actualizarBitacora($datos['Codigo'], $datos['Hora']);
			if ($Abitacora->rowCount()>=1) {
				session_unset();
				session_destroy();
				$respuesta="true";
			}else{
				$respuesta = "false";
			}
			
		}else{
			$respuesta="false";
		}
		return $respuesta;
	}

}