<div class="flex flex-evenly">
	<form method="post" style="width: 100%; max-width: 720px;">
		<div class="formulario" style="width: 99%;">
			<div class="p-4 t-strong">
				Configuraciones
			</div>
			<div class="flex flex-column gap-2">
				<label for="page_name">Nombre de la pagina:</label>
				<input type="text" name="page_name" id="page_name" placeholder="Nombre" value="<?= CONFIG["page_name"] ?? "" ?>">
				<label for="page_link">Enlace de la pagina:</label>
				<input type="url" name="page_link" id="page_link" placeholder="Enlace" value="<?= CONFIG["page_link"] ?? "" ?>">
				<label for="page_year">Año publicada:</label>
				<input type="number" min="1900" max="5000" name="page_year" id="page_year" placeholder="Año" value="<?= CONFIG["page_year"] ?? "" ?>">
				<label for="page_timezone">Zona horaria:</label>
				<?= viewSelect("page_timezone", TIMEZONE, CONFIG["page_timezone"] ?? "") ?>
				<label for="page_about">Acerca de:</label>
				<textarea class="textarea-full" rows="5" name="page_about" placeholder="Acerca de la pagina"><?= CONFIG["page_about"] ?? "" ?></textarea>
				<label for="page_tags">Etiquetas:</label>
				<textarea class="textarea-full" rows="3" name="page_tags" placeholder="Etiquetas, de, la, pagina"><?= CONFIG["page_tags"] ?? "" ?></textarea>
				<label for="page_scripts">Scripts:</label>
				<textarea class="textarea-full" rows="10" name="page_scripts" placeholder="<?= secureString("<!-- Google Ads/Analitycs, Font Awesome, Other... -->") ?>"><?= secureString(CONFIG["page_scripts"] ?? "") ?></textarea>
				<label class="flex flex-between gap-4 items-center">
					<span>Habilitar Scripts:</span>
					<?= viewSelect("page_scripts_active", [["" => "No"], ["1" => "Si"]], CONFIG["page_scripts_active"] ?? "") ?>
				</label>
				<label class="flex flex-between gap-4 items-center">
					<span>Habilitar SSL:</span>
					<?= viewSelect("page_ssl_active", [["" => "No"], ["1" => "Si"]], CONFIG["page_ssl_active"] ?? "") ?>
				</label>
				<label class="flex flex-between gap-4 items-center">
					<span>Habilitar extension .PHP:</span>
					<?= viewSelect("page_extension_php_active", [["" => "No"], ["1" => "Si"]], CONFIG["page_extension_php_active"] ?? "") ?>
				</label>
				<label class="flex flex-between gap-4 items-center">
					<span>⚠️ Modo DEBUG:</span>
					<?= viewSelect("page_debug_active", [["" => "No"], ["1" => "Si"]], CONFIG["page_debug_active"] ?? "") ?>
				</label>
			</div>
			<hr>
			<div class="flex flex-between p-8">
				<button class="boton" type="reset">
					❌ Cancelar
				</button>
				<button class="boton" type="submit" name="proccess" value="settings">
					💾 Guardar
				</button>
			</div>
		</div>
	</form>
</div>