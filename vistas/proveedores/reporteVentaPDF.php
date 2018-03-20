<?php 
require_once  "../../clases/Conexion.php";
require_once  "../../clases/Almacen.php";
$objv= new almacen();
$c= new conectar();
$conexion = $c->conexion();

$fecha= date('Y-m-d');

$sql="SELECT art.nombre,
art.descripcion,
art.cantidad,
art.precio,
img.ruta,
cat.nombreCategoria,
art.provedor,
art.lote,
art.id_producto
from articulos as art 
inner join imagenes as img
on art.id_imagen=img.id_imagen
inner join categorias as cat
on art.id_categoria=cat.id_categoria where cat.nombreCategoria!='autolavado'";

$result=mysqli_query($conexion, $sql);

?> 

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte</title>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
</head>
<body>
	<div align="center">
		<img src="../../img/logo.png" alt="" width="200">
	</div>
	<br><br>
	<table class="table">
		<tr>
			<td>Fecha: <?php echo $fecha; ?></td>
		</tr>
	
	</table>
	<div class="col-sm-12">
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Articulos</label></caption>
	<tr>
		<td>Nombre</td>
		<td>Descripcion</td>
		<td>Cantidad</td>
		<td>Precio</td>
		<td>Categoria</td>
		<td>Proveedor</td>
		<td>Cantidad stock</td>
		
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td>
		<?php if ($ver[7]>=10):
		?>
		<td bgcolor="#9EFFA1"><?php echo $ver[7]; ?></td>
		<?php endif ?>
		<?php if ($ver[7]<=15 && $ver[7]>5 ):
		?>
		<td bgcolor="#FF9542"><?php echo $ver[7]; ?></td>
		<?php endif ?>
		<?php if ($ver[7]<=5):
		?>
		<td bgcolor="#FF796A"><?php echo $ver[7]; ?></td>
		<?php endif ?>
		
	</tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>