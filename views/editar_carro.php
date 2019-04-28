<div class="container">
	<br>
	<h3>Editar Carro</h3>
	<br>
	<form method="POST">
		<div class="row">
			<div class="col-6">
				<label for="marca">Marca</label>
				<input type="text" class="form-control" id="marca" placeholder="Marca" name="marca"  value="<?php echo $carro['marca'] ?>"><br><br>
			</div>
			<div class="col-6">
				<label for="modelo">Modelo</label>
				<input type="text" class="form-control" id="modelo" placeholder="Modelo" name="modelo" value="<?php echo $carro['modelo'] ?>"><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label for="placa">Placa</label>
				<input type="text" class="form-control" id="placa" placeholder="Placa" name="placa" value="<?php echo $carro['placa'] ?>"><br><br>
			</div>
			<div class="col-6">
				<label for="valor">Valor da diária</label>
				<input type="text" class="form-control" id="valor" placeholder="Valor" name="valor" value="<?php echo $carro['valor'] ?>"><br><br>
			</div>
		</div>
		<input type="submit"  class="btn btn-dark" value="Editar Carro">
	</form>
</div>
