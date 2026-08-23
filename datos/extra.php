<?php #CONTENIDO EXTRA

require_once __DIR__."/init.php";
$adminprivado = require_once __DIR__.'/admin_data.php';

$scrSecundarios=$AC_DIRECTORIO.'administracion/panel/scripts/scrSecundarios.php';
if(file_exists($scrSecundarios)){ require_once $scrSecundarios; }

$ledb='&permiso=true&replace='.htmlspecialchars("Hola%2C+soy+DBHS%2FArminVT%2C+creador+de+esta+pagina+web+avanzada.\n%0D%0A\n%0D%0A\nTodos+los+datos+los+puedes+modificar+desde+la+Administracion%2FPanel%0D%0A\n%0D%0A\nDatos+SQL%3A%0D%0A\n-Usuario%3A+admin%0D%0A\n-Contraseña%3A+Admin123%0D%0A\n%0D%0A\n%0D%0A\nRedes+sociales%3A%0D%0A\n%0D%0A\nhttps%3A%2F%2Farminvt.site%2F%0D%0A\nhttps%3A%2F%2Fdbproject.rf.gd%0D%0A\n%0D%0A\n(c)+2023+ArminVT+%2F+dbproject.rf.gd");
