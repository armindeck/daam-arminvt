<?php

if(isset($AC_DIRECTORIO)) return;
if(!isset($id)) die("Posts no identificado");

$slug = "/" . (ltrim(str_replace(".php", "", FILEPATH), "/"));
$post_data = postSearchBySlug($slug, POSTS);

$AC_DIRECTORIO = DIR;

$acceso = true;

$AC_UBICACION = !empty(FILEPATH) ? str_replace("./", "", rtrim(dirname(FILEPATH), "/") . "/") : "";
$AC_ARCHIVO = basename(FILEPATH);
$AC_METADESCRIPCION = $post_data["fragment"] ?? "";
$AC_METADESCRIPCION2 = $post_data["fragment"] ?? "";
$AC_METAETIQUETA = $post_data["tags"] ?? "";
$AC_IMG = $post_data["image"] ?? "";
$AC_EXTRA = $post_data["tags"] ?? "";
$AC_TITULO = $post_data["title"] ?? "";
$AC_CATALOGO = $post_data["catalog"] ?? "";
$AC_DESCRIPCION = $post_data["fragment"] ?? "";
$AC_FECHA = $post_data["date_last_updated"] ?? "";
$AC_CONTENIDO = $post_data["content"] ?? "";
$TIPO = !empty($post_data["type"]) ? ($post_data["type"] == "admin" ? "panel" : $post_data["type"]) : "";
require_once DIR.'datos/displa.php';
