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
    <!-- <div class="col-sm-12 col-s-offset"> -->
      <h1 style="text-align: center;">Reportes ventas</h1>
      
      <div class="col-8 center-block" style="width: 30%">
        <canvas  id="myChart" width="200" height="200"></canvas>
      </div>    
      <div class="col-8 center-block" style="width: 30%">
        <canvas  id="myChart2" width="200" height="200"></canvas>
      </div>    
      <div class="col-8 center-block" style="width: 30%">
        <canvas  id="myChart3" width="200" height="200"></canvas>
      </div> 
      <div class="col-8 center-block" style="width: 30%">
        <canvas  id="myChart4" width="200" height="200"></canvas>
      </div> 
    <!-- </div> -->
    <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels:[
          <?php 
          $sql="SELECT COUNT(fechaCompra),fechaCompra from ventas group by fechaCompra";
          $result=mysqli_query($conexion,$sql);
          while ($registros= mysqli_fetch_array($result))
          {
            ?>  
            '<?php echo $registros[1] ?>',
            <?php 
          }
          ?>
          ],
          datasets: [{
            label: "Ventas al dia",
            data: [
            <?php 
            $sql="SELECT COUNT(fechaCompra),fechaCompra from ventas group by fechaCompra";
            $result=mysqli_query($conexion,$sql);
            while ($registros= mysqli_fetch_array($result))
            {
              ?>  
              '<?php echo $registros[0] ?>',
              <?php 
            }
            ?>
            ],
            borderColor: "#A07BE8",
            fill: false
          }]

    },//end data
    options: {
      responsive: true,
      legend: {
        display: true,
        labels: {
          padding: 20
        },
      },
      tooltips: {
        enabled: false,
      }
  }//end options
});

var ctx2 = document.getElementById("myChart2").getContext('2d');
      var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
          labels:[
          <?php 
          $sql="SELECT COUNT(fechaCompra),fechaCompra,SUM(precio) from ventas group by fechaCompra";
          $result=mysqli_query($conexion,$sql);
          while ($registros= mysqli_fetch_array($result))
          {
            ?>  
            '<?php echo $registros[1] ?>',
            <?php 
          }
          ?>
          ],
          datasets: [{
            label: "Reporte ganancias al dia ",
            data: [
            <?php 
            $sql="SELECT COUNT(fechaCompra),fechaCompra,SUM(precio) from ventas group by fechaCompra";
            $result=mysqli_query($conexion,$sql);
            while ($registros= mysqli_fetch_array($result))
            {
              ?>  
              '<?php echo $registros[2] ?>',
              <?php 
            }
            ?>
            ],
            borderColor: "#5CE886",
            fill: false
          }]

    },//end data
    options: {
      responsive: true,
      legend: {
        display: true,
        labels: {
          padding: 20
        },
      },
      tooltips: {
        enabled: false,
      }
  }//end options
});


var ctx3 = document.getElementById("myChart3").getContext('2d');
      var myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
          labels:[
          <?php 
          $sql="SELECT nombre,lote FROM articulos WHERE id_categoria!= 1";
          $result=mysqli_query($conexion,$sql);
          while ($registros= mysqli_fetch_array($result))
          {
            ?>  
            '<?php echo $registros[0] ?>',
            <?php 
          }
          ?>
          ],
          datasets: [{
            label: "Reporte ganancias al dia ",
            data: [
            <?php 
            $sql="SELECT nombre,lote FROM articulos WHERE id_categoria!= 1";
            $result=mysqli_query($conexion,$sql);
            while ($registros= mysqli_fetch_array($result))
            {
              ?>  
              '<?php echo $registros[1] ?>',
              <?php 
            }
            ?>
            ],
            
            backgroundColor: "#FF463E",
            fill: false
          }]

    },//end data
    options: {
      responsive: true,
      legend: {
        display: true,
        labels: {
          padding: 20
        },
      },
      tooltips: {
        enabled: false,
      }
  }//end options
});

var ctx4 = document.getElementById("myChart4").getContext('2d');
      var myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
          labels:[
          <?php 
        $sql="SELECT COUNT(id_producto),fechaCompra FROM ventas WHERE id_producto=1 || 
        id_producto=2 || id_producto=3 || id_producto=4 || id_producto=5 GROUP BY fechaCompra";
          $result=mysqli_query($conexion,$sql);
          while ($registros= mysqli_fetch_array($result))
          {
            ?>  
            '<?php echo $registros[1] ?>',
            <?php 
          }
          ?>
          ],
          datasets: [{
            label: "Reporte lavados por dia ",
            data: [
            <?php 
           $sql="SELECT COUNT(id_producto),fechaCompra FROM ventas WHERE id_producto=1 || 
        id_producto=2 || id_producto=3 || id_producto=4 || id_producto=5 GROUP BY fechaCompra";
            $result=mysqli_query($conexion,$sql);
            while ($registros= mysqli_fetch_array($result))
            {
              ?>  
              '<?php echo $registros[0] ?>',
              <?php 
            }
            ?>
            ],
            
            backgroundColor: "#4BFF1C",
            fill: false
          }]

    },//end data
    options: {
      responsive: true,
      legend: {
        display: true,
        labels: {
          padding: 20
        },
      },
      tooltips: {
        enabled: false,
      }
  }//end options
});

</script>



</body>
</html>

<script>
	
</script>
<?php 
}else{
  header("location:../index.php");
}
?>