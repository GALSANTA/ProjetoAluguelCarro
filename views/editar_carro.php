<h1>Editar Carro</h1>
<form method="POST">
	MARCA:<br>
	<input type="text" name="marca" value="<?php echo $carro['marca'] ?>"><br><br>
	MODELO:<br>
	<input type="text" name="modelo" value="<?php echo $carro['modelo'] ?>"><br><br>
	PLACA:<br>
	<input type="text" name="placa" value="<?php echo $carro['placa'] ?>"><br><br>
	VALOR:<br>
	<input type="text" name="valor" value="<?php echo $carro['valor'] ?>"><br><br>
	<input type="submit" value="EVIAR">
</form>