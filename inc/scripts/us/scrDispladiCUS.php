<?php #Se muestra en la displadi ?>

<?php #HEADER ------------------------------>
if($idi==0):
	if($i==0): ?>
		<hr><span>Mostrar Titulo <input type="checkbox" name="opccabezatituloweb" <?php if(isset($scrUS_CabezaTituloWeb) && $scrUS_CabezaTituloWeb!=''){ echo 'checked'; } ?>></span><br>
		<span>Icono <input type="text" name="opccabezatitulowebicono" value="<?php echo isset($scrUS_CabezaTituloWebIcono) ? $scrUS_CabezaTituloWebIcono : ''; ?>" placeholder="fas fa-meteor">
	<?php endif; if($i==1): ?>
		<hr><span>Mostrar redes sociales <input type="checkbox" name="opccabezaredes" <?php if(isset($scrUS_CabezaRedes) && $scrUS_CabezaRedes!=''){ echo 'checked'; } ?>></span>
		<hr><span title="Tema">TM <input type="checkbox" name="opccabezatema" <?php if(isset($scrUS_CabezaTema) && $scrUS_CabezaTema!=''){ echo 'checked'; } ?>></span>
		<span title="Facebook">FB <input type="checkbox" name="opccabezaredesfb" <?php if(isset($scrUS_CabezaRedesFB) && $scrUS_CabezaRedesFB!=''){ echo 'checked'; } ?>></span>
		<span title="YouTube">YT <input type="checkbox" name="opccabezaredesyt" <?php if(isset($scrUS_CabezaRedesYT) && $scrUS_CabezaRedesYT!=''){ echo 'checked'; } ?>></span>
		<span title="Twitter">TW <input type="checkbox" name="opccabezaredestw" <?php if(isset($scrUS_CabezaRedesTW) && $scrUS_CabezaRedesTW!=''){ echo 'checked'; } ?>></span>
						<span title="Tiktok">TK <input type="checkbox" name="opccabezaredestk" <?php if(isset($scrUS_CabezaRedesTK) && $scrUS_CabezaRedesTK!=''){ echo 'checked'; } ?>></span>
		<span title="Patreon">PT <input type="checkbox" name="opccabezaredespt" <?php if(isset($scrUS_CabezaRedesPT) && $scrUS_CabezaRedesPT!=''){ echo 'checked'; } ?>></span>
		<span title="Koffe">KF <input type="checkbox" name="opccabezaredeskf" <?php if(isset($scrUS_CabezaRedesKF) && $scrUS_CabezaRedesKF!=''){ echo 'checked'; } ?>></span>
<?php endif; endif; ?>

<?php #MENU ------------------------------>
if($idi==1):
	if($i==0): ?>
		<hr><span>Mostrar botones <input type="checkbox" name="opcmenubotones" <?php if(isset($scrUS_MenuBotones) && $scrUS_MenuBotones!=''){ echo "checked"; } ?>></span>
		<hr><span>Cantidad de botones: <input type="number" name="opcmenubotones_cantidad" min="1" class="codigo" value="<?php if(isset($scrUS_MenuBotones_Cantidad)){ echo $scrUS_MenuBotones_Cantidad; } else { echo '1'; } ?>"></span>
		<?php
			if(isset($scrUS_MenuBotones_Cantidad)){
				for($i=1; $i <= $scrUS_MenuBotones_Cantidad; $i++){ ?>
					<hr><b>Boton <?php echo $i; ?></b><hr>
					<span>Icono: <input type="text" name="opcmenubotones_icono_<?php echo $i; ?>" value="<?php echo isset($scrUS_MenuBotones_Icono_[$i]) ? $scrUS_MenuBotones_Icono_[$i] : ''; ?>" placeholder="fas fa-home"></span>
					<span>Texto: <input type="text" name="opcmenubotones_texto_<?php echo $i; ?>" value="<?php echo isset($scrUS_MenuBotones_Texto_[$i]) ? $scrUS_MenuBotones_Texto_[$i] : ''; ?>" placeholder="Inicio"></span>
					<span>Enlace: <input type="text" name="opcmenubotones_enlace_<?php echo $i; ?>" value="<?php echo isset($scrUS_MenuBotones_Enlace_[$i]) ? $scrUS_MenuBotones_Enlace_[$i] : ''; ?>" placeholder="blogs / https"></span>
					<span title="Se usara un enlace http/s">Enlace URL: <input type="checkbox" name="opcmenubotones_enlace_http_<?php echo $i; ?>" <?php echo isset($scrUS_MenuBotones_Enlace_Http_[$i]) && $scrUS_MenuBotones_Enlace_Http_[$i] != '' ? 'checked' : ''; ?>></span>
					<span title="Se abrira el enlace en una pestaña nueva">Externo: <input type="checkbox" name="opcmenubotones_enlace_externo_<?php echo $i; ?>" <?php echo isset($scrUS_MenuBotones_Enlace_Externo_[$i]) && $scrUS_MenuBotones_Enlace_Externo_[$i] != '' ? 'checked' : ''; ?>></span>
			<?php }
			}
		?>
<?php endif; endif; ?>

