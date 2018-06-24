$(document).ready(function(){

	//Efecto menu-mobile
	var active = false;
	$('#show-menu').on('click',function(e){
		e.preventDefault();
		if(active === false){
			$('#menu').css('visibility', 'visible');
			active = true;
		}else{
			$('#menu').css('visibility', 'hidden');
			active = false;
		}
	});
	
	// Efecto de search
	
	var active_s = false;
	$('.buscar').on('click',function(e){
		e.preventDefault();
		if(active_s === false){
			$('.search').css('visibility', 'visible');
			active_s = true;
		}else{
			$('.search').css('visibility', 'hidden');
			active_s = false;
		}
	});
	
	//Efecto categorias
	
	var active_c = false;
	$('.categorias').on('click',function(e){
		e.preventDefault();
		if(active_c === false){
			$('.categories').css('visibility', 'visible');
			active_c = true;
		}else{
			$('.categories').css('visibility', 'hidden');
			active_c = false;
		}
	});

	//Efecto Logout

	var active_l = false;
		$('.loged-arrow').on('click',function(e){
			e.preventDefault();
			if(active_l === false){
				$('.user-options').css('display', 'block');
				active_l = true;
			}else{
				$('.user-options').css('display', 'none');
				active_l = false;
			}
	});

	//Scroll menu
	var comoUsar = $('.ayuda').offset().top;

	$('#howto').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: comoUsar - 100
		}, 600);
	});
	
});
	