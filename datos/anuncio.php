<?php
$dpAnuncio=$AC_DIRECTORIO.'administracion/panel/dependencias/dpanuncio.php';
if(file_exists($dpAnuncio)):
	require_once $dpAnuncio;

	if(isset($texMensaje) && $texMensaje == true) {

		$texMensaje='<a href="'.$link.'">
				<marquee direction="left" onmouseout="start();" onmouseover="stop();" scrollamount="10" scrolldelay="145">
					<p>'.$sms.'</p>
				</marquee>
			</a>';
	} else { $texMensaje=''; }

	if(isset($mosAnuncio) && $mosAnuncio==true){
		$anuncio='<hr><a target="_blank" href="'.$linkanuncio.'">
			<img class="anuncio" src="'.$AC_DIRECTORIO.'img/'.$linkimga.'">
		</a>';
	} else { $anuncio=''; }

	if(isset($mosAnuncio2) && $mosAnuncio2==true){
		$anuncio2='<a target="_blank" href="'.$linkanuncio2.'">
			<img class="anuncio2" src="'.$AC_DIRECTORIO.'img/'.$linkimga2.'">
		</a>';
	} else { $anuncio2=''; }
endif;
?>