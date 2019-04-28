<br>
<div class="container">
	<div class="row">
		<div class="col-6">
			<fieldset height="100px">

				<h3>Buscar Carros</h3>

				<form method="POST">
					<div class="form-group">

						<select name="filtro" class="form-control" id="exampleFormControlSelect1">
							<option value="0">Placa</option>
							<option value="1">Marca</option>
							<option value="2">Modelo</option>
						</select>

					</div>
					<input name="nomefiltro" class="form-control " type="text" placeholder="insira..">
					<br>
					<br>
					<input class="btn btn-dark" type="submit" value="Buscar">
				</form>

			</fieldset>
		</div>
		<div class="col-6">
			<a class="link"  href="<?php echo BASE_URL;?>carros/add_carro" data-toggle="modal" data-target="#exampleModal">
				<div id="link" class="card text-white bg-dark mb- mx-auto mt-4" style="max-width: 18rem;">
					<div class="card-body">
						<h2 class="card-title">Adicionar Carro</h2>
					</div>
				</div>
			</a>
			
		</div>
	</div>
</div>


<br>
<br>
<br>
<table class="table table-hover table-sm">
	<thead class="thead-light">
		<tr>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Placa</th>
			<th>Valor</th>
			<th>Ações</th>
		</tr>					
	</thead>
	<tbody>
		<?php foreach ($carros as $carro) :?>
			<tr>
				<td><?php echo $carro['marca']; ?></td>
				<td><?php echo $carro['modelo']; ?></td>
				<td><?php echo $carro['placa']; ?></td>
				<td>R$<?php echo $carro['valor']; ?></td>
				<td>
					<a href="<?php echo BASE_URL ?>carros/editar/<?php echo $carro['id_carro']; ?>">Editar</a> --
					<a href="<?php echo BASE_URL ?>carros/excluir/<?php echo $carro['id_carro']; ?>">Excluir</a>

				</td>		

			</tr>
		<?php endforeach; ?>	
	</tbody>
</table>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Adicionar Carro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form  method="POST">
					<div class="row">
						<div class="col-6">
							<label for="marca">Marca</label>
							<input type="text" class="form-control" id="marca" placeholder="Marca" name="marca"><br><br>
						</div>
						<div class="col-6">
							<label for="modelo">Modelo</label>
							<input type="text" class="form-control" id="modelo" placeholder="Modelo" name="modelo"><br><br>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label for="placa">Placa</label>
							<input type="text" class="form-control" id="placa" placeholder="Placa" name="placa"><br><br>
						</div>
						<div class="col-6">
							<label for="valor">Valor da diária</label>
							<input type="text" class="form-control" id="valor" placeholder="Valor" name="valor"><br><br>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit"  class="btn btn-dark" value="Cadastrar Carro">
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

