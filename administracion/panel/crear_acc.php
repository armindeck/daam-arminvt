<?php #BASE CREADA POR ARMIN
$AC_DIRECTORIO='../../';
require_once $AC_DIRECTORIO.'datos/datos.php';
if(!empty($_POST['guardar'])){
    $exP='exPMetodo'; $exP_Metodo='GET'; require 'extencionesPanel.php'; 

    if (isset($_GET['ModArchivo']) && isset($_GET['opcModArchivo'])) {
        $ModArchivo=$_GET['ModArchivo'];
        $opcModArchivo=$_GET['opcModArchivo'];
        $permiExtras=true;
        $PermiEditar=true;
    }
    if (isset($_GET['opcBorrador'])) {
    	$archivo=$_GET['opcBorrador'];
    } else {
    	for ($i=9; $i >=1 ; $i--) { 
	    	if (file_exists('borradores/'.$i.'.php')) {
	    		$archivo=$i+1;
	    		break;
	    	} else {
	    		$archivo=1;
	    	}
	    }
        if (file_exists('borradores/10.php')){
            require_once 'borradores/10.php';
            if (isset($opcExiste) && $opcExiste == true) {
                header("Location: panel.php?ac=creador&ms=err&msm=borradoresllenos");
                exit;
            }
        }
    }
    $exP='exPOpc8'; require 'extencionesPanel.php';
    $exP='exPArchivoMod'; require 'extencionesPanel.php'; 
    file_put_contents('borradores/'.$archivo.'.php',$ArchivoModDatosContenido);
    $ubiCrearCC='crear_acc';
    $eliminar=true;
    #require_once 'borrador.php';
    $vamos='panel.php?ac=creador&ms=exi&msm=datosguardados&archiguar='.$archivo;
    header("Location: {$vamos}");
} else if(!empty($_POST['eliminar']) && $_GET['eli'] && $_GET['tipo']){
    $eli=$_GET['eli'];
    $tipo=$_GET['tipo'];

    if ($tipo=='borrador') {
    	$eliminar='borradores/'.$eli.'.php';

    	if (file_exists($eliminar)) {
    		unlink($AC_DIRECTORIO."administracion/panel/$eliminar");
    		header("Location: panel.php?ac=creador&ms=exi&msm=elimiarchivo");
    	} else {
    		$vamos="panel.php?ac=creador&ms=err&msm=noexisarchivo";
    		header("Location: {$vamos}");
    	}
    } else if ($tipo=='publicada') {
        $ubi1=$AC_DIRECTORIO."datos/contenidos/$eli.php";
        if(file_exists($ubi1)){
            require_once $ubi1;
            $ubi2=$AC_DIRECTORIO."$opc11$opc12.php";
            unlink($ubi1);
            unlink($ubi2);
            header("Location: panel.php?ac=creador&ms=exi&msm=archivoselimi");
        }
    }

} else if(!empty($_POST['publicar']) && $_GET['opcBorrador']){
	$archivo=$_GET['opcBorrador'];
	require_once "borradores/$archivo.php";
    if (isset($opcEdi) && isset($opcEdi2)) {
        $ArchivoEditable=$opcEdi;
        $ArchivoOpcEditable=$opcEdi2;
        $SeModifica=true;
    } else { $SeModifica=false; }
#>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    if (isset($SeModifica) && $SeModifica==true) {
        $UbiArchivo=$AC_DIRECTORIO.'datos/contenidos/'.$ArchivoEditable.'.php';
        if (file_exists($UbiArchivo)) {
            $ArchivoModDatos=$UbiArchivo;
            $ArchivoModComplementos=$AC_DIRECTORIO.$opc11.$opc12.'.php';
            $exP='exPForo'; require 'extencionesPanel.php';
            $exP='exPOpc8'; require 'extencionesPanel.php';
            $exP='exPArchivoMod'; require 'extencionesPanel.php';
            $exP='exPArchivoModComplementos'; require 'extencionesPanel.php';
            switch ($ArchivoOpcEditable) {
                case 'datos':
                    file_put_contents($ArchivoModDatos,$ArchivoModDatosContenido);
                    break;
                case 'complementos':
                    file_put_contents($ArchivoModComplementos,$ArchivoModComplementosContenido);
                    break;
                case 'ambos':
                    file_put_contents($ArchivoModDatos,$ArchivoModDatosContenido);
                    file_put_contents($ArchivoModComplementos,$ArchivoModComplementosContenido);
                    break;
            }
            $vamos="panel.php?ac=creador&ms=exi&msm=entrapublicada";
            header("Location: {$vamos}");
        }
    } else {
    $exP='exPForo'; require 'extencionesPanel.php';
    function darFormato2($string) { $string = str_replace(array('/'), '-', $string); return $string; }
    $opc11Convertir=darFormato2(trim($opc11)); $carforoConvertir=darFormato2(trim($carforo));

    $da1=$AC_DIRECTORIO."datos/contenidos/cn_$opc11Convertir$carforoConvertir$opc12.php";
    $da2=$AC_DIRECTORIO."$opc11$carforo$opc12.php";

    if (file_exists($da1) && file_exists($da2)) {
        header("Location: panel.php?ac=creador&ms=err&msm=exisarchivo2");
        echo 'El archivo ya existe! no se puede reemplazar';
        exit;
    } else { $permiProceder=true; }

    if (isset($permiProceder) && $permiProceder == true) {
        $exP='exPOpc8'; require 'extencionesPanel.php';
        $exP='exPArchivoMod'; require 'extencionesPanel.php';
        $exP='exPArchivoModComplementos'; require 'extencionesPanel.php';

        file_put_contents($da1,$ArchivoModDatosContenido);
        file_put_contents($da2,$ArchivoModComplementosContenido);

        header("Location: panel.php?ac=creador&ms=exi&msm=entrapublicada");
    }
#>>>>>>>>>>>>>>>>>>>>>>>>>>>
} } else { if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}"); }?>