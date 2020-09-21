<?php  
if ($peticionAjax) {
	require_once "../core/MainModel.php";
}else{
	require_once "./core/MainModel.php";
}
class AdministradorModelo extends MainModel{
	protected function agregarAdministradorModelo($datos){
		$sql=MainModel::conectar()->prepare("INSERT INTO admin(AdminDNI, AdminNombre, AdminApellido, AdminTelefono, AdminDireccion, CuentaCodigo) VALUES(:DNI, :Nombre, :Apellido, :Telefono, :Direccion, :Codigo)");
		$sql->bindParam(":DNI", $datos['DNI']);
		$sql->bindParam(":Nombre", $datos['Nombre']);
		$sql->bindParam(":Apellido", $datos['Apellido']);
		$sql->bindParam(":Telefono", $datos['Telefono']);
		$sql->bindParam(":Direccion", $datos['Direccion']);
		$sql->bindParam(":Codigo", $datos['Codigo']);
		$sql->execute();

		return $sql;
	}
	protected function eliminarAdministradorModelo($codigo ){
		$query=MainModel::conectar()->prepare("DELETE FROM admin WHERE CuentaCodigo = :Codigo");
		$query->bindParam(":Codigo", $codigo);
		$query->execute();
		return $query;
	}
}
