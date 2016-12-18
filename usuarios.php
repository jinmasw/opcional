<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

			
			<link rel="stylesheet" href="estilo.css"/>
			
			<title>Usuarios</title>
			
			<script type="text/javascript">
				function verUsuarios(){
					
					if (window.XMLHttpRequest){
						xmlhttp= new XMLHttpRequest();
					}
					
					xmlhttp.onreadystatechange= function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							document.getElementById("usuarios").innerHTML=xmlhttp.responseText;
						}
					}
					
					xmlhttp.open("GET","obtenerUsuarios.php",true); 
					xmlhttp.send();
					
				}
			</script>
			
			<script type="text/javascript">
				function eliminarUsuario(){
					
					var n= document.getElementById("eliminado").value;
					
					if (window.XMLHttpRequest){
						xmlhttp= new XMLHttpRequest();
					}
					
					xmlhttp.onreadystatechange= function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							document.getElementById("usuarios2").innerHTML=xmlhttp.responseText;
						}
					}
					
					xmlhttp.open("GET","eliminarUsuario.php?eli="+n,true); 
					xmlhttp.send();
					
				}
			</script>
			
			<script type="text/javascript"> 
			function mostrar()
			{
				var actualizar = setInterval(verUsuarios, 1000);
			}
			</script>
		
	</head>

	<body>

		<h1>Administrar usuarios</h1>

			<ul class="menu"><li><a href="inicio.php"> Volver al inicio </a></li></ul>

				
			<input type="button" name="VerUsuarios" value="Ver usuarios registrados" onclick="mostrar()"/>
			
			<br/>
			<br/>
			
			<div id="usuarios"></div>		
			
			<br/>
			<br/>
		
		
			Inserte el nombre del usuario a eliminar: <input type= "text"
				name="eliminado"
				id="eliminado"
				value=""/>
				
			<br/>
			
			<input type="button" name="EliminarUsuario" value="Eliminar usuario" onclick="eliminarUsuario()"/>
			
			<br/>
			<br/>
			
			<div id="usuarios2"></div>		
	
	</body>

</html>