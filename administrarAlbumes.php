<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title> Administrar albumes y fotos </title>

<link rel="stylesheet" href="estilo.css"/>

<script type="text/javascript">
	function showAlbumes(){
		
		if (window.XMLHttpRequest){
			xmlhttp= new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange= function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("albumes").innerHTML=xmlhttp.responseText;
			}
		}
		
		xmlhttp.open("GET","obtenerAlbumes2.php",true); 
		xmlhttp.send();
		
	}
</script>

<script type="text/javascript">
function showAlbum(){
		
		var n2= document.getElementById("nomalbum").value;
		
		if (window.XMLHttpRequest){
			xmlhttp= new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange= function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("albumConcreto").innerHTML=xmlhttp.responseText;
			}
		}
		
		xmlhttp.open("GET","mostrarAlbum2.php?nom="+n2,true);
		xmlhttp.send();
		
	}
</script>


<script type="text/javascript">
	function verUsuarios(){
		
		if (window.XMLHttpRequest){
			xmlhttp= new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange= function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("users").innerHTML=xmlhttp.responseText;
			}
		}
		
		xmlhttp.open("GET","obtenerUsuarios.php",true); 
		xmlhttp.send();
		
	}
</script>

<script type="text/javascript">
	function seleccionarUsr(){
		
		var usr= document.getElementById("usr").value;
		
		if (window.XMLHttpRequest){
			xmlhttp= new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange= function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("mensaje").innerHTML=xmlhttp.responseText;
				
				if (document.getElementById("mensaje").innerHTML == "No existe nadie registrado con ese nombre"){
					document.getElementById("divConTodo").style.display = 'none';
				}
				else{
					document.getElementById("divConTodo").style.display = 'inline'; 
				}	
			}
		}
		
		xmlhttp.open("GET","seleccionarUsr.php?usr="+usr,true); 
		xmlhttp.send();
		
	}
</script>

<script type="text/javascript">
	function eliminarFoto(){
		
		var albumselec= document.getElementById("albumselec").value;
		var indiceselec= document.getElementById("indiceselec").value;
		
		if (window.XMLHttpRequest){
			xmlhttp= new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange= function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("eliminarDiv").innerHTML=xmlhttp.responseText;
			}
		}
		
		xmlhttp.open("GET","eliminarFoto.php?album="+albumselec+"&indice="+indiceselec,true); 
		xmlhttp.send();
		
	}
</script>
	
</head>

<body>

	<h1>Administrar albumes y fotos</h1>
	
	<ul class="menu"><br/><li><a href="inicio.php"> Volver al inicio </a></li></ul>

	
	<input type="button" name="VerLosUsuarios" value="Ver usuarios registrados" onClick="verUsuarios()"/>
	<div id="users"></div>
	
	<br/>
	
	<h3>Elegir Usuario</h3>
	
	<br/>
	
	<input type= "text" name="usr" id="usr" value=""/>
	<input type= "button" onclick="seleccionarUsr()" value="Seleccionar usuario"/>
	
	<br/>
	
	<div id = "mensaje" ></div>
	
	<br/>
	<div id="divConTodo" style="display:none">
		<table>
			
			<tr>
				
				<td>
		
					<div class = "uno">
						
					<h3>Visualizar album</h3>

					¿Que album quiere ver?: <input type= "text"
							name="nomalbum"
							id="nomalbum"
							value=""/>
							
					<br/>

					<input type="button" name="VerAlbumes" value="Ver albumes creados" onclick="showAlbumes()"/>

					<br/>

					<input type="button" name="VerUno" value="Ver fotos del album" onclick="showAlbum()"/>

					</div>
				
				</td>
				<td>
				
					<div id="albumes"></div>
				
				</td>
				<td>
					
					<div id="albumConcreto"></div>
				
				<td>
			
			</tr>
		
		</table>
		
		<h3>Seleccione el album y el indice de la foto que desea borrar</h3>

		Album :<input type= "text" name="albumselec" id="albumselec" value=""/>
								
		Indice :<input type= "text" name="indiceselec" id="indiceselec" value=""/>

		<br/>
			
		<input type= "button" onclick="eliminarFoto()" value="Eliminar foto"/>

		<br/>

		<div id = "eliminarDiv"></div>
	
	</div>

</body>

</html>