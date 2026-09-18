<script>
  const TEMPLATE = <?= json_encode(TEMPLATE ?? []) ?>;

  function toggleTemplateDeleteButton() {
    const input = document.getElementById('template_id');
    const select = document.querySelector('select[name="templates"]');
    const wrap = document.getElementById('div-delete');
    const button = document.getElementById('template-delete-btn');

    if (!input || !select || !wrap || !button) return;

    const value = (input.value || '').trim();
    const selected = (select.value || '').trim();
    const exists = !!(value && selected && value === selected && Object.prototype.hasOwnProperty.call(TEMPLATE, value));

    wrap.hidden = !exists;
    button.hidden = !exists;
    button.disabled = !exists;
  }

  document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('template_id');
    if (input) {
      input.addEventListener('input', toggleTemplateDeleteButton);
      input.addEventListener('change', toggleTemplateDeleteButton);
    }
    toggleTemplateDeleteButton();
  });
</script>
<main class="flex flex-evenly flex-1">
  <form method="post" class="form-3">
    <div class="flex flex-column gap-6">
      <h2 class="p-8 t-center">Plantilla</h2>
      <div class="flex gap-6 items-center-desktop flex-column-mobil">
        <select class="flex-1-mobil w-full-mobil max-w-250-desktop max-w-full-mobil" name="templates" onchange="document.getElementById('template_id').value = this.value; document.getElementById('template_layout').value = TEMPLATE[this.value]['layout'] ?? ''; toggleTemplateDeleteButton();">
          <?php foreach (TEMPLATE ?? [] as $key => $template): ?>
            <option value="<?= $key ?>" <?= CONFIG["page_template"] === $key ? "selected" : "" ?>><?= $key ?></option>
          <?php endforeach; ?>
        </select>
        <input class="flex-1" type="text" name="template_id" id="template_id" placeholder="template_id" value="<?= CONFIG["page_template"] ?? "" ?>" minlength="1" required>
      </div>
      <textarea class="textarea-full" rows="20" name="template_layout" id="template_layout" placeholder="</Template>"><?= TEMPLATE[CONFIG["page_template"] ?? ""]['layout'] ?? "" ?></textarea>
      <details class="open" class="m-y-10" style="overflow: hidden; overflow-x: auto; max-width: 100%;">
        <summary class="p-4 t-strong">
          Commands
        </summary>
        <div class="flex flex-column gap-8" style="margin-top: 10px;">
          <div class="flex flex-between gap-6" style="padding: 0 12px;">
            <strong>Command</strong>
            <strong style="flex: 1; text-align: center;">Return</strong>
          </div>
          <?php foreach (commands(CONFIG, CORE, SLUG, URL, URL_NOT_INDEX, getTheme(CONFIG["page_theme"] ?? ""), DIR, auth(), $post ?? []) as $command => $value): ?>
              <hr style="margin: 2px 0px;">
              <div class="flex flex-column-mobil items-center-desktop flex-evenly gap-6" style="font-size: 12px; padding: 0px 12px;">
                <input type="text" value="<?= secureString($command) ?>" readonly>
                <input type="text" class="flex-1" value="<?=
                  secureString(in_array($command, [
                    "{{ post_content }}",
                    "{{ viewsRequire }}",
                    "{{ viewAlertMessage }}",
                    "{{ viewAdsMessajeAndBanner }}",
                    "{{ viewComments }}"
                  ]) ? "view(...)" : $value)
                  ?>" readonly>
            </div>
            <?php endforeach; ?>
        </div>
      </details>
    </div>
		<hr>
		<div class="flex flex-between p-8">
			<button class="boton-transparent-border" type="reset">
				❌ Cancelar
			</button>
			<button class="boton" type="submit" name="proccess" value="template">
				💾 Guardar
			</button>
		</div>
    <?php
      $selectedTemplate = CONFIG["page_template"] ?? "";
      $hasTemplateSelected = !empty($selectedTemplate) && isset(TEMPLATE[$selectedTemplate]) && count(TEMPLATE) > 0;
    ?>
    <div id="div-delete" <?= $hasTemplateSelected ? '' : 'hidden' ?>>
      <hr>
      <div class="flex flex-between p-8">
        <button id="template-delete-btn" class="boton-transparent-border" type="submit" name="proccess" value="template-delete" onclick="return confirm('¿Deseas eliminar esta plantilla?')">
          <i class="fas fa-trash"></i> Eliminar
        </button>
      </div>
    </div>
	</form>
</main>