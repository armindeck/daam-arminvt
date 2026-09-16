<script>
  const TEMPLATE = <?= json_encode(TEMPLATE ?? []) ?>;
</script>
<main class="flex flex-evenly flex-1">
  <form method="post" class="form-3">
    <div class="flex flex-column gap-6">
      <h2 class="p-8 t-center">Plantilla</h2>
      <select name="templates" style="max-width: 100%;" onchange="document.getElementById('template_id').value = this.value; document.getElementById('template_layout').value = TEMPLATE[this.value]['layout'] ?? '';">
        <?php foreach (TEMPLATE ?? [] as $key => $template): ?>
          <option value="<?= $key ?>" <?= CONFIG["page_template"] === $key ? "selected" : "" ?>><?= $key ?></option>
        <?php endforeach; ?>
      </select>
      <input type="text" name="template_id" id="template_id" placeholder="template_id" value="<?= CONFIG["page_template"] ?? "" ?>" minlength="6" required>
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
              <div class="flex items-center flex-evenly gap-6" style="font-size: 12px; padding: 0px 12px;">
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
	</form>
</main>