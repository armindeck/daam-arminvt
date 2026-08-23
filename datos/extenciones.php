<?php
if(isset($ex)){
#EX CARGAR ENTRADAS
if($ex=='CargarEntradas'){
/*
	echo '<div class="flexCon">';
	foreach (array_reverse($entradas) as $contenido) {
	if(isset($contenido['nuevo']) && $contenido['nuevo']=='n'){
		$contenido['etiqueta']='Nuevo';
	} else { $contenido['nuevo']=''; $contenido['etiqueta']; }
	echo '<div class="m3">
	<p class="ctg'.$contenido['nuevo'].'">'.$contenido['etiqueta'].'</p>
	<a href="'.$AC_DIRECTORIOs.$contenido['ubicacion'].$contenido['archivo'].$AGREGAR_PHP.'">







				<div class="imagen">







					<img class="img1" src="'.$AC_DIRECTORIO.'img/'.$contenido['imagen'].'" loading="lazy" alt="'.substr($contenido['descripcion'], 0, 50).'... - '.$EnlaceWebNoHttps.'">







				</div>







				<p class="contexcn t14">'.substr($contenido['descripcion'], 0, 145).'...</p></a>







			</div>';







	};



	echo '</div><hr>'; */



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



	$enviosGET='';



	if(isset($URL_FINAL)){



			function darFormatoURL_FINAL($string,$LH) {



				$string = str_replace(array("$LH"), '', $string);



				$string = str_replace(array('&theme=Light'), '', $string);



				$string = str_replace(array('&theme=Dark'), '', $string);



			return $string; }

			$enviosGET='?';

		if($URL_WEB=='localhost'){



			#echo 'URL: '.$URL.'<br>';



			$LH='localhost/'.$LocalHost.'/';



			$enviosGET=$AC_DIRECTORIO.darFormatoURL_FINAL($URL,$LH);



			#echo 'EnviosGET: '.$enviosGET;

			if(empty($_GET)){ $enviosGET=$enviosGET.'?'; } else { $enviosGET=$enviosGET.'&'; }

		}



	}



	if($leeropcionTema==0){ $cargarEstilo='light.css'; $colores=$enviosGET.'theme=Dark'; $emojiTema='fas fa-moon'; }





	if($leeropcionTema==1){ $cargarEstilo='dark.css'; $colores=$enviosGET.'theme=Light'; $emojiTema='fas fa-sun'; }







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



	if(isset($directorio)){ $directorio=$directorio; }



	else { $directorio=$AC_DIRECTORIO.'img/'; }



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







#EX VERIFICAR CARPETAS







if($ex=='VerificarCarpetas'){



	if(!file_exists($vericar)){ mkdir($vericar); $pasaen='&ms=err&msm=direcreados'; }



} else











#EX CREAR CARPETAS







if($ex=='CrearCarpetas'){







	if(file_exists($crear_carpetas)){







	} else { if(!mkdir($crear_carpetas, 0777, true)); }







} else

#ELEMENTOS DE LA PAGINA
if($ex=='scrDispladi'){
	#0.Cabeza, 1. Menu, 2. Contenido, 3. Menu Lateral, 4. Pie
	#0.Mostrar, 1. Cantidad de Elementos, 2. C. Scripts, 3. Elementos
	$dirScripts=$AC_DIRECTORIO.'administracion/panel/scripts/';
	$scrDispla=$dirScripts.'scrDispla.php'; if (file_exists($scrDispla)){ require_once $scrDispla; }
	$scrCUS=$dirScripts.'us/scrCUS.php'; if (file_exists($scrCUS)){ require_once $scrCUS; }
	if ($displadi[$elem][0]!=''):
		$me=''; $mef='';
		switch ($elem) {
			case 0: $mi='<header>'; $mif='</header>'; break;
			case 1: $mi='<nav>'; $mif='</nav>'; break;
			case 2: $mi='<div>'; $mif='</div>'; break;
			case 3: $mi='<div class="menu-lateral">'; $me='<div class="bord">'; $mef='</div>'; $mif='</div>'; break;
			case 4: $mi='<footer>'; $me='<div>'; $mef='</div>'; $mif='</footer>'; break;
		}
		echo $mi;
		echo $elem == 3 ? viewAdsThumbnail(CONFIG["ads"] ?? [], $AC_DIRECTORIO) : "";
		for ($ii=0; $ii < $displadi[$elem][1]; $ii++):
			if($displadi[$elem][2][$ii][0] != ''):
				echo $me; $ver='';
				if($displadi[$elem][2][$ii][1] != '' && $elem!=2){ $ver='<hr>'; }
				echo '<p>'.$displadi[$elem][2][$ii][1].'</p>'.$ver;
				if($displadi[$elem][2][$ii][2] != ''){ echo $displadi[$elem][2][$ii][2]; }
				$arcMNL=$AC_DIRECTORIO.'/administracion/panel/scripts/us/scrDisplaCUS.php';
				if(file_exists($arcMNL)){ require $arcMNL; }
				echo $mef;
			endif;
		endfor;
		echo $mif;
	endif;
}


#EX DAR FORMATO
if($ex=='DarFormato'){







	function darFormato($string) {
		$string = str_replace(array('<'), '«', $string );
		$string = str_replace(array('>'), '»', $string );
		$string = str_replace(array("'"), ' &#039; ', $string );
		$string = str_replace(array('"'), ' &quot; ', $string );
		$string = str_replace(array('{'), ' &#123; ', $string );
		$string = str_replace(array('}'), ' &#125; ', $string );
		$string = str_replace(array('#BR#'), ' <br> ', $string);
		$string = str_replace(array('#BA#'), ' <b> ', $string);
		$string = str_replace(array('#BC#'), ' </b> ', $string);
		$string = str_replace(array('#IA#'), ' <i> ', $string);
		$string = str_replace(array('#IC#'), ' </i> ', $string);
		$string = str_replace(array('#HR#'), ' <hr> ', $string);
		$string = str_replace(array('#TA#'), ' <span> ', $string);
		$string = str_replace(array('#TA18#'), ' <span class="t18"> ', $string);
		$string = str_replace(array('#TA14#'), ' <span class="t14"> ', $string);
		$string = str_replace(array('#TA12#'), ' <span class="t12"> ', $string);
		$string = str_replace(array('#TC#'), ' </span> ', $string);
		return $string;
	}

	function darFormatoNoSimbolos($string) {
		$string = str_replace(array('☺', '☻', '♥', '♦', '♣', '♠', '•', '◘', '○', '◙', '♂', '♀', '♪', '♫', '☼', '►', '◄', '↕', '‼', '¶', '§', '▬', '↨', '↑', '↓', '→', '←', '∟', '↔', '▲', '▼', '!', '"', '#', '$', '%', '&', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', ']', '^', '_', '`', '{', '|', '}', '~', '⌂', 'ª', 'º', '¿', '®', '¬', '½', '¼', '¡', '«', '»', '░', '▒', '▓', '│', '┤', '©', '╣', '║', '╗', '╝', '¢', '¥', '┐', '└', '‼', '┴', '┬', '├', '─', '┼', '╚', '╔', '╩', '╦', '╠', '═', '╬', '¤', 'ð', '┘', '┌', '█', '▄', '¦', '▀', '¯', '´', '±', '³', '²', '¶', '§', '÷', '¸', '°', '¨', '·', '¹', '³', '²', '■', "'", '“', '”'), '', $string );
		return $string;
	}

	function darFormatoIobi($string) { $string = str_replace(array('/'), '-', $string); return $string; }

	function darFormatoConTXT($string) {
		$string = str_replace(array('.php'), '.txt', $string);
		$string = str_replace(array('.css'), '.txt', $string);
		$string = str_replace(array('.htaccess'), '.htaccess.txt', $string);
	return $string; }
} else { $lugar=$AC_DIRECTORIO.'error'.$AGREGAR_PHP.'?ms=err&msm=noselecex'; }







} else { $lugar=$AC_DIRECTORIO.'error'.$AGREGAR_PHP.'?ms=err&msm=noexvarex'; }







?>