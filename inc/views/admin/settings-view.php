<div class="flex flex-evenly">
	<form method="post" style="width: 100%; max-width: 920px;">
		<details class="formulario" style="width: 99%;" open>
			<summary class="p-4 t-strong">
				Configuraciones
			</summary>
			<div class="flex flex-column gap-4">
				<label for="page_name">Nombre de la pagina:</label>
				<input type="text" name="page_name" id="page_name" placeholder="Ingrese el nombre de la página" value="<?= CONFIG["page_name"] ?? "" ?>">
				<label for="page_link">Enlace de la pagina:</label>
				<input type="url" name="page_link" id="page_link" placeholder="Ingrese el enlace de la página" value="<?= CONFIG["page_link"] ?? "" ?>">
				<label for="page_year">Año publicada:</label>
				<input type="number" min="1900" max="5000" name="page_year" id="page_year" placeholder="Ingrese el año de publicación de la página" value="<?= CONFIG["page_year"] ?? "" ?>">
				<label for="page_timezone">Zona horaria:</label>
				<?= viewSelect("page_timezone", TIMEZONE, CONFIG["page_timezone"] ?? "", id: "page_timezone") ?>
				<label for="captcha_public_key">Llave pública de captcha:</label>
				<input type="text" name="captcha_public_key" id="captcha_public_key" placeholder="Ingresa la llave pública de captcha" value="<?= CONFIG["captcha"]["public"] ?? "" ?>">
				<label for="captcha_private_key">Llave privada de captcha:</label>
				<div class="flex items-center" style="position: relative;">
					<input type="password" class="flex-1" name="captcha_private_key" id="captcha_private_key" placeholder="Ingresa la llave privada de captcha" minlength="5" maxlength="200" value="<?= CONFIG["captcha"]["private"] ?? "" ?>" style="padding-right: 15px;">
					<button type="button" onclick="togglePasswordVisibility('captcha_private_key')" style="position: absolute; right: 10px; background-color: transparent; border: 0; cursor: pointer;">
						👁️
					</button>
				</div>
				<script>
					function togglePasswordVisibility(inputId) {
						const input = document.getElementById(inputId);
						if (!input) return;
						input.type = input.type === 'password' ? 'text' : 'password';
					}
				</script>

				<label for="page_about">Acerca de:</label>
				<textarea class="textarea-full" rows="5" id="page_about" name="page_about" placeholder="Acerca de la pagina"><?= CONFIG["page_about"] ?? "" ?></textarea>
				<label for="page_tags">Etiquetas:</label>
				<textarea class="textarea-full" rows="3" id="page_tags" name="page_tags" placeholder="Etiquetas, de, la, pagina"><?= CONFIG["page_tags"] ?? "" ?></textarea>
				<label for="page_scripts">Scripts:</label>
				<textarea class="textarea-full" rows="10" id="page_scripts" name="page_scripts" placeholder="<?= secureString("<!-- Google Ads/Analitycs, Font Awesome, Other... -->") ?>"><?= secureString(CONFIG["page_scripts"] ?? "") ?></textarea>
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
				<details class="p-4">
					<summary class="t-strong">Enlaces</summary>
					<div class="flex flex-column gap-4">
						<label for="page_link_400">400: Solicitud incorrecta:</label>
						<input type="url" name="page_link_400" id="page_link_400" placeholder="Enlace" value="<?= CONFIG["page_links"][400] ?? "" ?>">
						<label for="page_link_401">401: No autorizado:</label>
						<input type="url" name="page_link_401" id="page_link_401" placeholder="Enlace" value="<?= CONFIG["page_links"][401] ?? "" ?>">
						<label for="page_link_403">403: Prohibido:</label>
						<input type="url" name="page_link_403" id="page_link_403" placeholder="Enlace" value="<?= CONFIG["page_links"][403] ?? "" ?>">
						<label for="page_link_404">404: No encontrado:</label>
						<input type="url" name="page_link_404" id="page_link_404" placeholder="Enlace" value="<?= CONFIG["page_links"][404] ?? "" ?>">
						<label for="page_link_500">500: Error interno del servidor:</label>
						<input type="url" name="page_link_500" id="page_link_500" placeholder="Enlace" value="<?= CONFIG["page_links"][500] ?? "" ?>">
						<label for="page_link_503">503: Servicio no disponible:</label>
						<input type="url" name="page_link_503" id="page_link_503" placeholder="Enlace" value="<?= CONFIG["page_links"][503] ?? "" ?>">
					</div>
				</details>
			</div>
			<hr>
			<div class="flex flex-between p-8">
				<button class="boton2" type="reset">
					❌ Cancelar
				</button>
				<button class="boton" type="submit" name="proccess" value="settings">
					💾 Guardar
				</button>
			</div>
		</details>
	</form>
</div>