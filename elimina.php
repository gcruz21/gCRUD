<?php

session_start();
if(isset($_SESSION['nombreusu']))
{
	$id = $_GET['id'];
//	$activo = $_GET['id'];
	$mysqli = new mysqli("localhost", "root", "", "prueba");
	
	
//	$sql = $mysqli->query("delete from empleados where numero_empleado='$id'");	
	$sql = $mysqli->query("update empleados set activo=0 where numero_empleado='$id' ");	
	
	echo "<script language='javascript'> alert('Empleado Eliminado'); </script>";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>

