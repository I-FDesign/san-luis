// Anuncios

	$('.common').on('click', function(){
			var id = this.attributes[1].value;
			location.href = '../../anuncios/view/?id=' + id;
		});
		$('.anuncio').on('click', function(){
			var id = this.attributes[1].value;
			location.href = '../../anuncios/view/?id=' + id;
		});

//Back
$(document).ready(function(){
	$('#back').on('click', function(){
		location.href = '../../';
	});
	$('#volver').on('click', function(){
		location.href = '../../';
	});

//Message

	$('.message-ok i').on('click', function(){
		$('.message-ok').css('display', 'none');
	});
	$('.message-e i').on('click', function(){
		$('.message-e').css('display', 'none');
	});

});

