<?php 
	require_once "../../clases/Conexion.php";
	$c = new conectar();
	$conexion=$c->conexion();

	$sql="SELECT id_usuario,nombre,apellido,usuario  from usuarios ";
	$result= mysqli_query($conexion,$sql);

 ?>

<table class="table table-hover table-condensed table-bordered text-center">
	<caption><label>Usuarios</label></caption>
	<tr>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Usuario</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>
	<?php while ($mostrar=mysqli_fetch_row($result)): ?>
	<tr>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo $mostrar[3]; ?></td>
		<td>
			<span data-toggle="modal" data-target="#ModalactualizaUsuario" class="btn btn-warning btn-xs" onclick="agregaDatosUsuario('<?php 
			echo $mostrar[0]; ?>')">
				<span class="glyphicon  glyphicon-pencil"></span>
			</span></td>
		<td>
			<span class="btn btn-danger btn-xs" 
			onclick="eliminarUsuario('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon  glyphicon-remove"></span>
			</span></td>
	</tr>
	<?php endwhile; ?>

</table>