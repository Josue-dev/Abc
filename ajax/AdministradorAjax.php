<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	if (isset($_POST['tipoFormulario'])) {

		switch ($_POST['tipoFormulario']) {
			case 'newAgent':
				if (isset($_POST['dpi-reg']) && isset($_POST['nombre-reg'])) {
					require_once "../controladores/AgenteControlador.php";
				$insAgente=new AgenteControlador();
				echo $insAgente->agregarAgenteControlador();
				}
				break;
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
			case 'upAgent':
				if (isset($_POST['dpi-reg']) && isset($_POST['nombre-reg'])) {
					require_once "../controladores/AgenteControlador.php";
				$insAgente=new AgenteControlador();
				echo $insAgente->editarAgenteControlador();
				}
				break;
			case 'deleteAgent':
				if (isset($_POST['codigo-del']) && isset($_POST['privilegio-admin'])) {
					require_once "../controladores/AgenteControlador.php";
				$delAgente=new AgenteControlador();
				echo $delAgente->eliminarAgenteControlador();
				}
				break;
			case 'newretinue':
				if (isset($_POST['comitiva-reg']) && isset($_POST['nombre-reg'])) {
					require_once "../controladores/ComitivaControlador.php";
				$agregarComitiva=new ComitivaControlador();
				echo $agregarComitiva->agregarComitivaControlador();
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
	