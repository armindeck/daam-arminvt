<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
require_once $AC_DIRECTORIO.'datos/permisos_usuarios.php';
if($_SESSION['id']){
if ($_SESSION['rol'] == 0) {
    $rol='Registrado';
}
if(!isset($TemaPorElUsuario)){ $TemaPorElUsuario='Default'; }
$adm='';
if($_SESSION['rol'] == 5){ $rol='Administrador'; $adm='<a class="boton2" href="'.$AC_DIRECTORIO.'administracion/">Administración</a>'; }
if(strlen($_SESSION['redsocial'])==0){ $redSocial=CONFIG["page_link"] ?? ""; } else { $redSocial=$_SESSION['redsocial']; }
///Inicio sesion
$id=$_SESSION['id'];
$actualizar="UPDATE usuarios SET inicio='fecha' WHERE id='$id'";
$resultado=mysqli_query($conexion,$actualizar);

$AC_METADESCRIPCION='Perfil';
$AC_METADESCRIPCION2='Perfil';
$AC_METAETIQUETA='Perfil';
$AC_IMG='arminvt1.png';
$AC_EXTRA=true;
$AC_TITULO='Perfil de '.$_SESSION['nombre'];
$AC_DESCRIPCION='Perfil';
$AC_FECHA='22 Feb 2023 - 1:20pm';
$AC_CONTENIDO='<p class="texini">Bienvenid@ '.$_SESSION['nombre'].'</p>
<p class="texini t14">En este apartado encontraras los comentarios, datos y configuracion de tu cuenta.</p>'.$lugarMensaje.'
<div class="flexCon">
	<div class="m2">
		<div class="imagen">
            <img class="img2" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvt1.png" title="Image">
		</div>
		<p class="contexcn t10">Armin v0.1 Beta</p>
	</div>
    <ol>
    <li class="t14 tb">Información</li>
    <li class="t12">Nombre: '.$_SESSION['nombre'].'</li>
    <li class="t12">Usuario: '.$_SESSION['usuario'].'</li>
    <li class="t12">Rol: '.$rol.'</li>
    <li class="t12">Email: '.$_SESSION['email'].'</li>
    <li class="t12">Registro: '.$_SESSION['registro'].'</li>
    <li class="t12">Inicio: '.$_SESSION['inicio'].'</li>
    <li class="t12">Red social: '.$redSocial.'</li>
    <li class="t12">Tema: '.$TemaPorElUsuario.'</li>
    </ol>
</div>
<p class="texini t14">'.$adm.'<a class="boton" href="perfil_editar'.PHP_EXTENSION.'">Editar cuenta</a> <a class="boton2" href="perfil_editar_contrasena'.PHP_EXTENSION.'">Cambiar contraseña</a> <a class="boton" href="perfil_eliminar'.PHP_EXTENSION.'">Eliminar cuenta</a></p>';
include $AC_DIRECTORIO.'datos/displa.php';
} else { header("Location: iniciar"); }
?>