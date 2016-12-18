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
	
	$e = $_SESSION['login_email'];
	$nom = $_GET['nom'];
	
	
	$link = mysqli_connect($serv, $usuario, $password, $bd);
	
	$cla = mysqli_query($link, "SELECT INDICE FROM album WHERE NOMBRE='$nom' AND EMAIL='$e'" ); 
	$cla2 = $cla->fetch_assoc();
	$clave= $cla2['INDICE'];
	
	$sql = mysqli_query($link, "SELECT IMAGEN,COMENTARIO FROM foto WHERE CLAVE_E='$clave'");
	$cont = mysqli_num_rows($sql);
	$cont2 = mysqli_num_rows($cla);

	
	if ($cont2>0 && $cont>0)
	{
		echo '<table border=1> <tr> <th> FOTO </th> <th> COMENTARIO </th> </tr>';
		while ($row = mysqli_fetch_array($sql)) 
		{
			echo '<tr><td>'. "<img src='data:imagen/jpeg;base64,".base64_encode( $row['IMAGEN'] )."' width='100px' />" . '</td> <td>' . $row['COMENTARIO'] . '</td> </tr>';
			
		}
		echo '</table>';
		$sql->close();
	}
	
	elseif ($cont2<1)
	{
		echo 'No existe un album con ese nombre';
	}
	
	else
	{
		echo 'Aun no has subido ninguna foto en este album, ¡Sube alguna!';
	}

	mysqli_close($link);
}

else 
{
	header("Location: inicio.php");
}
?>