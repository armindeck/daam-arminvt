<?php

$lugarMensaje='';



if (isset($_GET['ms']) && isset($_GET['msm'])) {

	$cmensaje=$_GET['ms']; $dmensaje=$_GET['msm'];

switch ($cmensaje) {

	case 'exi': $bgc='bgverde'; break;

	case 'err': $bgc='bgrojo'; break;

	case 'act': $bgc='bgazul'; break;

	default: $bgc=''; break;

}



switch ($dmensaje) {

	case 'datosactualizados': $conmensaje='Los datos se actualizaron correctamente.'; break;
	case 'datosguardados': $conmensaje='Los datos se guardaron correctamente.'; break;

	case 'datosnoactualizados': $conmensaje='Los datos NO se actualizaron correctamente.'; break;

	case 'datosincorrectos': $conmensaje='Los datos fueron incorrectos.'; break;

	case 'datosingreinco': $conmensaje='Los datos ingresados son incorrectos.'; break;

	case 'cuentaactualizada': $conmensaje='La cuenta fue actualizada con exito.'; break;

	case 'cuentanoactualizada': $conmensaje='La cuenta no fue actualizada.'; break;

	case 'cuentaeliminada': $conmensaje='La cuenta fue eliminada.'; break;

	case 'sesionfinalizada': $conmensaje='Sesión finalizada.'; break;

	case 'oherror': $conmensaje='Oh!. hubo un error...'; break;

	case 'noselecex': $conmensaje='No se selecciono ningúna extención'; break;

	case 'noexvarex': $conmensaje='No existe la variable <b>ex</b>'; break;

	case 'contrainco': $conmensaje='La contraseña es incorrecta.'; break;

	case 'datosnocum': $conmensaje='Los datos ingresados no cumplen con los solicitados.'; break;

	case 'noenvdatos': $conmensaje='No hay envios de datos.'; break;

	case 'noexid': $conmensaje='No existe el ID.'; break;

	case 'usuoconocod': $conmensaje='El usuario, la contraseña o el codigo son incorrectas.'; break;

	case 'usuoemare': $conmensaje='El nombre de usuario o el email ya se encuentran registrados.'; break;

	case 'regiexitoso': $conmensaje='El registro fue exitoso.'; break;

	case 'regifallido': $conmensaje='El registro fallo.'; break;

	case 'getnoex': $conmensaje='Oh! no existe el get ingresado...'; break;

	case 'elimiarchivo': $conmensaje='El archivo fue eliminado!'; break;
	case 'archivoselimi': $conmensaje='Los archivos fueron eliminados!'; break;
	case 'exisarchivo': $conmensaje='Oh! el archivo existe!'; break;
	case 'exisarchivo2': $conmensaje='Oh! los archivos existen! use: Modificador'; break;
	case 'noexisarchivo': $conmensaje='Oh! no existe el archivo!'; break;
	case 'direcreado': $conmensaje='Directorio creado!'; break;
	case 'direxiste': $conmensaje='Oh! el directorio existe!'; break;
	case 'varcarpetanoexiste': $conmensaje='Oh! la variable carpeta no existe!'; break;
	case 'informeverificar': $conmensaje='Atención, se muestra el siguiente informe:'; break;
	case 'entrapublicada': $conmensaje='La entrada fue publicada!'; break;
	case 'borradoresllenos': $conmensaje='Oh! parece que los borradores se encuentran llenos!'; break;

	#case '': $conmensaje=''; break;

	#default: $conmensaje='No hay mensaje que mostrar.'; break;

}



$lugarMensaje='<p class="texini '.$bgc.'">'.$conmensaje.'</p>';

}

?>