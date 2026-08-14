<?php
if(isset($acceso) && $acceso == true){
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION='NONE';
$AC_METADESCRIPCION2='NONE';
$AC_METAETIQUETA='NONE';
$AC_IMG='NONE.png';
$AC_EXTRA=false;
$AC_TITULO='Panel';
$AC_DESCRIPCION=$AC_DESCRIPCION_panel;
$AC_FECHA='01 May 2023 - 1:35pm';
$AC_CONTENIDO='
<nav>
    <a href="?ac=verificar"><i class="fas fa-folder"></i> Verificar</a>
    <a href="?ac=creador"><i class="fas fa-plus-square"></i> Creador</a>
    <a href="?ac=archivos"><i class="fas fa-file-code"></i> Archivos</a>
    <a href="?ac=anuncios"><i class="fas fa-newspaper"></i> Anuncios</a>
    <a href="?ac=blog"><i class="fas fa-blog"></i> Blog</a>
    <a href="?ac=editor"><i class="fas fa-edit"></i> Editor</a>
    <a href="?ac=configuracion"><i class="fas fa-cog"></i> Configuracion</a>
    <a href="?ac=usuario"><i class="fas fa-user"></i> Usuario</a>
    <a target="_blank" href="'.$AC_DIRECTORIOs.'"><i class="fas fa-external-link-alt"></i> Ver pagina</a>
    <a href="actualizar.php?ac=salir"><i class="fas fa-sign-in-alt"></i> Salir</a>
</nav>';
$TIPO='panel';
include $AC_DIRECTORIO.'datos/displa.php';
} else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; require_once $AC_DIREC.'error.php'; }
?>