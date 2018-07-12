
//Redirecciones
var login = document.getElementById('login');
var add = document.getElementById('add');

//back.php
var lol = document.getElementById('volver');
if(login){
	login.addEventListener('click', function(){redir('login/')});
}
if(add){
	add.addEventListener('click',function(){redir('anuncios/add')});
}

function redir(url){
	location.href = url;
}


$(document).ready(function(){
	//Message

	$('.message-ok i').on('click', function(){
		$('.message-ok').css('display', 'none');
	});
	$('.message-e i').on('click', function(){
		$('.message-e').css('display', 'none');
	});

	//Anuncios

	$('.common').on('click', function(){
		var id = this.attributes[1].value;
		location.href = 'anuncios/view/?id=' + id;
	});
	$('.anuncio').on('click', function(){
		var id = this.attributes[1].value;
		location.href = 'anuncios/view/?id=' + id;
	});

	//Logout

	$('.logout').on('click', function(){
		location.href = 'logout.php';
	});
	$('.my-anun').on('click', function(){
		location.href = 'anuncios/mis-anuncios';
	});

	//ViewMore

	$('.vm_d').on('click', function(){
		location.href = 'anuncios/viewmore_d';
	});
	$('.vm_c').on('click', function(){
		location.href = 'anuncios/viewmore_c';
	});


});