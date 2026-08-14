<?php if(isset($TIPO)){ if($TIPO='panel'){

if(isset($_GET['ac'])){

	$ac=$_GET['ac'];



	switch($ac){
		case 'verificar': require_once 'verificar.php'; break;
		case 'creador': require_once 'creador.php'; break;

		case 'archivos': echo '<form class="formulario" method="post" action="actualizar.php"><span>Eliminar archivo</span><br><input type="text" name="archivo" value="administracion/panel/creadas/"><input name="IniEliminarArchivo" type="submit" value="Eliminar &#xf1f8"></form><form class="formulario" method="post" action="actualizar.php"><span>Eliminar carpeta</span><br><input type="text" name="carpeta"><input name="IniEliminarCarpeta" type="submit" value="Eliminar &#xf1f8"></form><form class="formulario" method="post" action="actualizar.php"><span>Crear carpeta</span><br><input type="text" name="carpeta"><input name="IniCrearCarpeta" type="submit" value="Crear &#xf0fe"></form><form class="formulario" method="post" action="actualizar.php"><span>Crear archivo</span><br><input type="text" name="archivo"><input name="IniCrearArchivo" type="submit" value="Crear &#xf0fe"></form>'; break;

		case 'anuncios': require_once 'anuncios.php'; break;

		case 'blog': require_once 'formblog.php'; break;

		case 'configuracion': require_once 'configuraciones.php'; break;

		case 'editor': require_once 'editor.php'; break;

		default: echo 'Oh! no existe el get ingresado...'; break;

	}

}

} } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; require_once $AC_DIREC.'error.php'; } ?>