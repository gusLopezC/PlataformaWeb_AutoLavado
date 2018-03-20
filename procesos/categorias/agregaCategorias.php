<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Categorias.php";
	$fecha=date("Y-m-d");
	$idusuario=$_SESSION['iduser'];
	$categoria=$_POST['categoria'];

	$datos=array(
		$idusuario,
		$categoria,
		$fecha
		);

	$objcategoria=new categorias();
	echo $objcategoria->agregaCategoria($datos);
 ?>