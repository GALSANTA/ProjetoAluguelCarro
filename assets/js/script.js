$(function(){
	// hovers do index
	$('.link').hover(

		function() {
			$(this).find('.card').removeClass("bg-dark text-white");
			$(this).find('.card').addClass('bg-light text-dark');

		},
		function() {
			$(this).find('.card').removeClass("bg-light text-dark");
			$(this).find('.card').addClass('bg-dark text-white'); 
		}

		);

	// Model
	$('#myModal').on('shown.bs.modal', function () {

		$('#myInput').trigger('focus');

	});


	//plugin
	$('#cpf').mask('000.000.000-00');
	$('#rg').mask('00.000.000-00');
	$('#numero1, #numero2').mask('(00)0000-0000');
	$('#data_inicio,#data_fim').mask('00/00/0000');
	$('#placa').mask('AAA-0000');





});

