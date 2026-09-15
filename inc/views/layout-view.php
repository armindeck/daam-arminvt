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
    <?= file_exists(DIR . "assets/css/" . (CONFIG["page_style"] ?? "")) ? file_get_contents(DIR . "assets/css/" . (CONFIG["page_style"] ?? "")) ?? "" : "" ?>
  </style>
</head>

<body data-theme="<?= getTheme(CONFIG["page_theme"] ?? "") ?>">
  <?php $elem = 0;
  require DIR . "inc/scripts/template.php";
  $elem = 1;
  require DIR . "inc/scripts/template.php"; ?>
  <div class="main-container">
    <main>
      <?= $AC_EXTRA ? viewAdsMessageMovementAndBanner(CONFIG["ads"] ?? [], DIR) : "" ?>
      <?= !empty($MENSAJE) ? view("components/alert") ?? "" : "" ?>
      <?= stringCommands(michelf\MarkdownExtra::defaultTransform($AC_CONTENIDO ?? ""), readJson(pathData() . "/commands.json"), DIR) ?>
      <?php $elem = 2;
      require DIR . "inc/scripts/template.php";

      if (SLUG == "/admin") {
        echo view("components/alert");
        require DIR . 'inc/views/admin-view.php';
      }

      if (SLUG == "/profile") {
        echo view("components/alert");
        echo view("profile", ["user" => userLoginSearch(USERS), "active_tab" => secureString($_GET["tab"] ?? "overview")]);
      }

      if (in_array(SLUG, ["/login", "/register", "/forgot-password"])) {
        echo view("components/alert");
        echo view(ltrim(SLUG, "/"), $_SESSION["form_data"] ?? []);
      }

      if (SLUG == "/index") {
        echo view("components/entries-cards", ["posts" => POSTS]);
      }

      if (POST["comments_active"] ?? false) {
        $iobi_dir = DIR . 'form/iobi/';
        $AccesoFormulario = true;
        require $iobi_dir . 'formulario.php';
        $AccesoCargar = true;
        require $iobi_dir . 'cargar.php';
      }
      ?>
    </main>
    <?php $elem = 3;
    require DIR . "inc/scripts/template.php"; ?>
  </div>
  <?php $elem = 4;
  require DIR . "inc/scripts/template.php"; ?>
</body>

</html>