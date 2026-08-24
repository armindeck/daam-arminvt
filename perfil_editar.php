<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
if($_SESSION['id']){
if ($_SESSION['rol'] == 0) {
    $rol='Registrado';
}
if($_SESSION['rol'] == 5){ $rol='Administrador'; }
if(strlen($_SESSION['redsocial'])==0){ $redSocial=CONFIG["page_link"] ?? ""; } else { $redSocial=$_SESSION['redsocial']; }

$AC_METADESCRIPCION='Editar perfil';
$AC_METADESCRIPCION2='Editar perfil';
$AC_METAETIQUETA='editar perfil';
$AC_IMG='arminvt1.png';
$AC_EXTRA=true;
$AC_TITULO='Editar cuenta de @'.$_SESSION['usuario'];
$AC_DESCRIPCION='Editar perfil';
$AC_FECHA='22 Feb 2023 - 1:20pm';
$AC_CONTENIDO='<p class="texini">Sección de edición de cuenta de '.$_SESSION['nombre'].'</p>
<p class="texini t14">Para editar la cuenta debes llenar el formulario.</p>'.$lugarMensaje.'
<div class="flexCon">
	<div class="m2">
		<div class="imagen">
            <img class="img2" loading="lazy" src="'.$AC_DIRECTORIO.'img/arminvt1.png" title="Image">
		</div>
		<p class="contexcn t10">Armin v0.1 Beta</p>
	</div>
    <form method="post" action="perfil_procesar.php" class="formulario">
    <p class="t14 tb">Información</p>
    <label>Nombre</label> <input type="text" name="nombre" placeholder="" value="'.$_SESSION['nombre'].'" required><br>
    <label>Usuario</label> <input type="text" name="usuario" placeholder="" value="'.$_SESSION['usuario'].'" required><br>
    <label>Email</label> <input type="text" name="email" placeholder="" value="'.$_SESSION['email'].'" required><br>
    <label>Tema</label>
    <select name="tema">
        <option value="temaDefault">Default</option>
        <option value="temaLight">Light</option>
        <option value="temaLight2">Light2</option>
        <option value="temaDark">Dark</option>
        <option value="temaDark2">Dark2</option>
        <option value="temaBlue">Dark Blue</option>
    </select><br>
    <label>Red Social</label> <input type="text" name="redsocial" placeholder="" value="'.$redSocial.'" required><br>
    <label>Contraseña</label> <input type="password" name="contrasena" placeholder="Contraseña" required><hr>
    <input type="submit" name="IniActualizar" value="Actualizar">
    </form>
</div>
<p class="texini t14"><a class="boton" href="perfil'.PHP_EXTENSION.'">Volver</a>';
include $AC_DIRECTORIO.'datos/displa.php';
} else { header("Location: iniciar"); }
?>