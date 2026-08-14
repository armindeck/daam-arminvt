<?php #CONTENIDO POR ARMIN

#TRATAR CON CUIDADO!!!!!

if(isset($acceso) && $acceso == true){

            	#CONTENIDO A ACTUALIZAR

#EMPIEZA ----------------------->



#error_reporting(0);



#ACTUALIZAR EDITOR ----------------------->

if ($_POST['IniEditor']){

    $direccion=$_POST['direccion'];

    $archivo=$_POST['archivo'];

    $editor=$_POST['editar'];
    $fechae=$_POST['fechae'];

    file_put_contents($AC_DIRECTORIO.'administracion/panel/etc/fechas/'.$fechae,"$version | $fechahora");
    file_put_contents($AC_DIRECTORIO.$archivo,$editor);

    $vamos='panel.php'.$direccion.'&ms=exi&msm=datosactualizados';

    header("location:{$vamos}");

} else

#ELIMINAR ARCHIVO ----------------------->

if ($_POST['IniEliminarArchivo']){

    $archivo=$_POST['archivo'];

	unlink($AC_DIRECTORIO."$archivo");
	$ubi='?ac=archivos';
	if(isset($_POST['direccion'])){
		$ubi=$_POST['direccion'].'&permiso=true';
		$fechae=$_POST['fechae'];
		unlink($AC_DIRECTORIO.'administracion/panel/etc/fechas/'.$fechae);
	}

    $vamos='panel.php'.$ubi.'&ms=err&msm=elimiarchivo';

    header("location:{$vamos}");

} else

#ELIMINAR CARPETA ----------------------->

if ($_POST['IniEliminarCarpeta']){

    $carpeta=$_POST['carpeta'];



    rmdir($AC_DIRECTORIO."$carpeta");

    $vamos='panel.php?ac=archivos&ms=err&msm=direliminado';

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

#ACTUALIZAR EDITOR ----------------------->

if ($_POST['IniSubirImagen']){

    //$imagen=$_POST['imagen'];

if(isset($_FILES)){
    $nombre=$_FILES['imagen']['name'];
    $tamano=$_FILES['imagen']['size'];
    $tipo=$_FILES['imagen']['type'];
    $error=$_FILES['imagen']['error'];
    $tmp=$_FILES['imagen']['tmp_name'];

    echo "Nombre: $nombre<br>Tamaño: $tamano<br>Tipo: $tipo<br>Error: $error<br>Tmp: $tmp";
    if($error>0){ header("location:panel.php?ac=imagen&ms=err&msm=oherror"); }
	    else{
	    	if($tipo=='image/jpg' || $tipo=='image/jpeg' || $tipo=='image/png' || $tipo=='image/gif'){
	    		if(file_exists("../../img/".$nombre)){
	    			header("location:panel.php?ac=imagen&ms=err&msm=exisarchivo");
	    		} else {
	    			$guardar_en="../../img/".$nombre;
	    			move_uploaded_file($tmp, $guardar_en);
	    			header("location:panel.php?ac=imagen&ms=exi&msm=archisubido&dir=$guardar_en");
		    	}
	    	}
	    	else { header("location:panel.php?ac=imagen&ms=err&msm=archinopermitido"); }
	    }
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



    file_put_contents('dependencias/dpanuncio.php',"<?php\n".'$sms='."'$sms';\n".'$link='."'$enlace';\n".'$linkanuncio='."'$enlaceanuncio';\n".'$linkanuncio2='."'$enlaceanuncio2';\n".'$linkimga='."'$linkimga';\n".'$linkimga2='."'$linkimga2';\n".'$texMensaje='."'$texMensaje';\n".'$mosAnuncio='."'$mosAnuncio';\n".'$mosAnuncio2='."'$mosAnuncio2';\n?>");

    header("location:panel.php?ac=anuncios&ms=exi&msm=datosactualizados");

} else



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


		file_put_contents("scripts/scrSecundarios.php",$cfg20);

		file_put_contents("scripts/scrExtrasdispla.php",$cfg21);



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

require_once $AC_DIRECTORIO.'."'datos/extra.php'".';

require_once $AC_DIRECTORIO.'."'datos/mensajes.php'".';

$ex='."'CargarTema'".';

require_once $AC_DIRECTORIO.'."'datos/extenciones.php';

?>";

	file_put_contents("datos.php",$guardar);

	header("location:panel.php?ac=configuracion&ms=exi&msm=datosactualizados");

	}  else

#ACTUALIZAR DISPLA ----------------------->

if ($_POST['IniDispladi']){

	$opcmostrar=trim($_POST['opcmostrar']);
	$opcmostrarcodigos=trim($_POST['opcmostrarcodigos']);
	$opcmostrarscripts=$_POST['opcmostrarscripts'];

	$opcmostrar1=trim($_POST['opcmostrar1']);
	$opcmostrar2=trim($_POST['opcmostrar2']);
	$opcmostrar3=trim($_POST['opcmostrar3']);
	$opcmostrar4=trim($_POST['opcmostrar4']);

	$opctitulo1=trim($_POST['opctitulo1']);
	$opctitulo2=trim($_POST['opctitulo2']);
	$opctitulo3=trim($_POST['opctitulo3']);
	$opctitulo4=trim($_POST['opctitulo4']);

	$opccontenido1=trim($_POST['opccontenido1']);
	$opccontenido2=trim($_POST['opccontenido2']);
	$opccontenido3=trim($_POST['opccontenido3']);
	$opccontenido4=trim($_POST['opccontenido4']);

	$opcelementos=$_POST['opcelementos'];
	$opcentrada=trim($_POST['opcentrada']);




	#SCRIPTS DEL USUARIO >>>>>>>>>>>>>>>>>>>>>>>
	$archiD='';
	$arScrUsu='scripts/'.$opcentrada.'/scrDispladi'.$opcentrada.'.php';
	$arScrUsu2='scripts/'.$opcentrada.'/scrDispladi'.$opcentrada.'_POST.php';
    if (file_exists($arScrUsu) && file_exists($arScrUsu2)) {
    	require $arScrUsu2;
    }

    file_put_contents('scripts/'.$opcentrada.'/scr'.$opcentrada.'.php',"<?php #CONTENIDO POR ARMIN\n".'$'.$opcentrada.'='."'$opcmostrar';\n".'$'.$opcentrada.'Codigos='."'$opcmostrarcodigos';\n".'$'.$opcentrada.'E1='."'$opcmostrar1';\n".'$'.$opcentrada.'E2='."'$opcmostrar2';\n".'$'.$opcentrada.'E3='."'$opcmostrar3';\n".'$'.$opcentrada.'E4='."'$opcmostrar4';\n".'$'.$opcentrada.'E1T='."'$opctitulo1';\n".'$'.$opcentrada.'E2T='."'$opctitulo2';\n".'$'.$opcentrada.'E3T='."'$opctitulo3';\n".'$'.$opcentrada.'E4T='."'$opctitulo4';\n".'$'.$opcentrada.'E1C='."'$opccontenido1';\n".'$'.$opcentrada.'E2C='."'$opccontenido2';\n".'$'.$opcentrada.'E3C='."'$opccontenido3';\n".'$'.$opcentrada.'E4C='."'$opccontenido4';\n".'$'.$opcentrada.'Elementos='."$opcelementos;\n".'$'.$opcentrada.'Scripts='."'$opcmostrarscripts';\n"."#ACTUALIZADO: $fechahora\n?>".$archiD);

    header("location:panel.php?ac=displadi&ms=exi&msm=datosactualizados");
    exit;
} else

#VERIFICAR DIRECTORIOS ----------------------->

if ($_POST['IniVerificar']){
	$pasaen='&ms=exi&msm=direbien'; $ex='VerificarCarpetas'; $necex=$AC_DIRECTORIO.'datos/extenciones.php';
	#>>>>>
	$vericar='borradores'; require $necex;
	$vericar='scripts'; require $necex;
	$vericar='dependencias'; require $necex;
	$vericar='scripts/Cabeza'; require $necex;
	$vericar='scripts/Menu'; require $necex;
	$vericar='scripts/ContenidoExtra'; require $necex;
	$vericar='scripts/MenuLateral'; require $necex;
	$vericar='scripts/PiedePagina'; require $necex;
	$vericar='scripts/Creador'; require $necex;
	$vericar='etc'; require $necex;
	$vericar='etc/fechas'; require $necex;
	#>>>>>
	$vamos='panel.php?ac=verificar'.$pasaen;
	header("location:{$vamos}");
} else

#ACTUALIZAR EDITOR ----------------------->

if ($_POST['IniTema']){

$opctema_nombre=$_POST['opctema_nombre'];

$opctema_fondo_fondo=$_POST['opctema_fondo_fondo'];
$opctema_fondo_color=$_POST['opctema_fondo_color'];
$opctema_cabeza_fondo=$_POST['opctema_cabeza_fondo'];
$opctema_cabeza_color=$_POST['opctema_cabeza_color'];
$opctema_menu_fondo=$_POST['opctema_menu_fondo'];
$opctema_menu_color=$_POST['opctema_menu_color'];
$opctema_izquierda_fondo=$_POST['opctema_izquierda_fondo'];
$opctema_izquierda_color=$_POST['opctema_izquierda_color'];
$opctema_derecha_fondo=$_POST['opctema_derecha_fondo'];
$opctema_derecha_color=$_POST['opctema_derecha_color'];
$opctema_piedepagina_fondo=$_POST['opctema_piedepagina_fondo'];
$opctema_piedepagina_color=$_POST['opctema_piedepagina_color'];
$opctema_barra_fondo=$_POST['opctema_barra_fondo'];
$opctema_marquee_fondo=$_POST['opctema_marquee_fondo'];
$opctema_marquee_color=$_POST['opctema_marquee_color'];
$opctema_contenedores_fondo=$_POST['opctema_contenedores_fondo'];
$opctema_contenedores_color=$_POST['opctema_contenedores_color'];
$opctema_contenedorm2_color=$_POST['opctema_contenedorm2_color'];
$opctema_contenedorm2_h_color=$_POST['opctema_contenedorm2_h_color'];
$opctema_contenedor_derecha_fondo=$_POST['opctema_contenedor_derecha_fondo'];
$opctema_contenedor_derecha_color=$_POST['opctema_contenedor_derecha_color'];
$opctema_catalogo_fondo=$_POST['opctema_catalogo_fondo'];
$opctema_catalogo_color=$_POST['opctema_catalogo_color'];
$opctema_enlaces_fondo=$_POST['opctema_enlaces_fondo'];
$opctema_enlaces_color=$_POST['opctema_enlaces_color'];
$opctema_enlaces_h_fondo=$_POST['opctema_enlaces_h_fondo'];
$opctema_enlaces_h_color=$_POST['opctema_enlaces_h_color'];
$opctema_menu_enlaces_fondo=$_POST['opctema_menu_enlaces_fondo'];
$opctema_menu_enlaces_color=$_POST['opctema_menu_enlaces_color'];
$opctema_menu_enlace_h_fondo=$_POST['opctema_menu_enlace_h_fondo'];
$opctema_menu_enlace_h_color=$_POST['opctema_menu_enlace_h_color'];
$opctema_ubicacion_fondo=$_POST['opctema_ubicacion_fondo'];
$opctema_ubicacion_color=$_POST['opctema_ubicacion_color'];
$opctema_ubicacion_enlace_iconos_fondo=$_POST['opctema_ubicacion_enlace_iconos_fondo'];
$opctema_ubicacion_enlace_iconos_color=$_POST['opctema_ubicacion_enlace_iconos_color'];
$opctema_ubicacion_enlace_iconos_h_fondo=$_POST['opctema_ubicacion_enlace_iconos_h_fondo'];
$opctema_ubicacion_enlace_iconos_h_color=$_POST['opctema_ubicacion_enlace_iconos_h_color'];
$opctema_hr_fondo=$_POST['opctema_hr_fondo'];
$opctema_footer_enlace_iconos_fondo=$_POST['opctema_footer_enlace_iconos_fondo'];
$opctema_footer_enlace_iconos_color=$_POST['opctema_footer_enlace_iconos_color'];
$opctema_footer_enlace_iconos_h_fondo=$_POST['opctema_footer_enlace_iconos_h_fondo'];
$opctema_footer_enlace_iconos_h_color=$_POST['opctema_footer_enlace_iconos_h_color'];
$opctema_boton_fondo=$_POST['opctema_boton_fondo'];
$opctema_boton_color=$_POST['opctema_boton_color'];
$opctema_boton_h_fondo=$_POST['opctema_boton_h_fondo'];
$opctema_boton_h_color=$_POST['opctema_boton_h_color'];
$opctema_boton2_fondo=$_POST['opctema_boton2_fondo'];
$opctema_boton2_color=$_POST['opctema_boton2_color'];
$opctema_boton2_h_fondo=$_POST['opctema_boton2_h_fondo'];
$opctema_boton2_h_color=$_POST['opctema_boton2_h_color'];
$opctema_derecha_iconos_fondo=$_POST['opctema_derecha_iconos_fondo'];
$opctema_derecha_iconos_color=$_POST['opctema_derecha_iconos_color'];
$opctema_derecha_enlace_iconos_fondo=$_POST['opctema_derecha_enlace_iconos_fondo'];
$opctema_derecha_enlace_iconos_color=$_POST['opctema_derecha_enlace_iconos_color'];
$opctema_derecha_enlace_iconos_h_fondo=$_POST['opctema_derecha_enlace_iconos_h_fondo'];
$opctema_derecha_enlace_iconos_h_color=$_POST['opctema_derecha_enlace_iconos_h_color'];
$opctema_formulario_fondo=$_POST['opctema_formulario_fondo'];
$opctema_formulario_color=$_POST['opctema_formulario_color'];
$opctema_comentario_fondo=$_POST['opctema_comentario_fondo'];
$opctema_comentario_color=$_POST['opctema_comentario_color'];
$opctema_comentario_admin_fondo=$_POST['opctema_comentario_admin_fondo'];
$opctema_comentario_admin_color=$_POST['opctema_comentario_admin_color'];
$opctema_comentario_admin_h_fondo=$_POST['opctema_comentario_admin_h_fondo'];
$opctema_comentario_admin_h_color=$_POST['opctema_comentario_admin_h_color'];
$opctema_comentario_id_fondo=$_POST['opctema_comentario_id_fondo'];
$opctema_comentario_id_color=$_POST['opctema_comentario_id_color'];
$opctema_comentario_enlace_fondo=$_POST['opctema_comentario_enlace_fondo'];
$opctema_comentario_enlace_color=$_POST['opctema_comentario_enlace_color'];
$opctema_comentario_enlace_reportes_fondo=$_POST['opctema_comentario_enlace_reportes_fondo'];
$opctema_comentario_enlace_reportes_color=$_POST['opctema_comentario_enlace_reportes_color'];
$opctema_campo_fondo=$_POST['opctema_campo_fondo'];
$opctema_campo_color=$_POST['opctema_campo_color'];
$opctema_select_fondo=$_POST['opctema_select_fondo'];
$opctema_select_color=$_POST['opctema_select_color'];
$opctema_verificado_fondo=$_POST['opctema_verificado_fondo'];
$opctema_verificado_color=$_POST['opctema_verificado_color'];
$opctema_usuario_fondo=$_POST['opctema_usuario_fondo'];
$opctema_usuario_color=$_POST['opctema_usuario_color'];
$opctema_reaccionar_fondo=$_POST['opctema_reaccionar_fondo'];
$opctema_reaccionar_color=$_POST['opctema_reaccionar_color'];
$opctema_reaccionar_h_fondo=$_POST['opctema_reaccionar_h_fondo'];
$opctema_reaccionar_h_color=$_POST['opctema_reaccionar_h_color'];

$opctema_barra_borde=$_POST['opctema_barra_borde'];
$opctema_tituloweb_h_borde=$_POST['opctema_tituloweb_h_borde'];
$opctema_marquee_borde=$_POST['opctema_marquee_borde'];
$opctema_texini_borde=$_POST['opctema_texini_borde'];
$opctema_texinimen_borde=$_POST['opctema_texinimen_borde'];
$opctema_ubicacion_enlace_borde=$_POST['opctema_ubicacion_enlace_borde'];
$opctema_derecha_contenedor_borde=$_POST['opctema_derecha_contenedor_borde'];
$opctema_imagen_borde=$_POST['opctema_imagen_borde'];
$opctema_imagen1_borde=$_POST['opctema_imagen1_borde'];
$opctema_imagen2_borde=$_POST['opctema_imagen2_borde'];
$opctema_catalogo_borde=$_POST['opctema_catalogo_borde'];
$opctema_formulario_borde=$_POST['opctema_formulario_borde'];
$opctema_boton_borde=$_POST['opctema_boton_borde'];
$opctema_comentario_borde=$_POST['opctema_comentario_borde'];
$opctema_anuncios_borde=$_POST['opctema_anuncios_borde'];

file_put_contents($AC_DIRECTORIO.'css/'.$opctema_nombre,"<?php #CONTENIDO POR ARMIN\n".'$opctema_nombre='."'$opctema_nombre';\n".'$opctema_fondo_fondo='."'$opctema_fondo_fondo';\n".'$opctema_fondo_color='."'$opctema_fondo_color';\n".'$opctema_cabeza_fondo='."'$opctema_cabeza_fondo';\n".'$opctema_cabeza_color='."'$opctema_cabeza_color';\n".'$opctema_menu_fondo='."'$opctema_menu_fondo';\n".'$opctema_menu_color='."'$opctema_menu_color';\n".'$opctema_izquierda_fondo='."'$opctema_izquierda_fondo';\n".'$opctema_izquierda_color='."'$opctema_izquierda_color';\n".'$opctema_derecha_fondo='."'$opctema_derecha_fondo';\n".'$opctema_derecha_color='."'$opctema_derecha_color';\n".'$opctema_piedepagina_fondo='."'$opctema_piedepagina_fondo';\n".'$opctema_piedepagina_color='."'$opctema_piedepagina_color';\n".'$opctema_barra_fondo='."'$opctema_barra_fondo';\n".'$opctema_marquee_fondo='."'$opctema_marquee_fondo';\n".'$opctema_marquee_color='."'$opctema_marquee_color';\n".'$opctema_contenedores_fondo='."'$opctema_contenedores_fondo';\n".'$opctema_contenedores_color='."'$opctema_contenedores_color';\n".'$opctema_contenedorm2_color='."'$opctema_contenedorm2_color';\n".'$opctema_contenedorm2_h_color='."'$opctema_contenedorm2_h_color';\n".'$opctema_contenedor_derecha_fondo='."'$opctema_contenedor_derecha_fondo';\n".'$opctema_contenedor_derecha_color='."'$opctema_contenedor_derecha_color';\n".'$opctema_catalogo_fondo='."'$opctema_catalogo_fondo';\n".'$opctema_catalogo_color='."'$opctema_catalogo_color';\n".'$opctema_enlaces_fondo='."'$opctema_enlaces_fondo';\n".'$opctema_enlaces_color='."'$opctema_enlaces_color';\n".'$opctema_enlaces_h_fondo='."'$opctema_enlaces_h_fondo';\n".'$opctema_enlaces_h_color='."'$opctema_enlaces_h_color';\n".'$opctema_menu_enlaces_fondo='."'$opctema_menu_enlaces_fondo';\n".'$opctema_menu_enlaces_color='."'$opctema_menu_enlaces_color';\n".'$opctema_menu_enlace_h_fondo='."'$opctema_menu_enlace_h_fondo';\n".'$opctema_menu_enlace_h_color='."'$opctema_menu_enlace_h_color';\n".'$opctema_ubicacion_fondo='."'$opctema_ubicacion_fondo';\n".'$opctema_ubicacion_color='."'$opctema_ubicacion_color';\n".'$opctema_ubicacion_enlace_iconos_fondo='."'$opctema_ubicacion_enlace_iconos_fondo';\n".'$opctema_ubicacion_enlace_iconos_color='."'$opctema_ubicacion_enlace_iconos_color';\n".'$opctema_ubicacion_enlace_iconos_h_fondo='."'$opctema_ubicacion_enlace_iconos_h_fondo';\n".'$opctema_ubicacion_enlace_iconos_h_color='."'$opctema_ubicacion_enlace_iconos_h_color';\n".'$opctema_hr_fondo='."'$opctema_hr_fondo';\n".'$opctema_footer_enlace_iconos_fondo='."'$opctema_footer_enlace_iconos_fondo';\n".'$opctema_footer_enlace_iconos_color='."'$opctema_footer_enlace_iconos_color';\n".'$opctema_footer_enlace_iconos_h_fondo='."'$opctema_footer_enlace_iconos_h_fondo';\n".'$opctema_footer_enlace_iconos_h_color='."'$opctema_footer_enlace_iconos_h_color';\n".'$opctema_boton_fondo='."'$opctema_boton_fondo';\n".'$opctema_boton_color='."'$opctema_boton_color';\n".'$opctema_boton_h_fondo='."'$opctema_boton_h_fondo';\n".'$opctema_boton_h_color='."'$opctema_boton_h_color';\n".'$opctema_boton2_fondo='."'$opctema_boton2_fondo';\n".'$opctema_boton2_color='."'$opctema_boton2_color';\n".'$opctema_boton2_h_fondo='."'$opctema_boton2_h_fondo';\n".'$opctema_boton2_h_color='."'$opctema_boton2_h_color';\n".'$opctema_derecha_iconos_fondo='."'$opctema_derecha_iconos_fondo';\n".'$opctema_derecha_iconos_color='."'$opctema_derecha_iconos_color';\n".'$opctema_derecha_enlace_iconos_fondo='."'$opctema_derecha_enlace_iconos_fondo';\n".'$opctema_derecha_enlace_iconos_color='."'$opctema_derecha_enlace_iconos_color';\n".'$opctema_derecha_enlace_iconos_h_fondo='."'$opctema_derecha_enlace_iconos_h_fondo';\n".'$opctema_derecha_enlace_iconos_h_color='."'$opctema_derecha_enlace_iconos_h_color';\n".'$opctema_formulario_fondo='."'$opctema_formulario_fondo';\n".'$opctema_formulario_color='."'$opctema_formulario_color';\n".'$opctema_comentario_fondo='."'$opctema_comentario_fondo';\n".'$opctema_comentario_color='."'$opctema_comentario_color';\n".'$opctema_comentario_admin_fondo='."'$opctema_comentario_admin_fondo';\n".'$opctema_comentario_admin_color='."'$opctema_comentario_admin_color';\n".'$opctema_comentario_admin_h_fondo='."'$opctema_comentario_admin_h_fondo';\n".'$opctema_comentario_admin_h_color='."'$opctema_comentario_admin_h_color';\n".'$opctema_comentario_id_fondo='."'$opctema_comentario_id_fondo';\n".'$opctema_comentario_id_color='."'$opctema_comentario_id_color';\n".'$opctema_comentario_enlace_fondo='."'$opctema_comentario_enlace_fondo';\n".'$opctema_comentario_enlace_color='."'$opctema_comentario_enlace_color';\n".'$opctema_comentario_enlace_reportes_fondo='."'$opctema_comentario_enlace_reportes_fondo';\n".'$opctema_comentario_enlace_reportes_color='."'$opctema_comentario_enlace_reportes_color';\n".'$opctema_campo_fondo='."'$opctema_campo_fondo';\n".'$opctema_campo_color='."'$opctema_campo_color';\n".'$opctema_select_fondo='."'$opctema_select_fondo';\n".'$opctema_select_color='."'$opctema_select_color';\n".'$opctema_verificado_fondo='."'$opctema_verificado_fondo';\n".'$opctema_verificado_color='."'$opctema_verificado_color';\n".'$opctema_usuario_fondo='."'$opctema_usuario_fondo';\n".'$opctema_usuario_color='."'$opctema_usuario_color';\n".'$opctema_reaccionar_fondo='."'$opctema_reaccionar_fondo';\n".'$opctema_reaccionar_color='."'$opctema_reaccionar_color';\n".'$opctema_reaccionar_h_fondo='."'$opctema_reaccionar_h_fondo';\n".'$opctema_reaccionar_h_color='."'$opctema_reaccionar_h_color';\n".'$opctema_barra_borde='."'$opctema_barra_borde';\n".'$opctema_tituloweb_h_borde='."'$opctema_tituloweb_h_borde';\n".'$opctema_marquee_borde='."'$opctema_marquee_borde';\n".'$opctema_texini_borde='."'$opctema_texini_borde';\n".'$opctema_texinimen_borde='."'$opctema_texinimen_borde';\n".'$opctema_ubicacion_enlace_borde='."'$opctema_ubicacion_enlace_borde';\n".'$opctema_derecha_contenedor_borde='."'$opctema_derecha_contenedor_borde';\n".'$opctema_imagen_borde='."'$opctema_imagen_borde';\n".'$opctema_imagen1_borde='."'$opctema_imagen1_borde';\n".'$opctema_imagen2_borde='."'$opctema_imagen2_borde';\n".'$opctema_catalogo_borde='."'$opctema_catalogo_borde';\n".'$opctema_formulario_borde='."'$opctema_formulario_borde';\n".'$opctema_boton_borde='."'$opctema_boton_borde';\n".'$opctema_comentario_borde='."'$opctema_comentario_borde';\n".'$opctema_anuncios_borde='."'$opctema_anuncios_borde';\n"."#ACTUALIZADO: $fechahora\n?>");
	
	header("location:panel.php?ac=tema&ms=exi&msm=datosactualizados");

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

} else { if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}"); } 

?>