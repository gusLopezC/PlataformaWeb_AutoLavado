<?php require_once "dependencias.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           e  Apellido  Direccion Email Telefono  RFC Editar  Elimiar
           <span class="sr-only">Menu navegacion</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="ventas.php"><img class="img-responsive img-thumbnail" src="../img/logo.png" alt="" width="170" height="150"></a>
       </div>
       <div id="navbar" class="collapse navbar-collapse">

        <ul class="nav navbar-nav navbar-right">

          

          <li><a href="ventas.php"><span class="glyphicon glyphicon-usd"></span> Ventas</a>
          </li> 
          <li><a href="inicio.php"><span class="glyphicon glyphicon-file "></span> Reportes</a>
          </li>
          <?php 
        if ($_SESSION['usuario'] == "admin"):
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Administrar Servicios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="articulos.php">Servicios</a></li>
            <li><a href="almacen.php">Almacen</a></li>
            <li><a href="categorias.php">Categorias</a></li>
          </ul>
        </li>
        <li><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Administrar usuarios</a>
        </li>
        <?php 
      endif;
        ?>

        <li><a href="clientes.php"><span class="glyphicon glyphicon-user"></span> Clientes</a>
        </li>
        <li class="dropdown" >
          <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario']; ?>  <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li> <a style="color: red" href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
</div>
</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);

    }
    else {
      $('.logo').height(100);
    }
  }
  );
</script>