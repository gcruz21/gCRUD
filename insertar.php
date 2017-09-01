<?php
	

			$mysqli = new mysqli("localhost", "root", "", "prueba");	
			$ne = $_GET['numero_empleado'];
			$nomb = $_GET['nombre'];
			$ap1 = $_GET['apellido1'];
			$ap2 = $_GET['apellido2'];
			$pz = $_GET['plaza'];	
			$act = $_GET['activo'];							
			$sql = $mysqli->query("insert into empleados (numero_empleado,nombre,apellido1, apellido2,plaza,activo) 
				values ('$ne', '$nomb', '$ap1', '$ap2', $pz, '$act') ");			
?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Contacto Registrado"); 
            </SCRIPT> 
            
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">
