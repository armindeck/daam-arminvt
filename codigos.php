<?php $AC_DIRECTORIO='./'; require_once 'datos/datos.php';
if(isset($_SESSION['id']) && $_SESSION['rol'] == 5) {

echo htmlspecialchars('<br> = #BR# | <b> = #BA# | </b> = #BC# | <i> = #IA# | </i> = #IC# | <hr> = #HR#');

} else { $AC_DIREC='./'; $AC_ENCONTRAR=''; require_once $AC_DIREC.'error.php'; } ?>