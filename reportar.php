<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
require_once $AC_DIRECTORIO.'datos/contenidos/cn_reportar.php';
$AC_UBICACION=$opc11;
$AC_ARCHIVO=$opc12;
require_once $AC_DIRECTORIO.'datos/datos.php';

$contenido='<p class="texinimen bgrojo t14">~Oh!. Parece que no hay ningún comentario que reportar...</p>
</div>';
if (isset($_GET['id']) && isset($_GET['ubi']) && isset($_GET['arc'])) {
	$id=$_GET['id']-1; $idN=$_GET['id'];
	$ubi=$_GET['ubi']; $arc=$_GET['arc'];
	$ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php'; $ERROR_DARFORMATO=true;
	$NUEVA_UBICACION=$AC_DIRECTORIO.'form/data/'.darFormatoIobi($ubi).$arc;
	$UBICACION_IOBI=$AC_DIRECTORIO.'form/iobi/';
	$verificar_carpeta=$AC_DIRECTORIO.$ubi.$arc.'/datos/pubdatos.php';
	if(file_exists($NUEVA_UBICACION.'/pubdatos.php')){ require_once $NUEVA_UBICACION.'/pubdatos.php';

	if($comentario[$id]['id'] == $idN && $comentario[$id]['ubicacion'] == $ubi && $comentario[$id]['archivo'] == $arc){

$enlace_reacciones=$NUEVA_UBICACION."/reacciones/";

#DE CARGAR

$emoji='<i class="fas fa-user cuser" title="usuario"></i>';
$c_inicio='<span class="usuario">'.$comentario[$id]['nombre'].' '.$emoji.'</span> <span class="id" title="'.$comentario[$id]['nombre'].' es el @id'.$comentario[$id]['id'].' 7w7">@id'.$comentario[$id]['id'].'</span>';

if($comentario[$id]['rol']=='admin'){
	$emoji='<i class="fas fa-splotch cverified" title="verificado"></i>';
	$c_inicio='<a class="admin" target="_blank" title="'.$comentario[$id]['nombre'].' es el Administrador :3">'.$comentario[$id]['nombre'].'</a> '.$emoji.' <span class="id" title="'.$comentario[$id]['nombre'].' es el @id'.$comentario[$id]['id'].' 7w7">@id'.$comentario[$id]['id'].'</span>';
}
#DESDE AQUI SEGUIR EDITANDO
if ($comentario[$id]['tipo']=='forolink' || $comentario[$id]['tipo']=='blog' or !isset($comentario[$id]['tipo'])) {
            $c_enlace='<a target="_blank" rel="nofollow" class="t12 link" href="'.$AC_DIRECTORIO.'salir'.PHP_EXTENSION.'?id='.$comentario[$id]['id'].'&ubi='.$comentario[$id]['ubicacion'].'&arc='.$comentario[$id]['archivo'].'&enlace='.$comentario[$id]['enlace'].'" title="Seguir a '.$comentario[$id]['enlace'].'">'.(substr($comentario[$id]['enlace'], 0, 25)).'...</a> <i class="fas fa-meteor forlinkcolor"></i>';
            $enlace_imagen=true;
        } else { $c_enlace=''; $comentario[$id]['enlace']=''; $enlace_imagen=false; }


$c_reacciones='<form method="post" action="'.$UBICACION_IOBI.'reacciones'.PHP_EXTENSION.'?id='.$comentario[$id]['id'].'&ubi='.$comentario[$id]['ubicacion'].'&arc='.$comentario[$id]['archivo'].PHP_EXTENSION.'"> <input class="reaccion" type="submit" name="like" value="&#xf164; '.(file_get_contents($enlace_reacciones.'l'.$comentario[$id]['id'].'.txt')).'">
        <input class="reaccion" type="submit" name="dislike" value="&#xf165; '.(file_get_contents($enlace_reacciones.'d'.$comentario[$id]['id'].'.txt')).'">
        </form>';

$c_comentario='<p class="texcomentario">'.$comentario[$id]['comentario'].'</p>';

$ordenar=array($c_inicio,$comentario[$id]['fecha'],$c_reacciones,$c_comentario,$c_enlace);
$ex='Contador';
$ubiArchivoContador=$NUEVA_UBICACION.'/reportes/r'.$comentario[$id]['id'].'.txt'; $NoAumentarContador=true;
require_once $AC_DIRECTORIO.'datos/extenciones.php';

$revision='<span class="t12">Revisando publicación... @id'.$idN.'</span>';
$eliminado='<span class="t12">Publicación eliminada... @id'.$idN.'</span>';

$texto_dividido=wordwrap($comentario[$id]['comentario'], 15, " ", true);
$estodelcomentario=file_get_contents($ubiArchivoContador);

if($estodelcomentario <= 3){
	$mostrarComentarioFinal='<div class="flexRow"><p class="izq">'.$ordenar[0].' ~'.$ordenar[1].'</p><div class="der">'.$ordenar[2].'</div></div><hr><div class="flexLados"><div class="m2">'.$texto_dividido.'</div></div><hr><div class="flexRow hidden">'.$ordenar[4].'</div>';
}

if($estodelcomentario > 3){
	$mostrarComentarioFinal=$revision;
}
if($estodelcomentario >= 99){
	$mostrarComentarioFinal=$eliminado;
}
	$texto=array('<p class="t14 tb">Comentario que deseo reportar por incumplir las <a target="_blank" href="reglas'.PHP_EXTENSION.'">reglas</a></p>','<p>Motivos por los que deseo reportar el comentario</p>','<p class="t14">Solo reporta la publicación si incumple con las <a href="'.$AC_DIRECTORIO.'reglas'.PHP_EXTENSION.'">reglas</a></p>');
	$contenido='<div class="comentario">'.$mostrarComentarioFinal.'</div><hr>
	<div class="flexRow flexCen">
	<form method="post" class="formulario" action="reportarexito'.PHP_EXTENSION.'?id='.$idN.'&ubi='.$ubi.'&arc='.$arc.'">'.$texto[1].'<hr>
		<select name="caso">
			<option value="acoso">Acoso</option>
			<option value="engaño">Engaño</option>
			<option value="spam">Spam</option>
			<option value="violencia">Violencia</option>
			<option value="otro">Otro</option>
		</select>
		<input class="codigo campo" type="text" value="C833">
		<textarea name="motivos" placeholder="Los motivos de mi reporte..."></textarea>
		<input type="submit" value="Reportar"><hr>
		'.$texto[2].'
	</form>
</div>
<p class="texini t14">~Copia el código antes de reportar!<br>~Entre más códigos obtengas, mas oportunidad tendrás de obtener un rol!<br>~Pronto habrá una sección de códigos!<br>~Estos códigos solo servirán si los reportes son aprobados.</p>
<p class="texini t14">Los comentarios que incumplas con reglas deben ser reportados y verificados para después ser eliminados, los comentarios que incumplen las reglas afectan a los demás usuarios, por eso es mejor que sean eliminado lo más pronto posible.</p>';
	}
}}
#DE CARGAR Versiones Antiguas/Nueva

$AC_METADESCRIPCION=$opc1;
$AC_METADESCRIPCION2=$opc1;
$AC_METAETIQUETA=$opc3;
$AC_IMG=$opc4;
$AC_EXTRA=$opc8;
$AC_TITULO=$opc5;
$AC_CATALOGO=$opc2;
$AC_DESCRIPCION=$opc6;
$AC_FECHA='2023-07-30 - 12:12am';
$AC_CONTENIDO='<p class="texini">Bienvenido a la sección de reportes.<br><span class="t14">En esta sección puedes reportar comentarios inadecuados o que incumplan con las <a target="_blank" href="reglas'.PHP_EXTENSION.'">reglas</a></span></p>'.$texto[0].$contenido;
require_once $AC_DIRECTORIO.'datos/displa.php';
$AC_EXISTE=$opcExiste;
$AC_ESTADO=$opcEstado;
#v0.3.1 Beta
?>