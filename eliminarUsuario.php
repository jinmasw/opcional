
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
	
	$nombre=$_GET['eli'];
	
	$link = mysqli_connect($serv, $usuario, $password, $bd);
	$comprobar= mysqli_query($link,"SELECT EMAIL FROM usuario WHERE NOMUSUARIO='$nombre' and TIPOUSUARIO='normal'");
	$cont = mysqli_num_rows($comprobar);
	
	if($cont==1)
	{
	
		$email_consul= mysqli_query($link,"SELECT EMAIL FROM usuario WHERE NOMUSUARIO='$nombre'");
		$sql= $email_consul->fetch_assoc();
		$email_consulta= $sql['email'];

		
		$eliminar = "delete from usuario where NOMUSUARIO='$nombre'";	
		if (!mysqli_query($link ,$eliminar))
			{
				die('Error:' . mysqli_error($link));
			}
			
		
		$eliminar2 = "delete from siguiendo where email='$email_consulta'";	
		if (!mysqli_query($link ,$eliminar2))
			{
				die('Error:' . mysqli_error($link));
			}
			
		mysqli_close($link);
		echo 'Usuario eliminado';
		

		
		$doc = new DOMDocument; 
		$doc->load('usuarios.xml');

		$thedocument = $doc->documentElement;

		$list = $thedocument->getElementsByTagName('nomusuario');

		$nodeToRemove = null;
		foreach ($list as $domElement){
		  $nodo = $domElement->nodeValue;
		  if ($nodo == $nombre) {
			$nodeToRemove = $domElement->parentNode;
		  }
		}
		if ($nodeToRemove != null)
		$thedocument->removeChild($nodeToRemove);

		$doc->save('usuarios.xml'); 	
	}
	else
	{
		mysqli_close($link);
		echo "No existe ningún usuario con ese nombre.";
	}
}
else 
{
	header("Location: inicio.php");
}
?>