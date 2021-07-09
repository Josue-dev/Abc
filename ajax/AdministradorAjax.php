<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	if (isset($_POST['tipoFormulario'])) {

		switch ($_POST['tipoFormulario']) {
			case 'newAdmin':
				require_once "../controladores/AdministradorControlador.php";
				$insAdmin=new AdministradorControlador();
				if (isset($_POST['dni-reg']) && $_POST['nombre-reg']) {
					
					echo $insAdmin->agregarAdministradorControlador();
				}
				break;
			case 'delAdmin':
				require_once "../controladores/AdministradorControlador.php";
				$delAdmin=new AdministradorControlador();
				if (isset($_POST['privilegio-admin']) && isset($_POST['codigo-del']) ) {
					echo $delAdmin->eliminarAdministradorControlador();
				}
				break;
			case 'newProducto':
				if (isset($_POST['nombre-reg'])) {
					require_once "../controladores/ProductosControlador.php";
					$agregar = new ProductosControlador();
					echo $agregar->agregarProductoControlador();
				}
				break;
			case 'newContenedor':
				if (isset($_POST['nombre-reg'])) {
					require_once "../controladores/ContenedorControlador.php";
					$agregar = new ContenedorControlador();
					echo $agregar->agregarContenedorControlador();
				}
				break;
			case 'newProveedor':
				if (isset($_POST['nombre-reg'])) {
					require_once "../controladores/ProveedorControlador.php";
					$agregar = new ProveedorControlador();
					echo $agregar->agregarProveedorControlador();
				}
				break;
			default:
				# code...newretinue
				break;
		}
		
	}else{
		session_start(['name'=>'SBP']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}
	