<?php #CONTENIDO EXTRA

$adminprivado = require_once __DIR__.'/admin_data.php';

$scrSecundarios=$AC_DIRECTORIO.'administracion/panel/scripts/scrSecundarios.php';
if(file_exists($scrSecundarios)){ require_once $scrSecundarios; }

#MENSAJE DE INFORMACION Y ANUNCIOS
$dt_anuncio=$AC_DIRECTORIO.'datos/anuncio.php';
if(file_exists($dt_anuncio)){
	require_once $dt_anuncio;
}

?>