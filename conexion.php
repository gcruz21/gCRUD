<?php


$conexion=new mysqli("localhost", "root", "", "prueba");
	if ($conexion->connect_error){
		die ("conexion fallida");	
	}
	else
	{
	die ("conexion exitosa");
	}

?>