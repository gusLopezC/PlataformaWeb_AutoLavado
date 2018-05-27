<?php 

	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $password="kirito12";
		private $bd="lavado";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>
