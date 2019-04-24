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

    //AJAX prototipo
	$('#linkmodal').on('click', function(e){
		e.preventDefault();
		var link = $(this).attr('href'); 
		$.ajax({
			type:'GET',
			url:link,
			success:function(html){
				$('.modal-body').html(html);
				$('#form').bind('submit',function(){
					e.preventDefault(); 
					var txt = $('#form').serialize();
					$.ajax({ 
						type:'POST',
						url:link,
						data:txt
					});
				});
			}
		});
	});
	

});

