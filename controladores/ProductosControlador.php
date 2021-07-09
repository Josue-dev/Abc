<?php
	if ($peticionAjax) {
		require_once "../modelos/ProductoModelo.php";
	}else{
		require_once "./modelos/ProductoModelo.php";
	}
	class ProductosControlador extends ProductoModelo{

		public function agregarProductoControlador(){
			$usuario = MainModel::limpiarCadena($_POST['usuario-reg']);
			$nombreProducto = MainModel::limpiarCadena($_POST['nombre-reg']);
			$cantidadProducto=MainModel::limpiarCadena($_POST['cantidad-reg']);
			$precioProducto=MainModel::limpiarCadena($_POST['precio-reg']);
			$cajasProducto=MainModel::limpiarCadena($_POST['cajas-reg']);
			$contenedor=MainModel::limpiarCadena($_POST['contenedor-reg']);
			$proveedor=MainModel::limpiarCadena($_POST['proveedor-reg']);
			$volumenProducto=MainModel::limpiarCadena($_POST['volumen-reg']);
			$numeroFactura=MainModel::limpiarCadena($_POST['factura-reg']);
			$descripcion=MainModel::limpiarCadena($_POST['descripcion-reg']);
			$estado =1;


			$consulta=MainModel::ejecutarConsultaSimple("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".DB."' AND TABLE_NAME = 'producto'");
			$sigIdProducto=$consulta->fetch(PDO::FETCH_ASSOC);
			$sigIdProducto=$sigIdProducto['AUTO_INCREMENT'];

			$codigo=mainModel::generarCodigoAleatorio("PR", 7,$sigIdProducto);


			$extensionFactura = '';
			$ruta_factura = 'adjuntos/pdfFactura/';
			$archivo_factura = $_FILES['factura']['tmp_name'];
			$factura_archivo = $_FILES['factura']['name'];
			$info_factura = pathinfo($factura_archivo);
			if ($archivo_factura != '') {
				$extensionFactura = $info_factura['extension'];
				if ($extensionFactura == "png" || $extensionFactura == "PNG" || $extensionFactura == "JPG" || $extensionFactura == "jpg" || $extensionFactura == "JPEG" || $extensionFactura == "jpeg" || $extensionFotoProducto == "PDF" || $extensionFotoProducto == "pdf") {
					move_uploaded_file($archivo_factura, '../adjuntos/pdfFactura/'.$codigo.'.'.$extensionFactura);
					$ruta_factura = $ruta_factura.$codigo.'.'.$extensionFactura;
				};
			};

			$extensionFotoProducto = '';
			$ruta = 'adjuntos/fotosProducto/';
			$archivo = $_FILES['foto']['tmp_name'];
			$nombre_archivo = $_FILES['foto']['name'];
			$info = pathinfo($nombre_archivo);
			if ($archivo != '') {
				$extensionFotoProducto = $info['extension'];
				if ($extensionFotoProducto == "png" || $extensionFotoProducto == "PNG" || $extensionFotoProducto == "JPG" || $extensionFotoProducto == "jpg" || $extensionFotoProducto == "JPEG" || $extensionFotoProducto == "jpeg") {
					move_uploaded_file($archivo, '../adjuntos/fotosProducto/'.$codigo.'.'.$extensionFotoProducto);
					$ruta = $ruta.$codigo.'.'.$extensionFotoProducto;
				};
			};

			$datosProducto = [
				"nombreProducto" => $nombreProducto,
				"cantidadProducto" => $cantidadProducto,
				"precioProducto" => $precioProducto,
				"usuario" => $usuario,
				"estado" => $estado,
				"foto" => $ruta,
				"codigo"=>$codigo,
				"cajas"=>$cajasProducto,
				"volumenProducto"=>$volumenProducto,
				"numeroFactura"=>$numeroFactura,
				"factura"=>$ruta_factura,
				"descripcion"=>$descripcion,
				"contenedor"=>$contenedor,
				"proveedor"=>$proveedor
			];

			$guardarProducto = ProductoModelo::agregarProductoModelo($datosProducto);
			if($guardarProducto->rowCount()>=1) {
				$alerta=[
					"Alerta"=>"limpiar",
					"Titulo"=>"Producto Registrado",
					"Texto"=>"El Producto se registro con éxito",
					"Tipo"=>"success"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido registrar el Producto",
					"Tipo"=>"error"
				];
			}
			return MainModel::sweetAlert($alerta);
		}

		//select data
		public function seleccionarContenedorControlador(){
			$datos = ProductoModelo::seleccionarContenedorModelo();
			$conenedor = '';
			foreach ($datos as $rows) {
				$contenedor .= '<option value="'.$rows['id_contenedor'].'">'.$rows['tipo_contenedor'].'</option>';
			}
			return $contenedor;
		}
		public function seleccionarProveedorControlador(){
			$datos = ProductoModelo::seleccionarProveedorModelo();
			$proveedor = '';
			foreach ($datos as $rows) {
				$proveedor .= '<option value="'.$rows['id_proveedor'].'">'.$rows['empresa'].'</option>';
			}
			return $proveedor;
		}


		public function seleccionarProductosControlador(){

			$datos = ProductoModelo::seleccionarProductoModelo();
			
			$seleccionar = '
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">NOMBRE</th>
					<th class="text-center">CANTIDAD:</th>
					<th class="text-center">PRECIO</th>
					<th class="text-center">CODIGO</th>
					<th class="text-center">ESTADO</th>
					<th class="text-center">USUARIO</th>
					<th class="text-center">CONTENEDOR</th>
					<th class="text-center">PROVEEDOR</th>
				</tr>
			</thead>';
			foreach ($datos as $rows) {	

			if ($rows['cantidad_producto']==='0') {
					$estado='NO DISPONIBLE';
			}else{
				$estado='DISPONIBLE';
			}	
				$seleccionar .= '
					<tr >
						<td >'.$rows['id_producto'].'</td>
						<td >'.$rows['nombre_producto'].'</td>
						<td >'.$rows['cantidad_producto'].'</td>
						<td >'.$rows['precio_producto'].'</td>
						<td >'.$rows['codigo_producto'].'</td>
						<td style="font-size: 10px; ">'.$estado.'</td>
						<td >'.$rows['usuario_producto'].'</td>
						<td >'.$rows['tipo_contenedor'].'</td>
						<td >'.$rows['empresa'].'</td>
					</tr>';
							
			}
			return $seleccionar;
		}


		public function seleccionarCatalogoControlador(){
			$datos = ProductoModelo::seleccionarCatalogoModelo();


			$seleccionar = '
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">NOMBRE</th>
					<th class="text-center">CANTIDAD:</th>
					<th class="text-center">PRECIO</th>
					<th class="text-center">CODIGO</th>
					<th class="text-center">ESTADO</th>
					<th class="text-center">FOTO</th>
				</tr>
			</thead>';
			foreach ($datos as $rows) {	

			if ($rows['cantidad_producto']==='0') {
					$estado='NO DISPONIBLE';
			}else{
				$estado='DISPONIBLE';
			}	
				$seleccionar .= '
					<tr >
						<td >'.$rows['id_producto'].'</td>
						<td >'.$rows['nombre_producto'].'</td>
						<td >'.$rows['cantidad_producto'].'</td>
						<td >'.$rows['precio_producto'].'</td>
						<td >'.$rows['codigo_producto'].'</td>
						<td style="font-size: 10px; ">'.$estado.'</td>
						<td ><a href="'.$rows['ruta_foto'].'" target="_black" >ver foto</a></td>
					</tr>';
							
			}
			return $seleccionar;


		}

	}

?>