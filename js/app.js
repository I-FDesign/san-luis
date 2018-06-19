//Redirecciones
var login = document.getElementById('login');
if(login){
	login.addEventListener('click', function(){redir('login/login.php')});
}

function redir(url){
	location.href = url;
}