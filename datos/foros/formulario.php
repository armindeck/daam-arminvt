<?php #CONTENIDO DEL FORMULARIO
switch ($TIPO) {
    case 'foro':
        $FTitulo='Publica tus links anonimo 😜';
        $FCampoLink=true;
        $FBoton='IniForo';
        $FBotonTexto='Publicar';
        $FCampoContenido='De que trata el link?';
        break;
    case 'comentarios':
        $FTitulo='Deja un comentario 😜';
        $FBoton='IniComentarios';
        $FBotonTexto='Comentar';
        $FCampoContenido='Wuau! esta publicación esta epica!';
        break;
    default:
        $FTitulo='xDDDD';
        break;
}

if(isset($_SESSION['id']) && $_SESSION['usuario']){
    if($_SESSION['rol'] == 5){
        $FCamposExtras=true;
        $FCampoContrasena=true;
    } $FUsuario=$_SESSION['usuario'];
}



?>
<div class="flexCon flexCen">
    <form class="formulario" method="post" action="form.php">
        <p><?php echo $FTitulo; ?></p><hr>
        <input type="text" name="usuario" placeholder="Apodo &#xf007"; title="Tu Apodo 7w7" minlength="4" maxlength="15" value="<?php if (isset($FUsuario)) { echo $FUsuario; } ?>" required>
        <?php if (isset($FCampoLink) && $FCampoLink==true): ?>
            <input type="url" name="enlace" placeholder="El link aquí &#xf0c1"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$" required>
        <?php endif; ?>
        <textarea name="comentario" placeholder="<?php echo $FCampoContenido; ?> &#xf521"; title="<?php echo $FCampoContenido; ?>  " minlength="10" maxlength="1400" required></textarea>
        <input type="url" name="imagen" placeholder="Link de la imagen &#xf03e"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$"><hr>
        <div class="flexRow">
            <input type="submit" name="<?php echo $FBoton; ?>" value="<?php echo $FBotonTexto; ?> &#xf06d";> 
            <input class="campo key" type="password" name="codigo" placeholder="Code &#xf084" title="Codigo :3" maxlength="10">
            <div class="der"><a target="_blank" class="der t14" href="<?php echo $AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; ?>">Reglas</a></div>
        </div><hr>
        <?php if (isset($FCamposExtras) && $FCamposExtras==true): ?>
                <a target="_blank" class="boton" href="<?php echo $AC_DIRECTORIO.'codigos'.$AGREGAR_PHP; ?>">Codigos <i class="fas fa-external-link-alt"></i></a>
                <a target="_blank" class="boton" href="<?php echo $AC_DIRECTORIO.'imagenes'.$AGREGAR_PHP; ?>">Imagenes <i class="fas fa-external-link-alt"></i></a>
                <hr>
        <?php endif; ?>
        <div class="flexRow">Comenta Oni-chan :3 <p class="der t10">v0.2</p></div>
    </form>
</div>