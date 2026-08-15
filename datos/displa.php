<!-- © 2023 Armin | dbproject.rf.gd -->

<?php #CONTENIDO AVANZADO POR ARMIN

#===>

$DIRECTORIO_AQUI=$_SERVER["REQUEST_URI"];

$URL_WEB=$_SERVER["HTTP_HOST"];

$URL_FINAL=$_SERVER["REQUEST_URI"];

$URL=$URL_WEB . $URL_FINAL;

$ex='CargarTema'; require $AC_DIRECTORIO.'datos/extenciones.php';

date_default_timezone_set("America/Bogota");

if(!empty($_GET['admin'])){

    $Administracion=$AC_DIRECTORIO.'administracion/';

    header("location: {$Administracion}");

}

if(isset($_GET['s']) && $_GET['s'] == 'cerrar'){ session_destroy(); $lugar=$AC_DIRECTORIO.'iniciar'.$AGREGAR_PHP.'?ms=exi&msm=sesionfinalizada'; header("Location: {$lugar}"); }

?>

<!DOCTYPE html>

<html>

<head>

    <link rel="preload" href="<?php echo $AC_DIRECTORIO; ?>img/logo.png" as="image">

    <link rel="icon" type="image/png" href="<?php echo $AC_DIRECTORIO; ?>img/logo.png" sizes="128x128">

    <link rel="preload" href="http://<?php echo $EnlaceWebNoHttps.'/img/'.$AC_IMG; ?>" as="image">

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $NombreWeb.': '.$AC_TITULO; ?></title>

    <!--

        Theme Name: arminvt' Theme

        Theme URL: https://arminvt.site

        Version: 0.3.3

        Author: Armin

        Author URL: https://dbproject.rf.gd

    -->

    <link rel="preload" href="<?php echo $AC_DIRECTORIO.'css/'.$cargarEstilo; ?>" as="style" />

    <link rel="stylesheet" type="text/css" href="<?php echo $AC_DIRECTORIO.'css/'.$cargarEstilo; ?>">

    <link rel="preload" href="<?php echo $AC_DIRECTORIO; ?>css/estilo.css" as="style" />

    <link rel="stylesheet" type="text/css" href="<?php echo $AC_DIRECTORIO; ?>css/estilo.css">

    <meta name="description" content="<?php echo $AC_METADESCRIPCION; ?>" />

    <meta property="og:title" content="<?php echo $AC_TITULO; ?>" />

    <meta property="og:description" content="<?php echo $AC_METADESCRIPCION2; ?>" />

    <meta property="og:url" content="http://<?php echo "$EnlaceWebNoHttps$URL_FINAL"; ?>">

    <link rel="canonical" href="http://<?php echo "$EnlaceWebNoHttps$URL_FINAL"; ?>">

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

    <meta name="keywords" content="<?php echo ($AC_METADESCRIPCION.", ".$AC_METADESCRIPCION2.", ".$AC_METAETIQUETA.", ".$Año.", ".$NombreAdmin.", ".$NombreWeb.", ".$EnlaceWebNoHttps.", ".$EnlaceWeb); ?>, https://dbproject.rf.gd, dbproject">

    <?php $scrExtrasdispla=$AC_DIRECTORIO.'administracion/panel/scripts/scrExtrasdispla.php';

        if(file_exists($scrExtrasdispla)){ require_once $scrExtrasdispla;

    } ?>

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

            if($mod==true && $arc != ''){ if(file_exists($AC_DIRECTORIO.'/css/'.$arc)){ require_once $AC_DIRECTORIO.'css/'.$arc; $sp=true; } }

        }

        if(isset($_GET['temamodificadono'])){ if(file_exists($ad58)){ $sp=false; unlink($ad58); } }

        if(isset($sp) && $sp==true){ $tm=$AC_DIRECTORIO.'css/temafinal.php'; if(file_exists($tm)){ require_once $tm; } } ?>

        <?php #TEMA POR EL USUARIO

        if(isset($PermisoPorElUsuarioTema) && $PermisoPorElUsuarioTema==true){

            switch ($TemaPorElUsuario) {

                case 'temaLight': $tmuse='temaLight'; break;

                case 'temaLight2': $tmuse='temaLightGXNCV5'; break;

                case 'temaDark': $tmuse='temaDark'; break;

                case 'temaDark2': $tmuse='temaDarkPCGAMEXBOXV6'; break;

                case 'temaBlue': $tmuse='temaDarkCuniiCh'; break;

                default:

                    $tmuse='';

                    break;

            }

            if($tmuse!=''){

                require $AC_DIRECTORIO.'css/'.$tmuse.'.php';

                require $AC_DIRECTORIO.'css/temafinal.php';

            }

        }

        #TEMA POR EL USUARIO ?>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1879876946467439" crossorigin="anonymous"></script>

