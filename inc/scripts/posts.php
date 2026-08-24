<?php $versionCreador=file_get_contents(__DIR__.'/creador.x');
if (isset($exP)) {
    #EXTENCION
    if ($exP=='exPMetodo') {
        if (isset($exP_Metodo)) {
            if ($exP_Metodo=='GET') {
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
                $opcXMensaje=$_GET['opcXMensaje'];
                $opcXAccesoAdmin=$_GET['opcXAccesoAdmin'];
                $opcXGaleria=$_GET['opcXGaleria'];
            } else
            if ($exP_Metodo=='POST') {
                $opcXMensaje=''; $opcXAccesoAdmin=''; $opcXGaleria='';
                $opc1=$_POST['opc1']; #Meta descripción
                $opc2=$_POST['opc2']; #Catalogo
                $opc3=$_POST['opc3']; #Meta etiqueta
                $opc4=$_POST['opc4']; #Imagen
                $opc5=$_POST['opc5']; #Titulo
                $opc6=$_POST['opc6']; #Descripción breve
                $opc7=$_POST['opc7']; #Contenido
                $opc8=$_POST['opc8']; #Anuncio
                $opc9=$_POST['opc9']; #Tipo
                $opc10=$_POST['opc10']; #Directorio
                $opc11=$_POST['opc11']; #Ubicacion : <Entradas>
                $opc12=$_POST['opc12']; #Archivo
                if(isset($_POST['opcXMensaje'])) { $opcXMensaje=$_POST['opcXMensaje']; }
                if(isset($_POST['opcXAccesoAdmin'])) { $opcXAccesoAdmin=$_POST['opcXAccesoAdmin']; }
                if(isset($_POST['opcXGaleria'])) { $opcXGaleria=$_POST['opcXGaleria']; }
            } else {
                echo '<h1>El $exP_Metodo es incorrecta.';
                exit;
            }
        }
    }
    #EXTENCION
    if ($exP=='exPOpc8') {
        if ($opc8=='si' || $opc8==true || $opc8=='true' || $opc8===1 || $opc8 == 'on') { $opc8V='si'; }
        if ($opc8=='no' || $opc8==false || $opc8=='false' || $opc8===0 || $opc8 == '') { $opc8V='no'; }
    }
    #EXTENCION
    if ($exP=='exPForo') {
        #require_once 'codigos_mejorar/c1.php'; ese codigo va a qui
    	$carforo=''; $foroCarpeta=''; $ftipo=''; $direforo=''; $msmen='';
        #codigos antiguos, los deje para que no den errores...
        if ($opc9!='normal') {
            $ftipo="\n".'$'."TIPO='".$opc9."';";
    	}
    }
    $fmenSa=''; $faccadmin=''; $faccadminC='';
    if(isset($opcXMensaje) && $opcXMensaje=='on'){ $fmenSa="\n".'$MENSAJE=true;'; }
    if(isset($opcXAccesoAdmin) && $opcXAccesoAdmin=='on'){
        $faccadmin="\n".'if(isset($_SESSION["rol"]) && $_SESSION["rol"] == 5) {';
        $faccadminC="\n".'} else { header("Location: '.$opc10.'error.php"); }';
    }
    if(isset($opcXGaleria) && $opcXGaleria=='on'){ $fgaleria="\n".'$GALERIA=true;'; }
    #EXTENCION
    if ($exP=='exPArchivoMod') {
        if (isset($PermiEditar) && $PermiEditar==true) {
            $Edi='$opcEdi='."'$ModArchivo'".";\n".'$opcEdi2='."'$opcModArchivo'".";\n";
        } else { $Edi=''; }

        $ArchivoModDatosContenido="<?php #CONTENIDO POR ARMIN\n".'$opc1='."'$opc1'".";\n".'$opc2='."'$opc2'".";\n".'$opc3='."'$opc3'".";\n".'$opc4='."'$opc4'".";\n".'$opc5='."'$opc5'".";\n".'$opc6='."'$opc6'".";\n".'$opcXMensaje='."'$opcXMensaje';\n".'$opcXAccesoAdmin='."'$opcXAccesoAdmin';\n".'$opcXGaleria='."'$opcXGaleria';\n".'$opc7='."'$opc7'".";\n".'$opc8='."'$opc8V'".";\n".'$opc9='."'$opc9'".";\n".'$opc10='."'$opc10'".";\n".'$opc11='."'$opc11'".";\n".'$opc12='."'$opc12'".";\n".'$fecha="'.dateTime().'";'."\n$Edi".'$opcEstado='."'publico';\n".'$opcExiste=true;'."\n#".$versionCreador."\n?>";
    }
    #EXTENCION
    if ($exP=='exPArchivoModComplementos') {
        if (isset($carforoConvertir)) {
            $cfCon="cn_$opc11Convertir$carforoConvertir$opc12";
        } else { $cfCon=''; }
        $ArchivoModComplementosContenido='<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='."'$opc10';".$foroCarpeta.'
require_once $AC_DIRECTORIO.'."'datos/contenidos/"."$cfCon$opcEdi".".php'".';
$AC_UBICACION=$opc11;
$AC_ARCHIVO=$opc12;
require_once $AC_DIRECTORIO.'."'datos/datos.php'".';'.$faccadmin.'
$AC_METADESCRIPCION=$opc1;
$AC_METADESCRIPCION2=$opc1;
$AC_METAETIQUETA=$opc3;
$AC_IMG=$opc4;
$AC_EXTRA=$opc8;
$AC_TITULO=$opc5;
$AC_CATALOGO=$opc2;
$AC_DESCRIPCION=$opc6;
$AC_FECHA='."'".dateTime()."'".';'.$fmenSa.'
$AC_CONTENIDO=$opc7;'.$ftipo.$fgaleria.'
require_once $AC_DIRECTORIO.'."'datos/displa.php'".';
$AC_EXISTE=$opcExiste;
$AC_ESTADO=$opcEstado;
#'.$versionCreador.$faccadminC.'
?>';
    }

}
?>