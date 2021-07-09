<?php  
if ($peticionAjax) {
	require_once "../core/MainModel.php";
}else{
	require_once "./core/MainModel.php";
}
class ProveedorModelo extends MainModel{
		
	protected function agregarProveedorModelo($datos){
		$usuario 	=$datos['usuario'];
		$nombre		=$datos['nombre'];
		$direccion 	=$datos['direccion'];
		$nit		=$datos['nit'];
		$contacto	=$datos['contacto'];
		$web		=$datos['web'];
		$correo		=$datos['correo'];
		$pago		=$datos['pago'];
		$producto	=$datos['producto'];
		$descripcion=$datos['descripcion'];
		$estado		=$datos['estado'];
		$telefono	=$datos['telefono'];
		$contactoCel=$datos['contactoCel'];


		$sql=MainModel::conectar()->prepare("INSERT INTO proveedor(empresa, direccion, nit, contacto, cel_contacto, web, correo, telefono, pago, productos, descripcion, usuario, estado,fecha_creacion, fecha_modificacion) VALUES('$nombre','$direccion','$nit', '$contacto', '$contactoCel', '$web', '$correo', '$telefono', '$pago','$producto','$descripcion','$usuario','$estado',NOW(), NULL)");
		$sql->execute();

		return $sql;
	}

}