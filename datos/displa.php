<!-- daam core v<?= CORE["core_version"] . "-" . CORE["core_state"] ?> (Copyright © 2023 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/daam-arminvt -->
<?php

$DIRECTORIO_AQUI = $_SERVER["REQUEST_URI"];
$URL_WEB = $_SERVER["HTTP_HOST"];
$URL_FINAL = $_SERVER["REQUEST_URI"];
$URL = $URL_WEB . $URL_FINAL;

$ex = 'CargarTema';
require $AC_DIRECTORIO . 'datos/extenciones.php';

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="preload" href="<?php echo $AC_DIRECTORIO; ?>img/logo.png" as="image">
  <link rel="icon" type="image/png" href="<?php echo $AC_DIRECTORIO; ?>img/logo.png" sizes="128x128">
  <link rel="preload" href="<?= (CONFIG["page_name"] ?? "") . '/img/' . $AC_IMG; ?>" as="image">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= (CONFIG["page_name"] ?? "") . ': ' . $AC_TITULO; ?></title>
  <link rel="preload" href="<?php echo $AC_DIRECTORIO . 'css/' . $cargarEstilo; ?>" as="style" />
  <link rel="stylesheet" type="text/css" href="<?php echo $AC_DIRECTORIO . 'css/' . $cargarEstilo; ?>">
  <link rel="preload" href="<?php echo $AC_DIRECTORIO; ?>css/estilo.css" as="style" />
  <link rel="stylesheet" type="text/css" href="<?php echo $AC_DIRECTORIO; ?>css/estilo.css">
  <meta name="description" content="<?php echo $AC_METADESCRIPCION; ?>" />
  <meta property="og:title" content="<?php echo $AC_TITULO; ?>" />
  <meta property="og:description" content="<?php echo $AC_METADESCRIPCION2; ?>" />
  <meta property="og:url" content="<?= (CONFIG["page_name"] ?? "").$URL_FINAL; ?>">
  <link rel="canonical" href="<?= (CONFIG["page_name"] ?? "").$URL_FINAL; ?>">
  <meta property="og:image" content="<?= (CONFIG["page_link"] ?? "") . '/img/' . $AC_IMG; ?>" />
  <meta property="og:locale" content="es_CO" />
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= CONFIG["page_name"] ?? "" ?>" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $AC_TITULO; ?>">
  <meta name="twitter:description" content="<?php echo $AC_METADESCRIPCION; ?>">
  <meta name="twitter:image" content="<?php echo (CONFIG["page_link"] ?? "") . '/img/' . $AC_IMG; ?>">
  <meta name="keywords" content="<?php echo ($AC_METADESCRIPCION . ", " . $AC_METADESCRIPCION2 . ", " . $AC_METAETIQUETA . ", " . date("Y") . ", " . (CONFIG["page_name"] ?? "") . ", " .  (CONFIG["page_link"] ?? "")); ?>">
  <?= !empty(CONFIG["page_scripts_active"]) ? CONFIG["page_scripts"] ?? "" : "" ?>
  <?php
  if (isset($_GET['temamodificado']) && $_GET['temamodificado'] == true && isset($_GET['temamodificadoarc'])) {
    $arc = $_GET['temamodificadoarc'];
    $diri = $AC_DIRECTORIO . 'css/' . $arc;
    if (file_exists($diri)) {
      file_put_contents($AC_DIRECTORIO . 'css/tmmod.php', '<?php $mod=true; $arc="' . $arc . '"; ?>');
      require $diri;
      $sp = true;
    }
  }
  $ad58 = $AC_DIRECTORIO . 'css/tmmod.php';
  if (file_exists($ad58)) {
    require_once $ad58;
    if ($mod == true && $arc != '') {
      if (file_exists($AC_DIRECTORIO . '/css/' . $arc)) {
        require_once $AC_DIRECTORIO . 'css/' . $arc;
        $sp = true;
      }
    }
  }
  if (isset($_GET['temamodificadono'])) {
    if (file_exists($ad58)) {
      $sp = false;
      unlink($ad58);
    }
  }
  if (isset($sp) && $sp == true) {
    $tm = $AC_DIRECTORIO . 'css/temafinal.php';
    if (file_exists($tm)) {
      require_once $tm;
    }
  } ?>
</head>

<body>
  <?php $elem = 0;
  $ex = 'scrDispladi';
  require $AC_DIRECTORIO . 'datos/extenciones.php';
  $elem = 1;
  $ex = 'scrDispladi';
  require $AC_DIRECTORIO . 'datos/extenciones.php'; ?>
  <section>
    <main>
      <?= $AC_EXTRA == 'si' ? viewAdsMessageMovementAndBanner(CONFIG["ads"] ?? [], $AC_DIRECTORIO) : "" ?>
      <p class="titulo">
        <a href="<?php echo $AC_DIRECTORIO; ?>">Inicio</a> >
        <?php echo $AC_TITULO;
        if (isset($_GET['ac'])) {
          echo ' > ' . $_GET['ac'];
        }
        ?>
      </p>
      <?php #CARGAR CONTENIDO DE LA PAGINA :3
      if (isset($MENSAJE) && $MENSAJE == true) {
        echo $lugarMensaje;
      } ?>
      <?php if (isset($AC_CONTENIDO)) {
        echo $AC_CONTENIDO;
      }
      $elem = 2;
      $ex = 'scrDispladi';
      require $AC_DIRECTORIO . 'datos/extenciones.php';
      if (isset($forimg)) {
        echo '<div class="flexCon">';
        for ($i = 0; $i <= 25; $i++) {
          echo '<div class="m2">
                    <div class="imagen"><a target="_blank" href="' . $AC_DIRECTORIO . 'img/chb' . $i . '.PNG"><img class="img1" loading="lazy" src="' . $AC_DIRECTORIO . 'img/chb' . $i . '.PNG" alt="' . $AC_TITULO . '" title="' . $AC_TITULO . '"></a></div>
                </div>';
        }
        echo '</div>';
      }
      if (!isset($ERROR_DARFORMATO)) {
        $ex = 'DarFormato';
        require $AC_DIRECTORIO . 'datos/extenciones.php';
      }
      if (isset($TIPO)) {
        $iobi_dir = $AC_DIRECTORIO . 'form/iobi/';
        if ($TIPO == 'blog') {
          if (isset($_SESSION['rol']) && $_SESSION['rol'] == 5) {
            $accesoIobiform = true;
          }
          $accesoIobicargar = true;
        }
        if ($TIPO == 'foro' || $TIPO == 'comentarios') {
          $accesoIobiform = true;
          $accesoIobicargar = true;
        }
        switch ($TIPO) {
          case 'panel':
            $NoAumentarContador = true;
            echo $lugarMensaje;
            require $AC_DIRECTORIO . 'inc/views/admin-view.php';
            break;
          case 'entradas':
            $entradas = readJson(pathData()."/entries.json");
            $ex = 'CargarEntradas';
            require $AC_DIRECTORIO . 'datos/extenciones.php';
            break;
        }
      }
      if (isset($GALERIA) && $GALERIA == true) {
        $ex = 'CargarImagenes';
        require $AC_DIRECTORIO . 'datos/extenciones.php';
      }
      if (isset($accesoIobiform) && $accesoIobiform == true) {
        if (file_exists($iobi_dir . 'formulario.php')) {
          $AccesoFormulario = true;
          require $iobi_dir . 'formulario.php';
        }
      }
      if (isset($accesoIobicargar) && $accesoIobicargar == true) {
        if (file_exists($iobi_dir . 'cargar.php')) {
          $AccesoCargar = true;
          require $iobi_dir . 'cargar.php';
        }
      }
      
      if (isset($TIPO) && $TIPO != 'panel' or !isset($TIPO)): ?>
        <div class="titulo t18">Compartir en
          <a href="https://facebook.com/sharer.php?u=<?php echo $URL; ?>" title="Compartir en Facebook" rel="nofollow" target="_blank" href=""><i class="fab fa-facebook"></i></a>
          <a href="https://twitter.com/share?url=<?php echo $URL; ?>" title="Compartir en Twitter" rel="nofollow" target="_blank" href=""><i class="fab fa-twitter"></i></a>
          <a href="https://t.me/share/url?url=<?php echo $URL; ?>" title="Compartir en Telegram" rel="nofollow" target="_blank" href=""><i class="fab fa-telegram"></i></a>
          <a href="https://api.whatsapp.com/send?text=<?php echo $URL; ?>" title="Compartir en WhatsApp" rel="nofollow" target="_blank" href=""><i class="fab fa-whatsapp"></i></a>
        </div>
      <?php endif; ?>
    </main>
    <?php $elem = 3;
    $ex = 'scrDispladi';
    require $AC_DIRECTORIO . 'datos/extenciones.php'; ?>
  </section>
  <?php $elem = 4;
  $ex = 'scrDispladi';
  require $AC_DIRECTORIO . 'datos/extenciones.php'; ?>
</body>

</html>