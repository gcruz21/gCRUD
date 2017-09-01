<?php
	session_start();
	if(isset($_SESSION['nombreusu']))
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>CRUD</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">	
	<script src="js/metodos.js"></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>	
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand"> </a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav navbar-right">
						<?php								
							 echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['nombreusu']."</a></li>";
						?>				      
				    </ul>			
				</div>
			</div>
		</nav>
	</header> 




	<div class="container">
		<div class="row">	
					
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Usuario</a><br><br>
			<table class='table'>
				<tr>
					<th>Numero de Empleado</th><th>Nombre Completo</th><th>Nombre de Plaza</th><th>Unidad de Plaza</th><th><span class="glyphicon glyphicon-wrench"></span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "prueba");		
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			
		/*	$consulta= ("SELECT numero_empleado, concat_ws (' ',nombre ,apellido1, apellido2) as nomc, 
						plaza, activo FROM empleados where activo!=0");			*/

			$consulta= ("SELECT numero_empleado, concat_ws (' ',nombre ,apellido1, apellido2) as nomc, 
						plazas.nombre_plaza, plazas.unidad_administrativa FROM empleados 
						inner join plazas where plazas.id=empleados.plaza && empleados.activo!=0  	");		

			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td>";	
					echo"<td>";						
					echo "<a data-toggle='modal' data-target='#editUsu'
						data-numero_empleado ='" .$fila[0] ."' 
						data-nomc='" .$fila[1] ."' 
						data-nombre_plaza='" .$fila[2] ."' 
						data-unidad_administrativa ='" .$fila[3] ."'
				    	class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span> Editar</a> ";			
					echo "<a class='btn btn-danger' href='elimina.php?id=" .$fila[0] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
					echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();		
?>



</table>
	</div> 
		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Agregar Empleado</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="GET">   

                       		<div class="form-group">
                       			<label for="numero_empleado">Numero de Empleado:</label>
                       			<input class="form-control" id="numero_empleado" name="numero_empleado" type="number" required></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="nombre">Nombre:</label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" required></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="apellido1">Apellido1:</label>
                       			<input class="form-control" id="apellido1" name="apellido1" type="text" required></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="apellido2">Apellido2:</label>
                       			<input class="form-control" id="apellido2" name="apellido2" type="text"></input>
                       		</div>

                       		<div class="form-group">
                       			<label for="plaza">Plaza:</label>
                       			<input class="form-control" id="plaza" name="plaza" type="number" required></input>

                       		</div>
                       		<div class="form-group">
                       			<label for="activp">Activo:</label>
                       			<input class="form-control" id="activo" name="activo" type="number"  required></input>
                       		</div>

							<input type="submit" class="btn btn-success" value="Salvar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 



        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Empleado</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza.php" method="POST">                       		
                       		        
                       		     <input id="id" name="id" type="hidden" ></input>     
									<label>Numero de Empleado:  </label>	 		
		                       	 <input id="numero_empleado" name="numero_empleado" type="number"></input><br><br>
									   
		                       		<div class="form-group">
		                       			<label for="nombre">Nombre:</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" required ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="apellido1">Apellido1:</label>
		                       			<input class="form-control" id="apellido1" name="apellido1" type="text" ></input>
		                       		</div>

		                       		<div class="form-group">
		                       			<label for="apellido2">Apellido2:</label>
		                       			<input class="form-control" id="apellido2" name="apellido2" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="plaza">Plaza:</label>
		                       			<input class="form-control" id="plaza" name="plaza" type="int" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="Activo">Activo:</label>
		                       			<input class="form-control" id="activo" name="activo" type="int" ></input>
		                       		</div>

									<input type="submit" class="btn btn-success">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('numero_empleado')
		  var recipient2 = button.data('nombre')
		  var recipient3 = button.data('apellido1')
		  var recipient4 = button.data('apellido2')
		  var recipient5 = button.data('plaza')
		  var recipient6 = button.data('activo')
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #numero_empleado').val(recipient1)
		  modal.find('.modal-body #nombre').val(recipient2)
		  modal.find('.modal-body #apellido1').val(recipient3)	
		  modal.find('.modal-body #apellido2').val(recipient4)
		  modal.find('.modal-body #plaza').val(recipient5)
		  modal.find('.modal-body #activo').val(recipient6)	 
		});
		
	</script>
	
</body>
</html>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>