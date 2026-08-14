<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='../';
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
$AC_METADESCRIPCION='none';
$AC_METADESCRIPCION2='none';
$AC_METAETIQUETA='none';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=false;
$AC_TITULO='Administracion';
$AC_DESCRIPCION=$AC_DESCRIPCION_administracion;
$AC_FECHA='03 Mar 2023 - 5:23pm';
#>>>>>>>>>>>>>>
$formulario='<p class="texini">Administracion</p>
<div class="flexCon flexCen">
    <form method="post" class="formulario">
        <p>Iniciar sesión</p><hr>
        <input type="text" name="usuario" placeholder="Usuario &#xf007">
        <input type="password" name="codigo" placeholder="Contraseña &#xf084">
        <input class="key" type="password" name="code" placeholder="Code &#xf084">
        <input type="submit" name="IniAdmin" value="Entrar &#xf007">
        <hr><p class="cen t12">~Crea algo nuevo '.$NombreAdmin.'~</p>
    </form>
</div>';
#>>>>>>>>>>>>>>
if(!empty($_POST['IniAdmin'])){
    require $AC_DIRECTORIO.'datos/extenciones/extencionDarFormato.php';
    $_SESSION['usuario']=darFormatoNoSimbolos(trim($_POST['usuario']));
    $_SESSION['codigo']=darFormato(trim($_POST['codigo']));
    $_SESSION['code']=darFormatoNoSimbolos(trim($_POST['code']));
}

if(!empty($_SESSION['usuario']) && !empty($_SESSION['codigo']) && !empty($_SESSION['code'])){
    $var=$_SESSION['usuario']; $var2=$_SESSION['codigo']; $var3=$_SESSION['code'];
    
    if($var===$adminprivado['usuario'] && $var2===$adminprivado['codigo'] && $var3===$adminprivado['code']){
        $vamos='panel/panel.php';
        header("Location:{$vamos}");
    } else { session_destroy(); header("Location: ?ms=err&msm=usuoconocod"); }
} else { $AC_CONTENIDO=$formulario.$lugarMensaje; }

if(isset($_SESSION['id']) && $_SESSION['rol'] == 5){
    $vamos='panel/panel.php';
    header("Location:{$vamos}");
}

#>>>>>>>>>>>>>>
include $AC_DIRECTORIO.'datos/displa.php';
?>