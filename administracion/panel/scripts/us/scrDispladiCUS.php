<?php #Se muestra en la displadi
#CABEZA?>
<?php if($idi==0):
	if($i==0): ?>
		<hr><span>Mostrar Titulo <input type="checkbox" name="opccabezatituloweb" <?php if(isset($scrUS_CabezaTituloWeb) && $scrUS_CabezaTituloWeb!=''){ echo 'checked'; } ?>></span>
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
<?php if($idi==1):
	if($i==0): ?>
		<hr><span>Mostrar botones <input type="checkbox" name="opcmenubotones" <?php if(isset($scrUS_MenuBotones) && $scrUS_MenuBotones!=''){ echo "checked"; } ?>></span>
<?php endif; endif; ?>

<?php if($idi==2):
	if($i==0): ?>
<?php endif; endif; ?>
<?php if($idi==3):
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
		<?php if(file_exists($AC_DIRECTORIO.'actualizaciones.php')): ?>
		<hr><span>Mostrar noticias <input type="checkbox" name="opcmenulateralnoticias" <?php if(isset($scrUS_MenuLateralNoticias) && $scrUS_MenuLateralNoticias!=''){ echo 'checked'; } ?>></span>
	<?php endif; endif; ?>
	<?php if($i==2): ?>
		<hr><span>Mostrar random <input type="checkbox" name="opcmenulateralrandom" <?php if(isset($scrUS_MenuLateralRandom) && $scrUS_MenuLateralRandom!=''){ echo 'checked'; } ?>></span>
	<?php endif; ?>
	<?php if($i==3): ?>
		<hr><span>Publicaciones <input type="checkbox" name="opcmenulateralpublicaciones" <?php if(isset($scrUS_MenuLateralPublicaciones) && $scrUS_MenuLateralPublicaciones!=''){ echo 'checked'; } ?>></span>
		<span title="Se muestra al final del elemento 4">Visitas <input type="checkbox" name="opcmenulateralvisitas" <?php if(isset($scrUS_MenuLateralVisitas) && $scrUS_MenuLateralVisitas!=''){ echo 'checked'; } ?>></span>
		<span title="Se muestra al final del elemento 4">versión <input type="checkbox" name="opcmenulateralversion" <?php if(isset($scrUS_MenuLateralVersion) && $scrUS_MenuLateralVersion!=''){ echo 'checked'; } ?>></span>
<?php endif; endif; ?>
<?php if($idi==4):
	if($i==0): ?>
<hr><span title="Se muestra al final del elemento 1">Mostrar derechos <input type="checkbox" name="opcpiedepaginaderechos" <?php if(isset($scrUS_PiedePaginaDerechos) && $scrUS_PiedePaginaDerechos=="on"){ echo "checked"; } ?>></span>
<?php endif; endif; ?>