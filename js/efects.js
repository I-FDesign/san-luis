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

})