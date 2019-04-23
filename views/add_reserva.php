<form id="form" method="POST">
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
				<input type="text" class="form-control" id="nome" placeholder="Nome completo" name="nome"><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label for="rg">RG</label>
				<input type="text" class="form-control" id="rg" placeholder="Seu RG" name="rg"><br><br>
			</div>
			<div class="col-6">
				<label for="cpf">CPF</label>
				<input type="text" class="form-control" id="cpf" placeholder="Seu CPF" name="cpf"><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label for="numero1">Numero 1</label>
				<input type="text" class="form-control" id="numero1" placeholder="Numero1" name="numero1"><br><br>
			</div>
			<div class="col-6">
				<label for="numero2">Numero 2</label>
				<input type="text" class="form-control" id="numero2" placeholder="Numero2" name="numero2"><br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label for="data_inicio">Data de Inicio</label>
				<input type="text" class="form-control" id="data_inicio" placeholder="Data de Inicio" name="data_inicio"><br><br>
			</div>
			<div class="col-6">
				<label for="data_fim">Data Final</label>
				<input type="text" class="form-control" id="data_fim" placeholder="Data Final" name="data_fim"><br><br>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<input type="submit"  class="btn btn-dark"  value="Reservar">
	</div>
</form>