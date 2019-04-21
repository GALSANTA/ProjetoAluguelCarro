<br>
<div class="container">
	<div class="row">
		<div class="col-6">
			<fieldset height="100px">

				<h3>Buscar Clientes</h3>


				<form method="POST">
					<div class="form-group">

						<select name="filtro" class="form-control" id="exampleFormControlSelect1">
							<option value="0">Nome</option>
							<option value="1">RG</option>
							<option value="2">CPF</option>
						</select>

					</div>
					<input name="nomefiltro" class="form-control " type="text" placeholder="insira..">
					<br>
					<br>
					<input class="btn btn-dark" type="submit" value="Buscar">
				</form>

		

			</fieldset>
		</div>
	</div>
</div>


<br>
<br>
<br>
<table class="table table-hover table-sm">
	<thead class="thead-light">
		<tr>
			<th>Nome</th>
			<th>Rg</th>
			<th>Cpf</th>
			<th>numero1</th>
			<th>numero2</th>
			<th>Ações</th>
		</tr>					
	</thead>
	<tbody>
		<?php foreach ($clientes as $cliente) :?>
			<tr>
				<td><?php echo $cliente['nome']?></td>
				<td><?php echo $cliente['rg'] ?></td>
				<td><?php echo $cliente['cpf'] ?></td>
				<td><?php echo $cliente['numero1']?></td>
				<td><?php echo $cliente['numero2']?></td>
				<td><a href="<?php BASE_URL;?>historico/<?php echo $cliente['id_cliente'] ?>">Verificar</a></td>	
			</tr>
		<?php endforeach; ?>	
	</tbody>
</table>


