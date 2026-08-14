<?php if(isset($TIPO) && $TIPO=='panel'){

if(isset($_GET['ac'])){

	$ac=$_GET['ac'];

	switch($ac){
		case 'verificar': require_once 'verificar.php'; break;
		case 'creador': require_once 'creador.php'; break;
		case 'modificador': require_once 'modificador.php'; break;
		case 'archivos': require_once 'archivos.php'; break;
		case 'anuncios': require_once 'anuncios.php'; break;
		case 'configuracion': require_once 'configuraciones.php'; break;
		case 'displadi': require_once 'displadi.php'; break;
		case 'tema': require_once 'tema.php'; break;
		case 'editor': require_once 'editor.php'; break;

		default: echo 'Oh! no existe el get ingresado...'; break;

	}

}
} else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>