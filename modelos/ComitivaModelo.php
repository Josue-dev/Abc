<?php  
if ($peticionAjax) {
	require_once "../core/MainModel.php";
}else{
	require_once "./core/MainModel.php";
}
class ComitivaModelo extends MainModel{
		
	protected function agregarComitivaModelo($datos){
		$sql=MainModel::conectar()->prepare("INSERT INTO comitiva(IdTipoComitiva, ComitivaNombre, ComitivaDescripcion) VALUES(:TipoComitiva, :Nombre, :Descripcion)");
		$sql->bindParam(":TipoComitiva", $datos['TipoComitiva']);
		$sql->bindParam(":Nombre", $datos['Nombre']);
		$sql->bindParam(":Descripcion", $datos['Descripcion']);

		$sql->execute();

		return $sql;
	}
	
	protected function seleccionarTipoComitivaModelo(){
			$sql=MainModel::conectar()->query("SELECT * FROM tipoComitiva");
			$sql=$sql->fetchAll();
			return $sql;
	}
}