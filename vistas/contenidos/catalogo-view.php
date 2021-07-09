<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/sb-1.0.1/sp-1.2.2/datatables.min.css"/>
</head>
<?php require_once "./controladores/ProductosControlador.php"; 
	$datos = new ProductosControlador();
	
	$usuario = $_SESSION['usuario_sbp'];
	
?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles">Catalogo <small>Productos</small></h1>
	</div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			PRODUCTOS
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-account"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box">7</p>
			<small>Registros</small>
		</div>
	</article>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			PROVEEDORES
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-male-alt"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box">10</p>
			<small>Registros</small>
		</div>
	</article>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			CONTENEDORES
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-face"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box">70</p>
			<small>Registro</small>
		</div>
	</article>
</div>
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EVENTOS</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered display" id="table_id">
					<?php echo $datos->seleccionarCatalogoControlador(); ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
<script type="text/javascript">
	 $(function() {
      $('#table_id').DataTable();
    });
</script>