<?php #CARGAR PUBLICACIONES
if (isset($AC_UBICACION)) {
    $AC_UBICACION=$AC_UBICACION;
} else {
    $AC_UBICACION='';
}
if(file_exists($AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/pubdatos.php')){
    require $AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/pubdatos.php';
    $comentario=array_reverse($comentario);
    $enlace_reacciones=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA."/datos/reacciones/";

    foreach($comentario as $item):
        #DATOS DE USUARIO
        $emoji='<i class="fas fa-user cuser" title="usuario"></i>';
        $c_inicio='<span class="usuario">'.$item['nombre'].' '.$emoji.'</span> <span class="id" title="'.$item['nombre'].' es el @id'.$item['id'].' 7w7">@id'.$item['id'].'</span>';

        if($item['rol']=='admin'){
            $emoji='<i class="fas fa-splotch cverified" title="verificado"></i>';
            $c_inicio='<a class="admin" target="_blank" href="'.$EnlaceAdmin.'" title="'.$NombreAdmin.' es el Administrador :3">'.$NombreAdmin.'</a> '.$emoji.' <span class="id" title="'.$NombreAdmin.' es el @id'.$item['id'].' 7w7">@id'.$item['id'].'</span>';
        }
        if ($item['tipo']=='forolink' or !isset($item['tipo'])) {
            $c_enlace='<a target="_blank" rel="nofollow" class="t12 link" href="'.$AC_DIRECTORIOs.'salir'.$AGREGAR_PHP.'?id='.$item['id'].'&carpeta='.$item['carpeta'].'&ubicacion='.$item['ubicacion'].'&enlace='.$item['enlace'].'" title="Seguir a '.$item['enlace'].'">'.(substr($item['enlace'], 0, 25)).'...</a> <i class="fas fa-meteor forlinkcolor"></i>';
            $enlace_imagen=true;
        } else { $c_enlace=''; $item['enlace']=''; $enlace_imagen=false; }
        #$c_reportar='<a target="_blank" class="t12 repor" title="Reportar a '.$item['nombre'].' con @ID'.$item['id'].' :F" href="'.$AC_DIRECTORIOs.'reportar'.$AGREGAR_PHP.'?id='.$item['id'].'&carpeta='.$item['carpeta'].'">Reportar</a>';
        $c_reportar='<span class="t12 repor"><a target="_blank" href="'.$AC_DIRECTORIOs.'reportar'.$AGREGAR_PHP.'?id='.$item['id'].'&ubicacion='.$item['ubicacion'].'&carpeta='.$item['carpeta'].'">reportar</a></span>';
        #$c_reportar='<span class="t12 repor">reparando...</span>'; #QUITAR CUANDO REPARE LA SECCION DE REPORTAR
        $c_reacciones='<form method="post" action="'.$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'reac'.$AGREGAR_PHP.'?id='.$item['id'].'&dir='.$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'"> <input class="reaccion" type="submit" name="like" value="&#xf164; '.(file_get_contents($enlace_reacciones.'l'.$item['id'].'.txt')).'">
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
        $UbicacionArchivoContador=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/reportes/r'.$item['id'].'.txt'; $NoAumentarContador=true;
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
            $texto_dividido=$dividir_texto.'<div class="flexCon"><hr><div class="m2"><a target="_blank" href="'.$AC_DIRECTORIOs.'salir'.$AGREGAR_PHP.'?id='.$item['id'].'&carpeta='.$item['carpeta'].'&ubicacion='.$item['ubicacion'].'&enlace='.$conIMG.'"><div class="imagen"><img class="img1" src="'.$item['imagen'].'"></div></a></div></div>';
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
} else { echo '<p class="texini">Oh! ~ Parece que todavia no hay publicaciones! <span class="t12">~ Se el primero en publicar :3</span></p>'; }
echo "\n";
?>
<?php #CARGAR PUBLICACIONES CORTA
/*$archivo='datos/pubdatos.php';
if(file_exists($archivo)){
    include $AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/pubdatos.php';
    $comentario=array_reverse($comentario);
    $enlace_reacciones=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA."/datos/reacciones/";
    foreach($comentario as $item):
        echo '<div class="comentario">'.$item['id'].' - '.$item['rol'].' <b>'.$item['nombre'].'</b>: '.$item['enlace'].' --> '.$item['comentario'].' ~ '.$item['fecha'].'<hr>l'.(file_get_contents($enlace_reacciones.'l'.$item['id'].'.txt')).' - d'.(file_get_contents($enlace_reacciones.'d'.$item['id'].'.txt')).'</div>'."\n";
    endforeach;
} else { echo '<p class="texini">Oh! ~ Parece que todavia no hay publicaciones! <span class="t12">~ Se el primero en publicar :3</span></p>'; }*/
?>