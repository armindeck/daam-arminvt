<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='../../';
include $AC_DIRECTORIO.'datos/datos.php';
if(isset($_SESSION['id']) && $_SESSION['rol'] == 5){ $acceso=true; require_once 'actualizar_acc.php'; }

else if(!empty($_SESSION['usuario']) && !empty($_SESSION['codigo']) && !empty($_SESSION['code'])){
    $var=$_SESSION['usuario']; $var2=$_SESSION['codigo']; $var3=$_SESSION['code'];

    if($var===$adminprivado['usuario'] && $var2===$adminprivado['codigo'] && $var3===$adminprivado['code']){
    	$acceso=true; require_once 'actualizar_acc.php';
    } else { header("Location: panel?ms=err&msm=usuoconocod"); }
} else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } 
?>