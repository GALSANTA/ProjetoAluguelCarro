<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-6">
			 <div id="donutchart" style="width: 600px; height: 300px;"></div>
		</div>
		<div class="col-6">
			<div class="row">
				<div class="col">
					<a class="link"  href="<?php echo BASE_URL ?>home/busca_rapida">
						<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Busca Rápida</h5>
								<p class="card-text">Busque aqui carros, clientes e reservas</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col">
					<a class="link" href="<?php echo BASE_URL ?>carros/">
						<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Carros</h5>
								<p class="card-text">Veja aqui a lista dos carros da empresa</p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div  class="row">
				<div class="col">
					<a class="link"  href="<?php echo BASE_URL ?>clientes/">
						<div  class="card text-white bg-dark mb-3" style="max-width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Clientes</h5>
								<p class="card-text">Veja aqui a lista dos clientes que ja reservaram carros da empresa</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col">
					<a class="link"  href="<?php echo BASE_URL ?>agenda/">
						<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Agenda</h5>
								<p class="card-text">Veja aqui a lista das reservas dos carros</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		
	</div>	
</div>
<script type="text/javascript">
		google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Disponível',<?php echo $disponiveis[0]; ?>],
				['Reservados', <?php echo $alugados[0]; ?>],
				]);

			var options = {
				title: 'Gráfico Veiculos Hoje',
				colors: ['#343a40', '#343a80', '#343b90'],
				pieHole: 0.4,
			};

			var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
			chart.draw(data, options);
		}
	</script>

