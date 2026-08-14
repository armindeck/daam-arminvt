<?php

if(isset($ex)){

#EX CARGAR ENTRADAS

if($ex=='CargarEntradas'){

	echo '<div class="flexCon">';

	foreach (array_reverse($entradas) as $contenido) {

		if(isset($contenido['nuevo']) && $contenido['nuevo']=='n'){
			$contenido['etiqueta']='Nuevo';
		} else { $contenido['nuevo']=''; $contenido['etiqueta']; }

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

} else

#EX CARGAR FRASES

if($ex=='CargarFrases'){

	require_once $AC_DIRECTORIO.'descripciones.php';

	$random=rand(1,7);

	switch ($random){

		case 1: $mostrarFrase=$AC_DESCRIPCION_armin; $link=$EnlaceAdmin; break;

		case 2: $mostrarFrase=$AC_DESCRIPCION_index; $link=$AC_DIRECTORIOs; break;

		case 3: $mostrarFrase=$AC_DESCRIPCION_reglas; $link=$AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; break;

		case 4: $mostrarFrase=$AC_DESCRIPCION_reportar; $link=$AC_DIRECTORIOs.'reportar'.$AGREGAR_PHP; break;

		case 5: $mostrarFrase=$AC_DESCRIPCION_error; $link=$AC_DIRECTORIOs.'error'.$AGREGAR_PHP; break;

		case 6: $mostrarFrase=$AC_DESCRIPCION_forolink; $link=$AC_DIRECTORIOs.'forolink/'; break;

		case 7: $mostrarFrase=$AC_DESCRIPCION_reportarexito; $link=$AC_DIRECTORIOs.'reportarexito'.$AGREGAR_PHP; break;

	}

	echo '<a target="_blank" href="'.$link.'">'.$mostrarFrase.'</a>';

} else

#EX CARGAR TEMA

if($ex=='CargarTema'){

	$opcionTema = fopen($AC_DIRECTORIO.'css/opcion.php','r+');

	$leeropcionTema = fgets($opcionTema,20);

	if(isset($_GET['theme'])){ $tema=$_GET['theme'];

		if($tema=='Light'){ if ($leeropcionTema == '') $leeropcionTema = "0"; rewind($opcionTema); fputs($opcionTema,0); }

		if($tema=='Dark'){ if ($leeropcionTema == '') $leeropcionTema = "1"; rewind($opcionTema); fputs($opcionTema,1); }

		$guardarUltimaOpcion='';

	}

	fclose($opcionTema);

	if($leeropcionTema==0){ $cargarEstilo='light.css'; $colores='?theme=Dark'; $emojiTema='fas fa-moon'; }

	if($leeropcionTema==1){ $cargarEstilo='dark.css'; $colores='?theme=Light'; $emojiTema='fas fa-sun'; }

} else

#EX CONTADOR

if($ex=='Contador'){

	if (!file_exists($UbicacionArchivoContador)) {

		file_put_contents($UbicacionArchivoContador, "0");

	}

	

	$contador = file_get_contents($UbicacionArchivoContador);

	if(!isset($NoAumentarContador)){ $contador++; }

	

	file_put_contents($UbicacionArchivoContador, $contador);

} else

if($ex=='CargarImagenes'){

	$archivos = scandir($directorio);

	echo '<div class="flexCon">';

	foreach ($archivos as $archivo) {

	    if ($archivo !== '.' && $archivo !== '..') {

	        echo '



	 <div class="m2">

	 <p class="ctg">'.$archivo.'</p>

	  <div class="imagen"><img class="img1" loading="lazy" src="'.$directorio.$archivo.'"></div>



	 </div>';

	    }

	}

	echo '</div>';

} else

#EX CREAR CARPETAS

if($ex=='CrearCarpetas'){

	if(file_exists($crear_carpetas)){

	} else { if(!mkdir($crear_carpetas, 0777, true)); }

} else

#EX DAR FORMATO

if($ex=='DarFormato'){

	function darFormato($string) {

		$string = str_replace(array('<'), '«', $string );

		$string = str_replace(array('>'), '»', $string );

		$string = str_replace(array("'"), '&#039;', $string );

		$string = str_replace(array('"'), '&quot;', $string );

		$string = str_replace(array('{'), '&#123;', $string );

		$string = str_replace(array('}'), '&#125;', $string );

		$string = str_replace(array('#BR#'), '<br>', $string);

		$string = str_replace(array('#BA#'), '<b>', $string);

		$string = str_replace(array('#BC#'), '</b>', $string);

		$string = str_replace(array('#IA#'), '<i>', $string);

		$string = str_replace(array('#IC#'), '</i>', $string);

		$string = str_replace(array('#HR#'), '<hr>', $string);
		return $string;

	}

	

	function darFormatoNoSimbolos($string) {

		$string = str_replace(array('☺', '☻', '♥', '♦', '♣', '♠', '•', '◘', '○', '◙', '♂', '♀', '♪', '♫', '☼', '►', '◄', '↕', '‼', '¶', '§', '▬', '↨', '↑', '↓', '→', '←', '∟', '↔', '▲', '▼', '!', '"', '#', '$', '%', '&', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', ']', '^', '_', '`', '{', '|', '}', '~', '⌂', 'ª', 'º', '¿', '®', '¬', '½', '¼', '¡', '«', '»', '░', '▒', '▓', '│', '┤', '©', '╣', '║', '╗', '╝', '¢', '¥', '┐', '└', '‼', '┴', '┬', '├', '─', '┼', '╚', '╔', '╩', '╦', '╠', '═', '╬', '¤', 'ð', '┘', '┌', '█', '▄', '¦', '▀', '¯', '´', '±', '³', '²', '¶', '§', '÷', '¸', '°', '¨', '·', '¹', '³', '²', '■', "'", '“', '”'), '', $string );

		return $string;

	}

} else { $lugar=$AC_DIRECTORIO.'error'.$AGREGAR_PHP.'?ms=err&msm=noselecex'; }

} else { $lugar=$AC_DIRECTORIO.'error'.$AGREGAR_PHP.'?ms=err&msm=noexvarex'; }

?>