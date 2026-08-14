<?php if($i===1): ?>
<hr><span title="Se muestra al final del elemento 1">Mostrar botones <input type="checkbox" name="opcbotones" <?php if(isset($MenuBotones) && $MenuBotones=="on"){ echo "checked"; } ?>></span>
<?php endif; ?>