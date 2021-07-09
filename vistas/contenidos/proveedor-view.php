<!-- Content page -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Administración <small>PROVEEDORES</small></h1>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>producto/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROVEEDOR
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>productoList/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROVEEDORES
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
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL PROVEEDOR</h3>
		</div>
		<div class="panel-body">
			<form autocomplete="off" class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/AdministradorAjax.php" enctype="multipart/form-data" method="POST" data-form="save">
				<input type="hidden" name="tipoFormulario" value="newProveedor">
				<input type="hidden" name="usuario-reg" value="<?php echo $usuario?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos generales</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">NOMBRE DEL EMPRESA</label>
								  	<input class="form-control" type="text" name="nombre-reg" required="" maxlength="100">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DIRECCION *</label>
								  	<input class="form-control" type="text" name="direccion-reg" required="" maxlength="100">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">NIT *</label>
								  	<input class="form-control" type="Number" name="nit-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">TELEFONO *</label>
								  	<input class="form-control" type="Number" name="telefono-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">CONTACTO NOMBRE *</label>
								  	<input  class="form-control" type="text" name="contacto-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">CONTACTO TELEFONO *</label>
								  	<input  class="form-control" type="text" name="contactoCel-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">SITIO WEB *</label>
								  	<input  class="form-control" type="text" name="web-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">CORREO *</label>
								  	<input  class="form-control" type="email" name="correo-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">PAGO *</label>
								  	<input  class="form-control" type="text" name="pago-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DESCRIPCION DE PRODUCTOS *</label>
								  	<input  class="form-control" type="text" name="producto-reg" required="" maxlength="150">
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