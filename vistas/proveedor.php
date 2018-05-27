<?php 
session_start();
if(isset($_SESSION['usuario'])){

?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Proveedores</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Proveedores</h1>
			<div class="row">
				<div class="col-sm-12">
					<div id="tablaProveedorLoad"></div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaProveedorLoad').load("proveedores/tablaProveedor.php");

		});
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>