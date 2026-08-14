<?php if(isset($TIPO) && $TIPO=='panel'){ ?>
	<p class="texini">Configuración avanzada <span class="t12">v0.3.2 Beta</span></p>
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
	<span>Web:</span> <input type="url" name="cfg16" value="<?php echo $EnlaceWeb; ?>" placeholder="http://web.com"><br>
	<span>Web no https:</span> <input type="text" name="cfg17" value="<?php echo $EnlaceWebNoHttps; ?>" placeholder="web.com"><br>
	<span>Admin: </span> <input type="url" name="cfgadminexterno" placeholder="Enlace Admin" value="<?php
	if($EnlaceAdmin!="$AC_DIRECTORIOs$UsuarioAdmin$AGREGAR_PHP"){ echo $EnlaceAdmin; }
	?>"><br>
	<span>LocalHost:</span> <input type="text" name="cfglocalhost" value="<?php echo $LocalHost; ?>" placeholder="paginaweb"><br>
	<span>Versión</span> <input type="text" name="cfgversion" value="<?php echo $version; ?>" placeholder="v0.3 Beta"><hr>
		<div class="flexRow">
			<span>Activar .PHP:</span>
			<div class="der">
				<input type="checkbox" name="cfg18" <?php if($AGREGAR_PHP=='.php'){ echo 'checked'; } ?>>
			</div>
		</div><hr>
		<div class="flexRow">
			<span>Activar HTTPS:</span>
			<div class="der">
				<input type="checkbox" name="cfg19" <?php if($EnlaceWebS=='https://'.$EnlaceWebNoHttps.'/'){ echo 'checked'; } ?>>
			</div>
		</div>
	</div>
	<div class="formulario" style="width:100%;">
		<span>Extras</span> <textarea name="cfg20" placeholder="Variables y resultados extras"><?php if(file_exists($scrSecundarios)){ $mostrar=file_get_contents($scrSecundarios); echo $mostrar; } ?></textarea>
	</div>
	<div class="formulario" style="width:100%;">
		<span>Scripts</span> <textarea class="texeditor2" name="cfg21" placeholder="Analitycs"><?php if(file_exists($scrExtrasdispla)){ $mostrar=file_get_contents($scrExtrasdispla); echo $mostrar; } ?></textarea>
	</div>
	<div>
        <input class="boton" type="reset" value="Cancelar &#xf00d">
        <input class="boton" type="submit" name="IniConfig" value="Actualizar &#xf044">
    </div>
</form>
<?php } else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>