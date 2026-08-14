<?php #BASE CREADA POR ARMIN
$AC_DIRECTORIO='../../';
if (!empty($_POST)){
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
    $opc11=$_POST['opc11']; #Ubicacion
    $opc12=$_POST['opc12']; #Archivo

    #file_put_contents('ingresosdatos.php',"\n[$opc1], [$opc2], [$opc3], [$opc4], [$opc5], [$opc6], [$opc7], [$opc8], [$opc9], [$opc10], [$opc11], [$opc12]");

    if ($opc8=='si') {
        $anuncioS=true;
    }
    if ($opc8=='no') {
        $anuncioS=false;
    }
    if ($opc9=='foro') {
        $AC_CARPETA=$opc10;
        $TIPO='foro';
    }

    #CONTENIDO POR ARMIN
    require_once $AC_DIRECTORIO.'datos/datos.php';
    $AC_METADESCRIPCION=$opc1;
    $AC_METADESCRIPCION2=$opc1;
    $AC_METAETIQUETA=$opc3;
    $AC_IMG=$opc4.'.png';
    $AC_EXTRA=$anuncioS;
    $AC_TITULO=$opc5;
    $AC_CONTENIDO=$opc7;
    $informacion="Directorio: <b>$opc10</b> | Ubicación: <b>$opc11</b> | Archivo: <b>$opc12</b> | Tipo: <b>$opc9</b> | Anuncio: <b>$opc8</b> | Imagen: <b>$opc4</b> | Catalogo: <b>$opc2</b>";
    $datos_introducidos="&di=true&opc1=$opc1&opc2=$opc2&opc3=$opc3&opc4=$opc4&opc5=$opc5&opc6=$opc6&opc7=$opc7&opc8=$opc8&opc9=$opc9&opc10=$opc10&opc11=$opc11&opc12=$opc12";
    require_once $AC_DIRECTORIO.'datos/borrador.php';
    exit;
} else { $AC_DIREC='../../'; $AC_ENCONTRAR='creador/'; require_once $AC_DIREC.'error.php'; } ?>