<?php

if (!isset($ex)) return;

if ($ex == 'CargarEntradas') {
	echo '<div class="flexCon">';
	foreach (array_reverse($entradas) as $contenido) {
		if (isset($contenido['nuevo']) && $contenido['nuevo'] == 'n') {
			$contenido['etiqueta'] = 'Nuevo';
		} else {
			$contenido['nuevo'] = '';
			$contenido['etiqueta'];
		}
		echo '<div class="m2">' .
			'<p class="ctg' . $contenido['nuevo'] . '">' . $contenido['etiqueta'] . '</p>' .
			'<a href="' . $AC_DIRECTORIO . $contenido['ubicacion'] . $contenido['archivo'] . PHP_EXTENSION . '">' .
			'<div class="imagen">' .
			'<img class="img1" src="' . $AC_DIRECTORIO . 'img/' . $contenido['imagen'] . '" loading="lazy" alt="' . substr($contenido['descripcion'], 0, 50) . '...">' .
			'</div>' .
			'<p class="contexcn t14">' . substr($contenido['descripcion'], 0, 145) . '...</p></a>' .
			'</div>';
	}
	echo '</div>';
} elseif ($ex == 'CargarTema') {
	$opcionTema = fopen($AC_DIRECTORIO . 'css/opcion.php', 'r+');
	$leeropcionTema = fgets($opcionTema, 20);
	if (isset($_GET['theme'])) {
		$tema = $_GET['theme'];
		if ($tema == 'Light') {
			if ($leeropcionTema == '') $leeropcionTema = "0";
			rewind($opcionTema);
			fputs($opcionTema, 0);
		}
		if ($tema == 'Dark') {
			if ($leeropcionTema == '') $leeropcionTema = "1";
			rewind($opcionTema);
			fputs($opcionTema, 1);
		}
		$guardarUltimaOpcion = '';
	}
	fclose($opcionTema);

	$enviosGET = '';
	if (isset($URL_FINAL)) {
		$enviosGET = '?';
		if ($URL_WEB == 'localhost') {
			$enviosGET = $AC_DIRECTORIO . darFormatoURL_FINAL($URL, "");


			#echo 'EnviosGET: '.$enviosGET;
			if (empty($_GET)) {
				$enviosGET = $enviosGET . '?';
			} else {
				$enviosGET = $enviosGET . '&';
			}
		}
	}

	if ($leeropcionTema == 0) {
		$cargarEstilo = 'light.css';
		$colores = $enviosGET . 'theme=Dark';
		$emojiTema = 'fas fa-moon';
	}
	if ($leeropcionTema == 1) {
		$cargarEstilo = 'dark.css';
		$colores = $enviosGET . 'theme=Light';
		$emojiTema = 'fas fa-sun';
	}
} elseif ($ex == 'Contador') {
	if (!file_exists($UbicacionArchivoContador)) {
		file_put_contents($UbicacionArchivoContador, "0");
	}

	$contador = file_get_contents($UbicacionArchivoContador);
	if (!isset($NoAumentarContador)) {
		$contador++;
	}
	file_put_contents($UbicacionArchivoContador, $contador);
} elseif ($ex == 'CargarImagenes') {
	$directorio = $directorio ?? $AC_DIRECTORIO . 'img/';
	$archivos = scandir($directorio);

	echo '<div class="flexCon">';
	foreach ($archivos as $archivo) {
		if ($archivo !== '.' && $archivo !== '..') {
			echo '<div class="m2"><p class="ctg">' . $archivo . '</p><div class="imagen"><img class="img1" loading="lazy" src="' . $directorio . $archivo . '"></div></div>';
		}
	}
	echo '</div>';
} elseif ($ex == 'VerificarCarpetas') {
	if (!file_exists($vericar)) {
		mkdir($vericar);
		$pasaen = '&ms=err&msm=direcreados';
	}
} elseif ($ex == 'CrearCarpetas') {
	if (!file_exists($crear_carpetas)) {
		if (!mkdir($crear_carpetas, 0777, true));
	}
} elseif ($ex == 'scrDispladi') {
	#0.Cabeza, 1. Menu, 2. Contenido, 3. Menu Lateral, 4. Pie
	#0.Mostrar, 1. Cantidad de Elementos, 2. C. Scripts, 3. Elementos
	$dirScripts = $AC_DIRECTORIO . 'inc/views/admin/scripts/';
	$scrDispla = $dirScripts . 'scrDispla.php';
	if (file_exists($scrDispla)) {
		require_once $scrDispla;
	}
	$scrCUS = $dirScripts . 'us/scrCUS.php';
	if (file_exists($scrCUS)) {
		require_once $scrCUS;
	}
	if ($displadi[$elem][0] != ''):
		$me = '';
		$mef = '';
		switch ($elem) {
			case 0:
				$mi = '<header>';
				$mif = '</header>';
				break;
			case 1:
				$mi = '<nav>';
				$mif = '</nav>';
				break;
			case 2:
				$mi = '<div>';
				$mif = '</div>';
				break;
			case 3:
				$mi = '<div class="menu-lateral">';
				$me = '<div class="bord">';
				$mef = '</div>';
				$mif = '</div>';
				break;
			case 4:
				$mi = '<footer>';
				$me = '<div>';
				$mef = '</div>';
				$mif = '</footer>';
				break;
		}
		echo $mi;
		echo $elem == 3 ? viewAdsThumbnail(CONFIG["ads"] ?? [], $AC_DIRECTORIO) : "";
		for ($ii = 0; $ii < $displadi[$elem][1]; $ii++):
			if ($displadi[$elem][2][$ii][0] != ''):
				echo $me;
				$ver = '';
				if ($displadi[$elem][2][$ii][1] != '' && $elem != 2) {
					$ver = '<hr>';
				}
				echo '<p>' . $displadi[$elem][2][$ii][1] . '</p>' . $ver;
				if ($displadi[$elem][2][$ii][2] != '') {
					echo $displadi[$elem][2][$ii][2];
				}
				$arcMNL = $AC_DIRECTORIO . 'inc/views/admin/scripts/us/scrDisplaCUS.php';
				if (file_exists($arcMNL)) {
					require $arcMNL;
				}
				echo $mef;
			endif;
		endfor;
		echo $mif;
	endif;
}
