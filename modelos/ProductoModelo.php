<?php  
if ($peticionAjax) {
	require_once "../core/MainModel.php";
}else{
	require_once "./core/MainModel.php";
}
class ProductoModelo extends MainModel{
		
	protected function agregarProductoModelo($datos){
		$nombre = $datos['nombreProducto'];
		$cantidad=$datos['cantidadProducto'];
		$precio = $datos['precioProducto'];
		$foto=$datos['foto'];
		$codigo=$datos['codigo'];
		$estado=$datos['estado'];
		$usuario=$datos['usuario'];

		$cajas =$datos['cajas'];
		$volumen=$datos['volumenProducto'];
		$numeroFactura=$datos['numeroFactura'];
		$factura = $datos['factura'];
		$descripcion=$datos['descripcion'];
		$contenedor = $datos['contenedor'];
		$proveedor =$datos['proveedor'];

		$sql=MainModel::conectar()->prepare("INSERT INTO producto(nombre_producto, cantidad_producto, precio_producto, volumen, cajas, id_contenedor, id_proveedor, numero_factura, ruta_factura, ruta_foto, codigo_producto, estado_producto, usuario_producto, fechaIngreso_producto, modificado_producto, descripcion) VALUES('$nombre','$cantidad','$precio', '$volumen', '$cajas', '$contenedor', '$proveedor', '$numeroFactura', '$factura', '$foto','$codigo','$estado','$usuario',NOW(), NULL, '$descripcion')");
		$sql->execute();

		return $sql;
	}

	protected function seleccionarContenedorModelo(){
		$sql = MainModel::conectar()->query("SELECT id_contenedor, tipo_contenedor FROM contenedor");
		$sql=$sql->fetchAll();
		return $sql;
	}
	protected function seleccionarProveedorModelo(){
		$sql = MainModel::conectar()->query("SELECT id_proveedor, empresa FROM proveedor");
		$sql=$sql->fetchAll();
		return $sql;
	}
	protected function seleccionarProductoModelo(){
		$sql = MainModel::conectar()->query("SELECT A.id_producto, A.nombre_producto, A.cantidad_producto, A.precio_producto, A.volumen, A.cajas, A.numero_factura, A.ruta_factura, A.ruta_foto, A.codigo_producto, A.estado_producto, A.usuario_producto, A.fechaIngreso_producto, B.tipo_contenedor, C.empresa FROM producto A, contenedor B, proveedor C WHERE A.id_contenedor=B.id_contenedor AND A.id_proveedor=C.id_proveedor AND estado_producto=1");
		$sql = $sql->fetchAll();
		return $sql;
	}

	protected function seleccionarCatalogoModelo(){
		$sql = MainModel::conectar()->query("SELECT A.id_producto, A.nombre_producto, A.cantidad_producto, A.precio_producto, A.ruta_foto, A.codigo_producto, A.estado_producto FROM producto A JOIN contenedor B ON A.id_contenedor=B.id_contenedor JOIN proveedor C ON A.id_proveedor=C.id_proveedor  WHERE  estado_producto=1");
		$sql = $sql->fetchAll();
		return $sql;

	}

}
