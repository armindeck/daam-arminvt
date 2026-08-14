<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION=$AC_DESCRIPCION_acerca;
$AC_METADESCRIPCION2='Acerca de '.$EnlaceWebNoHttps;
$AC_METAETIQUETA='Acerca de';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=false;
$AC_TITULO='acerca de';
$AC_DESCRIPCION=$AC_DESCRIPCION_acerca;
$AC_FECHA='26 Feb 2023 - 10:19am';
$AC_CONTENIDO='<p class="texini">'.$AC_DESCRIPCION_acerca.'</p>
<div class="flexCon">
<div class="m2">
<p class="ctg">Código</p>
<div class="imagen">
<img class="img1" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvtcodigo.png"></div>
<p class="contexcn t12">Código de la página creado con HTML, CSS y PHP.</p>
</div>
<div class="m2">
<p class="ctg">Planos</p>
<div class="imagen">
<img class="img1" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvtplanos.png"></div>
<p class="contexcn t12">Planos de la página, forolink y otros apartados.</p>
</div>
<div class="m2">
<p class="ctg">Edición</p>
<div class="imagen">
<img class="img1" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvtfilmora.png"></div>
<p class="contexcn t12">Edición de videos usando Filmora X.</p>
</div>
<div class="m2">
<p class="ctg">Canal</p>
<a target="_blank" href="'.$EnlaceYouTube.'">
<div class="imagen">
<img class="img1" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvtyt.png"></div>
<p class="contexcn t12">Canal de YouTube de '.$NombreAdmin.' donde sube videos random como los forolink.</p></a>
</div>
<div class="m2">
<p class="ctg">'.$NombreAdmin.'</p>
<a target="_blank" href="'.$AC_DIRECTORIOs.'armin'.$AGREGAR_PHP.'">
<div class="imagen">
<img class="img1" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvtmin.png"></div>
<p class="contexcn t12">Desarrollador, diseñador y vtuber independiente, además dueño del canal de YouTube '.$NombreYouTube.'.</p></a>
</div>
</div>
<p class="texini t14">Actualmente '.$NombreAdmin.' se encuentra mejorando y actualizando el código de la página, además tiene como objetivo ser un vtuber.</p>';
include $AC_DIRECTORIO.'datos/displa.php';
?>