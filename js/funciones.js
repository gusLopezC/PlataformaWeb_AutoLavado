function validarFormVacio(formulario){
		datos=$('#' + formulario).serialize();
		d=datos.split('&');
		vacios=0;
		for(i=0;i< d.length;i++){
				controles=d[i].split("=");
				if(controles[1]=="A" || controles[1]==""){
					vacios++;
				}
		}
		return vacios;
	}

//usa el nivel DOM 2  de JS para solo permtir los caracteres dentro del if segun su codig ASCII
	function soloNumeros(e){
		var key = window.event ? e.which : e.keyCode;
		if (key < 46 || key > 57) {
		  e.preventDefault();
		}
		}
		

		function soloNumerosenteros(e){
			var key = window.event ? e.which : e.keyCode;
			if (key < 48 || key > 57) {
				e.preventDefault();
			}
			}
	  
	  function soloLetras(e){
		  var charCode = e.charCode;
		  if (charCode < 65 || charCode > 122) {
			e.preventDefault();
		}
	  }