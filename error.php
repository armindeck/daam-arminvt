<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
if(isset($AC_DIREC)){
    $AC_DIRECTORIO=$AC_DIREC;
    $AC_ENCONTRAR=$AC_ENCONTRAR;
    $Regresar=$AC_DIRECTORIO.$AC_ENCONTRAR;
} else { $Regresar=$AC_DIRECTORIO; }
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION=$AC_DESCRIPCION_error;
$AC_METADESCRIPCION2='La sección a la que intento acceder ya no está disponible o no tiene acceso.';
$AC_METAETIQUETA='error, ocurrió un error, parece que ha ocurrido un error';
$AC_IMG='error.png';
$AC_EXTRA=false;
$AC_TITULO='Oh!. Parece que ha ocurrido algún error...';
$AC_DESCRIPCION=$AC_DESCRIPCION_error;
$AC_FECHA='22 Feb 2023 - 2:24pm';
$AC_CONTENIDO=$lugarMensaje.'<p class="texini">~Oh!. Parece que ha ocurrido algún error...</p>
<ol>
<li class="t14">El error pudo haberse generado por los siguientes motivos:</li>
<li class="t12">~La sección a la que intento acceder ya no está disponible o no tiene acceso.</li>
<li class="t12">~El comentario fue eliminado o está en proceso.</li>
<li class="t12">~El enlace fue eliminado o está en revisión.</li>
<li class="t12">~Los datos ingresados son incorrectos o no cumplieron con los solicitados.</li>
<li class="t12">~Fallo en el envió de datos e información.</li>
<li class="t12">~Muchas cosas más...</li>
<li class="t12">'.$AC_DESCRIPCION.'</li>
<a class="boton" href="'.$Regresar.'">Regresar</a>
</ol>';
include $AC_DIRECTORIO.'datos/displa.php';
?>