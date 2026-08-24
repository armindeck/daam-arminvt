<?php if(isset($TIPO) && $TIPO=='panel'){ ?>

<p class="texini">Subida de imagenes</p>
<form class="formulario" method="post" action="imagen/subir.php" enctype="multipart/form-data">
	<label>Antes de subir una imagen usa: <a target="_blank" href="https://tinypng.com/" rel="nofollow">TinyPNG</a>, para optimizar la imagen.</label><hr>
	<span>Seleccionar imagenes</span><br>
	<input type="file" accept=".jpg,.jpeg,.png,.gif" name="imagen" required><hr>
	<label>Agrega un nombre -> opcional</label><br>
	<input type="text" name="imagen_nombre" placeholder="nombre.png"><hr>
	<input name="IniSubirImagen" type="submit" value="Subir &#xf0ee"><hr>
	<span class="t14"><?php echo file_get_contents(__DIR__.'/imagen.x'); ?></span>
</form>
<?php

if (isset($_GET['dir'])): ?>

<hr><a class="boton" target="_blank" href="<?php echo $_GET['dir']; ?>">Mostrar <i class="fas fa-external-link-alt"></i></a>

<?php endif; ?>



<?php } else {

    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }

    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");

} ?>