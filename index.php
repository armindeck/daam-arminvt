<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION='Disfruta de forolink y mis aplicaciones, juegos y proyectos por mi sitio web '.$EnlaceWebNoHttps;
$AC_METADESCRIPCION2='Los últimos proyectos solo por mi sitio web '.$EnlaceWebNoHttps;
$AC_METAETIQUETA='juegos, aplicaciones, forolink, foro, enlaces';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=true;
$AC_TITULO='vtuber, forolink, aplicaciones, juegos y proyectos';
$AC_DESCRIPCION=$AC_DESCRIPCION_index;
$AC_FECHA='22 Feb 2023 - 2:05pm';
$AC_CONTENIDO='<p class="texini">Hola!, soy <a href="'.$EnlaceAdmin.'">'.$NombreAdmin.'</a> y soy vtuber, desarrollador de sitios web y juegos que comparto en mi <a target="_blank" href="'.$EnlaceYouTube.'">Canal de YouTube</a>. Además me gusta dibujar, editar y crear videos, los cuales son subidos al canal. Desarrollo páginas web como la presente <span class="tb">'.$NombreWeb.'</span> donde subo mis contenidos de información y actualizaciones de ciertos temas. <a href="'.$EnlaceAdmin.'">¡Sigue a delante!</a></p>
	<div class="cen">
		<a class="boton2" target="_blank" href="'.$EnlaceYouTube.'?sub_confirmation=1"><i class="fab fa-youtube"></i> Suscribete</a>
		<a class="boton" target="_blank" href="'.$AC_DIRECTORIOs.'iniciar'.$AGREGAR_PHP.'">Iniciar <i class="fas fa-user"></i></a>
		<a class="boton2" target="_blank" href="'.$AC_DIRECTORIOs.'forolink/">ForoLink <i class="fas fa-fire"></i></a>
	</div><hr>
	<p class="titulo">Últimos proyectos</p><hr>';
$TIPO='entradas';
include $AC_DIRECTORIO.'datos/displa.php';
?>