<!-- Content page -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Administración <small>PRODUCTO</small></h1>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>producto/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PRODUCTO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>productoList/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PRODUCTOS
	  		</a>
	  	</li>
	</ul>
</div>
<?php require_once "./controladores/ProductosControlador.php"; 
	$datos = new ProductosControlador();
	
	$usuario = $_SESSION['usuario_sbp'];
	
?>
<!-- panel datos de la empresa -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL PRODUCTO</h3>
		</div>
		<div class="panel-body">
			<form autocomplete="off" class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/AdministradorAjax.php" enctype="multipart/form-data" method="POST" data-form="save">
				<input type="hidden" name="tipoFormulario" value="newProducto">
				<input type="hidden" name="usuario-reg" value="<?php echo $usuario?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos generales</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">NOMBRE DEL PRODUCTO</label>
								  	<input  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="nombre-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">CANTIDAD UNIDADES *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="Number" name="cantidad-reg" required="" maxlength="40">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">PRECIO POR UNIDAD *</label>
								  	<input class="form-control" type="Number" name="precio-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">CANTIDAD DE CAJAS *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="Number" name="cajas-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
						    		<label for="contenedor-reg">CONTENEDOR *</label>
								  	<select id="contenedor-asignar-reg" data-placeholder="contenedor-asignar"  class="standardSelect form-control" name="contenedor-reg">
								  		<option value="" selected="disabled"></option>
								  		<?php echo $dato = $datos->seleccionarContenedorControlador();?>
								  	</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
						    		<label for="proveedor-reg">PROVEEDOR *</label>
								  	<select id="proveedor-asignar-reg" data-placeholder="proveedor-asignar"  class="standardSelect form-control" name="proveedor-reg">
								  		<option value="" selected="disabled"></option>
								  		<?php echo $dato = $datos->seleccionarProveedorControlador();?>
								  	</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">VOLUMEN *</label>
								  	<input  class="form-control" type="text" name="volumen-reg" required="" maxlength="90">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">NUMERO DE FACTURA *</label>
								  	<input  class="form-control" type="text" name="factura-reg" required="" maxlength="90">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<fieldset>
					<legend><i class="zmdi zmdi-attachment-alt"></i> &nbsp; Elegir Foto o PDF</legend>
					<div class="col-xs-12">
    					<div class="form-group">
    						<span class="control-label">Imágen</span>
							<input type="file" name="factura" required="" accept=".jpg, .png, .jpeg">
							<div class="input-group">
								<input type="text" readonly="" class="form-control" placeholder="Elija la imágen o pdf...">
								<span class="input-group-btn input-group-sm">
									<button type="button" class="btn btn-fab btn-fab-mini">
										<i class="zmdi zmdi-attachment-alt"></i>
									</button>
								</span>
							</div>
							<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG , JPG y PDF</small></span>
						</div>
    				</div>
    			</fieldset>
		    	<fieldset>
					<legend><i class="zmdi zmdi-attachment-alt"></i> &nbsp; Elegir Foto</legend>
					<div class="col-xs-12">
    					<div class="form-group">
    						<span class="control-label">Imágen</span>
							<input type="file" name="foto" required="" accept=".jpg, .png, .jpeg">
							<div class="input-group">
								<input type="text" readonly="" class="form-control" placeholder="Elija la imágen...">
								<span class="input-group-btn input-group-sm">
									<button type="button" class="btn btn-fab btn-fab-mini">
										<i class="zmdi zmdi-attachment-alt"></i>
									</button>
								</span>
							</div>
							<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
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
 <script type="text/javascript">
    $(function() {
      $(".standardSelect").chosen();
    });
  </script>