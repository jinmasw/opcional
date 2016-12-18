<?php 
 
header('Content-Type: text/html; charset=utf-8');
 
 function validarNombre($valor){
	$opt=array("options"=>array("regexp"=>"/^([A-Z][a-z ñáéíóú]{2,60})$/i"));
    if(!filter_var($valor, FILTER_VALIDATE_REGEXP, $opt)){
       return false;
    }else{
       return true;
    }
 }
 function validarPass($valor){
	$opt=array("options"=>array("regexp"=>"/^([a-z ñáéíóú 0-9]{2,60})$/i"));
    if(!filter_var($valor, FILTER_VALIDATE_REGEXP, $opt)){
       return false;
    }else{
       return true;
    }
 }
 
 function validarEmail($val){
	$exp='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
	if(preg_match($exp,$val))
		return true;
	else
		return false;
 }
 
?>