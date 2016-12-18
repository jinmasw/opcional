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


if (isset($_SESSION['tipoUsuario']) && strcasecmp($_SESSION['tipoUsuario'],"administrador") == 0)
{
	echo '<table border="1"> <tr> <th> USUARIOS </th> </tr>';
	$xml = simplexml_load_file('usuarios.xml');

	foreach ($xml->usuario as $user){
	
		$u= $user->nomusuario[0];
		
		echo '<tr><td>' . $u . '</td></tr>';	
	}
	echo '</table>';
}
else 
{
	header("Location: inicio.php");
}
?>