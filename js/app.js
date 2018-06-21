//Redirecciones
var login = document.getElementById('login');
var add = document.getElementById('add');
if(login){
	login.addEventListener('click', function(){redir('login/login.php')});
}
if(add){
	add.addEventListener('click',function(){redir('anuncios/add')});
}

function redir(url){
	location.href = url;
}