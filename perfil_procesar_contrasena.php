<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
require_once $AC_DIRECTORIO.'datos/datos.php';
if($_SESSION['id']){

require_once $AC_DIRECTORIO.'datos/permisos_usuarios.php';

	if(!empty($_POST['IniActualizar']) && !empty($_POST['contrasena']) && !empty($_POST['contrasenanueva']) && !empty($_POST['contrasenarepetir'])){
	    $ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';

	    $ccontra=darFormato(trim($_POST['contrasena']));
	    $cnueva=darFormato(trim($_POST['contrasenanueva']));
	    $crepetir=darFormato(trim($_POST['contrasenarepetir']));
	    
	    $contrasena=md5($ccontra);
	    $contrasenanueva=md5($cnueva);
	    $contrasenarepetir=md5($crepetir);

	    $usuario=$_SESSION['usuario'];
		$email=$_SESSION['email'];
	    $id=$_SESSION['id'];

		if(
	        strlen($ccontra) >= 4 && strlen($ccontra) <= 30 &&
	        strlen($cnueva) >= 4 && strlen($cnueva) <= 30 &&
	        strlen($crepetir) >= 4 && strlen($crepetir) <= 30 &&
	        $contrasena == $_SESSION['contrasena'] &&
	        $contrasenanueva != $_SESSION['contrasena'] &&
	        $contrasenarepetir == $contrasenanueva
	    ) {

		$verificar="SELECT * FROM usuarios WHERE usuario = '$usuario' or email = '$email' or contrasena = '$contrasena'";
		$resultado=mysqli_query($conexion,$verificar);
		$row=mysqli_fetch_assoc($resultado);

		if($row['contrasena']){
			$actualizar="UPDATE usuarios SET contrasena='$contrasenarepetir' WHERE id='$id'";
			$resultado=mysqli_query($conexion,$actualizar);
			session_destroy();
			header("Location: iniciar?ms=exi&msm=cuentaactualizada");
		} else { header("Location: perfil_editar_contrasena?ms=err&msm=contrainco"); }
	} else { header("Location: perfil_editar_contrasena?ms=err&msm=datosnocum"); }
}else { header("Location: perfil_editar_contrasena?ms=err&msm=noenvdatos"); }
} else { header("Location: iniciar?ms=err&msm=noexid"); }
?>