<?php #CONTENIDO POR ARMIN
$AC_DIRECTORIO='./';
require_once $AC_DIRECTORIO.'datos/datos.php';
if($_SESSION['id']){

require_once $AC_DIRECTORIO.'datos/permisos_usuarios.php';

	if(!empty($_POST['IniEliminar']) && !empty($_POST['motivos']) && !empty($_POST['aceptar']) && !empty($_POST['contrasena'])){
	    $ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';

	    $motivos=darFormatoNoSimbolos(trim($_POST['motivos']));
	    $aceptar=darFormatoNoSimbolos(trim($_POST['aceptar']));
	    $contrasena=md5(darFormato(trim($_POST['contrasena'])));
	    $id=$_SESSION['id'];

	    if($aceptar=='si' && $contrasena == $_SESSION['contrasena']){
			$verificar="SELECT * FROM usuarios WHERE id = '$id' or contrasena = '$contrasena'";
			$resultado=mysqli_query($conexion,$verificar);
			$row=mysqli_fetch_assoc($resultado);

			if($row['contrasena']){
				$eliminar="DELETE FROM usuarios WHERE id='$id'";

				$resultado=mysqli_query($conexion,$eliminar);
				session_destroy();
				header("Location: iniciar?ms=err&msm=cuentaeliminada");
			} else { header("Location: perfil_eliminar?ms=err&msm=contrainco"); }
		} else { header("Location: perfil_eliminar?ms=err&msm=datosnocum"); }
	}else { header("Location: perfil_eliminar?ms=err&msm=noenvdatos"); }
} else { header("Location: iniciar?ms=err&msm=noexid"); }
?>