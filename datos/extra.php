<?php #CONTENIDO EXTRA
$adminprivado = require_once __DIR__.'/admin_data.php';

require_once $AC_DIRECTORIO.'administracion/panel/extras/extraVariables.php';
#MENSAJE DE INFORMACION Y ANUNCIOS
require_once $AC_DIRECTORIO.'administracion/panel/sms.php';
if ($texMensaje == true) { 
	$texMensaje='<a href="'.$link.'">
			<marquee direction="left" onmouseout="start();" onmouseover="stop();" scrollamount="10" scrolldelay="145">
				<p>'.$sms.'</p>
			</marquee>
		</a>';
} else { $texMensaje=''; }

if($mosAnuncio==true){
$anuncio='<hr><a target="_blank" href="'.$linkanuncio.'"><img class="anuncio" src="'.$AC_DIRECTORIO.'img/'.$linkimga.'"></a>';
} else { $anuncio=''; }

if($mosAnuncio2==true){
$anuncio2='<a target="_blank" href="'.$linkanuncio2.'"><p class="ctgn">Anuncio</p><img class="anuncio2" src="'.$AC_DIRECTORIO.'img/'.$linkimga2.'"></a>';
} else { $anuncio2=''; }
?>