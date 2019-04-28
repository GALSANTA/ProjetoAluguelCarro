<div class="container">
	<br>
	<h3>Histórico de <?php echo $cliente["nome"]; ?></h3>
	<br>
	<div class="row">
		<div class="col-6">
			NOME:  <?php echo $cliente["nome"]; ?>
		</div>
		<div class="col-6">
			RG:  <?php echo $cliente["rg"]; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			CPF:  <?php echo $cliente["cpf"]; ?>
		</div>
		<div class="col-6">
			NUMEROS:  <?php echo $cliente["numero1"]." ".$cliente["numero2"]; ?>
		</div>
	</div>
	<br>
<br>
<?php foreach ($historico as $valor) {
	?>

	<div class="card mb-3">
		<div class="card-body">
			<h5 class="card-title"><?php echo $valor['data_inicio']." Até ".$valor['data_fim'] ?></h5>
			<p class="card-text">
				<div class="row">
					<div class="col-6">
						NOME:  <?php echo $valor["nome"]; ?>
					</div>
					<div class="col-6">
						RG:  <?php echo $valor["rg"]; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						CPF:  <?php echo $valor["cpf"]; ?>
					</div>
					<div class="col-6">
						NUMEROS:  <?php echo $valor["numero1"]." ".$valor["numero2"]; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						CARRO: <?php echo $valor['marca'].": ".$valor['modelo']."--".$valor['placa']; ?>
					</div>
				</div>
			</p>
			<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		</div>
	</div>


	<?php  

} ?>
</div>


