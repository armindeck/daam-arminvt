<!-- © 2023 Armin | Arminvt.site -->

<?php #CONTENIDO AVANZADO POR ARMIN

#===>

$DIRECTORIO_AQUI=$_SERVER["REQUEST_URI"]; $URL=$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$ex='CargarTema'; require $AC_DIRECTORIO.'datos/extenciones.php';

date_default_timezone_set("America/Bogota");

if(!empty($_GET['admin'])){

    $Administracion=$AC_DIRECTORIO.'administracion/';

    header("location: {$Administracion}");

}

if(isset($_GET['s']) && $_GET['s'] == 'cerrar'){ session_destroy(); $lugar=$AC_DIRECTORIO.'iniciar'.$AGREGAR_PHP.'?ms=exi&msm=sesionfinalizada'; header("Location: {$lugar}"); }

#===>

?>

<!DOCTYPE html>

<html>

<head>

    <link rel="preload" href="<?php echo $AC_DIRECTORIO; ?>arminvtlogo.png" as="image">

    <link rel="icon" type="image/png" href="<?php echo $AC_DIRECTORIO; ?>arminvtlogo.png" sizes="128x128">

    <link rel="preload" href="<?php echo $EnlaceWeb.'/img/'.$AC_IMG; ?>" as="image">

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $NombreWeb.': '.$AC_TITULO; ?></title>

    <!--

        Theme Name: arminvt' Theme

        Theme URL: https://arminvt.site

        Version: 0.2

        Author: Armin

        Author URL: https://arminvt.site/armin

    -->

    <link rel="preload" href="<?php echo $AC_DIRECTORIO.'css/'.$cargarEstilo; ?>" as="style" />

    <link rel="stylesheet" type="text/css" href="<?php echo $AC_DIRECTORIO.'css/'.$cargarEstilo; ?>">

    <link rel="preload" href="<?php echo $AC_DIRECTORIO; ?>css/estilo.css" as="style" />

    <link rel="stylesheet" type="text/css" href="<?php echo $AC_DIRECTORIO; ?>css/estilo.css">

    <meta name="description" content="<?php echo $AC_METADESCRIPCION; ?>" />

    <meta property="og:title" content="<?php echo $AC_TITULO; ?>" />

    <meta property="og:description" content="<?php echo $AC_METADESCRIPCION2; ?>" />

    <meta property="og:url" content="<?php echo $URL; ?>" />

    <meta property="og:image" content="<?php echo $EnlaceWeb.'/img/'.$AC_IMG; ?>" />

    <meta property="og:locale" content="es_CO" />

    <meta property="og:type" content="website">

    <meta property="og:site_name" content="<?php echo $NombreWeb; ?>" />

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="<?php echo $AC_TITULO; ?>">

    <meta name="twitter:description" content="<?php echo $AC_METADESCRIPCION; ?>">

    <meta name="twitter:image" content="<?php echo $EnlaceWeb.'/img/'.$AC_IMG; ?>">

    <meta name="facebook:site" content="@<?php echo $UsuarioFacebook; ?>" />

    <meta name="twitter:site" content="@<?php echo $UsuarioTwitter; ?>" />

    <meta name="youtube:site" content="@<?php echo $UsuarioYouTube; ?>" />

    <meta name="tiktok:site" content="@<?php echo $UsuarioTiktok; ?>" />

    <meta name="patreon:site" content="@<?php echo $UsuarioPatreon; ?>" />

    <meta name="keywords" content="<?php echo ($AC_METADESCRIPCION.", ".$AC_METADESCRIPCION2.", ".$AC_METAETIQUETA.", ".$Año.", ".$NombreAdmin.", ".$NombreWeb.", ".$EnlaceWebNoHttps.", ".$EnlaceWeb); ?>">

    <?php require_once $AC_DIRECTORIO.'administracion/panel/extras/extraScripts.php'; ?>

</head>

<body>

