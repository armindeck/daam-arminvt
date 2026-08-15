<?php if(isset($TIPO) && $TIPO=='panel'){ ?>
<div class="flexCon flexCen">
    <form method="post" action="actualizar.php">
        <div class="formulario">
            <b>Actualizar mensaje y anuncios</b><hr>
            <span>Mensaje: </span><input type="text" name="enlace" placeholder="Enlace &#xf0c1" value="<?php if(isset($link)){ echo $link; } ?>"><br>
            <span>Anuncio: </span><input type="text" name="anuncio" placeholder="Enlace &#xf0c1" value="<?php if(isset($linkanuncio)){ echo $linkanuncio; } ?>"><br>
            <span>Anuncio2: </span><input type="text" name="anuncio2" placeholder="Enlace &#xf0c1" value="<?php if(isset($linkanuncio2)){ echo $linkanuncio2; } ?>"><hr>
            <a target="_blank" class="boton2" href="<?php echo $AC_DIRECTORIO.'imagenes'.$AGREGAR_PHP; ?>">Imagenes <i class="fas fa-external-link-alt"></i></a><hr>
            <?php
                function g_files_img_normalizar($string){
                    $string = str_replace('../../img/', '', $string);
                    return $string;
                }

                function BotonSelectImg($list){?>
                    <select name="<?php echo $list['name']; ?>">
                        <option class="optg">Imagen</option>
                    <?php
                        $g_files_img = glob('../../img/*');
                        foreach ($g_files_img as $key => $value) {
                            echo '<option '.(isset($list['variable']) && $list['variable'] == g_files_img_normalizar($value) ? 'selected' : '').'>'
                                .g_files_img_normalizar($value).
                            '</option>';
                        }
                    ?>
                    </select>
            <?php } ?>
            <span>Anuncio: </span><?php echo BotonSelectImg(['name'=>'imga','variable'=>$linkimga]); ?><br>
            <span>Anuncio2: </span><?php echo BotonSelectImg(['name'=>'imga2','variable'=>$linkimga2]); ?><hr>
<!--
            <span>Anuncio: </span><input type="text" name="imga" placeholder="Imagen &#xf03e" value="<?php if(isset($linkimga)){ echo $linkimga; } ?>"><br>
            <span>Anuncio2: </span><input type="text" name="imga2" placeholder="Imagen &#xf03e" value="<?php if(isset($linkimga2)){ echo $linkimga2; } ?>"><hr>
-->
            <b>Anuncio e información</b><hr>
            <textarea class="texeditor2" name="mensaje" placeholder="Mensaje"><?php if(isset($sms)){ echo $sms; } ?></textarea>
            <textarea class="oculto" placeholder="Codigos"><?php if(file_exists($dpAnuncio)){ $mos=htmlspecialchars(file_get_contents($dpAnuncio)); if(isset($mos)){ echo $mos; } } ?></textarea><hr>
            <b>Activar</b><hr>
            <?php
                function BotonCheckbox($list){ ?>
                    <style type="text/css">
                        .check-<?php echo $list['name']; ?>:checked ~ .boton-check-<?php echo $list['name']; ?> a {
                            background: #2c3e50;
                        }
                    </style>
                    <input type="checkbox" class="dp-none check-<?php echo $list['name']; ?>" id="<?php echo $list['name']; ?>" name="<?php echo $list['name']; ?>"<?php if(isset($list['variable']) && $list['variable']==true){ echo 'checked'; }; ?>>
                    <label for="<?php echo $list['name']; ?>" class="boton-check boton-check-<?php echo $list['name']; ?>"><a class="boton"><?php echo $list['text']; ?></a></label>
            <?php } ?>

            <?php echo
                BotonCheckbox(['text'=>'Mensaje','name'=>'texMensaje','variable'=>$texMensaje]),
                BotonCheckbox(['text'=>'Anuncio','name'=>'mosAnuncio','variable'=>$mosAnuncio]),
                BotonCheckbox(['text'=>'Anuncio2','name'=>'mosAnuncio2','variable'=>$mosAnuncio2]);
            ?>
<!--
            <span>Mensaje <input type="checkbox" name="texMensaje" <?php
    if(isset($texMensaje) && $texMensaje==true){ echo 'checked'; } ?>></span>
            <span>Anuncio <input type="checkbox" name="mosAnuncio" <?php
    if(isset($mosAnuncio) && $mosAnuncio==true){ echo 'checked'; } ?>></span>
    <span>Anuncio2 <input type="checkbox" name="mosAnuncio2" <?php
    if(isset($mosAnuncio2) && $mosAnuncio2==true){ echo 'checked'; } ?>></span>
-->
            <hr>
            <div>
                <input class="boton" type="reset" value="Cancelar &#xf00d">
                <input class="boton" type="submit" name="IniAnuncio" value="Actualizar &#xf044"><hr>
                <span class="t12"><?php echo file_get_contents(__DIR__.'/anuncios.x'); ?></span>
            </div>
        </div>
    </form>
</div>
<?php } else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>