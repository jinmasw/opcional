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



	$dejar = $_REQUEST['dejar'];
	$correo = $_SESSION['login_email'];

	
	$link = mysqli_connect($serv,$usuario,$password,$bd);
	$sql = "DELETE FROM siguiendo WHERE email='$correo' AND nomseg='$dejar'";
	
	$comprobar= mysqli_query($link,"SELECT EMAIL FROM usuario WHERE NOMUSUARIO='$dejar' and TIPOUSUARIO='normal'");
	$cont = mysqli_num_rows($comprobar);
	
	$comprobar2= mysqli_query($link,"SELECT indice FROM siguiendo WHERE email='$correo' and nomseg='$dejar'");
	$cont2 = mysqli_num_rows($comprobar2);
	
	if ($cont==1)
	{
		if ($cont2==1){
			if (!mysqli_query($link ,$sql))
			{
				die('Error:' . mysqli_error($link));
			}
		
			echo "Persona eliminada de tus seguidos.";
		}
		else
		{
			echo 'No seguias a esa persona';
		}
	}
	else
	{
		echo 'No existe nadie registrado con ese nombre';
	}

?>