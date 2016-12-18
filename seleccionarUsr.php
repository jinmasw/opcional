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

$link = mysqli_connect($serv,$usuario,$password,$bd);

$usr = $_GET['usr'];

$comprobar= mysqli_query($link,"SELECT EMAIL FROM usuario WHERE NOMUSUARIO='$usr' and TIPOUSUARIO='normal'");
$cont = mysqli_num_rows($comprobar);


	if ($cont==1)
	{
		$_SESSION['usr'] = $usr;
		$row = mysqli_fetch_array($comprobar);
		$_SESSION['email_usr'] = $row['EMAIL'];
		
		echo "Usuario seleccionado";
	}
	else
	{
		echo 'No existe nadie registrado con ese nombre';
	}

?>