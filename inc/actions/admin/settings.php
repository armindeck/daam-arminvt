<?php $AC_DIRECTORIO = '../../../';
#ACTUALIZAR CONFIGURACION ----------------------->
if($_POST['IniConfig']){
$ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';
$cfg0=darFormatoNoSimbolos(trim($_POST['cfg0']));
$cfg1=darFormatoNoSimbolos(trim($_POST['cfg1']));
$cfg2=darFormatoNoSimbolos(trim($_POST['cfg2']));
$cfg3=darFormatoNoSimbolos(trim($_POST['cfg3']));
$cfg4=darFormatoNoSimbolos(trim($_POST['cfg4']));
$cfg5=darFormatoNoSimbolos(trim($_POST['cfg5']));
$cfg6=darFormatoNoSimbolos(trim($_POST['cfg6']));
$cfg7=darFormatoNoSimbolos(trim($_POST['cfg7']));
$cfg8=darFormatoNoSimbolos(trim($_POST['cfg8']));
$cfg9=darFormatoNoSimbolos(trim($_POST['cfg9']));
$cfg10=darFormatoNoSimbolos(trim($_POST['cfg10']));
$cfg11=darFormatoNoSimbolos(trim($_POST['cfg11']));
$cfg12=darFormatoNoSimbolos(trim($_POST['cfg12']));
$cfg13=darFormatoNoSimbolos(trim($_POST['cfg13']));
$cfg14=darFormatoNoSimbolos(trim($_POST['cfg14']));
$cfg15=darFormatoNoSimbolos(trim($_POST['cfg15']));
$cfg16=darFormato(trim($_POST['cfg16']));
$cfg17=darFormato(trim($_POST['cfg17']));
$cfg18=trim($_POST['cfg18']);
$cfg19=trim($_POST['cfg19']);
$cfg20=$_POST['cfg20'];
$cfg21=$_POST['cfg21'];
$cfglocalhost=darFormato(trim($_POST['cfglocalhost']));
$cfgadminexterno=darFormato(trim($_POST['cfgadminexterno']));
$cfgversion=$_POST['cfgversion'];
$cfg_anio_publicada=darFormatoNoSimbolos(trim($_POST['cfg_anio_publicada']));
file_put_contents("../scripts/scrSecundarios.php",$cfg20);
file_put_contents("../scripts/scrExtrasdispla.php",$cfg21);
if($cfg18==true){ $cfg18='.php'; } else { $cfg18=''; }
if($cfg19==true){ $cfg19="'https://'.".'$EnlaceWebNoHttps'.".'/'"; } else { $cfg19='$AC_DIRECTORIO'; }
$cfgadminexternoopc='$AC_DIRECTORIOs$UsuarioAdmin$AGREGAR_PHP';
if($cfgadminexterno!=''){ $cfgadminexternoopc=$cfgadminexterno; }
$guardar='<?php #error_reporting(0);
#NOMBRES
$NombreAdmin='."'".$cfg0."'".';
$NombreAdminCompleto='."'".$cfg1."'".';
$NombreWeb='."'".$cfg2."'".';
$NombreFacebook='."'".$cfg3."'".';
$NombreYouTube='."'".$cfg4."'".';
$NombreTwitter='."'".$cfg5."'".';
$NombrePatreon='."'".$cfg6."'".';
$NombreTiktok='."'".$cfg7."'".';
$NombreKofi='."'".$cfg8."'".';
#USUARIOS
$UsuarioAdmin='."'".$cfg9."'".';
$UsuarioFacebook='."'".$cfg10."'".';
$UsuarioYouTube='."'".$cfg11."'".';
$UsuarioTwitter='."'".$cfg12."'".';
$UsuarioPatreon='."'".$cfg13."'".';
$UsuarioTiktok='."'".$cfg14."'".';
$UsuarioKofi='."'".$cfg15."'".';
#AÑO PUBLICADO
$AnioPublicada='."'".$cfg_anio_publicada."'".';
#ENLACES
$EnlaceWeb='."'".$cfg16."'".';
$EnlaceWebNoHttps='."'".$cfg17."'".';
$LocalHost='."'".$cfglocalhost."'".';
$EnlaceWebS='.$cfg19.'; #'."'https://arminvt.site/'; --- ".'$AC_DIRECTORIO;
$AC_DIRECTORIOs=$EnlaceWebS;
$AGREGAR_PHP='."'".$cfg18."'".';
$EnlaceAdmin="'.$cfgadminexternoopc.'";
$EnlaceFacebook='."'https://facebook.com/'".'.$UsuarioFacebook;
$EnlaceYouTube='."'https://youtube.com/@'".'.$UsuarioYouTube;
$EnlaceTwitter='."'https://twitter.com/'".'.$UsuarioTwitter;
$EnlacePatreon='."'https://patreon.com/'".'.$UsuarioPatreon;
$EnlaceTiktok='."'https://tiktok.com/@'".'.$UsuarioTiktok;
$EnlaceKofi='."'https://ko-fi.com/'".'.$UsuarioKofi;
$EnlaceContacto='."'m.me/'".'.$UsuarioFacebook;
$EnlaceDonar=$EnlacePatreon;
#EXTRAS
date_default_timezone_set("America/Bogota");
$Año=date('."'Y'".');
$fecha=date('."'Y-m-d'".');
$fechahora=date('."'Y-m-d - g:ia'".');
$version='."'".$cfgversion."'".';
session_start();
require_once $AC_DIRECTORIO.'."'datos/system.php'".';
require_once $AC_DIRECTORIO.'."'datos/extra.php'".';
require_once $AC_DIRECTORIO.'."'datos/mensajes.php'".';
$ex='."'CargarTema'".';
require_once $AC_DIRECTORIO.'."'datos/extenciones.php';
?>";
file_put_contents($AC_DIRECTORIO."datos/datos.php",$guardar);
header("location: ../panel.php?ac=configuracion&ms=exi&msm=datosactualizados");
}
?>