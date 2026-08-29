<?php

if(isset($AC_DIRECTORIO)) return;
if(!isset($id)) die("Posts no identificado");

$AC_DIRECTORIO = DIR;

$acceso = true;

$AC_UBICACION = !empty(FILEPATH) ? str_replace("./", "", rtrim(dirname(FILEPATH), "/") . "/") : "";
$AC_ARCHIVO = basename(FILEPATH);
$AC_METADESCRIPCION = POST["fragment"] ?? "";
$AC_METADESCRIPCION2 = POST["fragment"] ?? "";
$AC_METAETIQUETA = POST["tags"] ?? "";
$AC_IMG = POST["image"] ?? "";
$AC_EXTRA = POST["tags"] ?? "";
$AC_TITULO = POST["title"] ?? "";
$AC_CATALOGO = POST["catalog"] ?? "";
$AC_DESCRIPCION = POST["fragment"] ?? "";
$AC_FECHA = POST["date_last_updated"] ?? "";
$AC_CONTENIDO = POST["content"] ?? "";
$TIPO = POST["type"] ?? "";
require_once DIR.'datos/displa.php';
