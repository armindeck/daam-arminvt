<main class="flex flex-evenly flex-1">
  <form method="post" class="form-3">
    <div class="flex flex-column gap-6">
      <h2 class="p-8 t-center">Anuncios</h2>
      <div class="flex flex-column gap-4">
        <textarea class="textarea-full" rows="5" name="message_content" placeholder="Mensaje"><?= CONFIG["ads"]["message"]["content"] ?? "" ?></textarea>
        <input type="url" name="message_link" placeholder="Enlace" value="<?= CONFIG["ads"]["message"]["link"] ?? "" ?>">
        <?= viewSelect("message_active", [["" => "No mostrar"], ["1" => "Mostrar"]], CONFIG["ads"]["message"]["active"] ?? "") ?>
      </div>
      <div class="p-4 t-strong">
        Banner
      </div>
      <div class="flex flex-column gap-2">
        <?= viewSelectImg("banner_image", CONFIG["ads"]["banner"]["image"] ?? "") ?>
        <input type="url" name="banner_link" placeholder="Enlace" value="<?= CONFIG["ads"]["banner"]["link"] ?? "" ?>">
        <?= viewSelect("banner_active", [["" => "No mostrar"], ["1" => "Mostrar"]], CONFIG["ads"]["banner"]["active"] ?? "") ?>
      </div>
      <div class="p-4 t-strong">
        Miniatura
      </div>
      <div class="flex flex-column gap-2">
        <?= viewSelectImg("thumbnail_image", CONFIG["ads"]["thumbnail"]["image"] ?? "") ?>
        <input type="url" name="thumbnail_link" placeholder="Enlace" value="<?= CONFIG["ads"]["thumbnail"]["link"] ?? "" ?>">
        <?= viewSelect("thumbnail_active", [["" => "No mostrar"], ["1" => "Mostrar"]], CONFIG["ads"]["thumbnail"]["active"] ?? "") ?>
      </div>
      <hr>
      <div class="flex flex-between p-8">
        <button class="boton-transparent-border" type="reset">
          ❌ Cancelar
        </button>
        <button class="boton" type="submit" name="proccess" value="ads">
          💾 Guardar
        </button>
      </div>
    </div>
  </form>
</main>