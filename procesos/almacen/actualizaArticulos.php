<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/Almacen.php";

$obj= new almacen();

$datos=array(
		$_POST['idArticulo'],
	    $_POST['categoriaSelectU'],
	    $_POST['nombreU'],
	    $_POST['descripcionU'],
	    $_POST['cantidadU'],
	    $_POST['precioU'],
	    $_POST['proveedorU'],
	    $_POST['stockU']
			);

    echo $obj->actualizaArticulo($datos);

 ?>