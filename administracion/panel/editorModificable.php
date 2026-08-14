<?php #CONTENIDO POR ARMIN
#TRATAR CON CUIDADO!!!!
#CREADO: 10/05/23

if(isset($TIPO)){ if($TIPO='panel'){ ?>
<hr>
<a class="boton" href="panel.php?ac=editor&c=inicio">Inicio</a>
<a class="boton" href="panel.php?ac=editor&c=css">Css</a>
<a class="boton" href="panel.php?ac=editor&c=datos">Datos</a>
<a class="boton" href="panel.php?ac=editor&c=proyectos">Proyectos</a>
<a class="boton" href="panel.php?ac=editor&c=forolink">Forolink</a>
<a class="boton" href="panel.php?ac=editor&c=blog">Blog</a>
<a class="boton" href="panel.php?ac=editor&c=videos">Videos</a>
<a class="boton" href="panel.php?ac=editor&c=creadas">Creadas</a>
<a class="boton" href="panel.php?ac=editor&c=extras">Extras</a>
<?php #EXTENDER OPCIONES

if($_GET['c']){
	$carpeta=$_GET['c'];
	echo '<hr>';
	if ($carpeta=='inicio') { ?>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=htaccess">htaccess</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=acerca">Acerca</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=armin">Armin</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=imagenes">Imagenes</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=descripciones">Descripciones</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=donar">Donar</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=error">Error</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=index">Index</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=entradas">Entradas</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=reglas">Reglas</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=salir">Salir</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=reportar">Reportar</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=reportarexito">ReportarExito</a>
<a class="boton" href="panel.php?ac=editor&c=inicio&a=codigos">Codigos</a>
<?php }
if ($carpeta=='css') { ?>
<a class="boton" href="panel.php?ac=editor&c=css&a=estilo">Estilo</a>
<a class="boton" href="panel.php?ac=editor&c=css&a=estilo2">Estilo2</a>
<a class="boton" href="panel.php?ac=editor&c=css&a=light">Light</a>
<a class="boton" href="panel.php?ac=editor&c=css&a=dark">Dark</a>
<?php }
if ($carpeta=='datos') { ?>
<a class="boton" href="panel.php?ac=editor&c=datos&a=datos">Datos</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=displa">Displa</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=mensajes">Mensajes</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=extenciones">Extenciones</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=formulario">ForosFormulario</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=cargar">ForosCargar</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=procesar">ForosProcesar</a>
<?php }
if ($carpeta=='proyectos') { ?>
<a class="boton" href="panel.php?ac=editor&c=proyectos&a=plantasvszombies">plantasvszombies</a>
<?php }
if ($carpeta=='forolink') { ?>
<a class="boton" href="panel.php?ac=editor&c=forolink&a=index">Index</a>
<a class="boton" href="panel.php?ac=editor&c=forolink&a=pubdatos">PubDatos</a>
<?php }
if ($carpeta=='blog') { ?>
<a class="boton" href="panel.php?ac=editor&c=blog&a=index">Index</a>
<a class="boton" href="panel.php?ac=editor&c=blog&a=form">form</a>
<a class="boton" href="panel.php?ac=editor&c=blog&a=reac">reac</a>
<?php }
if ($carpeta=='videos') { ?>
<a class="boton" href="panel.php?ac=editor&c=videos&a=historiaanimeflv">historiaanimeflv</a>
<a class="boton" href="panel.php?ac=editor&c=videos&a=paginavtuber">paginavtuber</a>
<a class="boton" href="panel.php?ac=editor&c=videos&a=primerjuegogm8">primerjuegogm8</a>
<a class="boton" href="panel.php?ac=editor&c=videos&a=cursohtmlbasico">cursohtmlbasico</a>
<a class="boton" href="panel.php?ac=editor&c=videos&a=menuepicogms">menuepicogms</a>
<?php }
if ($carpeta=='creadas') { ?>
<a class="boton" href="panel.php?ac=editor&c=creadas&a=imagenes">Imagenes</a>
<a class="boton" href="panel.php?ac=editor&c=creadas&a=plantasvszombies">plantasvszombies</a>
<?php }
#c = carpeta | a = archivo
}

if($_GET['a']){
	$c=$_GET['c'];
	$a=$_GET['a'];

	$final=$c.'/'.$a.'.php';
	if($_GET['c']=='css'){
		$final=$c.'/'.$a.'.css';
	}
	if($_GET['c']=='datos'){
		if($_GET['a']=='datos'){
			$final='administracion/panel/'.$a.'.php';
		} else if($_GET['a']=='formulario' || $_GET['a']=='cargar' || $_GET['a']=='procesar'){
			$final=$c.'/foros/'.$a.'.php';
		} else { $final=$c.'/'.$a.'.php'; }
	}
	if($_GET['c']=='forolink'){
		if($_GET['a']=='pubdatos'){
			$final='forolink/datos/'.$a.'.php';
		} else { $final=$c.'/'.$a.'.php'; }
	}
    if($_GET['c']=='extenciones'){
		$final='datos/'.$c.'/'.$a.'.php';
	}
	if($_GET['c']=='inicio'){
		if($_GET['a']=='htaccess'){
			$final='.'.$a;
		} else if($_GET['a']=='entradas'){
			$final='administracion/panel/entradas.php';
		} else { $final=$a.'.php'; }
	}
	if($_GET['c']=='creadas'){
		$final='administracion/panel/creadas/'.$a.'.php';
	}
}

?>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>