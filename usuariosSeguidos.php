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

$miemail = $_SESSION['login_email'];
$link = mysqli_connect($serv, $usuario, $password, $bd);
$usuarios = mysqli_query($link, "select nomseg from siguiendo where email='$miemail'" );

echo '<table border=1> <tr> <th> Usuarios seguidos </th> </tr>';

while ($row = mysqli_fetch_array($usuarios)) 
{
	echo '<tr><td>' . $row['nomseg'] . '</td></tr>';
}
echo '</table>';

$usuarios->close();

mysqli_close($link);

?>