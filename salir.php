<?php #SIGUE A DELANTE  ORLANDO JIMENES - 22/01/2023
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';

function ErrorLink()
{
	include $AC_DIRECTORIO.'datos/datos.php';
	header("Refresh:2; url=$EnlaceWeb/error".$AGREGAR_PHP);
	return 0;
}
if (isset($_GET['id'])) {
	if (isset($_GET['carpeta'])) {
		if (isset($_GET['enlace'])) {
			$id=$_GET['id'];
			$carpeta=$_GET['carpeta'];
			$enlace=$_GET['enlace'];

			$UbicacionArchivoContador=$AC_DIRECTORIO.$carpeta.'/datos/clic/c'.$id.'.txt';
			include $AC_DIRECTORIO.'datos/extenciones/extencionContador.php';
			header("Refresh:3; url='$enlace'");
		}
		else { ErrorLink(); }
	}
	else { ErrorLink(); }
}
else { ErrorLink(); }

#CONTENIDO POR ARMIN
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION=$AC_DESCRIPCION_salir;
$AC_METADESCRIPCION2='Escapémonos de '.$NombreWeb;
$AC_METAETIQUETA='salir de forolink, vamonos de forolink, escapemonos de forolink';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=true;
$AC_TITULO='Escapémonos del forolink de '.$NombreWeb.'!';
$AC_DESCRIPCION=$AC_DESCRIPCION_salir;
$AC_FECHA='22 Feb 2023 - 1:48pm';
$AC_CONTENIDO='<p class="texini">Saliendo de '.$EnlaceWebNoHttps.'...</p>
<p class="texini t14">Quiero que sepas que el sitio al que vas a acceder no es mío y no me hago responsable de lo que suceda allá.<br>Si necesitas reportar el enlace puedes hacerlo desde la zona de <a href="reportar'.$AGREGAR_PHP.'?id'.$id.'">reportes</a></p>
<p class="texini t12">Enlace al que sera dirigido: '.$enlace.'</p><p class="texini t14">'.$AC_DESCRIPCION.'</p>';
include $AC_DIRECTORIO.'datos/displa.php';
?>