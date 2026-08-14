<?php #CONTENIDO DEL FORMULARIO

#$AccesoFormulario=true;

if(isset($AccesoFormulario) && $AccesoFormulario==true){

switch ($TIPO) {

    case 'foro':

        $FTitulo='Publica tus links anonimo 😜';

        $FCampoLink=true;

        $FCampoLinkCon='El link aquí';

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

    case 'blog':

        $FTitulo='Cual es la nueva novedad 😜';

        $FCampoLink=true;

        $FCampoLinkCon='Link de la publicación';

        $FBoton='IniBlog';

        $FBotonTexto='Publicar';

        $FCampoContenido='Wuau! la nueva mejora esta bien epica!';

        break;

    default:

        $FTitulo='xDDDD';

        break;

}



if(isset($_SESSION['id']) || isset($_SESSION['usuario'])){

    if($_SESSION['rol'] == 5){

        $FCamposExtras=true; $FCampoContrasena=true;

        if($_SESSION['usuario'] == $adminprivado['usuario']){

            if(isset($_SESSION['contrasena']) && $_SESSION['contrasena'] == $adminprivado['codigo']){ $FCodigo=$_SESSION['contrasena']; }

            if(isset($_SESSION['codigo']) && $_SESSION['codigo'] == $adminprivado['codigo']){ $FCodigo=$_SESSION['codigo']; }

        }

    } $FUsuario=$_SESSION['usuario'];

}







?>

<div class="flexCon flexCen">

    <form class="formulario" method="post" action="<?php echo $AC_DIRECTORIO.'form/iobi/procesar.php?ubi='.$AC_UBICACION.'&arc='.$AC_ARCHIVO; ?>">

        <p><?php echo $FTitulo; ?></p><hr>

        <input type="text" name="usuario" placeholder="Apodo &#xf007"; title="Tu Apodo 7w7" minlength="4" maxlength="15" value="<?php if (isset($FUsuario)) { echo $FUsuario; } ?>" required>

        <?php if (isset($FCampoLink) && $FCampoLink==true): ?>

            <input type="url" name="enlace" placeholder="<?php echo $FCampoLinkCon; ?> &#xf0c1"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$" required>

        <?php endif; ?>

        <textarea name="comentario" placeholder="<?php echo $FCampoContenido; ?> &#xf521"; title="<?php echo $FCampoContenido; ?>  " minlength="10" maxlength="1400" required></textarea>

        <input type="url" name="imagen" placeholder="Link de la imagen &#xf03e"; title="Aquí pones el links :3" minlength="20" pattern="^(http(s)?:\/\/)+[\w\-\._~:\/?#[\]@!\$&\(\)\*\+=.]+$"><hr>

        <div class="flexRow">

            <input type="submit" name="<?php echo $FBoton; ?>" value="<?php echo $FBotonTexto; ?> &#xf06d";> 

            <input class="oculto campo key" type="password" name="codigo" value="<?php if (isset($FCodigo)) { echo $FCodigo; } ?>" placeholder="Code &#xf084" title="Codigo :3" maxlength="10">

            <div class="der"><a target="_blank" class="der t14" href="<?php echo $AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; ?>">Reglas</a></div>

        </div><hr>

        <?php if (isset($FCamposExtras) && $FCamposExtras==true): ?>

                <a target="_blank" class="boton2" href="<?php echo $AC_DIRECTORIO.'codigos'.$AGREGAR_PHP; ?>">Codigos <i class="fas fa-external-link-alt"></i></a>

                <a target="_blank" class="boton2" href="<?php echo $AC_DIRECTORIO.'imagenes'.$AGREGAR_PHP; ?>">Imagenes <i class="fas fa-external-link-alt"></i></a>

                <hr>

        <?php endif; ?>

        <div class="flexRow">Comenta Oni-chan :3 <p class="der t10">v0.3.1</p></div>

    </form>

</div>

<?php

} else {

    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }

        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");

}

?>