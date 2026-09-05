<!-- daam core v<?= CORE["core_version"] . "-" . CORE["core_state"] ?> (Copyright © 2023 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/daam-arminvt -->
<!DOCTYPE html>
<html lang="<?= CONFIG["page_language"] ?? "es" ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= ($AC_TITULO ?? "") . " - " . (CONFIG["page_name"] ?? "") ?></title>
  <link rel="preload" href="<?= DIR ?>assets/img/favicon.png" as="image">
  <link rel="icon" type="image/png" href="<?= DIR ?>assets/img/favicon.png" sizes="128x128">
  <meta name="description" content="<?= $AC_METADESCRIPCION ?? "" ?>" />
  <meta property="og:title" content="<?= $AC_TITULO ?? "" ?>" />
  <meta property="og:description" content="<?= $AC_METADESCRIPCION2 ?? "" ?>" />
  <meta property="og:url" content="<?= URL_NOT_INDEX ?>">
  <link rel="canonical" href="<?= URL_NOT_INDEX ?>">
  <meta property="og:image" content="<?= DIR . '/assets/img/' . $AC_IMG; ?>" />
  <meta property="og:site_name" content="<?= CONFIG["page_name"] ?? "" ?>" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $AC_TITULO ?? "" ?>">
  <meta name="twitter:description" content="<?= $AC_METADESCRIPCION ?? "" ?>">
  <meta name="twitter:image" content="<?= DIR . '/assets/img/' . $AC_IMG; ?>">
  <meta name="keywords" content="<?= ($AC_METAETIQUETA ?? "") . ", " . (CONFIG["page_tags"] ?? "") ?>">
  <?= !empty(CONFIG["page_scripts_active"]) ? CONFIG["page_scripts"] ?? "" : "" ?>
  <style type="text/css">
    <?= file_exists(DIR."assets/css/".(CONFIG["page_style"] ?? "")) ? file_get_contents(DIR."assets/css/".(CONFIG["page_style"] ?? "")) ?? "" : "" ?>
  </style>
</head>

<body data-theme="<?= getTheme(CONFIG["page_theme"] ?? "") ?>">
  <?php $elem = 0;
  $ex = 'scrDispladi';
  require DIR . 'datos/extenciones.php';
  $elem = 1;
  $ex = 'scrDispladi';
  require DIR . 'datos/extenciones.php'; ?>
  <section>
    <main>
      <?= $AC_EXTRA == 'si' ? viewAdsMessageMovementAndBanner(CONFIG["ads"] ?? [], DIR) : "" ?>
      <?= !empty($MENSAJE) ? $lugarMensaje ?? "" : "" ?>
      <?= stringCommands(michelf\MarkdownExtra::defaultTransform($AC_CONTENIDO ?? ""), readJson(pathData()."/commands.json"), DIR) ?>
      <?php
      $elem = 2;
      $ex = 'scrDispladi';
      require DIR . 'datos/extenciones.php';
      if (!isset($ERROR_DARFORMATO)) {
        $ex = 'DarFormato';
        require DIR . 'datos/extenciones.php';
      }

      if(SLUG == "/admin"){
        echo $lugarMensaje;
        require DIR . 'inc/views/admin-view.php';
      }

      if(SLUG == "/index"){
        $entradas = POSTS;
        $ex = 'CargarEntradas';
        require DIR . 'datos/extenciones.php';
      }

      if(POST["comments_active"] ?? false){
        $iobi_dir = DIR . 'form/iobi/';
        $AccesoFormulario = true;
        require $iobi_dir . 'formulario.php';
        $AccesoCargar = true;
        require $iobi_dir . 'cargar.php';
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