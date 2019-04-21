$(function(){
	// hovers do index
	$('.card').hover(

		function() {
			$(this).removeClass("bg-dark text-white");
			$(this).addClass('bg-light text-dark');

		},
		function() {
			$(this).removeClass("bg-light text-dark");
			$(this).addClass('bg-dark text-white'); 
		}

		);
    
	// Model
	$('#myModal').on('shown.bs.modal', function () {

		$('#myInput').trigger('focus');



	});

});
