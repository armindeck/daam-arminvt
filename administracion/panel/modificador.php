<?php if(isset($TIPO)){ if($TIPO='panel'){ ?>
<p class="texini">Modificación de archivos!</p>
<form class="formulario" method="post" action="panel.php?ac=creador">
    <span>Modificar archivo <span class="t14">v0.3 Beta</span></span><hr>
    <input class="oculto" type="text" name="ac" value="creador">
    <input type="text" name="archivo" placeholder="cn_ubicar-archivo">
    <input name="IniModificar" type="submit" value="Modificar &#xf044"><hr>
    <p>No usar .php</p>
</form>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>