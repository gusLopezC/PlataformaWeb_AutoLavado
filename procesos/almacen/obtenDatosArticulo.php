<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Almacen.php";

	$obj= new almacen();


	$idart=$_POST['idart'];

	echo json_encode($obj->obtenDatosArticulo($idart));

 ?>