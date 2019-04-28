<div class="container">
	<br>
	<h3>Editar Reserva</h3>
	<br>
	<form method="POST">
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label for="carro">Escolha o carro</label>
					<select class="form-control" id="carro" name="carro">
						<?php 
						foreach ($carros as $carro):
							?>
							<option value="<?php echo $carro['id_carro'] ?>"><?php echo $carro['marca'].": ".$carro['modelo']." > placa ".$carro['placa']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="col-6">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" placeholder="Nome completo" name="nome" value="<?php echo $reserva['nome']?>"><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label for="rg">RG</label>
				<input type="text" class="form-control" id="rg" placeholder="RG" name="rg" value="<?php echo $reserva['rg'] ?>"><br><br>
			</div>
			<div class="col-6">
				<label for="cpf">CPF</label>
				<input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" value="<?php echo $reserva['cpf'] ?>"><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label for="numero1">Numero 1</label>
				<input type="text" class="form-control" id="numero1" placeholder="Numero1" name="numero1"  value="<?php echo $reserva['numero1'] ?>"><br><br>
			</div>
			<div class="col-6">
				<label for="numero2">Numero 2</label>
				<input type="text" class="form-control" id="numero2" placeholder="Numero2" name="numero2" value="<?php echo $reserva['numero2'] ?>"><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label for="data_inicio">Data de Inicio</label>
				<input type="text" class="form-control" id="data_inicio" placeholder="Data de Inicio" name="data_inicio" value="<?php echo $data_inicio ?>"><br><br>
			</div>
			<div class="col-6">
				<label for="data_fim">Data Final</label>
				<input type="text" class="form-control" id="data_fim" placeholder="Data Final" name="data_fim" value="<?php echo $data_fim ?>"><br><br>
			</div>
		</div>
		<input type="submit"  class="btn btn-dark"  value="Editar Reserva">
	</form>
</div>

