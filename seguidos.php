<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  
	<link rel="stylesheet" href="estilo.css"/>
	
	<title>Seguidos</title>
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script type="text/javascript"> 
		function dejarDeSeguir(){
		var dejar= document.getElementById("dejar").value;
		
		$(document).ready(function(){
    
        $.ajax({url: "dejar.php?dejar="+dejar, success: function(result){$("#dejarDIV").html(result);}});});
	}
		
	</script>
	
	<script type="text/javascript"> 
		function seguir(){
		var seguir= document.getElementById("siguiendo").value;
		
		$(document).ready(function(){
    
        $.ajax({url: "seguir.php?seguir="+seguir, success: function(result){$("#seguirDIV").html(result);}});});
	}
		
	</script>
	
	
  </head>
  
  
  <body>
  

	<h1>Personas a las que sigues</h1>
	
	<ul class="menu"><br/><li><a href="inicio.php"> Volver al inicio </a></li></ul>
	

	<script type="text/javascript"> 
		var actualizar = setInterval(usuariosSeguidos, 1000);
		function usuariosSeguidos(){
				
		$(document).ready(function(){
    
        $.ajax({url: "usuariosSeguidos.php", success: function(result){$("#div1").html(result);}});});
	}
		
	</script>
	
	
	
	<div id="div1"></div>
	
	<br/>
	<br/>
	

		Nombre del usuario que quieres seguir: <input type= "text"
				name="siguiendo"
				id="siguiendo"
				value=""/>
				
		<input type="button" value="Seguir" onclick = "seguir()"/>	

	
	<div id="seguirDIV"></div>
	
	<br/>
	<br/>
	


		Nombre del usuario que quieres dejar de seguir: <input type= "text"
				name="dejar"
				id="dejar"
				value=""/>
				
		<input type="button" value="Dejar de seguir" onclick="dejarDeSeguir()" />	

	
	<br/>
	<br/>
	
	<div id="dejarDIV"></div>
	
	<br/>
	<br/>
	
	<form id='visita' name='visita' method="post" enctype="multipart/form-data" action="visitar.php">

		Nombre del usuario que quieres ver: <input type= "text"
				name="visitado"
				id="visitado"
				value=""/>
				
		<input type="submit" value="Ver albumes"/>	
		
	</form>
	
	<div id="visitar"></div>

  </body>
  
</html>
