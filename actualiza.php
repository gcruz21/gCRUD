
<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "", "prueba");	
	
	$id = $_POST['id'];
	$numero_empleado= $_POST['numero_empleado'];
	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$apellido2 = $_POST['apellido2'];
	$plaza =  $_POST['plaza'];
	$activo =  $_POST['activo'];	

	$sql = $mysqli->query("update empleados set numero_empleado='$numero_empleado', nombre=$nombre, apellido1='$apellido1' 
	, apellido='$apellido2', plaza='$plaza', activo='$activo' where id=$numero_empleado");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Contacto Actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">