<header>

    <a class="tituloWeb" href="<?php echo $EnlaceWeb; ?>"><?php echo $NombreWeb; ?> <i class="fas fa-meteor"></i></a>

    <div class="der">

        <?php if (!empty($_SESSION['id'])){ echo '<a class="boton" href="'.$AC_DIRECTORIO.'perfil'.$AGREGAR_PHP.'">Perfil</a><a class="boton" href="?s=cerrar">Salir</a>'; } ?>

        <a href="<?php echo $colores; ?>"><i class="<?php echo $emojiTema; ?>"></i></a>

        <a target="_blank" href="<?php echo $EnlaceFacebook; ?>"><i class="fab fa-facebook"></i></a>

        <a target="_blank" href="<?php echo $EnlaceYouTube; ?>"><i class="fab fa-youtube"></i></a>

        <a target="_blank" href="<?php echo $EnlaceTwitter; ?>"><i class="fab fa-twitter"></i></a>

        <a target="_blank" href="<?php echo $EnlaceTiktok; ?>"><i class="fab fa-tiktok"></i></a>

        <a target="_blank" href="<?php echo $EnlacePatreon; ?>"><i class="fab fa-patreon"></i></a>

        <a target="_blank" href="<?php echo $EnlaceKofi; ?>"><i class="fas fa-mug-hot"></i></a>

    </div>

</header>

<nav>

    <a title="<?php echo $NombreWeb; ?>" href="<?php echo $AC_DIRECTORIOs; ?>"><i class="fas fa-home"></i> Inicio</a>

    <a title="ForoLink: <?php echo $NombreWeb; ?>" href="<?php echo $AC_DIRECTORIOs.'forolink/'; ?>"><i class="fas fa-fire"></i> ForoLink</a>

    <a title="Blog: <?php echo $NombreWeb; ?>" href="<?php echo $AC_DIRECTORIOs.'blog/'; ?>"><i class="fas fa-blog"></i> Blog</a>

    <a title="Canal: <?php echo $NombreWeb; ?>" href="<?php echo $EnlaceYouTube; ?>?sub_confirmation=1" target="_blank"><i class="fab fa-youtube"></i> Sígueme</a>

</nav>

