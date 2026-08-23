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


#RENOMBRAR ----------------------->

if ($_POST['IniCambiarNombre']){
    $antiguo=$_POST['antiguo'];
    $nuevo=$_POST['nuevo'];
    if (file_exists($AC_DIRECTORIO.$antiguo) && !file_exists($AC_DIRECTORIO.$nuevo)) {
		rename($AC_DIRECTORIO.$antiguo,$AC_DIRECTORIO.$nuevo);
		$vamos='panel.php?ac=archivos&ms=exi&msm=datosactualizados';
		header("location:{$vamos}");
} else if(file_exists($AC_DIRECTORIO.$nuevo)){
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
	require_once __DIR__."/anuncios/procesa.php";
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
/*
m = Mostrar
me = Mostrar Elemento
mscr = Mostrar Scripts
cscr = Cargar Scripts
ti = Titulo
con = Contenido
ce = cantidad de elementos
*/
	$vinterna=trim($_POST['vinterna']);
	$dis_cscr=trim($_POST['dis_cscr']);
	if($dis_cscr!=''){ $dis_cscr='true'; } else { $dis_cscr='false'; }
	for ($i=0; $i < 5; $i++) {
		$dis_mscr[$i]=trim($_POST['dis_mscr'.$i]);
		if(!isset($_POST['dis_ce'.$i])){ $dis_ce[$i]=1; }
		if(isset($_POST['dis_ce'.$i])){ $dis_ce[$i]=trim($_POST['dis_ce'.$i]); }
		if(isset($_POST['dis_m'.$i])){ $dis_m[$i]=trim($_POST['dis_m'.$i]); } else { $dis_m[$i]=''; }
		if(isset($_POST['dis_ti_0_'.$i])){ $dis_ti_0_[$i]=trim($_POST['dis_ti_0_'.$i]); } else { $dis_ti_0_[$i]=''; }
		if(isset($_POST['dis_ti_1_'.$i])){ $dis_ti_1_[$i]=trim($_POST['dis_ti_1_'.$i]); } else { $dis_ti_1_[$i]=''; }
		if(isset($_POST['dis_ti_2_'.$i])){ $dis_ti_2_[$i]=trim($_POST['dis_ti_2_'.$i]); } else { $dis_ti_2_[$i]=''; }
		if(isset($_POST['dis_ti_3_'.$i])){ $dis_ti_3_[$i]=trim($_POST['dis_ti_3_'.$i]); } else { $dis_ti_3_[$i]=''; }
		if(isset($_POST['dis_ti_4_'.$i])){ $dis_ti_4_[$i]=trim($_POST['dis_ti_4_'.$i]); } else { $dis_ti_4_[$i]=''; }
		if(isset($_POST['dis_con_0_'.$i])){ $dis_con_0_[$i]=trim($_POST['dis_con_0_'.$i]); }
		if(isset($_POST['dis_con_1_'.$i])){ $dis_con_1_[$i]=trim($_POST['dis_con_1_'.$i]); }
		if(isset($_POST['dis_con_2_'.$i])){ $dis_con_2_[$i]=trim($_POST['dis_con_2_'.$i]); }
		if(isset($_POST['dis_con_3_'.$i])){ $dis_con_3_[$i]=trim($_POST['dis_con_3_'.$i]); }
		if(isset($_POST['dis_con_4_'.$i])){ $dis_con_4_[$i]=trim($_POST['dis_con_4_'.$i]); }
		if(isset($_POST['dis_me_0_'.$i])){ $dis_me_0_[$i]=trim($_POST['dis_me_0_'.$i]); } else { $dis_me_0_[$i]=''; }
		if(isset($_POST['dis_me_1_'.$i])){ $dis_me_1_[$i]=trim($_POST['dis_me_1_'.$i]); } else { $dis_me_1_[$i]=''; }
		if(isset($_POST['dis_me_2_'.$i])){ $dis_me_2_[$i]=trim($_POST['dis_me_2_'.$i]); } else { $dis_me_2_[$i]=''; }
		if(isset($_POST['dis_me_3_'.$i])){ $dis_me_3_[$i]=trim($_POST['dis_me_3_'.$i]); } else { $dis_me_3_[$i]=''; }
		if(isset($_POST['dis_me_4_'.$i])){ $dis_me_4_[$i]=trim($_POST['dis_me_4_'.$i]); } else { $dis_me_4_[$i]=''; }
	}

    $guardar="<?php #scrDispla\n#0.Cabeza, 1. Menu, 2. Contenido, 3. Menu Lateral, 4. Pie\n#0.Mostrar, 1. Cantidad de Elementos, 2. C. Scripts, 3. Elementos
$"."displadi[0]=['".$dis_m[0]."',".$dis_ce[0].",[
		['".$dis_me_0_[0]."','".$dis_ti_0_[0]."','".$dis_con_0_[0]."'],
		['".$dis_me_0_[1]."','".$dis_ti_0_[1]."','".$dis_con_0_[1]."'],
		['".$dis_me_0_[2]."','".$dis_ti_0_[2]."','".$dis_con_0_[2]."'],
		['".$dis_me_0_[3]."','".$dis_ti_0_[3]."','".$dis_con_0_[3]."']
	]
];
$"."displadi[1]=['".$dis_m[1]."',".$dis_ce[1].",[
		['".$dis_me_1_[0]."','".$dis_ti_1_[0]."','".$dis_con_1_[0]."'],
		['".$dis_me_1_[1]."','".$dis_ti_1_[1]."','".$dis_con_1_[1]."'],
		['".$dis_me_1_[2]."','".$dis_ti_1_[2]."','".$dis_con_1_[2]."'],
		['".$dis_me_1_[3]."','".$dis_ti_1_[3]."','".$dis_con_1_[3]."']
	]
];
$"."displadi[2]=['".$dis_m[2]."',".$dis_ce[2].",[
		['".$dis_me_2_[0]."','".$dis_ti_2_[0]."','".$dis_con_2_[0]."'],
		['".$dis_me_2_[1]."','".$dis_ti_2_[1]."','".$dis_con_2_[1]."'],
		['".$dis_me_2_[2]."','".$dis_ti_2_[2]."','".$dis_con_2_[2]."'],
		['".$dis_me_2_[3]."','".$dis_ti_2_[3]."','".$dis_con_2_[3]."']
	]
];
$"."displadi[3]=['".$dis_m[3]."',".$dis_ce[3].",[
		['".$dis_me_3_[0]."','".$dis_ti_3_[0]."','".$dis_con_3_[0]."'],
		['".$dis_me_3_[1]."','".$dis_ti_3_[1]."','".$dis_con_3_[1]."'],
		['".$dis_me_3_[2]."','".$dis_ti_3_[2]."','".$dis_con_3_[2]."'],
		['".$dis_me_3_[3]."','".$dis_ti_3_[3]."','".$dis_con_3_[3]."']
	]
];
$"."displadi[4]=['".$dis_m[4]."',".$dis_ce[4].",[
		['".$dis_me_4_[0]."','".$dis_ti_4_[0]."','".$dis_con_4_[0]."'],
		['".$dis_me_4_[1]."','".$dis_ti_4_[1]."','".$dis_con_4_[1]."'],
		['".$dis_me_4_[2]."','".$dis_ti_4_[2]."','".$dis_con_4_[2]."'],
		['".$dis_me_4_[3]."','".$dis_ti_4_[3]."','".$dis_con_4_[3]."']
	]
];
$"."carScripts=".$dis_cscr.";
$"."mosScripts=['".$dis_mscr[0]."','".$dis_mscr[1]."','".$dis_mscr[2]."','".$dis_mscr[3]."','".$dis_mscr[4]."']; #MOSTRAR SCRIPTS EN DISPLADI
#Modificado: ".$fechahora.' ~ '.$vinterna."\n?>";
	$scrCUS='scripts/us/scrCUS.php';
	$scrCUSPOST='scripts/us/scrDispladiCUS_POST.php';
	$archiD='pepe';
	if(file_exists($scrCUSPOST)){ require $scrCUSPOST; file_put_contents($scrCUS,$archiD); }
    file_put_contents('scripts/scrDispla.php',$guardar);

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