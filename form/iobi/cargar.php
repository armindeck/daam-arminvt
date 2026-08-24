<?php #CARGAR PUBLICACIONES
#$AccesoCargar=false;
if(isset($AccesoCargar) && $AccesoCargar==true){
#DarFomato ahora carga desde displa
#$ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';
$NUEVA_UBICACION=$AC_DIRECTORIO.'form/data/'.darFormatoIobi($AC_UBICACION).$AC_ARCHIVO;
$UBICACION_IOBI=$AC_DIRECTORIO.'form/iobi/';

#echo $NUEVA_UBICACION;

if(file_exists($NUEVA_UBICACION.'/pubdatos.php')){
    require $NUEVA_UBICACION.'/pubdatos.php';
    $comentario=array_reverse($comentario);
    $enlace_reacciones=$NUEVA_UBICACION."/reacciones/";

    foreach($comentario as $item):
        #DATOS DE USUARIO
        $emoji='<i class="fas fa-user cuser" title="usuario"></i>';
        $c_inicio='<span class="usuario">'.$item['nombre'].' '.$emoji.'</span> <span class="id" title="'.$item['nombre'].' es el @id'.$item['id'].' 7w7">@id'.$item['id'].'</span>';

        if($item['rol']=='admin'){
            $emoji='<i class="fas fa-splotch cverified" title="verificado"></i>';
            $c_inicio='<a class="admin" target="_blank" title="'.$item["nombre"].' es el Administrador :3">'.$item["nombre"].'</a> '.$emoji.' <span class="id" title="'.$item["nombre"].' es el @id'.$item['id'].' 7w7">@id'.$item['id'].'</span>';
        }
        if ($item['tipo']=='forolink' || $item['tipo']=='blog' or !isset($item['tipo'])) {
            $c_enlace='<a target="_blank" rel="nofollow" class="t12 link" href="'.$AC_DIRECTORIO.'salir'.PHP_EXTENSION.'?id='.$item['id'].'&ubi='.$item['ubicacion'].'&arc='.$item['archivo'].'&enlace='.$item['enlace'].'" title="Seguir a '.$item['enlace'].'">'.(substr($item['enlace'], 0, 25)).'...</a> <i class="fas fa-meteor forlinkcolor"></i>';
            $enlace_imagen=true;
        } else { $c_enlace=''; $item['enlace']=''; $enlace_imagen=false; }
        #$c_reportar='<a target="_blank" class="t12 repor" title="Reportar a '.$item['nombre'].' con @ID'.$item['id'].' :F" href="'.$AC_DIRECTORIO.'reportar'.PHP_EXTENSION.'?id='.$item['id'].'&archivo='.$item['archivo'].'">Reportar</a>';
        $c_reportar='<span class="t12 repor"><a target="_blank" href="'.$AC_DIRECTORIO.'reportar'.PHP_EXTENSION.'?id='.$item['id'].'&ubi='.$item['ubicacion'].'&arc='.$item['archivo'].'">reportar</a></span>';
        #$c_reportar='<span class="t12 repor">reparando...</span>'; #QUITAR CUANDO REPARE LA SECCION DE REPORTAR
        $c_reacciones='<form method="post" action="'.$UBICACION_IOBI.'reacciones'.PHP_EXTENSION.'?id='.$item['id'].'&ubi='.$AC_UBICACION.'&arc='.$AC_ARCHIVO.PHP_EXTENSION.'"> <input class="reaccion" type="submit" name="like" value="&#xf164; '.(file_get_contents($enlace_reacciones.'l'.$item['id'].'.txt')).'">
        <input class="reaccion" type="submit" name="dislike" value="&#xf165; '.(file_get_contents($enlace_reacciones.'d'.$item['id'].'.txt')).'">
        </form>';

        $c_comentario='<p class="texcomentario">'.$item['comentario'].'</p>';

        $ordenar=array($c_inicio,$item['fecha'],$c_reacciones,$c_comentario,$c_enlace,$c_reportar);
        if($item['rol']=='admin'){ $ordenar[5]=''; }

        if (isset($AC_REPORTE) && $AC_REPORTE == 'reporte') {
            $ActivoReporte = '';
        } else {
            $ActivoReporte = $ordenar[5];
        } #ExtencionCargarComentario
        if(isset($ActivoNoticias) && $ActivoNoticias==true){
            $inicio='';
        } else { $inicio=$ordenar[0].' ~'; }
        $ex='Contador';
        $UbicacionArchivoContador=$NUEVA_UBICACION.'/reportes/r'.$item['id'].'.txt'; $NoAumentarContador=true;
        require $AC_DIRECTORIO.'datos/extenciones.php';

        $revision='<span class="t12">Revisando publicación... @id'.$item['id'].'</span>';
        $eliminado='<span class="t12">Publicación eliminada... @id'.$item['id'].'</span>';

        $dividir_texto=wordwrap($item['comentario'], 15, " ", true);

        if (isset(($item['imagen']))) {
            if($enlace_imagen==true){
                $conIMG=$item['enlace'];
            } else {
                $conIMG=$item['imagen'];
            }
            $texto_dividido=$dividir_texto.'<div class="flexCon"><hr><div class="m2"><a target="_blank" href="'.$AC_DIRECTORIO.'salir'.PHP_EXTENSION.'?id='.$item['id'].'&arc='.$item['archivo'].'&ubi='.$item['ubicacion'].'&enlace='.$conIMG.'"><div class="imagen"><img class="img1" src="'.$item['imagen'].'"></div></a></div></div>';
        } else { $texto_dividido=$dividir_texto; }

        $estodelcomentario=file_get_contents($UbicacionArchivoContador);
        if($estodelcomentario <= 3){
            $mostrarComentarioFinal='<div class="flexRow"><p class="izq">'.$inicio.$ordenar[1].'</p><div class="der">'.$ordenar[2].'</div></div><hr><div class="flexLados"><div class="m2">'.$texto_dividido.'</div></div><hr><div class="flexRow hidden">'.$ordenar[4].' '.$ActivoReporte.'</div>';
        }
        if($estodelcomentario > 3){
            $mostrarComentarioFinal=$revision;
        }
        if($estodelcomentario >= 99){
            $mostrarComentarioFinal=$eliminado;
        }
        echo "\n".'<div class="comentario">'.$mostrarComentarioFinal.'</div>';
    endforeach;
} else {
    $MMSMT='<p class="texini">Oh! ~ Parece que todavia no hay publicaciones!</p>';
    if($TIPO=='foro'){
        $MMSMT=$MMSMT.'<p class="texini t12">~ Se el primero en publicar :3</p>';
    }
    if($TIPO=='comentarios'){
        $MMSMT=$MMSMT.'<p class="texini t12">~ Se el primero en comentar :3</p>';
    }
    echo $MMSMT;
}
echo "\n";
} else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
}
?>