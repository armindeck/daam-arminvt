<?php

if(isset($AC_DIRECTORIO)) return;
if(!isset($id)) die("Posts no identificado");

$AC_DIRECTORIO = DIR;
$AC_UBICACION = !empty(FILEPATH) ? str_replace("./", "", rtrim(dirname(FILEPATH), "/") . "/") : "";
$AC_ARCHIVO = basename(FILEPATH);
$AC_METADESCRIPCION = POST["fragment"] ?? "";
$AC_METADESCRIPCION2 = POST["fragment"] ?? "";
$AC_METAETIQUETA = POST["tags"] ?? "";
$AC_IMG = POST["image"] ?? "";
$AC_EXTRA = !in_array(SLUG, ["/error", "/login", "/register", "/forgot-password", "/profile", "/admin"]);
$AC_TITULO = POST["title"] ?? "";
$AC_CATALOGO = POST["catalog"] ?? "";
$AC_DESCRIPCION = POST["fragment"] ?? "";
$AC_FECHA = POST["date_last_updated"] ?? "";
$AC_CONTENIDO = POST["content"] ?? "";
$TIPO = POST["type"] ?? "";

$get_styles = file_exists(DIR . "assets/css/" . (CONFIG["page_style"] ?? "")) ? file_get_contents(DIR . "assets/css/" . (CONFIG["page_style"] ?? "")) ?? "" : "";
$get_scripts = !empty(CONFIG["page_scripts_active"]) ? CONFIG["page_scripts"] ?? "" : "";

$post = POST;
$post["content"] = michelf\MarkdownExtra::defaultTransform($AC_CONTENIDO ?? "");
//$post["content"] = stringCommands($post["content"], commands(CONFIG, CORE, SLUG, URL, URL_NOT_INDEX, getTheme(CONFIG["page_theme"] ?? ""), DIR, auth(), $post));
$viewAdsMessajeAndBanner = $AC_EXTRA ? viewAdsMessageMovementAndBanner(CONFIG["ads"] ?? [], DIR) : "";
$viewAlertMessage = !empty($MENSAJE) ? view("components/alert") ?? "" : "";

$viewsRequire = SLUG == "/profile" ? view("components/alert") . view("profile", [
    "user" => userLoginSearch(USERS),
    "active_tab" => secureString($_GET["tab"] ?? "overview")
]) : "";

$viewsRequire .= in_array(SLUG, ["/login", "/register", "/forgot-password"]) ? view("components/alert") . view(ltrim(SLUG, "/"), $_SESSION["form_data"] ?? []) : "";

$viewsRequire .= SLUG == "/index" ? view("components/entries-cards", ["posts" => POSTS]) : "";

require_once raiz()."/inc/views/layout-view.php";