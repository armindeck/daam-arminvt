<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
require $AC_DIRECTORIO.'datos/datos.php';

$acceso=true;

$AC_UBICACION='';
$AC_ARCHIVO='admin.php';
$AC_METADESCRIPCION='NONE';
$AC_METADESCRIPCION2='NONE';
$AC_METAETIQUETA='NONE';
$AC_IMG='arminvtcodigo.png';
$AC_EXTRA='no';
$AC_TITULO='Admin';
$AC_CATALOGO='Admin';
$AC_DESCRIPCION='NONE';
$AC_FECHA='2023-07-28 - 4:09pm';
$AC_CONTENIDO='
<nav>
    <a href="?ac=creador"><i class="fas fa-plus-square"></i> Creador</a>
    <a href="?ac=imagen"><i class="fas fa-image"></i> Imagen</a>
    <a href="?ac=archivos"><i class="fas fa-file-code"></i> Archivos</a>
    <a target="_blank" href="ediadmin/directorio.php"><i class="fas fa-sitemap"></i> Directorios</a>
    <a href="?ac=anuncios"><i class="fas fa-newspaper"></i> Anuncios</a>
    <a href="?ac=editor"><i class="fas fa-edit"></i> Editor</a>
    <a href="?ac=configuracion"><i class="fas fa-cog"></i> Configuracion</a>
    <a href="?ac=displadi"><i class="fas fa-sliders-h"></i> Displadi</a>
    <a href="?ac=tema"><i class="fab fa-css3"></i> Tema</a>
    <a href="?ac=usuario"><i class="fas fa-user"></i> Usuario</a>
    <a target="_blank" href="../../"><i class="fas fa-external-link-alt"></i> Ver pagina</a>
    <a target="_blank" href="https://dbproject.rf.gd/web/daam"><i class="fas fa-history"></i> Actualizar</a>
    <a href="actualizar.php?ac=salir"><i class="fas fa-sign-in-alt"></i> Salir</a>
</nav>';
$TIPO='panel';
require_once $AC_DIRECTORIO.'datos/displa.php';
#v0.3.1 Beta
