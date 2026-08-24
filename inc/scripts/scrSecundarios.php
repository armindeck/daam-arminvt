<?php #scrSecundarios ?>

<?php
$direccion_perfil_temas=$AC_DIRECTORIO.'perfiles/temas/';
if(isset($_SESSION['usuario']) && file_exists($direccion_perfil_temas.'tm'.$_SESSION['usuario'].'.txt')){
$TemaPorElUsuario = file_get_contents($direccion_perfil_temas.'tm'.$_SESSION['usuario'].'.txt');
$PermisoPorElUsuarioTema=true;
}
?>