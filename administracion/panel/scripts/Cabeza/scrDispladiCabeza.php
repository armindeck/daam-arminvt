<?php #SCRIPT PARA EL USUARIO ?>
<?php if($i===1): ?>
<hr><span title="Se muestra al final del elemento 1">Mostrar Titulo <input type="checkbox" name="opctituloweb" <?php if(isset($CabezaTituloWeb) && $CabezaTituloWeb=='on'){ echo 'checked'; } ?>></span>
<?php endif; ?>
<?php if($i===2): ?>
<hr><span title="Se muestra al final del elemento 1">Mostrar redes sociales <input type="checkbox" name="opcredes" <?php if(isset($CabezaRedes) && $CabezaRedes=='on'){ echo 'checked'; } ?>></span>
<hr><span title="Tema">TM <input type="checkbox" name="opctema" <?php if(isset($CabezaTema) && $CabezaTema=='on'){ echo 'checked'; } ?>></span>
<span title="Facebook">FB <input type="checkbox" name="opcredesfb" <?php if(isset($CabezaRedesFB) && $CabezaRedesFB=='on'){ echo 'checked'; } ?>></span>
<span title="YouTube">YT <input type="checkbox" name="opcredesyt" <?php if(isset($CabezaRedesYT) && $CabezaRedesYT=='on'){ echo 'checked'; } ?>></span>
<span title="Twitter">TW <input type="checkbox" name="opcredestw" <?php if(isset($CabezaRedesTW) && $CabezaRedesTW=='on'){ echo 'checked'; } ?>></span>
				<span title="Tiktok">TK <input type="checkbox" name="opcredestk" <?php if(isset($CabezaRedesTK) && $CabezaRedesTK=='on'){ echo 'checked'; } ?>></span>
<span title="Patreon">PT <input type="checkbox" name="opcredespt" <?php if(isset($CabezaRedesPT) && $CabezaRedesPT=='on'){ echo 'checked'; } ?>></span>
<span title="Koffe">KF <input type="checkbox" name="opcredeskf" <?php if(isset($CabezaRedesKF) && $CabezaRedesKF=='on'){ echo 'checked'; } ?>></span>
<?php endif; ?>