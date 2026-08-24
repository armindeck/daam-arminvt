<?php if(isset($TIPO) && $TIPO=='panel'){ ?>
<p class="texini">Creador y eliminador de archivos y carpetas <span class="t12"><?php echo file_get_contents(__DIR__.'/archivos.x') ?></span></p>
<form class="formulario" method="post" action="archivos/procesa.php">
	<span>Eliminar archivo</span><br>
	<input type="text" name="archivo" value="" placeholder="archivo.php">
	<input name="IniEliminarArchivo" type="submit" value="Eliminar &#xf1f8">
</form>
<form class="formulario" method="post" action="archivos/procesa.php">
	<span>Eliminar carpeta</span><br>
	<input type="text" name="carpeta" placeholder="carpeta">
	<input name="IniEliminarCarpeta" type="submit" value="Eliminar &#xf1f8">
</form>
<form class="formulario" method="post" action="archivos/procesa.php">
	<span>Crear carpeta</span><br>
	<input type="text" name="carpeta" placeholder="carpeta">
	<input name="IniCrearCarpeta" type="submit" value="Crear &#xf0fe">
</form>
<form class="formulario" method="post" action="archivos/procesa.php">
	<span>Crear archivo</span><br>
	<input type="text" name="archivo" placeholder="archivo.php">
	<input name="IniCrearArchivo" type="submit" value="Crear &#xf0fe">
</form>
<form class="formulario" method="post" action="archivos/procesa.php">
	<span>Renombrar</span><br>
	<input type="text" name="antiguo" placeholder="antiguo.php">
	<input type="text" name="nuevo" placeholder="nuevo.php">
	<input name="IniCambiarNombre" type="submit" value="Renombrar &#xf0fe">
</form>
<?php } else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>