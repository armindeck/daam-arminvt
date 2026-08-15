<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
require_once $AC_DIRECTORIO.'datos/datos.php';
$verificado=false; $verificado2=false;
if (isset($_GET['id']) && isset($_GET['ubi']) && isset($_GET['arc']) && isset($_GET['enlace'])) {
	$id=$_GET['id']; $ubi=$_GET['ubi']; $arc=$_GET['arc']; $enlace=$_GET['enlace'];
	#AHORA DAR FORMATO ESTA EN DISPLA
	$ERROR_DARFORMATO=true;
	$ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';
	$cdir=darFormatoIobi($ubi).$arc;
	$NUEVA_UBICACION=$AC_DIRECTORIO.'form/data/'.$cdir;

	$arc_pubdatos=$NUEVA_UBICACION.'/pubdatos.php';
	if(file_exists($arc_pubdatos)){
		require $arc_pubdatos;
		foreach ($comentario as $item) {
			if($item['id']==$id && $item['ubicacion']==$ubi && $item['archivo']==$arc && $item['enlace']==$enlace){
				#echo 'Id: '.$item['id'].'<br> Ubi: '.$item['ubicacion'].'<br> Arc: '.$item['archivo'].'<br> Enl: '.$item['enlace'].'<br> Fec: '.$item['fecha'];
				$verificado=true;
				break;
			}
		}
	}
	if($verificado==true){
		$arc_reporte=$NUEVA_UBICACION.'/reportes/r'.$id.'.txt';
		if(file_exists($arc_reporte)){
			$leer=fopen($arc_reporte, 'r+'); $leer_con=fread($leer, 1024); fclose($leer);
			if($leer_con >= 0 && $leer_con <=3){
				#echo '<br>El comentario tiene: '.$leer_con.' reportes.';
				$verificado2=true;
			} else {
				#echo '<br>Los datos de esta publicación no se pueden mostrar.';
				$acceder_enlace=false; }
		}
	}
	if($verificado2==true){
		$UbicacionArchivoContador=$NUEVA_UBICACION.'/clic/c'.$id.'.txt';
		$ex='Contador'; require $AC_DIRECTORIO.'datos/extenciones.php';
		header("Refresh:3; url='$enlace'");

		require_once $AC_DIRECTORIO.'datos/contenidos/cn_salir.php';
		$AC_UBICACION=$opc11;
		$AC_ARCHIVO=$opc12;
		$AC_METADESCRIPCION=$opc1;
		$AC_METADESCRIPCION2=$opc1;
		$AC_METAETIQUETA=$opc3;
		$AC_IMG=$opc4;
		$AC_EXTRA=$opc8;
		$AC_TITULO=$opc5;
		$AC_CATALOGO=$opc2;
		$AC_DESCRIPCION=$opc6;
		$AC_FECHA='2023-07-28 - 2:20pm';
		$AC_CONTENIDO='<p class="texini">Saliendo de '.$EnlaceWebNoHttps.'...</p>	<p class="texini t14">Quiero que sepas que el sitio al que vas a acceder no es mío y no me hago responsable de lo que suceda allá.<br>Si necesitas reportar el enlace puedes hacerlo desde la zona de <a href="reportar'.$AGREGAR_PHP.'?id='.$id.'&ubi='.$ubi.'&arc='.$arc.'">reportes</a></p>	<p class="texini t12">Enlace al que sera dirigido: '.$enlace.'</p><p class="texini t14">Sigamos un camino distinto al del forolink de '.$NombreWeb.', quiero conocer nuevos territorios y conocer gente nueva que me inspire y me apoye en este nuevo camino.</p>';
		require_once $AC_DIRECTORIO.'datos/displa.php';
		$AC_EXISTE=$opcExiste;
		$AC_ESTADO=$opcEstado;
		#v0.3.1 Beta
	}
}
if($verificado==false || $verificado2==false){ require './error.php'; }
?>