<?php 
session_start();
if(isset($_SESSION['usuario'])){
	require_once "../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT 	art.nombre,
	art.lote,
	cat.nombreCategoria
	from articulos as art 
	inner join categorias as cat
	on art.id_categoria=cat.id_categoria where cat.nombreCategoria!='autolavado'";
	$result=mysqli_query($conexion,$sql);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>ventas</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		
		<div class="container">
			
				<?php while($ver=mysqli_fetch_row($result)): ?>
					<?php if ($ver[1]<=15):?>
						<div id="ventaAlert" class="alert alert-danger col-sd-1">
						<h4>ALERTA -->   </h4>
						    El producto <b><?php echo $ver[0]; ?> </b>casi se acabe en stock quedan 
							<b><?php echo $ver[1];?></b> articulos
							<b>Contacte con proveedor</b></p>
							</div>
					<?php endif ?>
					<?php endwhile; ?>
				
				<h1>Lavados y Ventas</h1>
				<div class="row">
					<div class="col-sm-12">
						<span class="btn btn-default" id="ventaProductoBtn">Ventas y productos</span>
						<span class="btn btn-default" id="ventasHechasBtn">Ventas hechas</span>

					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div id="ventasProducto"></div>
						<div id="ventasHechas"></div>
					</div>
				</div>
			</div>
		</body>
		</html>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#ventaProductoBtn').click(function(){
					esconderSeccionVenta();
					$('#ventasProducto').load('ventas/ventasProducto.php');
					$('#ventasProducto').show();		

				});
				$('#ventasHechasBtn').click(function(){
					esconderSeccionVenta();
					$('#ventasHechas').load('ventas/ventasyReportes.php');
					$('#ventasHechas').show();
				});
			});

			function esconderSeccionVenta(){
				$('#ventasProducto').hide();
				$('#ventasHechas').hide();
			}
		</script>

		<script type="text/javascript">
		$(document).ready(function(){
			$('#iddatatable').DataTable();
		});
	</script>

</script>
		<?php 
	}else{
		header("location:../index.php");
	}
	?>