<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Eventos <small>Administración</small></h1>
	</div>
</div>
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	    <li>
	  		<a href="<?php echo SERVERURL; ?>event/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EVENTO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>eventlist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EVENTOS
	  		</a>
	  	</li>
	</ul>
</div>
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PRUEBAS DE CONFIANZA</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">NOMBRE DEL EVENTO</th>
							<th class="text-center">TIPO DE EVENTO:</th>
							<th class="text-center">LUGAR</th>
							<th class="text-center">PARTICIPANTES</th>
							<th class="text-center">FECHA EVENTO</th>
							<th class="text-center">HORA DEL EVENTO</th>
							<th class="text-center">Act. DATOS</th>
							<th class="text-center">ELIMINAR</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Curso de tiro Grupo A</td>
							<td>Curso de Tiro</td>
							<td>Laguna del pino</td>
							<td>Robin Escobar, Juan Garcia</td>
							<td>07/06/2020</td>
							<td>11:30 hrs.</td>
							<td>
								<a href="#!" class="btn btn-success btn-raised btn-xs">
									<i class="zmdi zmdi-refresh"></i>
								</a>
							</td>
							<td>
								<form>
									<button type="submit" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</form>
							</td>
						</tr>
						<tr>
							
						</tr>
					</tbody>
				</table>
			</div>
			<nav class="text-center">
				<ul class="pagination pagination-sm">
					<li class="disabled"><a href="javascript:void(0)">«</a></li>
					<li class="active"><a href="javascript:void(0)">1</a></li>
					<li><a href="javascript:void(0)">2</a></li>
					<li><a href="javascript:void(0)">3</a></li>
					<li><a href="javascript:void(0)">4</a></li>
					<li><a href="javascript:void(0)">5</a></li>
					<li><a href="javascript:void(0)">»</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>