<?php if($i===1): ?>
<hr><span title="Se muestra al final del elemento 1">Mostrar derechos <input type="checkbox" name="opcderechos" <?php if(isset($PiedePaginaDerechos) && $PiedePaginaDerechos=="on"){ echo "checked"; } ?>></span>
<?php endif; ?>