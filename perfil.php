<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
require_once $AC_DIRECTORIO.'datos/permisos_usuarios.php';
if($_SESSION['id']){
if ($_SESSION['rol'] == 0) {
    $rol='Registrado';
}
$adm='';
if($_SESSION['rol'] == 5){ $rol='Administrador'; $adm='<a class="boton" href="'.$AC_DIRECTORIOs.'administracion/">Administración</a>'; }
if(strlen($_SESSION['redsocial'])==0){ $redSocial=$EnlaceWeb; } else { $redSocial=$_SESSION['redsocial']; }
///Inicio sesion
$id=$_SESSION['id'];
$actualizar="UPDATE usuarios SET inicio='$fecha' WHERE id='$id'";
$resultado=mysqli_query($conexion,$actualizar);

$AC_METADESCRIPCION='Perfil';
$AC_METADESCRIPCION2='Acerca del creador de '.$NombreWeb.' - '.$NombreAdmin;
$AC_METAETIQUETA='Acerca de '.$NombreAdmin.', acerca de '.$NombreAdminCompleto;
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
            <img class="img2" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvt1.png" title="Armin 0.1 Beta by '.$NombreWeb.'">
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
    </ol>
</div>
<p class="texini t14">'.$adm.'<a class="boton" href="perfil_editar'.$AGREGAR_PHP.'">Editar cuenta</a> <a class="boton" href="perfil_eliminar'.$AGREGAR_PHP.'">Eliminar cuenta</a></p>';
include $AC_DIRECTORIO.'datos/displa.php';
} else { header("Location: iniciar"); }
?>