<?php #CONTENIDO EXTRA ------------------------------>
if($idi==2):
	if($i==0): ?>
	<hr><span>Mostrar Anuncio <input type="checkbox" name="opccontenidoextra" <?php if(isset($scrUS_ContenidoExtra) && $scrUS_ContenidoExtra!=''){ echo 'checked'; } ?>></span>
	<hr><span>Enlace <input type="url" name="opccontenidoextra_enlace" value="<?php if(isset($scrUS_ContenidoExtra_Enlace) && $scrUS_ContenidoExtra_Enlace!=''){ echo $scrUS_ContenidoExtra_Enlace; } ?>" placeholder="https://enlace.com/"></span>
	<hr><span>Enlace Imagen <input type="url" name="opccontenidoextra_enlace_imagen" value="<?php if(isset($scrUS_ContenidoExtra_Enlace_Imagen) && $scrUS_ContenidoExtra_Enlace_Imagen!=''){ echo $scrUS_ContenidoExtra_Enlace_Imagen; } ?>" placeholder="https://enlace.com/img.png"></span>
	<hr><span>Contenido</span><br><textarea name="opccontenidoextra_contenido" placeholder="Texto del anuncio"><?php if(isset($scrUS_ContenidoExtra_Contenido) && $scrUS_ContenidoExtra_Contenido!=''){ echo $scrUS_ContenidoExtra_Contenido; } ?></textarea>
<?php endif; endif; ?>

<?php #MENU LATERAL ------------------------------>
if($idi==3):
	if($i==0): ?>
	<hr><span>Mostrar redes sociales <input type="checkbox" name="opcmenulateralredes" <?php if(isset($scrUS_MenuLateralRedes) && $scrUS_MenuLateralRedes!=''){ echo 'checked'; } ?>></span>
	<hr><input type="text" name="opcmenulateralredestitulo" placeholder="Titulo" value="<?php if(isset($scrUS_MenuLateralRedesTitulo)){ echo htmlspecialchars($scrUS_MenuLateralRedesTitulo); } ?>">
	<hr><span title="Facebook">FB <input type="checkbox" name="opcmenulateralredesfb" <?php if(isset($scrUS_MenuLateralRedesFB) && $scrUS_MenuLateralRedesFB!=''){ echo 'checked'; } ?>></span>
	<span title="YouTube">YT <input type="checkbox" name="opcmenulateralredesyt" <?php if(isset($scrUS_MenuLateralRedesYT) && $scrUS_MenuLateralRedesYT!=''){ echo 'checked'; } ?>></span>
	<span title="Twitter">TW <input type="checkbox" name="opcmenulateralredestw" <?php if(isset($scrUS_MenuLateralRedesTW) && $scrUS_MenuLateralRedesTW!=''){ echo 'checked'; } ?>></span>
					<span title="Tiktok">TK <input type="checkbox" name="opcmenulateralredestk" <?php if(isset($scrUS_MenuLateralRedesTK) && $scrUS_MenuLateralRedesTK!=''){ echo 'checked'; } ?>></span>
	<span title="Patreon">PT <input type="checkbox" name="opcmenulateralredespt" <?php if(isset($scrUS_MenuLateralRedesPT) && $scrUS_MenuLateralRedesPT!=''){ echo 'checked'; } ?>></span>
	<span title="Koffe">KF <input type="checkbox" name="opcmenulateralredeskf" <?php if(isset($scrUS_MenuLateralRedesKF) && $scrUS_MenuLateralRedesKF!=''){ echo 'checked'; } ?>></span>
	<?php endif; ?>
	<?php if($i==1): ?>
		<hr><span>Mostrar comentarios <input type="checkbox" name="opcmenulateralnoticias" <?php if(isset($scrUS_MenuLateralNoticias) && $scrUS_MenuLateralNoticias!=''){ echo 'checked'; } ?>></span><br>
		<input type="text" name="opcmenulateralnoticiascarpeta" value="<?php echo isset($scrUS_MenuLateralNoticiasCarpeta) ? $scrUS_MenuLateralNoticiasCarpeta : ''; ?>" placeholder="Carpeta comentarios"><hr>
	<?php endif; ?>
	<?php if($i==2): ?>
		<hr><span>Mostrar random <input type="checkbox" name="opcmenulateralrandom" <?php if(isset($scrUS_MenuLateralRandom) && $scrUS_MenuLateralRandom!=''){ echo 'checked'; } ?>></span>
	<?php endif; ?>
	<?php if($i==3): ?>
		<hr><span>Mostrar extras <input type="checkbox" name="opcmenulateralextras" <?php if(isset($scrUS_MenuLateralExtras) && $scrUS_MenuLateralExtras!=''){ echo 'checked'; } ?>></span><hr>
		<span title="Se muestra al final del elemento 4">Contador comentarios <input type="checkbox" name="opcmenulateralcontadorcomentarios" <?php if(isset($scrUS_MenuLateralContadorComentarios) && $scrUS_MenuLateralContadorComentarios!=''){ echo 'checked'; } ?>></span><br>
		<input type="text" name="opcmenulateralcontadorcomentarioscarpeta" value="<?php echo isset($scrUS_MenuLateralContadorComentariosCarpeta) ? $scrUS_MenuLateralContadorComentariosCarpeta : ''; ?>" placeholder="Carpeta comentarios"><hr>
		<span title="Se muestra al final del elemento 4">Visitas <input type="checkbox" name="opcmenulateralvisitas" <?php if(isset($scrUS_MenuLateralVisitas) && $scrUS_MenuLateralVisitas!=''){ echo 'checked'; } ?>></span>
		<span title="Se muestra al final del elemento 4">Versión <input type="checkbox" name="opcmenulateralversion" <?php if(isset($scrUS_MenuLateralVersion) && $scrUS_MenuLateralVersion!=''){ echo 'checked'; } ?>></span>
<?php endif; endif; ?>

<?php #PIE DE PAGINA ------------------------------>
if($idi==4):
	if($i==0): ?>
<hr><span title="Se muestra al final del elemento 1">Mostrar derechos <input type="checkbox" name="opcpiedepaginaderechos" <?php if(isset($scrUS_PiedePaginaDerechos) && $scrUS_PiedePaginaDerechos=="on"){ echo "checked"; } ?>></span>
<?php endif; endif; ?>