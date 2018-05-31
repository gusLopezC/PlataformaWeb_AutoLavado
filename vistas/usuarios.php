<?php 
session_start();
if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin'){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>usuarios</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
			<h1>Administrar usuarios</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmRegistro">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" name="nombre" id="nombre">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" name="apellido" id="apellido">
						<label>Usuario</label>
						<input type="text" class="form-control input-sm" name="usuario" id="usuario">
						<label>Password</label>
						<input type="text" class="form-control input-sm" name="password" id="password">
						<p></p>
						<span class="btn btn-primary" id="registro">Registrar</span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="tablaUsuariosLoad"></div>
				</div>
			</div>
		</div>


		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="ModalactualizaUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Usuario</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
							<input type="text" hidden="" id="idUsuario" name="idUsuario">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" name="apellidoU" id="apellidoU">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Actualiza Usuario</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

<script>
window.addEventListener("load", function() {
	frmRegistro.nombre.addEventListener("keypress", soloLetras, false);
	frmRegistro.apellido.addEventListener("keypress", soloLetras, false);
});

window.addEventListener("load", function() {
	frmRegistroU.nombreU.addEventListener("keypress", soloLetras, false);
	frmRegistroU.apellidoU.addEventListener("keypress", soloLetras, false);
	
});
</script>

	<?php 
}else{
	header("location:../index.php");
}
?>