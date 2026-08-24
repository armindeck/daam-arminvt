<?php

$AC_DIRECTORIO = $AC_DIRECTORIO ?? "../../";
if(!isset($TIPO) || $TIPO != "panel"){
  redirect($AC_DIRECTORIO."error.php?ms=err&msm=accdenegado");
}

?>
<div class="flex flex-evenly">
  <form method="post" action="actualizar.php" style="width: 100%; max-width: 720px;">
    <div class="formulario" style="width: 99%;">
      <div class="p-4 t-strong">
        Configuraciones
      </div>
      <div class="flex flex-column gap-2">
		<label for="page_name">Nombre de la pagina:</label>
        <input type="text" name="page_name" id="page_name" placeholder="Nombre" value="<?= CONFIG["config"]["page_name"] ?? "" ?>">
		<label for="page_link">Enlace de la pagina:</label>
        <input type="url" name="page_link" id="page_link" placeholder="Enlace" value="<?= CONFIG["config"]["page_link"] ?? "" ?>">
		<label for="page_year">Año publicada:</label>
        <input type="number" min="1900" max="5000" name="page_year" id="page_year" placeholder="Año" value="<?= CONFIG["config"]["page_year"] ?? "" ?>">
		<label for="page_about">Acerca de:</label>
        <textarea class="textarea-full" rows="5" name="page_about" placeholder="Acerca de la pagina"><?= CONFIG["config"]["page_about"] ?? "" ?></textarea>
		<label for="page_tags">Etiquetas:</label>
        <textarea class="textarea-full" rows="3" name="page_tags" placeholder="Etiquetas, de, la, pagina"><?= CONFIG["config"]["page_tags"] ?? "" ?></textarea>
		<label for="page_scripts">Scripts:</label>
        <textarea class="textarea-full" rows="10" name="page_scripts" placeholder="<?= secureString("<!-- Google Ads/Analitycs, Font Awesome, Other... -->") ?>"><?= secureString(CONFIG["config"]["page_scripts"] ?? "") ?></textarea>
		<label class="flex flex-between gap-4 items-center">
			<span>Habilitar Scripts:</span>
			<?= viewSelect("page_scripts_active", [["" => "No"], ["1" => "Si"]], CONFIG["config"]["page_scripts_active"] ?? "") ?>
		</label>
		<label class="flex flex-between gap-4 items-center">
			<span>Habilitar SSL:</span>
			<?= viewSelect("page_ssl_active", [["" => "No"], ["1" => "Si"]], CONFIG["config"]["page_ssl_active"] ?? "") ?>
		</label>
		<label class="flex flex-between gap-4 items-center">
			<span>Habilitar extension .PHP:</span>
			<?= viewSelect("page_extension_php_active", [["" => "No"], ["1" => "Si"]], CONFIG["config"]["page_extension_php_active"] ?? "") ?>
		</label>
		<label class="flex flex-between gap-4 items-center">
			<span>⚠️ Modo DEBUG:</span>
			<?= viewSelect("page_debug_active", [["" => "No"], ["1" => "Si"]], CONFIG["config"]["page_debug_active"] ?? "") ?>
		</label>
      </div>
      <hr>
      <div class="flex flex-between p-8">
        <input class="boton2" type="reset" value="Cancelar">
        <input class="boton" type="submit" name="IniConfig" value="Actualizar">
      </div>
    </div>
  </form>
</div>