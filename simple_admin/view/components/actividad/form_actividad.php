<?php 

?>
<div class="container">
	<form class="form-group" action="" method="post">
		<div class="row">
			<div class="col-2">
				<label class="form-text" for="">Clave Actividad:</label>
			</div>
			<div class="col-10">
				<input type="text" class="form-control" name="cve_act" id="cve_act" value="" placeholder="">
			</div>
		</div><!-- End cve_act -->
		<div class="row">
			<div class="col-2">
				<label class="form-text" for="desc_act">Descripción actividad:</label>
			</div>
			<div class="col-10">
				<input type="text" class="form-control" name="desc_act" id="desc_act" value="" placeholder="">
			</div>
		</div><!-- End desc_act -->	
		<br>
		<!--<div class="row">
			<div class="col-2">
				<label class="form-text" for="">Empleado Responsable:</label>
			</div>
			<div class="col-10">
				<?php
					//$act->getUser();
				?>
			</div>
		</div> usuario responsable  -->
		<div class="row">
			<div class="col-2">
				<label class="form-text" for="">Fecha de inicio</label>
			</div>
			<div class="col-4">
				<input type="date" class="form-control" name="fecha_ini" id="fecha_ini" value="" placeholder="">
			</div>
			<div class="col-2">
				<label class="form-text" for="">Fecha de Fin</label>
			</div>
			<div class="col-4">
				<input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="" placeholder="">
			</div>
		</div><!-- end fecha_fin -->
		<div class="row">
			<div class="col-2">
				<label class="form-text" for="">Estatus:</label>
			</div>
			<div class="col-10">
				<ul class="radio-inline">
					<li class="form">
						<input class="form-check-input" type="radio" name="status" value="N" >
						<label class="form-text" name="status" for="1">Nuevo</label>
					</li>
					<li class="form">
						<input class="form-check-input" type="radio" name="status" value="E" >
						<label class="form-text" name="status" for="2">Progreso</label>
					</li>
					<li class="form">
						<input class="form-check-input" type="radio"  name="status" value="T" >
						<label class="form-text" name="status" for="3">Terminado</label>
					</li>
				</ul>
			</div>
		</div><!-- End estatus -->
		<div class="row">
			<div class="col-5"></div>
			<div class="col-2">
				<input class="btn btn-primary" type="submit" id="btn_guardar" name="" value="Guardar">
			</div>
			<div class="col-5"></div>
		</div>
	</form>
</div>