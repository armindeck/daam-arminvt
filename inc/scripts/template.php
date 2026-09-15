<?php

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
				$mi = '<header class="header">';
				$mif = '</header>';
				break;
			case 1:
				$mi = '<nav class="nav">';
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
				$mi = '<footer class="footer">';
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