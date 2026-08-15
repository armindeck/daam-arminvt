<?php if(isset($TIPO) && $TIPO=='panel'){
if(isset($_GET['ac'])){
	$ac=$_GET['ac'];
	switch($ac){
		case 'creador': require_once 'creador/creador.php'; break;
		case 'imagen': require_once 'imagen/imagen.php'; break;
		case 'archivos': require_once 'archivos/archivos.php'; break;
		case 'anuncios': require_once 'anuncios/anuncios.php'; break;
		case 'configuracion': require_once 'configuraciones/configuraciones.php'; break;
		case 'displadi': require_once 'displadi/displadi.php'; break;
		case 'tema': require_once 'tema/tema.php'; break;
		case 'editor': require_once 'editor/editor.php'; break;

		default: echo 'Oh! no existe el get ingresado...'; break;
	}
}
} else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>