<?php if(isset($TIPO)){ if($TIPO='panel'){ ?>
<div class="flexCon flexCen">
    <form class="formulario" method="post" action="<?php echo $AC_DIRECTORIO; ?>blog/form.php">
        <p>Las ultimas mejoras y noticias 😜</p><hr>
        <input class="oculto" type="text" name="usuario" placeholder="Usuario &#xf007"; title="Usuario 7w7" minlength="4" maxlength="15" value="<?php echo $adminprivado['usuario']; ?>" required>
        <input type="url" name="enlace" placeholder="El link aquí &#xf0c1"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$" required>
        <textarea name="comentario" class="texeditor2" placeholder="Cual es la nueva novedad? &#xf521"; title="De que trata el link?" minlength="10" maxlength="1400" required></textarea>
        <input type="url" name="imagen" placeholder="Link de la imagen &#xf03e"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$"><hr>
        <div class="flexRow">
            <input type="submit" value="Publicar &#xf06d"> <a class="boton2" target="_blank" href="../../imagenes">Imagenes</a><hr>
            <input class="campo key oculto" type="password" name="codigo" placeholder="Code &#xf084"; value="<?php echo $adminprivado['codigo']; ?>" title="Codigo :3" maxlength="10">
            <div class="der"><a target="_blank" class="der t14" href="<?php echo $AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; ?>">Reglas</a></div>
        </div><hr>
        <div class="flexRow">Sera epico :3 <p class="der t10">v0.1.2</p></div>
    </form>
    <ol class="t12">
        <li>Etiquetas</li>
        <li class="t12">#BR# = &lt;br&gt;</li>
        <li class="t12">#BA# = &lt;b&gt;</li>
        <li class="t12">#BC# = &lt;/b&gt;</li>
        <li class="t12">#IA# = &lt;i&gt;</li>
        <li class="t12">#IC# = &lt;/i&gt;</li>
        <li class="t12">#HR# = &lt;hr&gt;</li>
    </ol>
</div>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>