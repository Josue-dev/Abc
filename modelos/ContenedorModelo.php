<?php  
if ($peticionAjax) {
	require_once "../core/MainModel.php";
}else{
	require_once "./core/MainModel.php";
}
class ContenedorModelo extends MainModel{
		
	protected function agregarContenedorModelo($datos){
		$nombre = $datos['nombre'];
		$fecha=$datos['fecha'];
		$cantidad = $datos['cantidad'];
		$producto=$datos['producto'];
		$estado=$datos['estado'];
		$usuario=$datos['usuario'];
		$descripcion=$datos['descripcion'];


		$sql=MainModel::conectar()->prepare("INSERT INTO contenedor(tipo_contenedor, fecha_arrivo, cantidad_producto, productos, estado, usuario, descripcion, fecha_creacion, fecha_modificacion) VALUES('$nombre','$fecha','$cantidad', '$producto', '$estado', '$usuario', '$descripcion',NOW(), NULL)");
		$sql->execute();

		return $sql;
	}

}