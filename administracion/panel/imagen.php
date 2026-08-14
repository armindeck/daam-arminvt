<?php if(isset($TIPO) && $TIPO=='panel'){ ?>

<p class="texini">Subida de imagenes <span class="t14">v0.3.1 Beta</span></p>
<form class="formulario" method="post" action="actualizar.php" enctype="multipart/form-data">
	<span>Seleccionar imagenes</span><br>
	<input type="file" accept="image/*" name="imagen">
	<input name="IniSubirImagen" type="submit" value="Subir &#xf0ee">
</form>
<?php

if (isset($_GET['dir'])): ?>

<hr><a class="boton" target="_blank" href="<?php echo $_GET['dir']; ?>">Mostrar <i class="fas fa-external-link-alt"></i></a>

<?php endif; ?>



<?php } else {

    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }

    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");

} ?>