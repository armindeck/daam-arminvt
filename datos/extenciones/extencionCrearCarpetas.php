<?php #CREADOR DE CARPETAS
#$crear_carpetas='./carpeta1/carpeta2/';
if(file_exists($crear_carpetas)){
} else {
	if(!mkdir($crear_carpetas, 0777, true));
}
?>