$(document).ready(function(){
				$('#ventaProductoBtn').click(function(){
					esconderSeccionVenta();
					$('#ventasProducto').load('ventas/ventasProducto.php');
					$('#ventasProducto').show();		

				});
				$('#ventasHechasBtn').click(function(){
					esconderSeccionVenta();
					$('#ventasHechas').load('ventas/ventasyReportes.php');
					$('#ventasHechas').show();
				});
			});

			function esconderSeccionVenta(){
				$('#ventasProducto').hide();
				$('#ventasHechas').hide();
			}