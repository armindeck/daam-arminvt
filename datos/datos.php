<?php #error_reporting(0);
#NOMBRES
$NombreAdmin='Armin';
$NombreAdminCompleto='Armin';
$NombreWeb='ArmiOnegai';
$NombreFacebook='ArmiOnegai Dev';
$NombreYouTube='SoyArminDeck';
$NombreTwitter='Armin Deck';
$NombrePatreon='ArminVT';
$NombreTiktok='ArminVT';
$NombreKofi='ArminVT';
#USUARIOS
$UsuarioAdmin='armin';
$UsuarioFacebook='armionegai';
$UsuarioYouTube='SoyArminDeck';
$UsuarioTwitter='armindeck';
$UsuarioPatreon='arminvtch';
$UsuarioTiktok='arminvtch';
$UsuarioKofi='arminvtch';
#AÑO PUBLICADO
$AnioPublicada='2023';
#ENLACES
$EnlaceWeb='https://dbproject.rf.gd';
$EnlaceWebNoHttps='dbproject.rf.gd';
$LocalHost='daam-0-3-4c-22-03-2024';
$EnlaceWebS=$AC_DIRECTORIO; #'https://arminvt.site/'; --- $AC_DIRECTORIO;
$AC_DIRECTORIOs=$EnlaceWebS;
$AGREGAR_PHP='';
$EnlaceAdmin="https://dbproject.rf.gd";
$EnlaceFacebook='https://facebook.com/'.$UsuarioFacebook;
$EnlaceYouTube='https://youtube.com/@'.$UsuarioYouTube;
$EnlaceTwitter='https://twitter.com/'.$UsuarioTwitter;
$EnlacePatreon='https://patreon.com/'.$UsuarioPatreon;
$EnlaceTiktok='https://tiktok.com/@'.$UsuarioTiktok;
$EnlaceKofi='https://ko-fi.com/'.$UsuarioKofi;
$EnlaceContacto='m.me/'.$UsuarioFacebook;
$EnlaceDonar=$EnlacePatreon;
#EXTRAS
date_default_timezone_set("America/Bogota");
$Año=date('Y');
$fecha=date('Y-m-d');
$fechahora=date('Y-m-d - g:ia');
$version='v0.3.4c stable';
session_start();
require_once $AC_DIRECTORIO.'datos/system.php';
require_once $AC_DIRECTORIO.'datos/extra.php';
require_once $AC_DIRECTORIO.'datos/mensajes.php';
$ex='CargarTema';
require_once $AC_DIRECTORIO.'datos/extenciones.php';
?>