<!-- Content page -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Administración <small>CONTENEDORES</small></h1>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>contenedor/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CONTENEDOR
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>contenedorList/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CONTENEDORES
	  		</a>
	  	</li>
	</ul>
</div>
<?php
	
	$usuario = $_SESSION['usuario_sbp'];
	
?>
<!-- panel datos de la empresa -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL CONTENEDOR</h3>
		</div>
		<div class="panel-body">
			<form autocomplete="off" class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/AdministradorAjax.php" enctype="multipart/form-data" method="POST" data-form="save">
				<input type="hidden" name="tipoFormulario" value="newContenedor">
				<input type="hidden" name="usuario-reg" value="<?php echo $usuario?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos generales</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">TIPO DE CONTENEDOR</label>
								  	<input   class="form-control" type="text" name="nombre-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">FECHA ARRIVO *</label>
								  	<input class="form-control"  type="date" value="<?php echo date("Y-m-d");?>" name="fecha-reg" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">CANTIDAD PRODUCTOS *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="Number" name="cantidad-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">PRODUCTOS  *</label>
								  	<input  class="form-control" type="text" name="producto-reg" required="" maxlength="90">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
    			<div class="col-xs-12 col-sm-12">
					<div class="form-group label-floating">
						<label class="control-label">Descripcion *</label>
						<input  class="form-control" type="text" name="descripcion-reg" required="" maxlength="500">
					</div>
		    	</div>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>