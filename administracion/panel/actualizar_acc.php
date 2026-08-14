<?php #CONTENIDO POR ARMIN

if(isset($acceso) && $acceso == true){

            	#CONTENIDO A ACTUALIZAR

#EMPIEZA ----------------------->



#error_reporting(0);



#ACTUALIZAR EDITOR ----------------------->

if ($_POST['IniEditor']){

    $direccion=$_POST['direccion'];

    $archivo=$_POST['archivo'];

    $editor=$_POST['editar'];



    file_put_contents($AC_DIRECTORIO.$archivo,$editor);

    $vamos='panel.php'.$direccion.'&ms=exi&msm=datosactualizados';

    header("location:{$vamos}");

} else

#ELIMINAR ARCHIVO ----------------------->

if ($_POST['IniEliminarArchivo']){

    $archivo=$_POST['archivo'];



    unlink($AC_DIRECTORIO."$archivo");

    $vamos='panel.php?ac=archivos&ms=exi&msm=datosactualizados';

    header("location:{$vamos}");

} else

#ELIMINAR CARPETA ----------------------->

if ($_POST['IniEliminarCarpeta']){

    $carpeta=$_POST['carpeta'];



    rmdir($AC_DIRECTORIO."$carpeta");

    $vamos='panel.php?ac=archivos&ms=exi&msm=datosactualizados';

    header("location:{$vamos}");

} else

#CREAR CARPETA CARPETA ----------------------->

if ($_POST['IniCrearCarpeta'] || $_GET['IniCrearCarpeta']){

	if (isset($_POST['IniCrearCarpeta'])){	
    	$carpeta=trim($_POST['carpeta']);
    	$vamos='panel.php?ac=archivos&ms=exi&msm=direcreado';
    	$vamosExisteCarpeta='panel.php?ac=archivos&ms=err&msm=direxiste';
    	$directorio="$carpeta";
    }
    if (isset($_GET['IniCrearCarpeta'])) {
    	$carpeta=trim($_GET['IniCrearCarpeta']);
    	$vamos='panel.php?ac=creador&ms=exi&msm=direcreado';
    	$vamosExisteCarpeta='panel.php?ac=creador&ms=err&msm=direxiste';
    	$directorio="administracion/panel/$carpeta";
    }
    if (file_exists($carpeta)) {
    	header("Location: {$vamosExisteCarpeta}");
    } else {
    	mkdir($AC_DIRECTORIO.$directorio);
    	header("location:{$vamos}");
    }

} else

#CREAR ARCHIVO ----------------------->

if ($_POST['IniCrearArchivo']){

    $archivo=$_POST['archivo'];



    if (!file_exists($AC_DIRECTORIO.$archivo)) {

	file_put_contents($AC_DIRECTORIO.$archivo,'');

	$vamos='panel.php?ac=archivos&ms=exi&msm=datosactualizados';

	header("location:{$vamos}");

} else if(file_exists($AC_DIRECTORIO.$archivo)){

	$vamos='panel.php?ac=archivos&ms=err&msm=exisarchivo';

	header("location:{$vamos}");

}

} else

#ACTUALIZAR ANUNCIOS ----------------------->

if ($_POST['IniAnuncio']){

    $sms=$_POST['mensaje'];

    $enlace=$_POST['enlace'];

    $enlaceanuncio=$_POST['anuncio'];

    $enlaceanuncio2=$_POST['anuncio2'];

    $linkimga=$_POST['imga'];

    $linkimga2=$_POST['imga2'];

    $texMensaje=$_POST['texMensaje'];

    $mosAnuncio=$_POST['mosAnuncio'];

    $mosAnuncio2=$_POST['mosAnuncio2'];



    file_put_contents('sms.php',"<?php\n".'$sms='."'$sms';\n".'$link='."'$enlace';\n".'$linkanuncio='."'$enlaceanuncio';\n".'$linkanuncio2='."'$enlaceanuncio2';\n".'$linkimga='."'$linkimga';\n".'$linkimga2='."'$linkimga2';\n".'$texMensaje='."'$texMensaje';\n".'$mosAnuncio='."'$mosAnuncio';\n".'$mosAnuncio2='."'$mosAnuncio2';\n?>");

    header("location:panel.php?ac=anuncios&ms=exi&msm=datosactualizados");

} else



#ACTUALIZAR CONFIGURACION ----------------------->

	if($_POST['IniConfig']){

		require $AC_DIRECTORIO.'datos/extenciones/extencionDarFormato.php';



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



		file_put_contents("extras/extraVariables.php",$cfg20);

		file_put_contents("extras/extraScripts.php",$cfg21);



		if($cfg18==true){ $cfg18='.php'; } else { $cfg18=''; }

		if($cfg19==true){ $cfg19="'https://'.".'$EnlaceWebNoHttps'.".'/'"; } else { $cfg19='$AC_DIRECTORIO'; }

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

#ENLACES

$EnlaceWeb='."'".$cfg16."'".';

$EnlaceWebNoHttps='."'".$cfg17."'".';

$EnlaceWebS='.$cfg19.'; #'."'https://arminvt.site/'; --- ".'$AC_DIRECTORIO;

$AC_DIRECTORIOs=$EnlaceWebS;

$AGREGAR_PHP='."'".$cfg18."'".';

$EnlaceAdmin=$AC_DIRECTORIOs.$UsuarioAdmin.$AGREGAR_PHP;

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

session_start();

require_once $AC_DIRECTORIO.'."'datos/extra.php'".';

require_once $AC_DIRECTORIO.'."'datos/mensajes.php'".';

require_once $AC_DIRECTORIO.'."'datos/extenciones/extencionCargarTema.php';

?>";

	file_put_contents("datos.php",$guardar);

	header("location:panel.php?ac=configuracion&ms=exi&msm=datosactualizados");

	}  else

#Verificar directorios ----------------------->

if ($_POST['IniVerificar']){
	$dc='bien';
	$carpeta='borradores';
	if(!file_exists($carpeta)){
		mkdir($carpeta);
		$ca1='&ca1='.$carpeta;
		$dc='creados';
	}
	$carpeta2='extras';
	if(!file_exists($carpeta2)){
		mkdir($carpeta2);
		$ca2='&ca2='.$carpeta;
		$dc='creados';
	}
	$carpeta3='creadas';
	if(!file_exists($carpeta3)){
		mkdir($carpeta3);
		$ca3='&ca3='.$carpeta3;
		$dc='creados';
	}
	if (isset($ca1)) {
		echo $ca1;
	}
	if (isset($ca2)) {
		echo $ca2;
	}
	if (isset($ca3)) {
		echo $ca3;
	}

	$vamos='panel.php?ac=verificar&ms=err&msm=informeverificar&dc='.$dc.$ca1.$ca2.$ca3;
	header("location:{$vamos}");
} else



#CERRAR SESION ----------------------->

if($_GET['ac']){

	$s=$_GET['ac'];

	if($s=='salir'){

		session_destroy();

		$vamos=$AC_DIRECTORIO.'administracion/?ms=exi&msm=sesionfinalizada';

		header("location:{$vamos}");

	}

} else

if(!$_POST || !$_GET){

	header("Location: panel.php?ms=err&msm=noenvdatos");

} 

#TERMINA ----------------------->

            	#CONTENIDO A ACTUALIZAR

} else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; require_once $AC_DIREC.'error.php'; } 

?>