<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='../../';
require $AC_DIRECTORIO.'datos/datos.php';

$acceso=true; require_once 'panel_acc.php';

/*
if(isset($_SESSION['id']) && $_SESSION['rol'] == 5){ $acceso=true; require_once 'panel_acc.php'; }

else if(!empty($_SESSION['usuario']) && !empty($_SESSION['codigo']) && !empty($_SESSION['code'] && $_SESSION['rol'])){
    $var=$_SESSION['usuario']; $var2=$_SESSION['codigo']; $var3=$_SESSION['code'];

    if($var===$adminprivado['usuario'] && $var2===$adminprivado['codigo'] && $var3===$adminprivado['code']){

        $acceso=true; require_once 'panel_acc.php';

    } else { $lugar='../../?ms=err&msm=usuoconocod'; header("Location: {$lugar}"); }
} else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
    }
*/
?>