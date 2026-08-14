<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
if($_SESSION['id']){
if ($_SESSION['rol'] == 0) {
    $rol='Registrado';
}
if($_SESSION['rol'] == 5){ $rol='Administrador'; }
if(strlen($_SESSION['redsocial'])==0){ $redSocial=$EnlaceWeb; } else { $redSocial=$_SESSION['redsocial']; }

$AC_METADESCRIPCION='Editar perfil';
$AC_METADESCRIPCION2='Acerca del creador de '.$NombreWeb.' - '.$NombreAdmin;
$AC_METAETIQUETA='Acerca de '.$NombreAdmin.', acerca de '.$NombreAdminCompleto;
$AC_IMG='arminvt1.png';
$AC_EXTRA=true;
$AC_TITULO='Editar cuenta de @'.$_SESSION['usuario'];
$AC_DESCRIPCION='Editar perfil';
$AC_FECHA='22 Feb 2023 - 1:20pm';
$AC_CONTENIDO='<p class="texini">Sección de edición de cuenta de '.$_SESSION['nombre'].'</p>
<p class="texini t14">Para editar la contraseña debes llenar el formulario.</p>'.$lugarMensaje.'
<div class="flexCon">
	<div class="m2">
		<div class="imagen">
            <img class="img2" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvt1.png" title="Armin 0.1 Beta by '.$NombreWeb.'">
		</div>
		<p class="contexcn t10">Armin v0.1 Beta</p>
	</div>
    <form method="post" action="perfil_procesar_contrasena.php" class="formulario">
    <p class="tb">Contraseñas</p><hr>
    <label>Actual</label> <input type="password" name="contrasena" placeholder="Contraseña" required><hr>
    <label>Nueva</label> <input type="password" name="contrasenanueva" placeholder="Nueva" required><hr>
    <label>Repetir</label> <input type="password" name="contrasenarepetir" placeholder="Repetir" required><hr>
    <input type="submit" name="IniActualizar" value="Actualizar">
    </form>
</div>
<p class="texini t14"><a class="boton" href="perfil'.$AGREGAR_PHP.'">Volver</a>';
include $AC_DIRECTORIO.'datos/displa.php';
} else { header("Location: iniciar"); }
?>