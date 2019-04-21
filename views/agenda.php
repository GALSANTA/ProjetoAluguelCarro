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
			<a class="link" href="<?php BASE_URL;?>add_reserva">
				<div id="link2" class="card text-white bg-dark mb- mx-auto mt-4" style="max-width: 18rem;">
					<div class="card-body">
						<h2 class="card-title">Adicionar Reserva</h2>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>



<div height="800px;">
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
									echo $reserva['nome'].":".$reserva['modelo']."-->".$reserva['placa']."<a href='".BASE_URL."agenda/editar_reserva/".$reserva['id_aluguel']."'>editar</a>-<a href='".BASE_URL."agenda/excluir_reserva/".$reserva['id_aluguel']."'>exluir</a>";
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


