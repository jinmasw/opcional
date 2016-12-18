<?php

session_start();

if (isset($_SESSION['tipoUsuario']) && strcasecmp($_SESSION['tipoUsuario'],"normal") == 0)
{
/*$serv = "mysql.hostinger.es";
$usuario = "u311047301_user2";
$password = "admin123";
$bd = "u311047301_fotos";*/

	$serv = "127.0.0.1";
	$usuario = "root";
	$password = "admin";
	$bd = "ALBUM";

	$link = mysqli_connect($serv, $usuario, $password, $bd) or die(mysql_error());
	
	$nom = $_GET['nom'];
	$priv = $_GET['priv'];
	$email = $_SESSION['login_email'];
	
	if(strcasecmp($nom,"") != 0)
	{
	
		$sql= "insert into album (NOMBRE, EMAIL,PRIVADO) values('$nom', '$email','$priv')";

		if (!mysqli_query($link ,$sql))
			{
				die('Error:' . mysqli_error($link));
			}
		
		mysqli_close($link);
		echo 'Album creado correctamente';
	}
	else
	{
		mysqli_close($link);
		echo 'Inserte un nombre para poder crear el album';
	}

}

else 
{
	header("Location: inicio.php");
}

?>