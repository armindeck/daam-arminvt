<?php if(isset($TIPO)){ if($TIPO='panel'){ ?>
<form class="flexCon" method="post" action="actualizar.php">
	<div class="formulario">
	<p class="tb">Nombres</p><hr>
	<span>Admin:</span> <input type="text" name="cfg0" value="<?php echo $NombreAdmin; ?>" placeholder="Admin"><br>
	<span>Admin Completo:</span> <input type="text" name="cfg1" value="<?php echo $NombreAdminCompleto; ?>" placeholder="Admin Completo"><br>
	<span>Web:</span> <input type="text" name="cfg2" value="<?php echo $NombreWeb; ?>" placeholder="Web"><br>
	<span>Facebook:</span> <input type="text" name="cfg3" value="<?php echo $NombreFacebook; ?>" placeholder="Facebook"><br>
	<span>YouTube:</span> <input type="text" name="cfg4" value="<?php echo $NombreYouTube; ?>" placeholder="YouTube"><br>
	<span>Twitter:</span> <input type="text" name="cfg5" value="<?php echo $NombreTwitter; ?>" placeholder="Twitter"><br>
	<span>Patreon:</span> <input type="text" name="cfg6" value="<?php echo $NombrePatreon; ?>" placeholder="Patreon"><br>
	<span>Tiktok:</span> <input type="text" name="cfg7" value="<?php echo $NombreTiktok; ?>" placeholder="Tiktok"><br>
	<span>Kofi:</span> <input type="text" name="cfg8" value="<?php echo $NombreKofi; ?>" placeholder="Kofi">
	</div>
	<div class="formulario">
	<p class="tb">Usuarios</p><hr>
	<span>Admin:</span> <input type="text" name="cfg9" value="<?php echo $UsuarioAdmin; ?>" placeholder="Admin"><br>
	<span>Facebook:</span> <input type="text" name="cfg10" value="<?php echo $UsuarioFacebook; ?>" placeholder="Facebook"><br>
	<span>YouTube:</span> <input type="text" name="cfg11" value="<?php echo $UsuarioYouTube; ?>" placeholder="YouTube"><br>
	<span>Twitter:</span> <input type="text" name="cfg12" value="<?php echo $UsuarioTwitter; ?>" placeholder="Twitter"><br>
	<span>Patreon:</span> <input type="text" name="cfg13" value="<?php echo $UsuarioPatreon; ?>" placeholder="Patreon"><br>
	<span>Tiktok:</span> <input type="text" name="cfg14" value="<?php echo $UsuarioTiktok; ?>" placeholder="Tiktok"><br>
	<span>Kofi:</span> <input type="text" name="cfg15" value="<?php echo $UsuarioKofi; ?>" placeholder="Kofi"><hr>
	<p class="tb">Enlaces</p><hr>
	<span>Web:</span> <input type="text" name="cfg16" value="<?php echo $EnlaceWeb; ?>" placeholder="http://web.com"><br>
	<span>Web no https:</span> <input type="text" name="cfg17" value="<?php echo $EnlaceWebNoHttps; ?>" placeholder="web.com"><br>
	<span>Activar .PHP:</span> <input type="checkbox" name="cfg18" <?php
	if($AGREGAR_PHP=='.php'){ echo 'checked'; } ?>><br>
	<span>Activar HTTPS:</span> <input type="checkbox" name="cfg19" <?php
	if($EnlaceWebS=='https://'.$EnlaceWebNoHttps.'/'){ echo 'checked'; } ?>>
	</div>
	<div class="formulario" style="width:100%;">
		<span>Extras</span> <textarea name="cfg20" placeholder="Variables y resultados extras"><?php $mostrar=file_get_contents('extras/extraVariables.php'); echo $mostrar; ?></textarea>
	</div>
	<div class="formulario" style="width:100%;">
		<span>Scripts</span> <textarea class="texeditor2" name="cfg21" placeholder="Analitycs"><?php $mostrar=file_get_contents('extras/extraScripts.php'); echo $mostrar; ?></textarea>
	</div>
	<div>
        <input class="boton" type="reset" value="Cancelar &#xf00d">
        <input class="boton" type="submit" name="IniConfig" value="Actualizar &#xf044">
    </div>
</form>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>