<section>

    <aside>

        <?php if ($AC_EXTRA == true){ echo '<div class="cen">'.$texMensaje.$anuncio.'</div>'; }; ?>

        <p class="titulo"><a href="<?php echo $AC_DIRECTORIO.'">'.$NombreWeb.'</a> > '.$AC_TITULO; if(isset($_GET['ac'])){ echo ' > '.$_GET['ac']; } ?></p>

        <?php #CARGAR CONTENIDO DE LA PAGINA :3

        #REPORTAR

        #elseif (isset($AC_CONTENIDOR1)) { echo $AC_CONTENIDOR1 . CargarComentario() . $AC_CONTENIDOR2; }

        #REPORTAR

        /* Versiones Antiguas

        if (isset($CONTENIDO_AQUI)) { echo $CONTENIDO_AQUI; }

        if (isset($FORO)) { require 'orden.php'; }; */

        if (isset($AC_CONTENIDO)) { echo $AC_CONTENIDO; }

        if (isset($forimg)){

            echo '<div class="flexCon">';

            for($i=0; $i<=25; $i++){

                echo '<div class="m2">

                    <div class="imagen"><a target="_blank" href="'.$AC_DIRECTORIO.'img/chb'.$i.'.PNG"><img class="img1" loading="lazy" src="'.$AC_DIRECTORIO.'img/chb'.$i.'.PNG" alt="'.$AC_TITULO.'" title="'.$AC_TITULO.'"></a></div>

                </div>';

            }

            echo '</div>';

        }

        if (isset($TIPO)) {

            switch($TIPO){

                case 'foro': require $AC_DIRECTORIO.'datos/foros/formulario.php'; require $AC_DIRECTORIO.'datos/foros/cargar.php'; break;

                case 'blog': require $AC_DIRECTORIO.'datos/foros/cargar.php'; break;

                case 'panel': $NoAumentarContador=true; echo $lugarMensaje; require $AC_DIRECTORIO.'administracion/panel/contenido.php'; break;

                case 'entradas': require $AC_DIRECTORIO.'administracion/panel/entradas.php'; $ex='CargarEntradas'; require $AC_DIRECTORIO.'datos/extenciones.php'; break;

                case 'CargarImagenes': $ex='CargarImagenes'; require $AC_DIRECTORIO.'datos/extenciones.php'; break;

            }

        }
        if(!isset($_SESSION['id']) && !isset($_SESSION['rol'])){
            $ex='Contador'; $UbicacionArchivoContador=$AC_DIRECTORIO.'visitas.txt'; require $AC_DIRECTORIO.'datos/extenciones.php';
        } else if (isset($_SESSION['id']) && $_SESSION['id'] != 5 && isset($_SESSION['rol']) && $_SESSION['rol'] !=5) {
            $ex='Contador'; $UbicacionArchivoContador=$AC_DIRECTORIO.'visitas.txt'; require $AC_DIRECTORIO.'datos/extenciones.php';
        }

        if(isset($TIPO) || !isset($TIPO) || $TIPO!='panel'){ ?>

        <div class="titulo t18">Compartir en

            <a href="https://facebook.com/sharer.php?u=<?php echo $URL; ?>" title="Compartir en Facebook" rel="nofollow" target="_blank" href=""><i class="fab fa-facebook"></i></a>

            <a href="https://twitter.com/share?url=<?php echo $URL; ?>" title="Compartir en Twitter" rel="nofollow" target="_blank" href=""><i class="fab fa-twitter"></i></a>

            <a href="https://t.me/share/url?url=<?php echo $URL; ?>" title="Compartir en Telegram" rel="nofollow" target="_blank" href=""><i class="fab fa-telegram"></i></a>

            <a href="https://api.whatsapp.com/send?text=<?php echo $URL; ?>" title="Compartir en WhatsApp" rel="nofollow" target="_blank" href=""><i class="fab fa-whatsapp"></i></a>

        </div>

        <?php } ?>

    </aside>

    <div class="menu-lateral">

        <?php echo $anuncio2; ?>

        <div class="bord">

            <p>Admin Vtuber :3</p>

            <a target="_blank" class="boton" title="Administrador" href="<?php echo $EnlaceAdmin; ?>"><?php echo $NombreAdmin; ?> <i class="fas fa-crown"></i></a>

            <p class="t14">Sígueme</p><hr>

            <a target="_blank" href="<?php echo $EnlaceFacebook; ?>"><i class="fab fa-facebook iredes"></i></a>

            <a target="_blank" href="<?php echo $EnlaceYouTube; ?>"><i class="fab fa-youtube iredes"></i></a>

            <a target="_blank" href="<?php echo $EnlaceTwitter; ?>"><i class="fab fa-twitter iredes"></i></a>

            <a target="_blank" href="<?php echo $EnlaceTiktok; ?>"><i class="fab fa-tiktok iredes"></i></a>

            <a target="_blank" href="<?php echo $EnlacePatreon; ?>"><i class="fab fa-patreon iredes"></i></a><hr>

            <p><a target="_blank" class="t14 boton" href="<?php echo $EnlaceKofi; ?>">Invitame un Cafe <i class="fas fa-mug-hot"></i></a></p>

       </div>

       <div class="bord">

            <p class="t14">Blog <a target="_blank" href="<?php echo $AC_DIRECTORIOs.'blog/'; ?>"> <i class="fas fa-blog iredes t14"></i></a></p><hr>

            <div class="noticias" style="height: 300px; overflow: auto;">

                <?php $AC_CARPETA='blog'; $MLADO=true; $ActivoNoticias=true; require $AC_DIRECTORIO.'datos/foros/cargar.php'; ?>

            </div>

       </div>

       <div class="bord">

            <p class="t14">Random</p><hr>

            <p class="t12"><?php $ex='CargarFrases'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?></p>

       </div>

       <div class="bord">

            <p class="t14">ForoLinks</p><hr>

            <?php $estados=$AC_DIRECTORIO.'forolink/datos/estados/'; ?>

            <p class="t12" title="Todos las publicaciones"><i class="fas fa-circle t12 azul"></i> <?php require $estados.'todos.txt'; echo ' total'; ?></p>

            <hr>

            <p class="t12"><i class="fas fa-eye deri t12"></i> <?php $visi=file_get_contents($AC_DIRECTORIO.'visitas.txt'); echo $visi; ?></p>

            <p class="t12"><i class="fas fa-fire deri t12"></i> v0.2 Beta</p>

       </div>

    </div>

</section>

<footer>

    © <?php echo $Año; ?> <?php echo $NombreWeb; ?>

    <div>

        <a target="_blank" href="<?php echo $EnlaceAdmin; ?>"><i class="fas fa-crown"></i></a>

        <a target="_blank" href="<?php echo $AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; ?>"><i class="fas fa-book"></i></a>

        <a target="_blank" href="<?php echo $AC_DIRECTORIOs.'acerca'.$AGREGAR_PHP; ?>"><i class="fas fa-tractor"></i></a>

    </div>

</footer>

</body>

</html>