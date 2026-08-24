<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
$AC_METADESCRIPCION='none';
$AC_METADESCRIPCION2='none';
$AC_METAETIQUETA='none';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=false;
$AC_TITULO='Iniciar sesión';
$AC_DESCRIPCION='Iniciar sesión';
$AC_FECHA='03 Mar 2023 - 5:23pm';
#>>>>>>>>>>>>>>
$formulario='<p class="texini">Bienvenido a la sección de inicio de sesión</p>
<div class="flexCon flexCen">
    <form method="post" class="formulario">
        <p>Iniciar sesión</p><hr>
        <input type="text" name="usuario" placeholder="Usuario &#xf007" required>
        <input type="password" name="contrasena" placeholder="Contraseña &#xf084" required><hr>
        <input type="submit" name="IniSesion" value="Iniciar &#xf007">
        <hr><p class="cen t12">~ Eres grande papu ~ <a href="registrar'.PHP_EXTENSION.'">Registrarse</a></p>
    </form>
</div>';
#>>>>>>>>>>>>>>
if(isset($_SESSION['id'])){
    header("Location: perfil");
} else if(!empty($_POST['IniSesion'])){
    require_once $AC_DIRECTORIO.'datos/permisos_usuarios.php';
    $ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';
    $_SESSION['usuario']=darFormatoNoSimbolos(trim($_POST['usuario']));
    $_SESSION['contrasena']=darFormato(trim($_POST['contrasena']));

    $usuario=$_SESSION['usuario'];
    $contrasena=md5($_SESSION['contrasena']);

    if(
        strlen($usuario) >= 4 && strlen($usuario) <= 20 &&
        strlen($contrasena) >= 6 && strlen($contrasena) <= 100
    ) {

        $validar="SELECT * FROM usuarios where usuario = '$usuario' and contrasena = '$contrasena'";
        $resultado=mysqli_query($conexion,$validar);
        $filas=mysqli_num_rows($resultado);
        if ($filas) {
            $row=mysqli_fetch_assoc($resultado);
            $_SESSION['id']=$row['id'];
            $_SESSION['nombre']=$row['nombre'];
            $_SESSION['usuario']=$row['usuario'];
            $_SESSION['contrasena']=$row['contrasena'];
            $_SESSION['email']=$row['email'];
            $_SESSION['rol']=$row['rol'];
            $_SESSION['registro']=$row['registro'];
            $_SESSION['inicio']=$row['inicio'];
            $_SESSION['redsocial']=$row['redsocial'];
            header("Location: perfil?sesion=true");
        } else { header("Location: iniciar.php?ms=err&msm=datosingreinco"); session_destroy(); }
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    } else { header("Location: iniciar.php?ms=err&msm=datosnocum"); session_destroy(); }
}

$AC_CONTENIDO=$formulario.$lugarMensaje;

#>>>>>>>>>>>>>>
include $AC_DIRECTORIO.'datos/displa.php';
?>