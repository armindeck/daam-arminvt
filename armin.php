<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION=$AC_DESCRIPCION_armin;
$AC_METADESCRIPCION2='Acerca del creador de '.$NombreWeb.' - '.$NombreAdmin;
$AC_METAETIQUETA='Acerca de '.$NombreAdmin.', acerca de '.$NombreAdminCompleto;
$AC_IMG='arminvt1.png';
$AC_EXTRA=true;
$AC_TITULO='Armin - Vtuber, Desarrollador y Diseñador';
$AC_DESCRIPCION=$AC_DESCRIPCION_armin;
$AC_FECHA='22 Feb 2023 - 1:20pm';
$AC_CONTENIDO='<p class="texini">Bienvenidos a la biografia de Armin!</p>
<p class="texini t14">¡Hola! Me llamo Armin y soy un vtuber que le gusta hacer videos de entretenimiento en el <a target="_blank" href="'.$EnlaceYouTube.'">Canal de YouTube</a>, además me gusta crear paginas web como <a target="_blank" href="'.$EnlaceWeb.'">'.$EnlaceWebNoHttps.'</a> donde subo algunos proyectos como los <a target="_blank" href="'.$AC_DIRECTORIOs.'forolink/">ForoLink</a> y otros apartados que iré trayendo con el tiempo.<br>También me gusta crear juegos en Game Maker al estilo 2D, aunque tenga tiempo que no haga ningún juego, la verdad es que, si me gustaría volver a hacer alguno sencillo, pero épico a la vez.<br>Espero que disfrutes de mis contenidos!. Espera… quiero que sepan que esta pagina fue creada al 100% por mí mismo y además las demás cosas que he creado :3</p>
<div class="flexCon">
	<div class="m2">
		<div class="imagen">
            <img class="img2" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvt1.png" title="Armin 0.1 Beta by '.$NombreWeb.'">
		</div>
		<p class="contexcn t10">Armin v0.1 Beta</p>
	</div>
    <ol>
    <li class="t14 tb">Información</li>
    <li class="t12">Canal: '.$NombreAdminCompleto.'</li>
    <li class="t12">Apodo: '.$NombreAdmin.'</li>
    <li class="t12">País: Colombia</li>
    <li class="t12">Edad: 20</li>
    <li class="t12">Estudios finalizados: Primaria y Secundaria</li>
    <li class="t12">Estudios en proceso: SENA</li>
    <li class="t12">Lenguajes: Español :3</li>
    <li class="t12">Gustos y pasatiempos: Vtuber, Anime, peliculas de acción, musica, dibujos,<br> edicion de videos, programacion y desarrollo web</li>
    <li class="t12">Desarrollo con: HTML, CSS, PHP y GML</li>
    <li class="t14 tb">Proyectos nuevos</span></li>
    <li class="t12"><a target="_blank" rel="nofollow" href="'.$EnlaceWeb.'">'.$EnlaceWebNoHttps.'</a></li>
    <li class="t12"><a target="_blank" rel="nofollow" href="'.$AC_DIRECTORIOs.'forolink/">ForoLink</a></li>
    <li class="t12"><a target="_blank" rel="nofollow" href="'.$EnlaceYouTube.'">'.$UsuarioYouTube.'</a></li>
    <li class="t12">...</li></ol></li>
    </ol>
</div>';
include $AC_DIRECTORIO.'datos/displa.php';
?>