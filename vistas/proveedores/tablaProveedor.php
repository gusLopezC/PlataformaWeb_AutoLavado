<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_proveedor,nombreProvedor,direccion,telefono	
								FROM proveedor";
			$result=mysqli_query($conexion,$sql);
?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Categorias </label></caption>
	<tr>
		<td>Proveedor</td>
		<td>Direccion</td>
		<td>Telefono</td>
		
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

	<tr>
		<td><?php echo $ver[1] ?></td>
		<td><?php echo $ver[2] ?></td>
		<td><?php echo $ver[3] ?></td>
	</tr>

<?php endwhile; ?>
</table>