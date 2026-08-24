<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
require_once $AC_DIRECTORIO.'datos/contenidos/cn_reportarexito.php';
$AC_UBICACION=$opc11;
$AC_ARCHIVO=$opc12;
require_once $AC_DIRECTORIO.'datos/datos.php';
$AC_METADESCRIPCION=$opc1;
$AC_METADESCRIPCION2=$opc1;
$AC_METAETIQUETA=$opc3;
$AC_IMG=$opc4;
$AC_EXTRA=$opc8;
$mostrar='<p class="texinimen bgrojo">Oh!. Parece que hubo un error al reportar la publicación...</p>
<p class="texini t12">Te recomiendo que vuelvas a reportar la publicación desde forolink...</p>
<p class="texini t12">Los datos ingresados son incorrectos o no cumplieron con los solicitados</p>';
$AC_TITULO=$opc5;
$AC_CATALOGO=$opc2;
$AC_DESCRIPCION=$opc6;
$AC_FECHA='2023-07-30 - 12:19am';
if (isset($_GET['id']) && isset($_GET['ubi']) && isset($_GET['arc'])) {
	$id=$_GET['id']; $ubi=$_GET['ubi']; $arc=$_GET['arc'];
	if (!empty($_POST) && !empty($_POST['caso']) && !empty($_POST['motivos'])){
		$ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php'; $ERROR_DARFORMATO=true;
		$caso=darFormato(trim($_POST['caso']));
		$motivos = darFormato(trim($_POST['motivos']));
		$NUEVA_UBICACION=$AC_DIRECTORIO.'form/data/'.darFormatoIobi($ubi).$arc;
		$UBICACION_IOBI=$AC_DIRECTORIO.'form/iobi/';

		$verificar_carpeta=$NUEVA_UBICACION.'/pubdatos.php';
		if(file_exists($verificar_carpeta)){ require_once $verificar_carpeta;
			$ubicar=$NUEVA_UBICACION.'/reportes/';
			date_default_timezone_set("America/Bogota");
    		$fecha=date("d M Y - g:ia");
			$ex='Contador';
			$UbicacionArchivoContador=$ubicar.'r'.$id.'.txt';
			require $AC_DIRECTORIO.'datos/extenciones.php';

			$leerTotal=file_get_contents($UbicacionArchivoContador);
			$leerA=$ubicar.'rd'.$id.'.txt';
			if(!file_exists($leerA)){ file_put_contents($leerA,''); }
			$leerDatos=file_get_contents($leerA);

			if ($leerTotal >= 4){
				$UbicacionArchivoContador=$NUEVA_UBICACION.'/estados/revision.txt';
				require $AC_DIRECTORIO.'datos/extenciones.php';
			}

			file_put_contents($leerA,$leerDatos."N: $leerTotal\nC: $caso\nM: $motivos\nF: $fecha\n---->\n");
			$AC_TITULO='Oh!. Gracias por reportar el comentario!';
			$reporte=$_GET['id'];
			$mostrar='<p class="texinimen bgverde">El reporte fue enviado exitosamente y será revisado lo más pronto posible.</p>
					<p class="texini t14">Las personas como tu son las que mejoran forolink, esperemos que seas de los buenos y me ayudes con los reportes de comentarios que incumplan las reglas de forolink.</p>';
			$AC_CONTENIDO='<div class="izqcon">
					'.$mostrar.'
					<a class="boton" href="'.$AC_DIRECTORIO.'">Regresar</a>
					</div>';
			header("Location: $ubi$arc?ms=err&msm=reporexito");
		}
	}
}
$AC_CONTENIDO='<div class="izqcon">
'.$mostrar.'
<a class="boton" href="'.$AC_DIRECTORIO.'">Regresar</a>
</div>';
require_once $AC_DIRECTORIO.'datos/displa.php';
$AC_EXISTE=$opcExiste;
$AC_ESTADO=$opcEstado;
#v0.3.1 Beta
?>
<?php #2023-07-31 - 6:04pm ?>