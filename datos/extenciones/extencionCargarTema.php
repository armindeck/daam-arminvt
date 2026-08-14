<?php #EXTENCION CREADA POR ARMIN
$opcionTema = fopen($AC_DIRECTORIO.'css/opcion.php','r+');
$leeropcionTema = fgets($opcionTema,20);
if(isset($_GET['theme'])){ $tema=$_GET['theme'];
    if($tema=='Light'){ if ($leeropcionTema == '') $leeropcionTema = "0"; rewind($opcionTema); fputs($opcionTema,0); }
    if($tema=='Dark'){ if ($leeropcionTema == '') $leeropcionTema = "1"; rewind($opcionTema); fputs($opcionTema,1); }
    $guardarUltimaOpcion='';
}
fclose($opcionTema);
if($leeropcionTema==0){ $cargarEstilo='light.css'; $colores='?theme=Dark'; $emojiTema='fas fa-moon'; }
if($leeropcionTema==1){ $cargarEstilo='dark.css'; $colores='?theme=Light'; $emojiTema='fas fa-sun'; }
?>