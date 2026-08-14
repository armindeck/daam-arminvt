<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='../';
require_once $AC_DIRECTORIO.'datos/contenidos/cn_administracion-index.php';
$AC_UBICACION=$opc11;
$AC_ARCHIVO=$opc12;
require_once $AC_DIRECTORIO.'datos/datos.php';
$AC_METADESCRIPCION=$opc1;
$AC_METADESCRIPCION2=$opc1;
$AC_METAETIQUETA=$opc3;
$AC_IMG=$opc4;
$AC_EXTRA=$opc8;
$AC_TITULO=$opc5;
$AC_CATALOGO=$opc2;
$AC_DESCRIPCION=$opc6;
$AC_FECHA='2023-07-28 - 3:49pm';
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
    $ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';
    $_SESSION['usuario']=darFormatoNoSimbolos(trim($_POST['usuario']));
    $_SESSION['codigo']=darFormato(trim(md5($_POST['codigo'])));
    $_SESSION['code']=darFormatoNoSimbolos(trim(md5($_POST['code'])));
}

if(!empty($_SESSION['usuario']) && !empty($_SESSION['codigo']) && !empty($_SESSION['code'])){
    $var=$_SESSION['usuario']; $var2=$_SESSION['codigo']; $var3=$_SESSION['code'];
    
    if($var===$adminprivado['usuario'] && $var2===$adminprivado['codigo'] && $var3===$adminprivado['code']){
        $_SESSION['rol']=5;
        header("Location: panel/panel.php");
    } else { session_destroy(); header("Location: ?ms=err&msm=usuoconocod"); }
} else { $AC_CONTENIDO=$formulario.$lugarMensaje; }

if(isset($_SESSION['id']) && $_SESSION['rol'] == 5){
    header("Location: panel/panel.php");
}
require_once $AC_DIRECTORIO.'datos/displa.php';
$AC_EXISTE=$opcExiste;
$AC_ESTADO=$opcEstado;
#v0.3.1 Beta
?>