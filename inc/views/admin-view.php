<?php

$sections = implode("", array_map(fn($section) => "<a href=\"?sc={$section['id']}\"><i class=\"{$section['icon']}\"></i> {$section['label']}</a>", ADMIN["section"] ?? ""));
?>

<!-- daam core v<?= CORE["core_version"] . "-" . CORE["core_state"] ?> (Copyright © 2023 Armin Deck – Licencia de Uso No Transferible) – https://github.com/armindeck/daam-arminvt -->
<!DOCTYPE html>
<html lang="<?= CONFIG["page_language"] ?? "es" ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="preload" href="<?= DIR ?>assets/img/favicon.png" as="image">
  <link rel="icon" type="image/png" href="<?= DIR ?>assets/img/favicon.png" sizes="128x128">
  <meta name="description" content="Admin" />
  <meta property="og:title" content="Admin" />
  <meta property="og:description" content="Admin" />
  <meta property="og:url" content="<?= URL_NOT_INDEX ?>">
  <link rel="canonical" href="<?= URL_NOT_INDEX ?>">
  <meta property="og:image" content="<?= DIR . '/assets/img/thumbnail.png'; ?>" />
  <meta property="og:site_name" content="<?= CONFIG["page_name"] ?? "" ?>" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Admin">
  <meta name="twitter:description" content="Admin">
  <meta name="twitter:image" content="<?= DIR . '/assets/img/thumbnail.png'; ?>">
  <meta name="keywords" content="<?= "admin," . (CONFIG["page_tags"] ?? "") ?>">
  <?= !empty(CONFIG["page_scripts_active"]) ? CONFIG["page_scripts"] ?? "" : "" ?>
  <style type="text/css">
    <?= file_exists(DIR . "assets/css/admin.css") ? file_get_contents(DIR . "assets/css/admin.css") ?? "" : "" ?>
  </style>
</head>

<body data-theme="<?= getTheme(CONFIG["page_theme"] ?? "") ?>">
    <input type="checkbox" class="check-nav" id="check-nav" hidden>
    <header class="header">
        <div class="header-nav">
            <a href="<?= DIR. "admin" . PHP_EXTENSION ?>"><strong><i class="fas fa-fire"></i> Admin</strong></a>
        </div>
        <nav class="header-nav">
            <a href="<?= DIR ?>"><i class="fas fa-home"></i></a>
            <label for="check-nav" class="check-nav-icon">
                <a>
                    <span class="icon-bars"><i class="fas fa-bars"></i></span>
                    <span class="icon-times"><i class="fas fa-times"></i></span>
                </a>
            </label>
            <a href="?theme=<?= getTheme() == "dark" ? "light" : "dark" ?>"><i class="fas fa-<?= getTheme() == "dark" ? "sun" : "moon" ?>"></i></a>
            <a href="?logout=false"><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
    <nav class="nav">
        <?= $sections ?? "" ?>
    </nav>
    <input type="checkbox" class="check-alert" id="check-alert" hidden <?= ($alert["active"] ?? false) ? "checked" : "" ?>>
    <div class="alert <?= $alert["type"] ?? "" ?>">
        <label for="check-alert"><i class="fas fa-times"></i></label>
        <span><?= $alert["message"] ?? "" ?></span>
    </div>

    <div class="container">
    <?= !empty($load_section_admin) ? view("admin/". ($get_sc ?? "")) : "" ?>
    </div>

    <footer class="footer">
        <span>&copy; 2026 <a href="<?= CORE["core_creator_link"] ?? "" ?>" target="_blank"><?= CORE["core_creator_name"] ?? "" ?></a></span>
    </footer>
</body>

</html>