<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='../';
$AC_CARPETA='forolink';
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION='ForoLink - Comparte tus enlaces de forma anonima';
$AC_METADESCRIPCION2='ForoLink es un espacio donde se puede compartir enlaces de forma anónima';
$AC_METAETIQUETA='ForoLink, Foro para compartir link, Compartir enlaces';
$AC_IMG='forolink.png';
$AC_EXTRA=true;
$AC_TITULO='ForoLink - Comparte tus enlaces anónimos :3';
$AC_DESCRIPCION=$AC_DESCRIPCION_forolink;
$AC_FECHA='26 Mar 2023 - 7:40pm';
$AC_CONTENIDO='<p class="texini t12">'.$AC_DESCRIPCION."</p>\n";
$TIPO='foro';
include $AC_DIRECTORIO.'datos/displa.php';
?>