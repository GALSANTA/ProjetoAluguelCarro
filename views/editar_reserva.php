<h1>Editar Reserva</h1>
<form method="POST">
	CARROS:<br>
	<select name="carro" selected ="<?php $reserva['id_carro'] ?>">
		<?php 
		foreach ($carros as $carro):
			?>
			<option value="<?php echo $carro['id_carro'] ?>"><?php echo $carro['marca']."->".$carro['modelo'].": ".$carro['placa']; ?></option>
		<?php endforeach; ?>
	</select><br><br>
	NOME:<br>
	<input type="text" name="nome" value="<?php echo $reserva['nome']?>"><br><br>
	RG:<br>
	<input type="text" name="rg" value="<?php echo $reserva['rg'] ?>"><br><br>
	CPF:<br>
	<input type="text" name="cpf" value="<?php echo $reserva['cpf'] ?>"><br><br>
	NUMERO1:<br>
	<input type="text" name="numero1" value="<?php echo $reserva['numero1'] ?>"><br>
	NUMERO2:<br>
	<input type="text" name="numero2" value="<?php echo $reserva['numero2'] ?>"><br><br>
	DATA_INICIO:<br>
	<input type="text" name="data_inicio" value="<?php echo $reserva['data_inicio'] ?>"><br><br>
	DATA_FIM:<br>
	<input type="text" name="data_fim" value="<?php echo $reserva['data_fim'] ?>"><br><br>
	<input type="submit" value="EVIAR">
</form>