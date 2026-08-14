<?php
$AC_DIRECTORIO='../../';
require_once $AC_DIRECTORIO.'datos/datos.php';
$ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';
$verificado=false; $verificado2=false;
if (!empty($_POST['like']) or !empty($_POST['dislike'])) {
	if(isset($_POST['like'])){ $fue='l'; } if(isset($_POST['dislike'])){ $fue='d'; }
	$verificado=true;
	if($verificado==true){
		if (isset($_GET['id']) && isset($_GET['ubi']) && isset($_GET['arc'])) {
			$verificado2=true;
			$id=$_GET['id']; $ubi=$_GET['ubi']; $arc=$_GET['arc'];
			$cdir=darFormatoIobi($ubi).$arc;
			$NUEVA_UBICACION=$AC_DIRECTORIO.'form/data/data#'.$cdir;
			$UbicacionArchivoContador=$NUEVA_UBICACION.'/reacciones/'.$fue.$id.'.txt';
			$ex='Contador'; require $AC_DIRECTORIO.'datos/extenciones.php';
			#echo '../../'.$ubi.$arc.'?ms=exi&msm=reaccion';
			#exit;
			#header("Refresh:30; url=$dir");
			$vamos='../../'.$ubi.$arc.'?ms=exi&msm=reaccion';
			header("Location: {$vamos}");
		}
	}
}
if($verificado==false || $verificado2==false){
	if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
}

?>