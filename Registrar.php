<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="estilo.css"/>
<title>Registrar</title>
</head>
<body>
<?php

header('Content-Type: text/html; charset=utf-8');

/*$serv = "mysql.hostinger.es";
$usuario = "u311047301_user2";
$password = "admin123";
$bd = "u311047301_fotos";*/

$serv = "127.0.0.1";
$usuario = "root";
$password = "admin";
$bd = "ALBUM";

require_once 'validaciones.php';

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$contraseña = $_POST['contraseña'];
	
	$errores = array();
	
	if (!validarNombre($nombre)) {
      $errores[] = 'El campo nombre es incorrecto, no admite números.';
	}
	if (!validarPass($contraseña)) {
      $errores[] = 'El campo contraseña debe tener mínimo 6 cifras.';
	}
	if (!validarEmail($correo)) {
      $errores[] = 'El campo correo es incorrecto: ejemplo@ejemplo.com.';
	}
	
	if(!$errores){
		$link = mysqli_connect($serv,$usuario,$password,$bd);
		$sql = "INSERT INTO usuario VALUES ('$correo','$nombre','normal','$contraseña')";
		if (!mysqli_query($link ,$sql))
		{
			die('Error:' . mysqli_error($link));
		}

		echo "Enhorabuena, te has registrado satisfactoriamente.";
		echo "<p> <a href='inicio.php'> Volver al inicio </a></p>";
		mysqli_close($link);
		
		$xml = simplexml_load_file('usuarios.xml');
		$user = $xml->addChild('usuario');
		$user->addChild('email', $correo);
		$user->addChild('nomusuario', $nombre);
		$user->addChild('password', $contraseña);
			
		if (!$xml->asXML('usuarios.xml'))
		{
			die('Error: la insercion en el xml no ha sido posible');
		}

	}
	else
	{
		foreach ($errores as $error):
			echo $error;
			echo "<br/>";
		endforeach;
		echo "<p> <a href='registro.html'> Volver a introducir datos </a></p>";
	}

?>
</body>
</html>