<div class="flexCon flexCen">
    <form class="formulario" method="post" action="form.php">
        <p>Publica tus links anonimo 😜</p><hr>
        <?php $usuarioRegistrado=''; $codigos='';
            if(isset($_SESSION['id']) && $_SESSION['usuario']){
                if($_SESSION['rol'] == 5){ $codigos='<a target="_blank" class="boton" href="'.$AC_DIRECTORIO.'codigos'.$AGREGAR_PHP.'">Codigos <i class="fas fa-external-link-alt"></i></a>'; } $usuarioRegistrado=$_SESSION['usuario'];
            } ?>
        <input type="text" name="usuario" placeholder="Apodo &#xf007"; title="Tu Apodo 7w7" minlength="4" maxlength="15" value="<?php echo $usuarioRegistrado; ?>" required>
        <input type="url" name="enlace" placeholder="El link aquí &#xf0c1"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$" required>
        <textarea name="comentario" placeholder="De que trata el link? &#xf521"; title="De que trata el link?" minlength="10" maxlength="1400" required></textarea>
        <input type="url" name="imagen" placeholder="Link de la imagen &#xf03e"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$"><hr>
        <div class="flexRow">
            <input type="submit" value="Publicar &#xf06d";> 
            <input class="campo key" type="password" name="codigo" placeholder="Code &#xf084"; title="Codigo :3" maxlength="10">
            <?php echo $codigos; ?>
            <div class="der"><a target="_blank" class="der t14" href="<?php echo $AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; ?>">Reglas</a></div>
        </div><hr>
        <div class="flexRow">Comenta Oni-chan :3 <p class="der t10">v0.1.2</p></div>
    </form>
</div>