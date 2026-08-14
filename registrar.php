<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
include $AC_DIRECTORIO.'datos/datos.php';
require $AC_DIRECTORIO.'descripciones.php';
require_once $AC_DIRECTORIO.'datos/permisos_usuarios.php';
$AC_METADESCRIPCION='none';
$AC_METADESCRIPCION2='none';
$AC_METAETIQUETA='none';
$AC_IMG='arminvtmin.png';
$AC_EXTRA=false;
$AC_TITULO='Registrarse';
$AC_DESCRIPCION=$AC_DESCRIPCION_administracion;
$AC_FECHA='03 Mar 2023 - 5:23pm';
#>>>>>>>>>>>>>>
$formulario='<p class="texini">Bienvenido a la sección de registro</p>
<div class="flexCon flexCen">
    <form method="post" class="formulario">
        <p>Registrar</p><hr>
        <input type="text" name="nombre" placeholder="Nombre &#xf007" title="Nombre > 4" required>
        <input type="text" name="usuario" placeholder="Usuario &#xf007" title="Usuario > 4" required><br>
        <input type="email" name="email" placeholder="Email &#xf003" title="Email > 4" required>
        <input type="password" name="contrasena" placeholder="Contraseña &#xf084" title="Contrasena > 6" required><hr>
        <input type="submit" name="IniRegistro" value="Registrar &#xf007">
        <hr><p class="cen t12">~ Eres grande papu ~ <a href="iniciar'.$AGREGAR_PHP.'">Iniciar sesión</a></p>
    </form>
</div>';
#>>>>>>>>>>>>>>
if(isset($_SESSION['id'])){
    header("Location: perfil");
} else if(!empty($_POST['IniRegistro'])){
    require $AC_DIRECTORIO.'datos/extenciones/extencionDarFormato.php';
    $_SESSION['nombre']=darFormatoNoSimbolos(trim($_POST['nombre']));
    $_SESSION['usuario']=darFormatoNoSimbolos(trim($_POST['usuario']));
    $_SESSION['email']=darFormato(trim($_POST['email']));
    $_SESSION['contrasena']=darFormato(trim($_POST['contrasena']));

    $nombre=$_SESSION['nombre'];
    $usuario=$_SESSION['usuario'];
    $email=$_SESSION['email'];
    $contrasena=$_SESSION['contrasena'];

    if(
        strlen($nombre) >= 4 && strlen($nombre) <= 50 &&
        strlen($usuario) >= 4 && strlen($usuario) <= 20 &&
        strlen($email) >= 4 && strlen($email) <= 50 &&
        strlen($contrasena) >= 6 && strlen($contrasena) <= 50
    ) {
        $verificar="SELECT * FROM usuarios WHERE usuario = '$usuario' or email = '$email'";
        $resultado=mysqli_query($conexion,$verificar);
        $row=mysqli_fetch_assoc($resultado);
        if($usuario == $row['usuario'] || $email == $row['email']){
            header("Location: registrar.php?ms=err&msm=usuoemare");
        } else {
            $en=md5($contrasena);
            $insertar="INSERT INTO usuarios(usuario, contrasena, nombre, email, rol, registro, inicio, redsocial) VALUES('$usuario','$en','$nombre','$email','0','$fecha','$fecha','')";

            $resultado=mysqli_query($conexion,$insertar);

            if($resultado){ header("Location: iniciar.php?ms=exi&msm=regiexitoso"); } else { header("Location: registrar.php?ms=err&msm=regifallido"); }
        }
    } else { header("Location: registrar.php?ms=err&msm=datosnocum"); }
}

$AC_CONTENIDO=$formulario.$lugarMensaje;

#>>>>>>>>>>>>>>
include $AC_DIRECTORIO.'datos/displa.php';
?>