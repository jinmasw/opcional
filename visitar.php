<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="estilo.css"/>
<title>Visitar</title>
<script type="text/javascript">
function verUno(){

		var n2= document.getElementById("nom2").value;
		
		if (window.XMLHttpRequest){
			xmlhttp= new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange= function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("fotos").innerHTML=xmlhttp.responseText;
			}
		}
		
		xmlhttp.open("GET","visitarAlbum.php?nom="+n2,true);
		xmlhttp.send();
		
	}
</script>
</head>
<body>

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
	$nom = $_POST['visitado'];
	
	$link = mysqli_connect($serv, $usuario, $password, $bd);
	
	$comprobar= mysqli_query($link,"SELECT indice FROM siguiendo WHERE email='$e' and nomseg='$nom'");
	$cont = mysqli_num_rows($comprobar);
	
	if ($cont==1)
	{
		
		$em = mysqli_query($link, "SELECT EMAIL FROM usuario WHERE NOMUSUARIO='$nom'" );
		$em2 = $em->fetch_assoc();
		$em= $em2['EMAIL'];
		$_SESSION['a_quien'] = $em;
		
		$nombres = mysqli_query($link, "SELECT NOMBRE FROM album WHERE EMAIL='$em' AND privado='no'"); 
?>


		<h1>Jinmalbum de <?php echo $nom; ?></h1>
		
		<ul class = "menu"><li><a href="seguidos.php"> Volver atras </a></li></ul>
		
		<table>
		
			<tr>
			
				<td>
				
					<div>
							<?php
						echo '<table border="1"> <tr> <th> Albumes </th> </tr>';
						while ($row = mysqli_fetch_array($nombres)) 
						{
							echo '<tr><td>' . $row['NOMBRE'] . '</td></tr>';
							
						}
						echo '</table>';

						$nombres->close();

						mysqli_close($link);

						echo '<br/>';
						echo '<br/>';


						?>
					</div>
				
				</td>
				<td>
				
					<div class="uno">
					¿Que album quiere ver?: <input type= "text"
							name="nom2"
							id="nom2"
							value=""/>
							
							<br/>
					
					<input type="button" name="VerUno" value="Ver fotos del album" onclick="verUno()"/>
					</div>
				
				</td>
				<td>
		
					<div id="fotos"></div>
					
				</td>
				
			</tr>
			
		</table>

<?php

	}
	
	else
	{
		mysqli_close($link);
		echo 'No sigues a esa persona';
		echo '<br/>';
		echo '<a href="seguidos.php"> Volver atras </a>';
	}
}

else 
{
	header("Location: inicio.php");
}
?>
</body>
</html>