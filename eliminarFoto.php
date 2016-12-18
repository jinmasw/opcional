<?php

session_start();

if (isset($_GET['album'])&&isset($_GET['indice']))
{
	
	/*$serv = "mysql.hostinger.es";
$usuario = "u311047301_user2";
$password = "admin123";
$bd = "u311047301_fotos";*/

	$serv = "127.0.0.1";
	$usuario = "root";
	$password = "admin";
	$bd = "ALBUM";
	
	$e = $_SESSION['email_usr'];
	$nom = $_GET['album'];
	$indice = $_GET['indice'];
	
	
	$link = mysqli_connect($serv, $usuario, $password, $bd);
	
	$cla = mysqli_query($link, "SELECT INDICE FROM album WHERE NOMBRE='$nom' AND EMAIL='$e'" ); 
	$cla2 = $cla->fetch_assoc();
	$clave= $cla2['INDICE'];
	
	$sql = mysqli_query($link, "SELECT COMENTARIO FROM foto WHERE CLAVE_E='$clave' AND INDICE='$indice'");
	$cont = mysqli_num_rows($sql);
	$cont2 = mysqli_num_rows($cla);

	
	if ($cont2>0 && $cont>0)
	{
		 mysqli_query($link, "DELETE FROM foto WHERE INDICE='$indice' AND CLAVE_E='$clave'" );
		 echo "Foto borrada";
	}
	
	elseif ($cont2<1)
	{
		echo 'No existe un album con ese nombre';
	}
	
	else
	{
		echo 'No existe esa foto';
	}

	mysqli_close($link);
}

else 
{
	header("Location: inicio.php");
}
?>