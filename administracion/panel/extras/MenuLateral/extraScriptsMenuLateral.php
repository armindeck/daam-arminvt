<?php #SCRIPT PARA EL USUARIO ?>
<?php if($i===1): ?>
<hr><span title="Se muestra al final del elemento 1">Mostrar redes sociales <input type="checkbox" name="opcredes" <?php if(isset($MenuLateralRedes) && $MenuLateralRedes=='on'){ echo 'checked'; } ?>></span>
<hr><input type="text" name="opcredestitulo" placeholder="Titulo" value="<?php if(isset($MenuLateralRedesTitulo)){ echo htmlspecialchars($MenuLateralRedesTitulo); } ?>">
<hr><span title="Facebook">FB <input type="checkbox" name="opcredesfb" <?php if(isset($MenuLateralRedesFB) && $MenuLateralRedesFB=='on'){ echo 'checked'; } ?>></span>
<span title="YouTube">YT <input type="checkbox" name="opcredesyt" <?php if(isset($MenuLateralRedesYT) && $MenuLateralRedesYT=='on'){ echo 'checked'; } ?>></span>
<span title="Twitter">TW <input type="checkbox" name="opcredestw" <?php if(isset($MenuLateralRedesTW) && $MenuLateralRedesTW=='on'){ echo 'checked'; } ?>></span>
				<span title="Tiktok">TK <input type="checkbox" name="opcredestk" <?php if(isset($MenuLateralRedesTK) && $MenuLateralRedesTK=='on'){ echo 'checked'; } ?>></span>
<span title="Patreon">PT <input type="checkbox" name="opcredespt" <?php if(isset($MenuLateralRedesPT) && $MenuLateralRedesPT=='on'){ echo 'checked'; } ?>></span>
<span title="Koffe">KF <input type="checkbox" name="opcredeskf" <?php if(isset($MenuLateralRedesKF) && $MenuLateralRedesKF=='on'){ echo 'checked'; } ?>></span>
<?php endif; ?>
<?php if($i===2): ?>
	<?php if(file_exists($AC_DIRECTORIO.'blog/index.php')): ?>
	<hr><span title="Se muestra al final del elemento 2">Mostrar noticias <input type="checkbox" name="opcnoticias" <?php if(isset($MenuLateralNoticias) && $MenuLateralNoticias=='on'){ echo 'checked'; } ?>></span>
<?php endif; endif; ?>
<?php if($i===3): ?>
	<?php if(file_exists($AC_DIRECTORIO.'descripciones.php')): ?>
	<hr><span title="Se muestra al final del elemento 3">Mostrar frases <input type="checkbox" name="opcfrases" <?php if(isset($MenuLateralFrases) && $MenuLateralFrases=='on'){ echo 'checked'; } ?>></span>
<?php endif; endif; ?>
<?php if($i===4): ?>
	<?php if(file_exists($AC_DIRECTORIO.'forolink/index.php')): ?>
	<hr><span title="Se muestra al final del elemento 4">Forolink <input type="checkbox" name="opcforolink" <?php if(isset($MenuLateralForolink) && $MenuLateralForolink=='on'){ echo 'checked'; } ?>></span>
				<?php endif; ?>
	<span title="Se muestra al final del elemento 4">Visitas <input type="checkbox" name="opcvisitas" <?php if(isset($MenuLateralVisitas) && $MenuLateralVisitas=='on'){ echo 'checked'; } ?>></span>
	<span title="Se muestra al final del elemento 4">versión <input type="checkbox" name="opcversion" <?php if(isset($MenuLateralVersion) && $MenuLateralVersion=='on'){ echo 'checked'; } ?>></span>
<?php endif; ?>
<hr>
<select name="opcmenulateral_script<?php echo $i; ?>">
	<option value="ninguno">Ninguno</option>
	<option value="noticias">Noticias</option>
	<option value="blogs">Blogs</option>
	<option value="comentarios">Comentarios</option>
</select>