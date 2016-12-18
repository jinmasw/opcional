<?php
session_start();
if (isset($_SESSION['nomusuario']))
{
	session_destroy();
	header("Location: inicio.php");
}
?>