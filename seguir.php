<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

/*$serv = "mysql.hostinger.es";
$usuario = "u311047301_user2";
$password = "admin123";
$bd = "u311047301_fotos";*/

$serv = "127.0.0.1";
$usuario = "root";
$password = "admin";
$bd = "ALBUM";



	$siguiendo = $_GET['seguir'];
	$correo = $_SESSION['login_email'];
	

	$link = mysqli_connect($serv,$usuario,$password,$bd);
	$sql = "INSERT INTO siguiendo(email,nomseg) VALUES ('$correo','$siguiendo')";
	
	$comprobar= mysqli_query($link,"SELECT EMAIL FROM usuario WHERE NOMUSUARIO='$siguiendo' and TIPOUSUARIO='normal'");
	$cont = mysqli_num_rows($comprobar);
	
	$comprobar2= mysqli_query($link,"SELECT indice FROM siguiendo WHERE email='$correo' and nomseg='$siguiendo'");
	$cont2 = mysqli_num_rows($comprobar2);
	
	if ($cont==1)
	{
		if ($cont2==0){
			if (!mysqli_query($link ,$sql))
			{
				die('Error:' . mysqli_error($link));
			}
		
			echo "Persona agregada a tus seguidos.";
		}
		else
		{
			echo 'Ya sigues a esa persona';
		}
	}
	else
	{
		echo 'No existe nadie registrado con ese nombre';
	}

?>