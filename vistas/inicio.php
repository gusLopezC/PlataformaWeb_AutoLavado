<?php 
session_start();

require_once "../clases/Conexion.php";
$c= new conectar();
$conexion=$c->conexion();

 
if(isset($_SESSION['usuario'])){		
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Reportes</title>
   <?php require_once "menu.php"; ?>
 </head>
 <body>
  <div class="row">
  <h3 style="text-align: center;">Reportes ventas al dia</h3>
  <div class="col-8 center-block" id="ventasdia" style="height: 250px; width:450px;"></div>
  <h3 style="text-align: center;">Ganancias al dia</h3>
  <div class="col-8 center-block" id="gananciasdia" style="height: 250px; width:450px;"></div>
  <h3 style="text-align: center;">Productos en stock</h3>
  <div class="col-8 center-block" id="productosstock" style="height: 250px; width:450px;"></div>
  <h3 style="text-align: center;">Reporte de lavados</h3>
  <div class="col-8 center-block" id="reportelavados" style="height: 250px; width:450px;"></div>
 
  </div>
</body>
</html>

<script>
  new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'ventasdia',
  <?php 
  $sql="SELECT COUNT(fechaCompra) as totalventas,fechaCompra from ventas group by fechaCompra";
    $result=mysqli_query($conexion,$sql);
    $chart_data = '';
    while ($registros= mysqli_fetch_array($result))
    {   
      $chart_data .= "{ totalventas:'".$registros["totalventas"]."', fechaCompra:".$registros["fechaCompra"]."}, ";
    }
     //  $chart_data = substr($chart_data, 0,-2);
  ?>
  data:[<?php echo $chart_data; ?>],
  xkey: 'fechaCompra',
  ykeys: ['totalventas'],
  labels: ['Ventas al dia']
});
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'gananciasdia',
  <?php 
  $sql="SELECT COUNT(fechaCompra) as sumfecha,fechaCompra,SUM(precio) as sumprecio from ventas group by fechaCompra";
    $result=mysqli_query($conexion,$sql);
    $chart_data = '';
    while ($registros= mysqli_fetch_array($result))
    {   
      $chart_data .= "{ sumfecha:'".$registros["sumfecha"]."', fechaCompra:".$registros["fechaCompra"].", sumprecio:".$registros["sumprecio"]."}, ";
    }
     //  $chart_data = substr($chart_data, 0,-2);
  ?>
  data:[<?php echo $chart_data; ?>],
  xkey: 'fechaCompra',
  ykeys: ['sumprecio'],
  labels: ['Ventas al dia']
});
new Morris.Bar({
  
  element: 'productosstock',
  <?php 
  $sql="SELECT nombre,lote FROM articulos WHERE id_categoria!= 1";
    $result=mysqli_query($conexion,$sql);
    $chart_data = '';
    while ($registros= mysqli_fetch_array($result))
    {   
      $chart_data .= "{ nombre:'".$registros["nombre"]."', lote:".$registros["lote"]."}, ";
    }
     //  $chart_data = substr($chart_data, 0,-2);
  ?>
  data:[<?php echo $chart_data; ?>],
  xkey: 'nombre',
  ykeys: ['lote'],
  labels: ['Cantidad']
});
new Morris.Bar({
  
  element: 'reportelavados',
  <?php 
  $sql="SELECT COUNT(id_producto) as countproducto,fechaCompra FROM ventas WHERE id_producto=1 GROUP BY fechaCompra";
    $result=mysqli_query($conexion,$sql);
    $chart_data = '';
    while ($registros= mysqli_fetch_array($result))
    {   
      $chart_data .= "{ countproducto:'".$registros["countproducto"]."', fechaCompra:".$registros["fechaCompra"]."}, ";
    }
     //  $chart_data = substr($chart_data, 0,-2);
  ?>
  data:[<?php echo $chart_data; ?>],
  xkey: 'fechaCompra',
  ykeys: ['countproducto'],
  labels: ['Cantidad']
});

 </script>
<?php 
}else{
  header("location:../index.php");
}
?>