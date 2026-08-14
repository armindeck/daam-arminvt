<?php #BASE CREADA POR ARMIN
$AC_DIRECTORIO='../../';
if (!empty($_POST)){
    $opc1=$_POST['opc1']; #Meta descripción
    $opc2=$_POST['opc2']; #Meta descripción *2
    $opc3=$_POST['opc3']; #Meta etiqueta
    $opc4=$_POST['opc4']; #Imagen
    $opc5=$_POST['opc5']; #Titulo
    $opc6=$_POST['opc6']; #Descripción breve
    $opc7=$_POST['opc7']; #Contenido
    $opc8=$_POST['opc8']; #Extra
    $opc9=$_POST['opc9']; #Directorio
    $opc10=$_POST['opc10']; #Archivo
    $opc11=$_POST['opc11']; #Foro
    $llamarcreador=$AC_DIRECTORIO.'datos/extenciones/extencionCrearCarpetas.php';
    $crear_carpetas=$AC_DIRECTORIO."administracion/panel/creadas/"; include $llamarcreador;
    if($opc11=='si'){
        $crear_carpetas=$AC_DIRECTORIO."administracion/panel/creadas/$opc10/"; include $llamarcreador;

        $arcini="<?php #SISTEMA POR ARMIN\n".'$'."AC_DIRECTORIO='$opc9';\n".'$'."AC_CARPETA='$opc10';\require_once ".'$'."AC_DIRECTORIO.'datos/foros/"; $arcfin=".php';\n?>";

        file_put_contents($crear_carpetas.'form.php',$arcini.'procesar'.$arcfin);
        file_put_contents($crear_carpetas.'reac.php',$arcini.'reacciones'.$arcfin);

        $foroCarpeta="\n".'$'."AC_CARPETA='".$opc10."';";
        $foro="\n".'$'."TIPO='foro';";
        
        $carforo="$opc10/";
        $opc10='index';
        $direforo='../';
    } else { $carforo=''; $foroCarpeta=''; $foro=''; $direforo=''; }

    date_default_timezone_set("America/Bogota");
	$fecha=date("d M Y - g:ia");

$GuardarDatos=fopen("creadas/$carforo$opc10.php","a");
fwrite($GuardarDatos,'<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='."'../../../".$direforo."'".';
# $AC_DIRECTORIO='."'$opc9'".';'.$foroCarpeta.'
require_once $AC_DIRECTORIO.'."'datos/datos.php'".';
require_once $AC_DIRECTORIO.'."'descripciones.php'".';
$AC_METADESCRIPCION='."'$opc1'".';
$AC_METADESCRIPCION2='."'$opc2'".';
$AC_METAETIQUETA='."'$opc3'".';
$AC_IMG='."'$opc4.png'".';
$AC_EXTRA='."$opc8".';
$AC_TITULO='."'$opc5'".';
$AC_DESCRIPCION=$AC_DESCRIPCION_'.$opc10.';
$AC_FECHA='."'$fecha'".';
$AC_CONTENIDO='."'$opc7'".';'.$foro.'
require_once $AC_DIRECTORIO.'."'datos/displa.php'".';
?>');
fclose($GuardarDatos);

$GuardarDescripcion=fopen("../../descripciones.php","a");
fwrite($GuardarDescripcion,'$AC_DESCRIPCION_'.$opc10."='".$opc6."';
");
fclose($GuardarDescripcion);

    #CONTENIDO POR ARMIN
    require_once $AC_DIRECTORIO.'datos/datos.php';
    $AC_METADESCRIPCION='';
    $AC_METADESCRIPCION2='';
    $AC_METAETIQUETA='';
    $AC_IMG='.png';
    $AC_EXTRA=false;
    $AC_TITULO='Felicidades por crear una nueva pagina!';
    $AC_CONTENIDO='<p class="texini">~Oh. Acabas de crear una nueva pagina!</p> <ol><li class="t12">Estoy orgulloso de esta nueva creación!</li><li class="t12">Disfruta de mas creaciones Armin!</li><li class="t12">Vamos a la pagina que acabamos de hacer! <a href="creadas/'.$carforo.$opc10.$AGREGAR_PHP.'">Vamos!</a></li>';
    require_once $AC_DIRECTORIO.'datos/displa.php';
    exit;
}
else { $AC_DIREC='../../'; $AC_ENCONTRAR='creador/'; require_once $AC_DIREC.'error.php'; }
?>