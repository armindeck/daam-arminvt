<!-- daam core v<?= CORE["core_version"] . "-" . CORE["core_state"] ?> (Copyright © 2023 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/daam-arminvt -->
<!DOCTYPE html>
<html lang="<?= CONFIG["page_language"] ?? "es" ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= ($AC_TITULO ?? "") . " - " . (CONFIG["page_name"] ?? "") ?></title>
  <link rel="preload" href="<?= DIR ?>img/logo.png" as="image">
  <link rel="icon" type="image/png" href="<?= DIR ?>img/logo.png" sizes="128x128">
  <meta name="description" content="<?= $AC_METADESCRIPCION ?? "" ?>" />
  <meta property="og:title" content="<?= $AC_TITULO ?? "" ?>" />
  <meta property="og:description" content="<?= $AC_METADESCRIPCION2 ?? "" ?>" />
  <meta property="og:url" content="<?= URL_NOT_INDEX ?>">
  <link rel="canonical" href="<?= URL_NOT_INDEX ?>">
  <meta property="og:image" content="<?= DIR . '/img/' . $AC_IMG; ?>" />
  <meta property="og:site_name" content="<?= CONFIG["page_name"] ?? "" ?>" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $AC_TITULO ?? "" ?>">
  <meta name="twitter:description" content="<?= $AC_METADESCRIPCION ?? "" ?>">
  <meta name="twitter:image" content="<?= DIR . '/img/' . $AC_IMG; ?>">
  <meta name="keywords" content="<?= ($AC_METAETIQUETA ?? "") . ", " . (CONFIG["page_tags"] ?? "") ?>">
  <?= !empty(CONFIG["page_scripts_active"]) ? CONFIG["page_scripts"] ?? "" : "" ?>
  <style type="text/css">
    <?= file_exists(DIR."css/".(CONFIG["page_style"] ?? "")) ? file_get_contents(DIR."css/".(CONFIG["page_style"] ?? "")) ?? "" : "" ?>
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