
//Redirecciones
var login = document.getElementById('login');
var add = document.getElementById('add');

//back.php
var lol = document.getElementById('volver');
if(login){
	login.addEventListener('click', function(){redir('login/login.php')});
}
if(add){
	add.addEventListener('click',function(){redir('anuncios/add')});
}

function redir(url){
	location.href = url;
}


$(document).ready(function(){

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

});