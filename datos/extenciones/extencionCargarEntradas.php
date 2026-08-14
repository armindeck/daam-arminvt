<?php #EXTENCION CREADA POR ARMIN
echo '<div class="flexCon">';
foreach (array_reverse($entradas) as $contenido) {
	if($contenido['nuevo']=='n'){ $contenido['etiqueta']='Nuevo'; } else { $contenido['etiqueta']; }
	echo '<div class="m2">
			<p class="ctg'.$contenido['nuevo'].'">'.$contenido['etiqueta'].'</p>
			<a href="'.$AC_DIRECTORIOs.$contenido['ubicacion'].$contenido['archivo'].$AGREGAR_PHP.'">
			<div class="imagen">
				<img class="img1" src="'.$AC_DIRECTORIO.'img/'.$contenido['imagen'].'" loading="lazy" alt="'.substr($contenido['descripcion'], 0, 50).'... - '.$EnlaceWebNoHttps.'">
			</div>
			<p class="contexcn t14">'.substr($contenido['descripcion'], 0, 145).'...</p></a>
		</div>';
};
echo '</div>';
?>