<?php if(isset($TIPO)){ if($TIPO='panel'){ ?>

<div class="flexCon flexCen">

    <form method="post" action="actualizar.php">

        <div class="formulario" style="width:100%;">

            <b>Actualizar mensaje y anuncios</b><hr>

            <span>Mensaje: </span><input type="text" name="enlace" placeholder="Enlace &#xf0c1" value="<?php echo $link; ?>"><br>

            <span>Anuncio: </span><input type="text" name="anuncio" placeholder="Enlace &#xf0c1" value="<?php echo $linkanuncio; ?>"><br>

            <span>Anuncio2: </span><input type="text" name="anuncio2" placeholder="Enlace &#xf0c1" value="<?php echo $linkanuncio2; ?>"><hr>

<b>Imagenes</b> > <a class="boton2" target="_blank" href="../../imagenes">Mostrar</a><hr>

            <span>Anuncio: </span><input type="text" name="imga" placeholder="Imagen &#xf03e" value="<?php echo $linkimga; ?>"><br>

            <span>Anuncio2: </span><input type="text" name="imga2" placeholder="Imagen &#xf03e" value="<?php echo $linkimga2; ?>"><hr>

            <b>Anuncio e información</b><hr>

            <textarea class="texeditor2" name="mensaje" placeholder="Mensaje"><?php echo $sms; ?></textarea>

            <textarea class="oculto"><?php $mos=htmlspecialchars(file_get_contents($AC_DIRECTORIO.'administracion/panel/sms.php')); echo $mos; ?></textarea><hr>
            <b>Activar</b><hr>
            <span>Mensaje <input type="checkbox" name="texMensaje" <?php

    if($texMensaje==true){ echo 'checked'; } ?>></span>

            <span>Anuncio <input type="checkbox" name="mosAnuncio" <?php

    if($mosAnuncio==true){ echo 'checked'; } ?>></span>
    <span>Anuncio2 <input type="checkbox" name="mosAnuncio2" <?php

    if($mosAnuncio2==true){ echo 'checked'; } ?>></span><hr>

            <div>

                <input class="boton" type="reset" value="Cancelar &#xf00d">

                <input class="boton" type="submit" name="IniAnuncio" value="Actualizar &#xf044">
                <span class="t14">v0.3 Beta</span>
            </div>

        </div>

    </form>

</div>

<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>