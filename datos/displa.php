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

$extraCabeza=$AC_DIRECTORIO.'administracion/panel/extras/Cabeza/extraCabeza.php';
if (file_exists($extraCabeza)) { require_once $extraCabeza; } else { $Cabeza=false; }
$extraMenu=$AC_DIRECTORIO.'administracion/panel/extras/Menu/extraMenu.php';
if (file_exists($extraMenu)) { require_once $extraMenu; } else { $Menu=false; }
$extraMenuLateral=$AC_DIRECTORIO.'administracion/panel/extras/MenuLateral/extraMenuLateral.php';
if (file_exists($extraMenuLateral)) { require_once $extraMenuLateral; } else { $MenuLateral=false; }
$extraPiedePagina=$AC_DIRECTORIO.'administracion/panel/extras/PiedePagina/extraPiedePagina.php';
if (file_exists($extraPiedePagina)) { require_once $extraPiedePagina; } else { $PiedePagina=false; }
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

    <?php
        if(isset($_GET['temamodificado']) && $_GET['temamodificado']==true && isset($_GET['temamodificadoarc'])){
            $arc=$_GET['temamodificadoarc'];
            $diri=$AC_DIRECTORIO.'css/'.$arc;
            if(file_exists($diri)){
                file_put_contents($AC_DIRECTORIO.'css/tmmod.php','<?php $mod=true; $arc="'.$arc.'"; ?>');
                require $diri; $sp=true;
            }
        }
        $ad58=$AC_DIRECTORIO.'css/tmmod.php';
        if(file_exists($ad58)){
            require_once $ad58;
            if($mod==true && $arc != ''){ require_once $AC_DIRECTORIO.'css/'.$arc; $sp=true; }
        }
        if(isset($_GET['temamodificadono'])){ if(file_exists($ad58)){ $sp=false; unlink($ad58); } }
        if(isset($sp) && $sp==true){ $tm=$AC_DIRECTORIO.'css/temafinal.php'; if(file_exists($tm)){ require_once $tm; } } ?>
</head>

<body>

<?php if (isset($Cabeza) && $Cabeza == 'on'): ?>
<header>
    <?php for ($i=1; $i <=$CabezaElementos; $i++):
        $ex='CabezaElementos'; require $AC_DIRECTORIO.'datos/extenciones.php';
        if($vaLM == 'on'): if($vaLT != ''){ echo '<p>'.$vaLT.'</p><hr>'; }
            if($vaLC != ''){ echo $vaLC; } ?>
            <?php #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>
            $arcMNL=$AC_DIRECTORIO.'/administracion/panel/extras/Cabeza/extraDisplaCabeza.php';
            if(file_exists($arcMNL)){ require $arcMNL; }
            #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>> ?>
<?php endif; endfor; echo '</header>'; endif; ?>

<?php if (isset($Menu) && $Menu == 'on'): ?>
<nav>
    <?php for ($i=1; $i <=$MenuElementos; $i++):
        $ex='MenuElementos'; require $AC_DIRECTORIO.'datos/extenciones.php';
        if($vaLM == 'on'): if($vaLT != ''){ echo '<p>'.$vaLT.'</p><hr>'; }
            if($vaLC != ''){ echo $vaLC; } ?>
            <?php #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>
            $arcMNL=$AC_DIRECTORIO.'/administracion/panel/extras/Menu/extraDisplaMenu.php';
            if(file_exists($arcMNL)){ require $arcMNL; }
            #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>> ?>
<?php endif; endfor; echo '</nav>'; endif; ?>
<section>

    <aside>

        <?php if ($AC_EXTRA == 'si'){ echo '<div class="cen">'.$texMensaje.$anuncio.'</div>'; }; ?>

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

                case 'comentarios': require $AC_DIRECTORIO.'datos/foros/formulario.php'; require $AC_DIRECTORIO.'datos/foros/cargar.php'; break;

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

        if(isset($TIPO) || !isset($TIPO) || $TIPO!='panel'): ?>

        <div class="titulo t18">Compartir en

            <a href="https://facebook.com/sharer.php?u=<?php echo $URL; ?>" title="Compartir en Facebook" rel="nofollow" target="_blank" href=""><i class="fab fa-facebook"></i></a>

            <a href="https://twitter.com/share?url=<?php echo $URL; ?>" title="Compartir en Twitter" rel="nofollow" target="_blank" href=""><i class="fab fa-twitter"></i></a>

            <a href="https://t.me/share/url?url=<?php echo $URL; ?>" title="Compartir en Telegram" rel="nofollow" target="_blank" href=""><i class="fab fa-telegram"></i></a>

            <a href="https://api.whatsapp.com/send?text=<?php echo $URL; ?>" title="Compartir en WhatsApp" rel="nofollow" target="_blank" href=""><i class="fab fa-whatsapp"></i></a>

        </div>

        <?php endif; ?>

    </aside>
    <?php if (isset($MenuLateral) && $MenuLateral == 'on'): ?>
    <div class="menu-lateral">
        <?php echo $anuncio2;
        for ($i=1; $i <=$MenuLateralElementos; $i++):
            $ex='MenuLateralElementos'; require $AC_DIRECTORIO.'datos/extenciones.php';
            if($vaLM == 'on'): echo '<div class="bord">'; if($vaLT != ''){ echo '<p>'.$vaLT.'</p><hr>'; }
            if($vaLC != ''){ echo $vaLC; } ?>
            <?php #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>
            $arcMNL=$AC_DIRECTORIO.'/administracion/panel/extras/MenuLateral/extraDisplaMenuLateral.php';
            if(file_exists($arcMNL)){ require $arcMNL; }
            #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>> ?>
    <?php echo '</div>'; endif; endfor; echo '</div>'; endif; ?>
</section>
<?php if (isset($PiedePagina) && $PiedePagina == 'on'): ?>
<footer>
    <?php for ($i=1; $i <=$PiedePaginaElementos; $i++):
        $ex='PiedePaginaElementos'; require $AC_DIRECTORIO.'datos/extenciones.php';
        if($vaLM == 'on'): echo '<div>'; if($vaLT != ''){ echo '<p>'.$vaLT.'</p><hr>'; }
            if($vaLC != ''){ echo $vaLC; } ?>
            <?php #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>
            $arcMNL=$AC_DIRECTORIO.'/administracion/panel/extras/PiedePagina/extraDisplaPiedePagina.php';
            if(file_exists($arcMNL)){ require $arcMNL; }
            #EL USUARIO PUEDE CREAR SUS PROPIOS SCRIPTS >>>>>>>>>>>> ?>
<?php echo '</div>'; endif; endfor; echo '</footer>'; endif; ?>
</body>

</html>