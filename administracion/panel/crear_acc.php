<?php #BASE CREADA POR ARMIN
$AC_DIRECTORIO='../../';
require_once $AC_DIRECTORIO.'datos/datos.php';
if(!empty($_POST['guardar'])){
    $opc1=$_GET['opc1'];
    $opc2=$_GET['opc2'];
    $opc3=$_GET['opc3'];
    $opc4=$_GET['opc4'];
    $opc5=$_GET['opc5'];
    $opc6=$_GET['opc6'];
    $opc7=$_POST['opc7'];
    $opc8=$_GET['opc8'];
    $opc9=$_GET['opc9'];
    $opc10=$_GET['opc10'];
    $opc11=$_GET['opc11'];
    $opc12=$_GET['opc12'];

    if (isset($_GET['opcBorrador'])) {
    	$archivo=$_GET['opcBorrador'];
    } else {
    	for ($i=2; $i >=1 ; $i--) { 
	    	if (file_exists('borradores/'.$i.'.php')) {
	    		$archivo=$i+1;
	    		break;
	    	} else {
	    		$archivo=1;
	    	}
	    }	
    }
   	if ($opc8=='si' or $opc8==true) {
        $opc8V='true';
    }
    if ($opc8=='no' or $opc8==false) {
        $opc8V='false';
    }
    file_put_contents('borradores/'.$archivo.'.php',"<?php\n".'$opc1='."'$opc1'".";\n".'$opc2='."'$opc2'".";\n".'$opc3='."'$opc3'".";\n".'$opc4='."'$opc4'".";\n".'$opc5='."'$opc5'".";\n".'$opc6='."'$opc6'".";\n".'$opc7='."'$opc7'".";\n".'$opc8='."$opc8V".";\n".'$opc9='."'$opc9'".";\n".'$opc10='."'$opc10'".";\n".'$opc11='."'$opc11'".";\n".'$opc12='."'$opc12'".";\n".'$fecha="'.$fechahora.'";'."\n?>");
    $ubiCrearCC='crear_acc';
    $eliminar=true;
    $publicar='no';
    require_once 'borrador.php';
    #$vamos='panel.php?ac=creador'.$datos_introducidos;
    #header("Location: {$vamos}");
} else if(!empty($_POST['eliminar']) && $_GET['eli']){

	$eliminar='borradores/'.$_GET['eli'].'.php';

	if (file_exists($eliminar)) {
		unlink($AC_DIRECTORIO."administracion/panel/$eliminar");
		$vamos="panel.php?ac=creador&ms=exi&msm=elimiarchivo";
		header("Location: {$vamos}");
	} else {
		$vamos="panel.php?ac=creador&ms=err&msm=noexisarchivo";
		header("Location: {$vamos}");
	}

} else if(!empty($_POST['publicar']) && $_GET['opcBorrador']){
	$archivo=$_GET['opcBorrador'];
	require_once "borradores/$archivo.php";
	if ($opc8==true) {
        $opc8V='true';
    }
    if ($opc8==false) {
        $opc8V='false';
    }
	$otr=file_get_contents("borradores/$archivo.php");
	echo htmlspecialchars($otr);
#>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    $llamarcreador=$AC_DIRECTORIO.'datos/extenciones/extencionCrearCarpetas.php';
    $crear_carpetas=$AC_DIRECTORIO."administracion/panel/creadas/"; include $llamarcreador;
    if($opc9=='foro'){
        $crear_carpetas=$AC_DIRECTORIO."administracion/panel/creadas/$opc12/"; include $llamarcreador;

        $arcini="<?php #SISTEMA POR ARMIN\n".'$'."AC_DIRECTORIO='$opc10';\n".'$'."AC_CARPETA='$opc12';\nrequire_once ".'$'."AC_DIRECTORIO.'datos/foros/"; $arcfin=".php';\n?>";

        file_put_contents($crear_carpetas.'form.php',$arcini.'procesar'.$arcfin);
        file_put_contents($crear_carpetas.'reac.php',$arcini.'reacciones'.$arcfin);

        $foroCarpeta="\n".'$'."AC_CARPETA='".$opc12."';";
        $foro="\n".'$'."TIPO='".$opc9."';";
        
        $carforo="$opc12/";
        $opc12='index';
        $direforo='../';
    } else { $carforo=''; $foroCarpeta=''; $foro=''; $direforo=''; }

$verA="creadas/$carforo$opc12.php";
file_put_contents($verA,'<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='."'../../../".$direforo."'".';
# $AC_DIRECTORIO='."'$opc10'".';'.$foroCarpeta.'
$AC_UBICACION='."'$opc11'".';
require_once $AC_DIRECTORIO.'."'datos/datos.php'".';
require_once $AC_DIRECTORIO.'."'descripciones.php'".';
$AC_METADESCRIPCION='."'$opc1'".';
$AC_METADESCRIPCION2='."'$opc1'".';
$AC_METAETIQUETA='."'$opc3'".';
$AC_IMG='."'$opc4.png'".';
$AC_EXTRA='."$opc8V".';
$AC_TITULO='."'$opc5'".';
$AC_CATALOGO='."'$opc2'".';
$AC_DESCRIPCION=$AC_DESCRIPCION_'.$opc12.';
$AC_FECHA='."'$fechahora'".';
$AC_CONTENIDO='."'$opc7'".';'.$foro.'
require_once $AC_DIRECTORIO.'."'datos/displa.php'".';
?>');

$GuardarDescripcion=fopen("../../descripciones.php","a");
fwrite($GuardarDescripcion,'$AC_DESCRIPCION_'.$opc12."='".$opc6."';
");
fclose($GuardarDescripcion);
$vamos="panel.php?ac=creador&ms=exi&msm=entrapublicada";
header("Location: {$vamos}");
#>>>>>>>>>>>>>>>>>>>>>>>>>>>
} else { $AC_DIREC='../../'; $AC_ENCONTRAR='creador/'; require_once $AC_DIREC.'error.php'; }