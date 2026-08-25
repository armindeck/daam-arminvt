<?php
$AC_DIRECTORIO = '../../../';
#ELIMINAR ARCHIVO ----------------------->

if ($_POST['IniEliminarArchivo']){

    $archivo=$_POST['archivo'];

	unlink($AC_DIRECTORIO."$archivo");
	$ubi='?ac=archivos';
	if(isset($_POST['direccion'])){
		$ubi=$_POST['direccion'].'&permiso=true';
	}

    $vamos='../panel.php'.$ubi.'&ms=err&msm=elimiarchivo';

    header("location:{$vamos}");

} else

#ELIMINAR CARPETA ----------------------->

if ($_POST['IniEliminarCarpeta']){

    $carpeta=$_POST['carpeta'];



    rmdir($AC_DIRECTORIO."$carpeta");

    $vamos='../panel.php?ac=archivos&ms=err&msm=direliminado';

    header("location:{$vamos}");

} else

#CREAR CARPETA CARPETA ----------------------->

if ($_POST['IniCrearCarpeta'] || $_GET['IniCrearCarpeta']){

	if (isset($_POST['IniCrearCarpeta'])){	
    	$carpeta=trim($_POST['carpeta']);
    	$vamos='../panel.php?ac=archivos&ms=exi&msm=direcreado';
    	$vamosExisteCarpeta='panel.php?ac=archivos&ms=err&msm=direxiste';
    	$directorio="$carpeta";
    }
    if (isset($_GET['IniCrearCarpeta'])) {
    	$carpeta=trim($_GET['IniCrearCarpeta']);
    	$vamos='../panel.php?ac=creador&ms=exi&msm=direcreado';
    	$vamosExisteCarpeta='panel.php?ac=creador&ms=err&msm=direxiste';
    	$directorio=$carpeta;
    }
    if (file_exists($carpeta)) {
    	header("Location: {$vamosExisteCarpeta}");
    } else {
    	mkdir($AC_DIRECTORIO.$directorio);
    	header("location:{$vamos}");
    }

} else

#CREAR ARCHIVO ----------------------->

if ($_POST['IniCrearArchivo']){

    $archivo=$_POST['archivo'];



    if (!file_exists($AC_DIRECTORIO.$archivo)) {

	file_put_contents($AC_DIRECTORIO.$archivo,'');

	$vamos='../panel.php?ac=archivos&ms=exi&msm=datosactualizados';

	header("location:{$vamos}");

} else if(file_exists($AC_DIRECTORIO.$archivo)){

	$vamos='../panel.php?ac=archivos&ms=err&msm=exisarchivo';

	header("location:{$vamos}");

}

} else


#RENOMBRAR ----------------------->

if ($_POST['IniCambiarNombre']){
    $antiguo=$_POST['antiguo'];
    $nuevo=$_POST['nuevo'];
    if (file_exists($AC_DIRECTORIO.$antiguo) && !file_exists($AC_DIRECTORIO.$nuevo)) {
		rename($AC_DIRECTORIO.$antiguo,$AC_DIRECTORIO.$nuevo);
		$vamos='../panel.php?ac=archivos&ms=exi&msm=datosactualizados';
		header("location:{$vamos}");
} else if(file_exists($AC_DIRECTORIO.$nuevo)){
	$vamos='../panel.php?ac=archivos&ms=err&msm=exisarchivo';
	header("location:{$vamos}");
}

}

?>