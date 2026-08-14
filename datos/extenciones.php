<?php







if(isset($ex)){







#EX CARGAR ENTRADAS







if($ex=='CargarEntradas'){







	/*echo '<div class="flexCon">';







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







#EX VERIFICAR ELEMENTOS DEL MENU LATERAL







if($ex=='MenuLateralElementos'){



	if ($i===1) {



		if(isset($MenuLateralE1T)){ $vaLT=$MenuLateralE1T; } else { $vaLT=''; }



		if(isset($MenuLateralE1C)){ $vaLC=$MenuLateralE1C; } else { $vaLC=''; }



		if(isset($MenuLateralE1)){ $vaLM=$MenuLateralE1; } else { $vaLM=''; }



	} elseif ($i===2) {



		if(isset($MenuLateralE2T)){ $vaLT=$MenuLateralE2T; } else { $vaLT=''; }



		if(isset($MenuLateralE2C)){ $vaLC=$MenuLateralE2C; } else { $vaLC=''; }



		if(isset($MenuLateralE2)){ $vaLM=$MenuLateralE2; } else { $vaLM=''; }



	} elseif ($i===3) {



		if(isset($MenuLateralE3T)){ $vaLT=$MenuLateralE3T; } else { $vaLT=''; }



		if(isset($MenuLateralE3C)){ $vaLC=$MenuLateralE3C; } else { $vaLC=''; }



		if(isset($MenuLateralE3)){ $vaLM=$MenuLateralE3; } else { $vaLM=''; }



	} elseif ($i===4) {



		if(isset($MenuLateralE4T)){ $vaLT=$MenuLateralE4T; } else { $vaLT=''; }



		if(isset($MenuLateralE4C)){ $vaLC=$MenuLateralE4C; } else { $vaLC=''; }



		if(isset($MenuLateralE4)){ $vaLM=$MenuLateralE4; } else { $vaLM=''; }



	}



}







if($ex=='PiedePaginaElementos'){



	if ($i===1) {



		if(isset($PiedePaginaE1T)){ $vaLT=$PiedePaginaE1T; } else { $vaLT=''; }



		if(isset($PiedePaginaE1C)){ $vaLC=$PiedePaginaE1C; } else { $vaLC=''; }



		if(isset($PiedePaginaE1)){ $vaLM=$PiedePaginaE1; } else { $vaLM=''; }



	} elseif ($i===2) {



		if(isset($PiedePaginaE2T)){ $vaLT=$PiedePaginaE2T; } else { $vaLT=''; }



		if(isset($PiedePaginaE2C)){ $vaLC=$PiedePaginaE2C; } else { $vaLC=''; }



		if(isset($PiedePaginaE2)){ $vaLM=$PiedePaginaE2; } else { $vaLM=''; }



	} elseif ($i===3) {



		if(isset($PiedePaginaE3T)){ $vaLT=$PiedePaginaE3T; } else { $vaLT=''; }



		if(isset($PiedePaginaE3C)){ $vaLC=$PiedePaginaE3C; } else { $vaLC=''; }



		if(isset($PiedePaginaE3)){ $vaLM=$PiedePaginaE3; } else { $vaLM=''; }



	} elseif ($i===4) {



		if(isset($PiedePaginaE4T)){ $vaLT=$PiedePaginaE4T; } else { $vaLT=''; }



		if(isset($PiedePaginaE4C)){ $vaLC=$PiedePaginaE4C; } else { $vaLC=''; }



		if(isset($PiedePaginaE4)){ $vaLM=$PiedePaginaE4; } else { $vaLM=''; }



	}



}







if($ex=='CabezaElementos'){



	if ($i===1) {



		if(isset($CabezaE1T)){ $vaLT=$CabezaE1T; } else { $vaLT=''; }



		if(isset($CabezaE1C)){ $vaLC=$CabezaE1C; } else { $vaLC=''; }



		if(isset($CabezaE1)){ $vaLM=$CabezaE1; } else { $vaLM=''; }



	} elseif ($i===2) {



		if(isset($CabezaE2T)){ $vaLT=$CabezaE2T; } else { $vaLT=''; }



		if(isset($CabezaE2C)){ $vaLC=$CabezaE2C; } else { $vaLC=''; }



		if(isset($CabezaE2)){ $vaLM=$CabezaE2; } else { $vaLM=''; }



	} elseif ($i===3) {



		if(isset($CabezaE3T)){ $vaLT=$CabezaE3T; } else { $vaLT=''; }



		if(isset($CabezaE3C)){ $vaLC=$CabezaE3C; } else { $vaLC=''; }



		if(isset($CabezaE3)){ $vaLM=$CabezaE3; } else { $vaLM=''; }



	} elseif ($i===4) {



		if(isset($CabezaE4T)){ $vaLT=$CabezaE4T; } else { $vaLT=''; }



		if(isset($CabezaE4C)){ $vaLC=$CabezaE4C; } else { $vaLC=''; }



		if(isset($CabezaE4)){ $vaLM=$CabezaE4; } else { $vaLM=''; }



	}



}







if($ex=='MenuElementos'){



	if ($i===1) {



		if(isset($MenuE1T)){ $vaLT=$MenuE1T; } else { $vaLT=''; }



		if(isset($MenuE1C)){ $vaLC=$MenuE1C; } else { $vaLC=''; }



		if(isset($MenuE1)){ $vaLM=$MenuE1; } else { $vaLM=''; }



	} elseif ($i===2) {



		if(isset($MenuE2T)){ $vaLT=$MenuE2T; } else { $vaLT=''; }



		if(isset($MenuE2C)){ $vaLC=$MenuE2C; } else { $vaLC=''; }



		if(isset($MenuE2)){ $vaLM=$MenuE2; } else { $vaLM=''; }



	} elseif ($i===3) {



		if(isset($MenuE3T)){ $vaLT=$MenuE3T; } else { $vaLT=''; }



		if(isset($MenuE3C)){ $vaLC=$MenuE3C; } else { $vaLC=''; }



		if(isset($MenuE3)){ $vaLM=$MenuE3; } else { $vaLM=''; }



	} elseif ($i===4) {



		if(isset($MenuE4T)){ $vaLT=$MenuE4T; } else { $vaLT=''; }



		if(isset($MenuE4C)){ $vaLC=$MenuE4C; } else { $vaLC=''; }



		if(isset($MenuE4)){ $vaLM=$MenuE4; } else { $vaLM=''; }



	}



}



if($ex=='ContenidoExtraElementos'){



	if ($i===1) {



		if(isset($ContenidoExtraE1T)){ $vaLT=$ContenidoExtraE1T; } else { $vaLT=''; }



		if(isset($ContenidoExtraE1C)){ $vaLC=$ContenidoExtraE1C; } else { $vaLC=''; }



		if(isset($ContenidoExtraE1)){ $vaLM=$ContenidoExtraE1; } else { $vaLM=''; }



	} elseif ($i===2) {



		if(isset($ContenidoExtraE2T)){ $vaLT=$ContenidoExtraE2T; } else { $vaLT=''; }



		if(isset($ContenidoExtraE2C)){ $vaLC=$ContenidoExtraE2C; } else { $vaLC=''; }



		if(isset($ContenidoExtraE2)){ $vaLM=$ContenidoExtraE2; } else { $vaLM=''; }



	} elseif ($i===3) {



		if(isset($ContenidoExtraE3T)){ $vaLT=$ContenidoExtraE3T; } else { $vaLT=''; }



		if(isset($ContenidoExtraE3C)){ $vaLC=$ContenidoExtraE3C; } else { $vaLC=''; }



		if(isset($ContenidoExtraE3)){ $vaLM=$ContenidoExtraE3; } else { $vaLM=''; }



	} elseif ($i===4) {



		if(isset($ContenidoExtraE4T)){ $vaLT=$ContenidoExtraE4T; } else { $vaLT=''; }



		if(isset($ContenidoExtraE4C)){ $vaLC=$ContenidoExtraE4C; } else { $vaLC=''; }



		if(isset($ContenidoExtraE4)){ $vaLM=$ContenidoExtraE4; } else { $vaLM=''; }



	}



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