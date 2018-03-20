<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
	$c= new conectar();
	$conexion = $c->conexion();
	$obj= new ventas();

	$sql="SELECT id_venta,fechaCompra,id_cliente from ventas group by id_venta";
	$result=mysqli_query($conexion,$sql);
	

 ?>

<h4>Reportes y ventas</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-12"> 
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered text-center">
					<caption><label>Reportes</label></caption>
				<tr>
					<td>Folio</td>
					<td>Fecha</td>
					<td>Cliente</td>
					<td>Total</td>
					<td>Ticket</td>
					<td>Reporte</td>
				</tr>
				<?php  while ($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $ver[0]; ?></td>
					<td><?php echo $ver[1]; ?></td>
					<td><?php 
							if ($obj->nombreCliente($ver[2])==" ") {
								echo "S/C No aplica";
							}
							else{
								echo $obj->nombreCliente($ver[2]) ;
							}
						 ?></td>
					<td><?php 
							echo "$" . $obj->obtenerTotal($ver[0]);
					 ?></td>
					<td>
						<a href="../procesos/ventas/crearTicketPdf.php?idventa=<?php echo $ver[0] ?>"" class="btn btn-link ">
							<i class="fa fa-ticket fa-2x" aria-hidden="true"></i>
						</a>
					</td>
					<td>
						<a href="../procesos/ventas/crearReportePdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-success btn-sm">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
						</a>
				</tr>
			<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>