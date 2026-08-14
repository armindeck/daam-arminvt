<?php if(isset($TIPO) && $TIPO=='panel'){ ?>
<p class="texini">Creador y eliminador de archivos y carpetas <span class="t14">v0.3 Beta</span></p>
<form class="formulario" method="post" action="actualizar.php">
	<span>Eliminar archivo</span><br>
	<input type="text" name="archivo" value="">
	<input name="IniEliminarArchivo" type="submit" value="Eliminar &#xf1f8">
</form>
<form class="formulario" method="post" action="actualizar.php">
	<span>Eliminar carpeta</span><br>
	<input type="text" name="carpeta">
	<input name="IniEliminarCarpeta" type="submit" value="Eliminar &#xf1f8">
</form>
<form class="formulario" method="post" action="actualizar.php">
	<span>Crear carpeta</span><br>
	<input type="text" name="carpeta">
	<input name="IniCrearCarpeta" type="submit" value="Crear &#xf0fe">
</form>
<form class="formulario" method="post" action="actualizar.php">
	<span>Crear archivo</span><br>
	<input type="text" name="archivo">
	<input name="IniCrearArchivo" type="submit" value="Crear &#xf0fe">
</form>
<?php } else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>