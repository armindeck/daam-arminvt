<!-- daam core v<?= CORE["core_version"] . "-" . CORE["core_state"] ?> (Copyright © 2023 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/daam-arminvt -->
<?php

$DIRECTORIO_AQUI = $_SERVER["REQUEST_URI"];
$URL_WEB = $_SERVER["HTTP_HOST"];
$URL_FINAL = $_SERVER["REQUEST_URI"];
$URL = $URL_WEB . $URL_FINAL;

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= (CONFIG["page_name"] ?? "") . ': ' . $AC_TITULO; ?></title>
  <link rel="preload" href="<?= DIR ?>img/logo.png" as="image">
  <link rel="icon" type="image/png" href="<?= DIR ?>img/logo.png" sizes="128x128">
  <link rel="preload" href="<?= (CONFIG["page_name"] ?? "") . '/img/' . $AC_IMG; ?>" as="image">
  <link rel="stylesheet" type="text/css" href="<?= DIR ?>css/estilo.css">
  <meta name="description" content="<?= $AC_METADESCRIPCION ?? "" ?>" />
  <meta property="og:title" content="<?= $AC_TITULO ?? "" ?>" />
  <meta property="og:description" content="<?= $AC_METADESCRIPCION2 ?? "" ?>" />
  <meta property="og:url" content="<?= (CONFIG["page_name"] ?? "") . $URL_FINAL; ?>">
  <link rel="canonical" href="<?= (CONFIG["page_name"] ?? "") . $URL_FINAL; ?>">
  <meta property="og:image" content="<?= (CONFIG["page_link"] ?? "") . '/img/' . $AC_IMG; ?>" />
  <meta property="og:locale" content="es_CO" />
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= CONFIG["page_name"] ?? "" ?>" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $AC_TITULO ?? "" ?>">
  <meta name="twitter:description" content="<?= $AC_METADESCRIPCION ?? "" ?>">
  <meta name="twitter:image" content="<?= (CONFIG["page_link"] ?? "") . '/img/' . $AC_IMG; ?>">
  <meta name="keywords" content="<?= $AC_METAETIQUETA . ", " . (CONFIG["page_tags"] ?? "") ?>">
  <?= !empty(CONFIG["page_scripts_active"]) ? CONFIG["page_scripts"] ?? "" : "" ?>
</head>

<body data-theme="<?= getTheme(CONFIG["theme"] ?? "") ?>">
  <?php $elem = 0;
  $ex = 'scrDispladi';
  require DIR . 'datos/extenciones.php';
  $elem = 1;
  $ex = 'scrDispladi';
  require DIR . 'datos/extenciones.php'; ?>
  <section>
    <main>
      <?= $AC_EXTRA == 'si' ? viewAdsMessageMovementAndBanner(CONFIG["ads"] ?? [], DIR) : "" ?>
      <p class="titulo">
        <a href="<?= DIR ?>">Inicio</a> >
        <?= $AC_TITULO . (!empty($_GET["sc"]) ? ' > ' . secureString($_GET['sc']) : "") ?>
      </p>
      <?= !empty($MENSAJE) ? $lugarMensaje ?? "" : "" ?>
      <?= $AC_CONTENIDO ?? "" ?>
      <?php
      $elem = 2;
      $ex = 'scrDispladi';
      require DIR . 'datos/extenciones.php';
      if (isset($forimg)) {
        echo '<div class="flexCon">';
        for ($i = 0; $i <= 25; $i++) {
          echo '<div class="m2">
                    <div class="imagen"><a target="_blank" href="' . DIR . 'img/chb' . $i . '.PNG"><img class="img1" loading="lazy" src="' . DIR . 'img/chb' . $i . '.PNG" alt="' . $AC_TITULO . '" title="' . $AC_TITULO . '"></a></div>
                </div>';
        }
        echo '</div>';
      }
      if (!isset($ERROR_DARFORMATO)) {
        $ex = 'DarFormato';
        require DIR . 'datos/extenciones.php';
      }
      if (isset($TIPO)) {
        $iobi_dir = DIR . 'form/iobi/';
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
            require DIR . 'inc/views/admin-view.php';
            break;
          case 'entradas':
            $entradas = readJson(pathData() . "/entries.json");
            $ex = 'CargarEntradas';
            require DIR . 'datos/extenciones.php';
            break;
        }
      }
      if (isset($GALERIA) && $GALERIA == true) {
        $ex = 'CargarImagenes';
        require DIR . 'datos/extenciones.php';
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
      ?>
    </main>
    <?php $elem = 3;
    $ex = 'scrDispladi';
    require DIR . 'datos/extenciones.php'; ?>
  </section>
  <?php $elem = 4;
  $ex = 'scrDispladi';
  require DIR . 'datos/extenciones.php'; ?>
</body>

</html>