<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
require_once $AC_DIRECTORIO.'datos/datos.php';
if($_SESSION['id']){

require_once $AC_DIRECTORIO.'datos/permisos_usuarios.php';

	if(!empty($_POST['IniActualizar']) && !empty($_POST['nombre']) && !empty($_POST['usuario']) && !empty($_POST['email']) && !empty($_POST['redsocial']) && !empty($_POST['contrasena'])){
	    require $AC_DIRECTORIO.'datos/extenciones/extencionDarFormato.php';

	    $nombre=darFormatoNoSimbolos(trim($_POST['nombre']));
	    $usuario=darFormatoNoSimbolos(trim($_POST['usuario']));
	    $email=darFormato(trim($_POST['email']));
	    $redsocial=darFormato(trim($_POST['redsocial']));
	    $contrasena=md5(darFormato(trim($_POST['contrasena'])));
	    $id=$_SESSION['id'];

	    if(
	        strlen($nombre) >= 4 && strlen($nombre) <= 50 &&
	        strlen($usuario) >= 4 && strlen($usuario) <= 20 &&
	        strlen($email) >= 4 && strlen($email) <= 50 &&
	        strlen($redsocial) >= 6 && strlen($redsocial) <= 100 &&
	        $contrasena == $_SESSION['contrasena']
	    ) {


		$verificar="SELECT * FROM usuarios WHERE usuario = '$usuario' or email = '$email' or contrasena = '$contrasena'";
		$resultado=mysqli_query($conexion,$verificar);
		$row=mysqli_fetch_assoc($resultado);

		if($row['contrasena']){
			$actualizar="UPDATE usuarios SET nombre='$nombre', usuario='$usuario', email='$email', redsocial='$redsocial' WHERE id='$id'";

			$resultado=mysqli_query($conexion,$actualizar);
			if ($usuario !=$_SESSION['usuario']) {
				session_destroy();
				header("Location: iniciar?ms=exi&msm=cuentaactualizada");
			}
			header("Location: perfil?ms=exi&msm=cuentaactualizada");
		} else { header("Location: perfil_editar?ms=err&msm=contrainco"); }
	} else { header("Location: perfil_editar?ms=err&msm=datosnocum"); }
}else { header("Location: perfil_editar?ms=err&msm=noenvdatos"); }
} else { header("Location: iniciar?ms=err&msm=noexid"); }
?>