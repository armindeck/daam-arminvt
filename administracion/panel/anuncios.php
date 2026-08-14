<?php if(isset($TIPO) && $TIPO=='panel'){ ?>

<div class="flexCon flexCen">

    <form method="post" action="actualizar.php">

        <div class="formulario" style="width:100%;">

            <b>Actualizar mensaje y anuncios</b><hr>

            <span>Mensaje: </span><input type="text" name="enlace" placeholder="Enlace &#xf0c1" value="<?php if(isset($link)){ echo $link; } ?>"><br>

            <span>Anuncio: </span><input type="text" name="anuncio" placeholder="Enlace &#xf0c1" value="<?php if(isset($linkanuncio)){ echo $linkanuncio; } ?>"><br>

            <span>Anuncio2: </span><input type="text" name="anuncio2" placeholder="Enlace &#xf0c1" value="<?php if(isset($linkanuncio2)){ echo $linkanuncio2; } ?>"><hr>

<b>Imagenes</b> > <a class="boton2" target="_blank" href="../../imagenes">Mostrar</a><hr>

            <span>Anuncio: </span><input type="text" name="imga" placeholder="Imagen &#xf03e" value="<?php if(isset($linkimga)){ echo $linkimga; } ?>"><br>

            <span>Anuncio2: </span><input type="text" name="imga2" placeholder="Imagen &#xf03e" value="<?php if(isset($linkimga2)){ echo $linkimga2; } ?>"><hr>

            <b>Anuncio e información</b><hr>

            <textarea class="texeditor2" name="mensaje" placeholder="Mensaje"><?php if(isset($sms)){ echo $sms; } ?></textarea>

            <textarea class="ocultso" placeholder="Codigos"><?php if(file_exists($dpAnuncio)){ $mos=htmlspecialchars(file_get_contents($dpAnuncio)); if(isset($mos)){ echo $mos; } } ?></textarea><hr>
            <b>Activar</b><hr>
            <span>Mensaje <input type="checkbox" name="texMensaje" <?php

    if(isset($texMensaje) && $texMensaje==true){ echo 'checked'; } ?>></span>

            <span>Anuncio <input type="checkbox" name="mosAnuncio" <?php

    if(isset($mosAnuncio) && $mosAnuncio==true){ echo 'checked'; } ?>></span>
    <span>Anuncio2 <input type="checkbox" name="mosAnuncio2" <?php

    if(isset($mosAnuncio2) && $mosAnuncio2==true){ echo 'checked'; } ?>></span><hr>

            <div>

                <input class="boton" type="reset" value="Cancelar &#xf00d">

                <input class="boton" type="submit" name="IniAnuncio" value="Actualizar &#xf044">
                <span class="t14">v0.3 Beta</span>
            </div>

        </div>

    </form>

</div>

<?php } else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>