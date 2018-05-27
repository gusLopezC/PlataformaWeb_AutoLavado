<?php 
	class almacen{
		
	

		public function obtenDatosArticulo($idarticulo){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_producto, 
						id_categoria, 
						nombre,
						descripcion,
						cantidad,
						precio,
						provedor,
						lote
				from articulos 
				where id_producto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
					"id_producto" => $ver[0],
					"id_categoria" => $ver[1],
					"nombre" => $ver[2],
					"descripcion" => $ver[3],
					"cantidad" => $ver[4],
					"precio" => $ver[5],
					"proveedor" => $ver[6],
					"stock" => $ver[7]
						);

			return $datos;
		}

		public function actualizaArticulo($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE articulos set id_categoria='$datos[1]', 
										nombre='$datos[2]',
										descripcion='$datos[3]',
										cantidad='$datos[4]',
										precio='$datos[5]',
										provedor='$datos[6]',
										lote='$datos[7]'
						where id_producto='$datos[0]'";

			return mysqli_query($conexion,$sql);
		}

		public function eliminaArticulo($idarticulo){
			$c=new conectar();
			$conexion=$c->conexion();

			$idimagen=self::obtenIdImg($idarticulo);

			$sql="DELETE from articulos 
					where id_producto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);

			if($result){
				$ruta=self::obtenRutaImagen($idimagen);

				$sql="DELETE from imagenes 
						where id_imagen='$idimagen'";
				$result=mysqli_query($conexion,$sql);
					if($result){
						if(unlink($ruta)){
							return 1;
						}
					}
			}
		}

		public function obtenIdImg($idProducto){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_imagen 
					from articulos 
					where id_producto='$idProducto'";
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenRutaImagen($idImg){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT ruta 
					from imagenes 
					where id_imagen='$idImg'";

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

	}

 ?>