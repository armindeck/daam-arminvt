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
			'<a href="' . DIR . $contenido['ubicacion'] . $contenido['archivo'] . PHP_EXTENSION . '">' .
			'<div class="imagen">' .
			'<img class="img1" src="' . DIR . 'img/' . $contenido['imagen'] . '" loading="lazy" alt="' . substr($contenido['descripcion'], 0, 50) . '...">' .
			'</div>' .
			'<p class="contexcn t14">' . substr($contenido['descripcion'], 0, 145) . '...</p></a>' .
			'</div>';
	}
	echo '</div>';
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
	$directorio = $directorio ?? DIR . 'img/';
	$archivos = scandir($directorio);

	echo '<div class="flexCon">';
	foreach ($archivos as $archivo) {
		if ($archivo !== '.' && $archivo !== '..') {
			echo '<div class="m2"><p class="ctg">' . $archivo . '</p><div class="imagen"><img class="img1" loading="lazy" src="' . $directorio . $archivo . '"></div></div>';
		}
	}
	echo '</div>';
} elseif ($ex == 'CrearCarpetas') {
	if (!file_exists($crear_carpetas)) {
		if (!mkdir($crear_carpetas, 0777, true));
	}
} elseif ($ex == 'scrDispladi') {
	#0.Cabeza, 1. Menu, 2. Contenido, 3. Menu Lateral, 4. Pie
	#0.Mostrar, 1. Cantidad de Elementos, 2. C. Scripts, 3. Elementos
	$dirScripts = DIR . 'inc/scripts/';
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
		echo $elem == 3 ? viewAdsThumbnail(CONFIG["ads"] ?? [], DIR) : "";
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
				$arcMNL = DIR . 'inc/scripts/us/scrDisplaCUS.php';
				if (file_exists($arcMNL)) {
					require $arcMNL;
				}
				echo $mef;
			endif;
		endfor;
		echo $mif;
	endif;
}
