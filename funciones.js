function verificarVacio(f)
{
	var nombre = f.nombre.value;
	var correo = f.correo.value;
	var contraseña = f.contraseña.value;
	
	if(nombre.length < 2)
	{
		alert("Por favor, inserte un nombre válido de al menos un caracter y sin numeros");
		return false;
	}
	if(contraseña.length < 6)
	{
		alert("Por favor, inserte una contraseña de al menos 6 caracteres");
		return false;
	}
	
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if ( !expr.test(correo) )
	{
		alert("La direccion de correo no es correcta, introduzca una válida. El formato de una dirección válida sería: ejemplo@ejemplo.com");
		return false;
	}
}