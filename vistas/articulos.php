<?php 
session_start();
if(isset($_SESSION['usuario'])){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>articulos</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_categoria,nombreCategoria
		from categorias";
		$result=mysqli_query($conexion,$sql);
		?>
	</head>
	<body>
		<div class="container">
			<h1>Articulos y Servicios</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmArticulos" enctype="multipart/form-data">
						<label>Categoria</label>
						<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
							<option value="A" disabled>Selecciona Categoria</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
						<label>Precio</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<label>Imagen</label>
						<input type="file" id="imagen" name="imagen">
						<p></p>
						<span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaArticulosLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Articulo</h4>
					</div>
					<div class="modal-body">
						<form id="frmArticulosU" enctype="multipart/form-data">
							<input type="text" id="idArticulo" hidden="" name="idArticulo">
							<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
								<option value="A">Selecciona Categoria</option>
								<?php 
								$sql="SELECT id_categoria,nombreCategoria
								from categorias";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Descripcion</label>
							<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
							<label>Cantidad</label>
							<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
							<label>Precio</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
							
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

<script>
window.addEventListener("load", function() {
	frmArticulos.nombre.addEventListener("keypress", soloLetras, false);
	frmArticulos.descripcion.addEventListener("keypress", soloLetras, false);
	frmArticulos.cantidad.addEventListener("keypress", soloNumeros, false);
	frmArticulos.precio.addEventListener("keypress", soloNumeros, false);
	
});
window.addEventListener("load", function() {
	frmArticulosU.nombreU.addEventListener("keypress", soloLetras, false);
	frmArticulosU.descripcionU.addEventListener("keypress", soloLetras, false);
	frmArticulosU.cantidadU.addEventListener("keypress", soloNumeros, false);
	frmArticulosU.precioU.addEventListener("keypress", soloNumeros, false);
});
</script>

	<?php 
}else{
	header("location:../index.php");
}
?>