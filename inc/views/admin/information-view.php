<main class="flex flex-evenly flex-1">
  <div method="post" class="form-3">
    <div class="flex flex-column gap-6">
      <h2 class="p-8 t-center">Información</h2>
      <small><?= CORE["core_about"] ?? "" ?></small>
      <hr>
      <div class="flex flex-between">
        <span>Creador:</span>
        <span><a href="<?= CORE["core_creator_link"] ?? "" ?>" target="_blank"><?= CORE["core_creator_name"] ?? "" ?></a></span>
      </div>
      <div class="flex flex-between">
        <span>Nombre:</span>
        <span><?= CORE["core_name"] ?? "" ?></span>
      </div>
      <div class="flex flex-between">
        <span>Version:</span>
        <span><?= (CORE["core_version"] ?? "") . "-" . (CORE["core_state"] ?? "") ?></span>
      </div>
      <div class="flex flex-between">
        <span>Fecha:</span>
        <span><?= (CORE["core_created"] ?? "") . " ~ " . (CORE["core_updated"] ?? "") ?></span>
      </div>
      <hr>
      <small><?= file_exists(raiz() . "/LICENSE") ? nl2br(secureString(file_get_contents(raiz() . "/LICENSE"))) : "License file not found" ?></small>
      <hr>
      <style type="text/css">
        ul,
        li {
          border: none;
          box-shadow: none;
          text-decoration: none;
        }

        ul {
          margin: 12px 0 12px 40px;
        }
      </style>
      <?= michelf\MarkdownExtra::defaultTransform(file_exists(raiz() . "/CHANGELOG.md") ? secureString(file_get_contents(raiz() . "/CHANGELOG.md")) : "CHANGELOG file not found") ?>
    </div>
  </div>
</main>