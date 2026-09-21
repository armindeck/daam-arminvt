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

  function addTemplateComponent() {
    const container = document.getElementById('template-components');
    const template = document.getElementById('template-component-template');

    if (!container || !template) return;

    container.appendChild(template.content.cloneNode(true));
  }

  function removeTemplateComponent(button) {
    const container = document.getElementById('template-components');
    const component = button.closest('[data-template-component]');

    if (!container || !component) return;
    if (!confirm('¿Deseas quitar este componente?')) return;

    if (container.children.length === 1) {
      component.querySelector('input[name="component_id[]"]').value = '';
      component.querySelector('textarea[name="component_layout[]"]').value = '';
      return;
    }

    component.remove();
  }

  document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('template_id');
    if (input) {
      input.addEventListener('input', toggleTemplateDeleteButton);
      input.addEventListener('change', toggleTemplateDeleteButton);
    }

    document.getElementById('template-components')?.addEventListener('click', function(event) {
      if (event.target.matches('[data-remove-component]')) {
        removeTemplateComponent(event.target);
      }
    });

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
      <details class="m-y-10">
        <summary class="flex flex-between items-center">💠 Componentes <button class="boton-transparent" type="button" onclick="addTemplateComponent()">➕ Agregar</button></summary>
        <div id="template-components" class="flex flex-column gap-10">
          <?php foreach (TEMPLATE[CONFIG["page_template"] ?? ""]["components"] ?? [["id" => "", "layout" => ""]] as $key => $value): ?>
            <div class="flex flex-column gap-2" data-template-component>
              <input type="text" name="component_id[]" id="component_id[]" placeholder="component_id" value="<?= secureString($value["id"] ?? "") ?>">
              <textarea name="component_layout[]" id="component_layout[]" cols="30" rows="10" placeholder="<p>Component</p>"><?= secureString($value["layout"] ?? "") ?></textarea>
              <button class="boton-transparent-border" type="button" data-remove-component>➖ Quitar</button>
            </div>
          <?php endforeach; ?>
        </div>
        <template id="template-component-template">
          <div class="flex flex-column gap-2" data-template-component>
            <input type="text" name="component_id[]" placeholder="component_id">
            <textarea name="component_layout[]" cols="30" rows="10" placeholder="<p>Component</p>"></textarea>
            <button class="boton-transparent-border" type="button" data-remove-component>➖ Quitar</button>
          </div>
        </template>
      </details>
      <details >
        <summary class="p-4 t-strong">
          Commands
        </summary>
        <div class="flex flex-column gap-8" style="margin-top: 10px;">
          <div class="flex flex-between gap-6" style="padding: 0 12px;">
            <strong>Command</strong>
            <strong style="flex: 1; text-align: center;">Return</strong>
          </div>
          <?php foreach (
            array_merge(
              commandsTemplateUserComponents(TEMPLATE[CONFIG["page_template"] ?? ""]["components"] ?? ""), postToCommands(postTemplateCommandExample()),
              commands(
                config: CONFIG,
                core: CORE,
                slug: SLUG,
                url: URL,
                url_not_index: URL_NOT_INDEX,
                theme: getTheme(CONFIG["page_theme"] ?? ""),
                dir: DIR,
                auth: auth(),
                post: POST ?? [],
                viewAdsMessajeAndBanner: viewAdsMessageMovementAndBanner(CONFIG["ads"] ?? [], DIR),
                viewAdsThumbnail: viewAdsThumbnail(CONFIG["ads"] ?? [], DIR),
                is_admin: isAdmin(),
                php_extension: PHP_EXTENSION
              )
            ) as $command => $value
          ): ?>
            <hr style="margin: 2px 0px;">
            <div class="flex flex-column-mobil items-center-desktop flex-evenly gap-6" style="font-size: 12px; padding: 0px 12px;">
              <input type="text" value="<?= secureString($command) ?>" readonly>
              <input type="text" class="flex-1" value="<?= secureString(in_array($command, ["{{ viewsRequire }}", "{{ viewAlertMessage }}", "{{ viewComments }}"]) ? "view(...)" : $value) ?>" readonly>
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