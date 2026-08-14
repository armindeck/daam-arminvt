<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION='Reporte de comentario por infringir las reglas de forolink';
$AC_METADESCRIPCION2='El reporte fue enviado exitosamente y será revisado lo mas pronto posible.';
$AC_METAETIQUETA='comentario reportado, reporte de comentario';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=true;
$AC_DESCRIPCION=$AC_DESCRIPCION_reportarexito;
$AC_FECHA='22 Feb 2023 - 10:07pm';
$mostrar='<p class="texini">Oh!. Parece que hubo un error al reportar la publicación...</p>
<p class="texini t12">Te recomiendo que vuelvas a reportar la publicación desde forolink...</p>
<p class="texini t12">Los datos ingresados son incorrectos o no cumplieron con los solicitados</p>';
$AC_TITULO='Oh!. Parece que hubo un error al reportar la publicación...';

if (isset($_GET['id']) && isset($_GET['carpeta'])) {
	$id=$_GET['id']; $carpeta=$_GET['carpeta'];
	#PRUEBAS
/*	$UbicacionArchivoContador=$AC_DIRECTORIO.$carpeta.'/datos/reportes/r'.$id.'.txt';
	$l=file_get_contents($UbicacionArchivoContador);
	$l2=$l+1;
	file_put_contents($UbicacionArchivoContador,$l2);
	echo $l;
*/	#PRUEBAS
	if (!empty($_POST) && !empty($_POST['caso']) && !empty($_POST['motivos'])){
		require_once $AC_DIRECTORIO.'datos/extenciones/extencionDarFormato.php';
		$caso=darFormato(trim($_POST['caso']));
		$motivos = darFormato(trim($_POST['motivos']));
		$verificar_carpeta=$AC_DIRECTORIO.$carpeta.'/datos/pubdatos.php';
		if(file_exists($verificar_carpeta)){ require_once $verificar_carpeta;
			$ubicar=$AC_DIRECTORIO.$carpeta.'/datos/reportes/';
			date_default_timezone_set("America/Bogota");
    		$fecha=date("d M Y - g:ia");
			$ex='Contador';
			$UbicacionArchivoContador=$ubicar.'r'.$id.'.txt';
			require_once $AC_DIRECTORIO.'datos/extenciones.php';

			$leerTotal=file_get_contents($UbicacionArchivoContador);
			$leerA=$ubicar.'rd'.$id.'.txt';
			$leerDatos=file_get_contents($leerA);

			if ($leerTotal >= 4){
				$UbicacionArchivoContador=$AC_DIRECTORIO.$carpeta.'/datos/estados/revision.txt';
				include $AC_DIRECTORIO.'datos/extenciones.php';
			}

			file_put_contents($leerA,$leerDatos."N: $leerTotal\nC: $caso\nM: $motivos\nF: $fecha\n---->\n");
			$AC_TITULO='Oh!. Gracias por reportar el comentario!';
			$reporte=$_GET['id'];
			$mostrar='<p class="texini">El reporte fue enviado exitosamente y será revisado lo más pronto posible.</p>
					<p class="texini t14">'.$AC_DESCRIPCION_reportarexito.'</p>';
			$AC_CONTENIDO='<div class="izqcon">
					'.$mostrar.'
					<a class="boton" href="'.$AC_DIRECTORIOs.'">Regresar</a>
					</div>';
		}
	}
} 

$AC_CONTENIDO='<div class="izqcon">
'.$mostrar.'
<a class="boton" href="'.$AC_DIRECTORIOs.'">Regresar</a>
</div>';

include $AC_DIRECTORIO.'datos/displa.php';
?>