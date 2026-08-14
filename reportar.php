<?php #SIGUE A DELANTE  ORLANDO JIMENES - 22/01/2023
$AC_DIRECTORIO="./";
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';

$contenido='<p class="texini t14">~Oh!. Parece que no hay ningún comentario que reportar...</p>
</div>';

if (isset($_GET['id']) && isset($_GET['carpeta'])) {
	$id=$_GET['id']-1;
	$idN=$_GET['id'];
	$carpeta=$_GET['carpeta'];
	$verificar_carpeta=$AC_DIRECTORIO.$carpeta.'/datos/pubdatos.php';
	if(file_exists($verificar_carpeta)){ require_once $verificar_carpeta;

	if($comentario[$id]['id'] == $idN && $comentario[$id]['carpeta'] == $carpeta){

$enlace_reacciones=$AC_DIRECTORIO.$comentario[$id]['carpeta']."/datos/reacciones/";

#DE CARGAR

$emoji='<i class="fas fa-user cuser" title="usuario"></i>';
$c_inicio='<span class="usuario">'.$comentario[$id]['nombre'].' '.$emoji.'</span> <span class="id" title="'.$comentario[$id]['nombre'].' es el @id'.$comentario[$id]['id'].' 7w7">@id'.$comentario[$id]['id'].'</span>';

if($comentario[$id]['rol']=='admin'){
	$emoji='<i class="fas fa-splotch cverified" title="verificado"></i>';
	$c_inicio='<a class="admin" target="_blank" href="'.$EnlaceAdmin.'" title="'.$NombreAdmin.' es el Administrador :3">'.$NombreAdmin.'</a> '.$emoji.' <span class="id" title="'.$NombreAdmin.' es el @id'.$comentario[$id]['id'].' 7w7">@id'.$comentario[$id]['id'].'</span>';
}

$c_enlace='<a target="_blank" rel="nofollow" class="t12 link" href="'.$AC_DIRECTORIOs.'salir'.$AGREGAR_PHP.'?id='.$comentario[$id]['id'].'&carpeta='.$comentario[$id]['carpeta'].'&enlace='.$comentario[$id]['enlace'].'" title="Seguir a '.$comentario[$id]['enlace'].'">'.(substr($comentario[$id]['enlace'], 0, 25)).'...</a> <i class="fas fa-meteor forlinkcolor"></i>';

$c_reacciones='<form method="post" action="'.$AC_DIRECTORIO.$comentario[$id]['carpeta'].'/reac'.$AGREGAR_PHP.'?id='.$comentario[$id]['id'].'&dir='.$AC_DIRECTORIO.$comentario[$id]['carpeta'].'/"> <input class="reaccion" type="submit" name="like" value="&#xf164; '.(file_get_contents($enlace_reacciones.'l'.$comentario[$id]['id'].'.txt')).'">
        <input class="reaccion" type="submit" name="dislike" value="&#xf165; '.(file_get_contents($enlace_reacciones.'d'.$comentario[$id]['id'].'.txt')).'">
        </form>';

$c_comentario='<p class="texcomentario">'.$comentario[$id]['comentario'].'</p>';

$ordenar=array($c_inicio,$comentario[$id]['fecha'],$c_reacciones,$c_comentario,$c_enlace);
$ex='Contador';
$UbicacionArchivoContador=$AC_DIRECTORIO.$comentario[$id]['carpeta'].'/datos/reportes/r'.$comentario[$id]['id'].'.txt'; $NoAumentarContador=true;
require_once $AC_DIRECTORIO.'datos/extenciones.php';

$revision='<span class="t12">Revisando publicación... @id'.$idN.'</span>';
$eliminado='<span class="t12">Publicación eliminada... @id'.$idN.'</span>';

$texto_dividido=wordwrap($comentario[$id]['comentario'], 15, " ", true);
$estodelcomentario=file_get_contents($UbicacionArchivoContador);

if($estodelcomentario <= 3){
	$mostrarComentarioFinal='<div class="flexRow"><p class="izq">'.$ordenar[0].' ~'.$ordenar[1].'</p><div class="der">'.$ordenar[2].'</div></div><hr><div class="flexLados"><div class="m2">'.$texto_dividido.'</div></div><hr><div class="flexRow hidden">'.$ordenar[4].'</div>';
}

if($estodelcomentario > 3){
	$mostrarComentarioFinal=$revision;
}
if($estodelcomentario >= 99){
	$mostrarComentarioFinal=$eliminado;
}
	$texto=array('<p class="t14 tb">Comentario que deseo reportar por incumplir las <a target="_blank" href="reglas'.$AGREGAR_PHP.'">reglas</a></p>','<p>Motivos por los que deseo reportar el comentario</p>','<p class="t14">Solo reporta la publicación si incumple con las <a href="'.$AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP.'">reglas</a></p>');
	$contenido='<div class="comentario">'.$mostrarComentarioFinal.'</div><hr>
	<div class="flexRow flexCen">
	<form method="post" class="formulario" action="reportarexito'.$AGREGAR_PHP.'?id='.$idN.'&carpeta='.$carpeta.'">'.$texto[1].'<hr>
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
<p class="texini t14">'.$AC_DESCRIPCION_reportar.'</p>';
	}
}}
#DE CARGAR

#CONTENIDO POR ARMIN
$AC_METADESCRIPCION=$AC_DESCRIPCION_reportar;
$AC_METADESCRIPCION2='Reportar comentario por incumplir las reglas';
$AC_METAETIQUETA='reportar comentario, reportar publicacion, reportar enlace, reportar comentario por incumplir las reglas';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=false;
$AC_TITULO='Reportar comentario por incumplir las reglas';
$AC_DESCRIPCION=$AC_DESCRIPCION_reportar;
$AC_FECHA='22 Feb 2023 - 2:15pm';
$AC_CONTENIDO='<p class="texini">Bienvenido a la sección de reportes.<br><span class="t14">En esta sección puedes reportar comentarios inadecuados o que incumplan con las <a target="_blank" href="reglas'.$AGREGAR_PHP.'">reglas</a></span></p>'.$texto[0].$contenido;
include $AC_DIRECTORIO.'datos/displa.php';
?>