<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php	
session_start();

if(!isset($_SESSION['nomusuario']))
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  
  <head>
    
		<title>El Jinmalbum</title>
		
		<link rel="stylesheet" href="estilo.css"/>
	
	
  </head>
  <body>
  
	<h1>El Jinmalbum</h1>
	
	<div>Un lugar en el que podras subir y ver de manera sencilla tus fotos favoritas, estes donde estes.</div>
	
	<br/>
	<br/>
  
	<form id='login' name='login' method="post" enctype="multipart/form-data" action="inicio.php">

		Usuario: <input type= "text"
				name="usuario"
				id="usuario"
				value=""/>
							
		Password: <input type= "password"
				name="password"
				id="password"
				value=""/>
				
		<input type="submit" value="Enviar"/>	
	
	</form>	
	
	<div>¿Aun no eres miembro? <a href="registro.html">¡Registrate ya!</a></div>
	

  </body>
</html>

<?php

if(isset($_POST['usuario']))
{
	/*$serv = "mysql.hostinger.es";
$usuario = "u311047301_user2";
$password = "admin123";
$bd = "u311047301_fotos";*/

	$serv = "127.0.0.1";
	$user = "root";
	$password = "admin";
	$bd = "album";

	$link = mysqli_connect($serv, $user, $password, $bd) or die(mysql_error());
	
	$pass = $_POST['password'];
	$usuario = $_POST['usuario'];
	
	
	$consulta= mysqli_query($link,"SELECT TIPOUSUARIO FROM usuario WHERE NOMUSUARIO='$usuario' and PASSWORD='$pass'");
	echo mysqli_error($link);
	$consulta2= mysqli_query($link,"SELECT EMAIL FROM usuario WHERE NOMUSUARIO='$usuario' and PASSWORD='$pass'");
	echo mysqli_error($link);
	$cont = mysqli_num_rows($consulta);
	
	mysqli_close($link);
	
	if ($cont==1)
	{
		$_SESSION['nomusuario'] = $usuario;
		$tipousuario = $consulta->fetch_assoc();
		$emailu = $consulta2->fetch_assoc();
		$_SESSION['login_email']= $emailu['EMAIL'];
		$_SESSION['tipoUsuario'] = $tipousuario['TIPOUSUARIO'];
		header("Location: inicio.php");
	}
	else
	{
		echo 'Credenciales no válidas';

	}
	
	
}
}
elseif(strcasecmp($_SESSION['tipoUsuario'],"normal") == 0)
{
 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	
	<title>El Jinmalbum</title>
	<link rel="stylesheet" href="estilo.css"/>
    
  </head>
  <body>
  
	<h1>El Jinmalbum</h1>
	
	Bienvenido,<?php echo $_SESSION['nomusuario']; ?>
	
	<br/>
	
	Logueado como, usuario <?php echo $_SESSION['tipoUsuario']; ?>
	
	<ul class="menu">
	
		<br/>
		<li><a href="albumes.php"> Tus albumes </a></li>
		
		<br/>
		
		<li><a href="seguidos.php"> Tus usuarios seguidos </a></li>
		
		<br/>
		
		<li><a href="logout.php">Logout</a></li>
		
	</ul>
	
  </body>
  
</html>

<?php
}

elseif(strcasecmp($_SESSION['tipoUsuario'],"administrador") == 0){
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
  
  <head>
		<title>El Jinmalbum</title>
		<link rel="stylesheet" href="estilo.css"/>
    
  </head>
  <body>
  
	<h1>El Jinmalbum</h1>
	
	Bienvenido,<?php echo $_SESSION['nomusuario']; ?>
	
	<br/>
	
	Logueado como, usuario <?php echo $_SESSION['tipoUsuario']; ?>
	
	<br/>
	
	<ul class="menu">
	
		<li><a href="usuarios.php"> Ver usuarios registrados </a></li>
		
		<br/>
		
		<li><a href="administrarAlbumes.php"> Administrar albumes y fotos</a></li>
		
		<br/>
		
		<li><a href="logout.php">Logout</a></li>	
		
	</ul>
	
  </body>
  
</html>

<?php
}
?>