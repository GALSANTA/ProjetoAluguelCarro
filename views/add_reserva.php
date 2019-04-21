<h1>ADICIONAR RESERVA</h1>
<form method="POST">
	CARROS:<br>
	<select name="carro">
		<?php 
		foreach ($carros as $carro):
			?>
			<option value="<?php echo $carro['id_carro'] ?>"><?php echo $carro['marca']."->".$carro['modelo'].": ".$carro['placa']; ?></option>
		<?php endforeach; ?>
	</select><br><br>
	NOME:<br>
	<input type="text" name="nome"><br><br>
	RG:<br>
	<input type="text" name="rg"><br><br>
	CPF:<br>
	<input type="text" name="cpf"><br><br>
	NUMERO1:<br>
	<input type="text" name="numero1"><br>
	NUMERO2:<br>
	<input type="text" name="numero2"><br><br>
	DATA_INICIO:<br>
	<input type="text" name="data_inicio"><br><br>
	DATA_FIM:<br>
	<input type="text" name="data_fim"><br><br>
	<input type="submit" value="EVIAR">
</form>