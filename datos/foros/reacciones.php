<?php
require($AC_DIRECTORIO.'datos/datos.php');
if (isset($_POST['like'])) {
	if (isset($_GET['id'])) {
		if (isset($_GET['dir'])) {
			$id=$_GET['id'];
			$dir=$_GET['dir'];
			$UbicacionArchivoContador=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/reacciones/l'.$id.'.txt';
			include $AC_DIRECTORIO.'datos/extenciones/extencionContador.php';
			header("Refresh:1; url=$AC_DIRECTORIO$dir");
		}
	}
} else if (isset($_POST['dislike'])) {
	if (isset($_GET['id'])) {
		if (isset($_GET['dir'])) {
			$id=$_GET['id'];
			$dir=$_GET['dir'];
			$UbicacionArchivoContador=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/reacciones/d'.$id.'.txt';
			include $AC_DIRECTORIO.'datos/extenciones/extencionContador.php';
			header("Refresh:1; url=$AC_DIRECTORIO$dir");
		}
	}
} else { $AC_DIREC='../'; $AC_ENCONTRAR=$AC_CARPETA.'/'; include $AC_DIREC.'error.php'; }

?>