</head>

<body>

<?php $elem=0; $ex='scrDispladi'; require $AC_DIRECTORIO.'datos/extenciones.php';

$elem=1;  $ex='scrDispladi'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>

<section>

    <aside>

        <?php if($AC_EXTRA == 'si'){

            if(isset($texMensaje) && isset($anuncio)){

                echo '<div class="cen">'.$texMensaje.$anuncio.'</div>';

            }

        } ?>

        <p class="titulo">

            <a href="<?php echo $AC_DIRECTORIO; ?>">Inicio</a> >

            <?php echo $AC_TITULO;

                if(isset($_GET['ac'])){ echo ' > '.$_GET['ac']; }

            ?>

        </p>

        <?php #CARGAR CONTENIDO DE LA PAGINA :3

        if (isset($MENSAJE) && $MENSAJE==true) { echo $lugarMensaje; } ?>

        <?php if (isset($AC_CONTENIDO)) { echo $AC_CONTENIDO; }

        if (isset($forimg)){

            echo '<div class="flexCon">';

            for($i=0; $i<=25; $i++){

                echo '<div class="m2">

                    <div class="imagen"><a target="_blank" href="'.$AC_DIRECTORIO.'img/chb'.$i.'.PNG"><img class="img1" loading="lazy" src="'.$AC_DIRECTORIO.'img/chb'.$i.'.PNG" alt="'.$AC_TITULO.'" title="'.$AC_TITULO.'"></a></div>

                </div>';

            }

            echo '</div>';

        }

        if(!isset($ERROR_DARFORMATO)){ $ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php'; }

        if (isset($TIPO)) {

            $iobi_dir=$AC_DIRECTORIO.'form/iobi/';

            if($TIPO=='blog'){

                if(isset($_SESSION['rol']) && $_SESSION['rol']==5){

                    $accesoIobiform=true;

                }

                $accesoIobicargar=true;

            }

            if($TIPO=='busqueda'){

                echo '<form class="formulario" method="get" action="'.$AC_DIRECTORIO.'buscar'.$AGREGAR_PHP.'">

                Resultados de la busqueda: <input name="s" type="text" value="'. $s .'" placeholder="Buscar"><input type="submit" value="Buscar"></form>';

                // Directorio de archivos a buscar

                $dir = 'datos/contenidos';

                $archivos = scandir($dir);



                // Mostrar resultados de la búsqueda o todos los contenidos

                echo '<h2>';

                if (isset($_GET['s']) && !empty($_GET['s'])) {

                    $busqueda = strtolower($_GET['s']);

                    echo 'Resultados de la búsqueda:';

                } else {

                    echo 'Todos los contenidos:';

                }

                echo '</h2>';

                echo '<div class="flexCon">';



                $encontro = false;



                foreach ($archivos as $archivo) {

                    if ($archivo !== '.' && $archivo !== '..') {

                        $ruta = $dir.'/'.$archivo;

                        if (!is_dir($ruta) && substr($archivo, 0, 3) == 'cn_') {

                            require $ruta;



                            // Verificar si se proporciona una consulta de búsqueda

                            if (isset($busqueda)) {

                                // Realizar la comparación de búsqueda

                                $opc3_lower = strtolower($opc3);

                                if ($opcEstado == 'publico' && $opc3 != 'NONE' && $opc3 != 'none' && $opc4 != 'NONE' && $opc4 != 'none' &&

                                    (strpos($opc3_lower, $busqueda) !== false || strpos($opc2, $busqueda) !== false || strpos($opc1, $busqueda) !== false)) {

                                    echo '<div class="m2">

                                        <a href="'.$opc11.$opc12.'">

                                        <p class="ctg">'.$opc2.'</p>

                                        <div class="imagen">

                                        <img class="img1" src="./img/'.$opc4.'" loading="lazy" alt="">

                                        </div>

                                        <p class="contexcn t14">'.$opc1.'</p>

                                        </a>

                                    </div>';

                                    $encontro = true;

                                }

                            } else {

                                // Si no hay consulta de búsqueda, mostrar todos los contenidos

                                echo '<div class="m2">';

                                if ($opcEstado == 'publico' && $opc3 != 'NONE' && $opc3 != 'none' && $opc4 != 'NONE' && $opc4 != 'none') {

                                    echo '<a href="'.$opc11.$opc12.'">

                                        <p class="ctg">'.$opc2.'</p>

                                        <div class="imagen">

                                        <img class="img1" src="./img/'.$opc4.'" loading="lazy" alt="">

                                        </div>

                                        <p class="contexcn t14">'.$opc1.'</p>

                                        </a>';

                                    $encontro = true;

                                }

                                echo '</div>';

                            }

                        }

                    }

                }



                if (!$encontro) {

                    echo '<p>No se encontraron resultados.</p>';

                }



                echo '</div>';

            }

            if($TIPO=='foro' || $TIPO=='comentarios'){

                $accesoIobiform=true; $accesoIobicargar=true;

            }

            switch($TIPO){

                case 'panel': $NoAumentarContador=true; echo $lugarMensaje; require $AC_DIRECTORIO.'administracion/panel/contenido.php'; break;

                case 'entradas': require $AC_DIRECTORIO.'administracion/panel/entradas.php'; $ex='CargarEntradas'; require $AC_DIRECTORIO.'datos/extenciones.php'; break;

            }

        }

        if(isset($GALERIA) && $GALERIA==true){

            $ex='CargarImagenes'; require $AC_DIRECTORIO.'datos/extenciones.php';

        }

        if(isset($accesoIobiform) && $accesoIobiform==true){

            if(file_exists($iobi_dir.'formulario.php')){ $AccesoFormulario=true; require $iobi_dir.'formulario.php'; }

        }

        if(isset($accesoIobicargar) && $accesoIobicargar==true){

            if(file_exists($iobi_dir.'cargar.php')){

                $AccesoCargar=true; require $iobi_dir.'cargar.php'; }

        }

        $elem=2;  $ex='scrDispladi'; require $AC_DIRECTORIO.'datos/extenciones.php';

        $verifiContador=false;

        if(!isset($_SESSION['id']) && !isset($_SESSION['rol'])){

           $verifiContador=true;

        } else if (isset($_SESSION['id']) && $_SESSION['id'] != 5 && isset($_SESSION['rol']) && $_SESSION['rol'] !=5) {

            $verifiContador=true;

        }

        if($verifiContador==true){

            $ex='Contador';

            $UbicacionArchivoContador=$AC_DIRECTORIO.'visitas.txt';

            require $AC_DIRECTORIO.'datos/extenciones.php';

        }

        if(isset($TIPO) && $TIPO!='panel' or !isset($TIPO)): ?>

        <div class="titulo t18">Compartir en

            <a href="https://facebook.com/sharer.php?u=<?php echo $URL; ?>" title="Compartir en Facebook" rel="nofollow" target="_blank" href=""><i class="fab fa-facebook"></i></a>

            <a href="https://twitter.com/share?url=<?php echo $URL; ?>" title="Compartir en Twitter" rel="nofollow" target="_blank" href=""><i class="fab fa-twitter"></i></a>

            <a href="https://t.me/share/url?url=<?php echo $URL; ?>" title="Compartir en Telegram" rel="nofollow" target="_blank" href=""><i class="fab fa-telegram"></i></a>

            <a href="https://api.whatsapp.com/send?text=<?php echo $URL; ?>" title="Compartir en WhatsApp" rel="nofollow" target="_blank" href=""><i class="fab fa-whatsapp"></i></a>

        </div>

        <?php endif; ?>

    </aside>

    <?php $elem=3;  $ex='scrDispladi'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>

</section>

    <?php $elem=4;  $ex='scrDispladi'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>

</body>

</html>