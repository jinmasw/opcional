<?php

session_start();

/*$serv = "mysql.hostinger.es";
$usuario = "u311047301_user2";
$password = "admin123";
$bd = "u311047301_fotos";*/

$serv = "127.0.0.1";
$usuario = "root";
$password = "admin";
$bd = "ALBUM";


if (isset($_SESSION['usr']))
{
	
	$usr = $_SESSION['usr'];

	$link = mysqli_connect($serv, $usuario, $password, $bd);
	$email = mysqli_query($link, "Select email from usuario where nomusuario='$usr'" );
	
	$row = mysqli_fetch_array($email);
	$e = $row['email'];

	
	$albumes = mysqli_query($link, "select NOMBRE from album where EMAIL='$e'");
	echo '<table border=1> <tr> <th> NOMBRE DEL ALBUM </th> </tr>';
	while ($row = mysqli_fetch_array($albumes)) 
	{
		echo '<tr><td>' . $row['NOMBRE'] . '</td></tr>';
		
	}
	echo '</table>';

	$albumes->close();

	mysqli_close($link);
}

else 
{
	header("Location: inicio.php");
}
?>