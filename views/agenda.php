<br>
<div class="container">
	<div class="row">
		<div class="col-6">
			<h3>Buscar Reservas</h3>
			<form method="POST">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Ano</label>
					<select name="ano" class="form-control" id="exampleFormControlSelect1">
						<?php for ($i=date('Y') ;$i>=2000; $i--):?> 

							<option><?php echo $i; ?></option>

						<?php endfor; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Mês</label>
					<select name="mes" class="form-control" id="exampleFormControlSelect1">
						<option value="01">Janeiro</option>
						<option value="02">Fervereiro</option>
						<option value="03">Março</option>
						<option value="04">Abril</option>
						<option value="05">Maio</option>
						<option value="06">Junho</option>
						<option value="07">Julho</option>
						<option value="08">Agosto</option>
						<option value="09">Setembro</option>
						<option value="10">Outubro</option>
						<option value="11">Novembro</option>
						<option value="12">Dezembro</option>
					</select>
					<br>
					<input class="btn btn-dark" type="submit" value="Mostrar">
				</form>
			</div>
		</div>
		<div class="col-6">
			<a class="link" href="<?php echo BASE_URL;?>agenda/add_reserva" data-toggle="modal" data-target=".bd-example-modal-lg">
				<div id="link"  class="card text-white bg-dark mb- mx-auto mt-4" style="max-width: 18rem;">
					<div class="card-body">
						<h2 class="card-title">Adicionar Reserva</h2>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>


<br><br>
<div class="table-responsive">
	<table class="table table-hover">
		<thead class="thead-light">
			<tr>
				<th>DOM</th>
				<th>SEG</th>
				<th>TER</th>
				<th>QUA</th>
				<th>QUI</th>
				<th>SEX</th>
				<th>SAB</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			for ($i=0; $i <$linhas ; $i++) { 
				?>
				<tr>
					<?php

					for ($q=0; $q < 7; $q++) { 
						$w =date('Y-m-d',strtotime(($q+($i*7)).'days',strtotime($data_inicio)));
						?>	
						<td> <?php

						echo $w."<br><br>"; 
						$w = strtotime($w);

						foreach ($reservas as $reserva) {
							$dr_inicio = strtotime($reserva['data_inicio']);
							$dr_fim = strtotime($reserva['data_fim']);

							if ($w >= $dr_inicio && $w <= $dr_fim) {
								echo $reserva['nome'].":".$reserva['modelo']."-->".$reserva['placa']."--<a href='".BASE_URL."agenda/editar_reserva/".$reserva['id_aluguel']."'>editar</a>-<a href='".BASE_URL."agenda/excluir_reserva/".$reserva['id_aluguel']."'>exluir</a></br>";
							}



						}


						?>

					</td>

					<?php
				} 
				?>

			</tr>

			<?php  
		}

		?>
	</tbody>
</table>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Adicionar Reserva</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form  method="POST">
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
		</div>
	</div>
</div>
</div>
