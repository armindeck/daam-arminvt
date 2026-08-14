<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
if($_SESSION['id']){
if ($_SESSION['rol'] == 0) {
    $rol='Registrado';
}
if($_SESSION['rol'] == 5){ $rol='Administrador'; }
if(strlen($_SESSION['redsocial'])==0){ $redSocial=$EnlaceWeb; } else { $redSocial=$_SESSION['redsocial']; }

$AC_METADESCRIPCION='Eliminar perfil';
$AC_METADESCRIPCION2='Acerca del creador de '.$NombreWeb.' - '.$NombreAdmin;
$AC_METAETIQUETA='Acerca de '.$NombreAdmin.', acerca de '.$NombreAdminCompleto;
$AC_IMG='arminvt1.png';
$AC_EXTRA=true;
$AC_TITULO='Eliminar cuenta de @'.$_SESSION['usuario'];
$AC_DESCRIPCION='Eliminar perfil';
$AC_FECHA='22 Feb 2023 - 1:20pm';
$AC_CONTENIDO='<p class="texini">Seccion de eliminacion de cuenta - '.$_SESSION['nombre'].'</p>
<p class="texini t14">Para eliminar la cuenta debe llenar el formulario.</p>'.$lugarMensaje.'
<div class="flexCon">
    <form method="post" action="perfil_procesar_eliminar.php" class="formulario">
    <p><b>Atención:</b> se eliminaran todos los datos registrados, favoritos, comentarios y todo lo demas.</p><hr>
    <label>Motivos</label>
    <select name="motivos">
        <option value="1">Tengo otra cuenta</option>
        <option value="2">Ya no usare esta plataforma</option>
        <option value="3">Otros motivos</option>
    </select><br>
    <label>Eliminar?</label>
    <select name="aceptar">
        <option value="no">No eliminar</option>
        <option value="si">Si eliminar</option>
    </select><br>
    <label>Contraseña</label> <input type="password" name="contrasena" placeholder="Contraseña" required><hr>
    <b>Recuerda que ya no tendras acceso con este usuario.</b><hr>
    <input class="boton" type="submit" name="IniEliminar" value="Eliminar cuenta">
    <input class="boton" type="reset" value="Cancelar">
    </form>
</div>
<p class="texini t14"><a class="boton" href="perfil'.$AGREGAR_PHP.'">Volver</a>';
include $AC_DIRECTORIO.'datos/displa.php';
} else { header("Location: iniciar"); }
?>