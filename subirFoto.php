<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><link rel="stylesheet" href="estilo.css"/><title>Subir Foto</title></head><body>
	
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
	
	$nom = $_POST['nom3'];
	$com = $_POST['comentario'];
	$email = $_SESSION['login_email'];
	$foto = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
	
	$cla = mysqli_query($link, "SELECT INDICE FROM album WHERE NOMBRE='$nom' AND EMAIL='$email'" );
	$cont = mysqli_num_rows($cla);
	
	if ($cont==1)
	{
		$cla2 = $cla->fetch_assoc();
		$clave= $cla2['INDICE'];
		
		$sql= "insert into foto (CLAVE_E,COMENTARIO,IMAGEN) values('$clave','$com','$foto')";

		if (!mysqli_query($link ,$sql))
			{
				die('Error:' . mysqli_error($link));
			}
		
		mysqli_close($link);
		
		echo 'Foto subida';
		echo '<br/>';
		echo '<a href="albumes.php"> Volver </a>';

	}
	else
	{
		echo 'El nombre del album introducido no figura entre tus albumes, inserta el nombre de uno de tus albumes.';
		echo '<br/>';
		echo '<a href="albumes.php"> Volver </a>';
	}
}

else 
{
	header("Location: inicio.php");
}

?>
</body>
</html>