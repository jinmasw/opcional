<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title> Albumes </title>

	<link rel="stylesheet" href="estilo.css"/>

	<script type="text/javascript">
		function verAlbumes(){
			
			if (window.XMLHttpRequest){
				xmlhttp= new XMLHttpRequest();
			}
			
			xmlhttp.onreadystatechange= function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("albumes").innerHTML=xmlhttp.responseText;
					document.getElementById("mensaje").innerHTML="";
				}
			}
			
			xmlhttp.open("GET","obtenerAlbumes.php",true); 
			xmlhttp.send();
			
		}
	</script>
	
	
	<script type="text/javascript">
		function meterAlbum(){
			
			var n= document.getElementById("nom").value;
			var p= document.getElementById("privado").value;
			
			if (window.XMLHttpRequest){
				xmlhttp= new XMLHttpRequest();
			}
			
			xmlhttp.onreadystatechange= function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("mensaje").innerHTML=xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","crearAlbum.php?nom="+n+"&priv="+p,true);
			xmlhttp.send();
			
		}
	</script>
	
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
			
			xmlhttp.open("GET","mostrarAlbum.php?nom="+n2,true);
			xmlhttp.send();
			
		}
	</script>
	
	<script type="text/javascript">
	function verificarSubida(formulario,archivo){
			
			var nSubida= document.getElementById("nom3").value;
			
			if(nSubida.length == 0) 
			{
				alert("Inserte el nombre del album en el que desea subir la foto")
				return false;
			}
			
			if(archivo != 'inline')
			{
				alert("Seleccione una foto a subir")
				return false;
			} 
			return true;
		}
	</script>



</head>

<body>

	<h1>Tu Jinmalbum</h1>
	
	<ul class="menu"><br/><li><a href="inicio.php"> Volver al inicio </a></li></ul>

	<table>
	
		<tr>
		
			<td>
			
				<div class = "uno">
					<h3> Crear un nuevo album:</h3>

					<br/>

					Nombre del album: <input type= "text"
							name="nom"
							id="nom"
							value=""/>
							
					<br/>
						
					¿Desea que el album sea privado?: <select name="privado" id="privado">
								<option value="no">No</option>
								<option value="si">Si</option>
								</select>
					
					<input type="button" name="MeterAlbum" value="Crear album" onclick="meterAlbum()"/>	

				</div>
				
			</td>
			<td>
			
				<div id="mensaje"></div>
			
			</td>
			
		</tr>
		<tr>
			
			<td>
			
				<div class = "uno">
		
				<h3>Visualizar album</h3>
		
				¿Que album quiere ver?: <input type= "text"
						name="nom2"
						id="nom2"
						value=""/>
						
				<br/>
				
				<input type="button" name="VerAlbumes" value="Ver albumes creados" onclick="verAlbumes()"/>
			
				<br/>
				
				<input type="button" name="VerUno" value="Ver fotos del album" onclick="verUno()"/>
			
				</div>

			</td>
			<td>
		
				<div id="albumes"></div>
		
			</td>
			<td>
			
				<div id="fotos"></div>
		
			</td>
		</tr>
		<tr>
		
			<td>
		
				<div class = "uno">	
					<form id='subida' name='subida' method="post" enctype="multipart/form-data" action="subirFoto.php">
						<h3>Subir una foto a un album:</h3>
						
						
						Nombre del album: <input type= "text"
								name="nom3"
								id="nom3"
								value=""/>
								
						<br/>
						<br/>
						
						<img style="display:none" id="miImagenVacia" alt="Mi Foto" width="125" height="125"/>
						<input type="file" onchange="document.getElementById('miImagenVacia').style.display = 'inline';document.getElementById('miImagenVacia').src = window.URL.createObjectURL(this.files[0]); " name="imagen" id="imagen" />
							
						<br/>
						<br/>
						
						Anade un comentario a la foto: <input type= "text"
								name="comentario"
								id="comentario"
								value=""/>
								
						<br/>
						<br/>
							
						<input type="submit" value="Subir foto" onclick="return verificarSubida(this.form,this.form.miImagenVacia.style.display);"/>		

					</form>
				</div>
		
			</td>
			
		</tr>
		
	</table>

</body>

</html>