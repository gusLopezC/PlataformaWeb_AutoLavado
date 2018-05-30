<?php 

	class conectar{
		private $servidor="localhost";
		private $usuario="adminlavado";
		private $password="tellezgiron1";
		private $bd="lavado";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}

	/*$obj = new conectar();

	if($obj->conexion()){
		echo "conectado";
	}*/

 ?>
