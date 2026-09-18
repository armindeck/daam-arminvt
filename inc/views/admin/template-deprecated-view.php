<?php
$arScrUsu = DIR . 'inc/scripts/us/scrDispladiCUS.php';
$arScrUsu2 = DIR . 'inc/scripts/us/scrDispladiCUS_POST.php';
$arScrUsu3 = DIR . 'inc/scripts/us/scrDisplaCUS.php';
$perScriptsML = false;
$chekScripts = '';
$entrada = 'scrCUS';
if ($carScripts) {
	$merr = '<p class="texinimen bgrojo">Los scripts estan incompletos o no existen.</p>';
	$converTEnvio1 = htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1)%3A+%3F>%0D%0A<hr><span+title%3D"Se+muestra+al+final+del+elemento+1">Mostrar+texto+<input+type%3D"checkbox"+name%3D"opctexto"+<%3Fphp+if(isset(%24' . $entrada . 'Texto)+%26%26+%24' . $entrada . 'Texto%3D%3D"on"){+echo+"checked"%3B+}+%3F>><%2Fspan>%0D%0A<%3Fphp+endif%3B+%3F>');
	$converTEnvio2 = htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp%0D%0Aif(%24_POST["opcmostrarscripts"]%3D%3D"on"){%0D%0A%09if(isset(%24_POST["opctexto"])){+%24opctexto%3Dtrim(%24_POST["opctexto"])%3B+}+else+{+%24opctexto%3D""%3B+}%0D%0A%09%24archiD%3D"\n<%3Fphp+%23CONTENIDO+POR+EL+USUARIO\n".' . "'%24" . $entrada . "Texto%3D'" . '."' . "'%24opctexto'%3B\n%3F>" . '"%3B%0D%0A}%0D%0A%3F>');
	$converTEnvio3 = htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1+%26%26+isset(%24' . $entrada . 'Texto)+%26%26+%24' . $entrada . 'Texto%3D%3D"on")%3A+%3F>%0D%0A++++<hr><p+class%3D"t14"><%3Fphp+echo+"Hola+mundo"%3B+%3F><%2Fp>%0D%0A<%3Fphp+endif%3B+%3F>');
	$v1 = true;
	$v2 = true;
	$v3 = true;
	if (!file_exists($arScrUsu)) {
		$v1 = false;
		$merr1 = '<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us&a=' . $arScrUsu . '&edicion=' . $converTEnvio1 . '">Displadi <i class="fas fa-external-link-alt"></i></a>';
	}
	if (!file_exists($arScrUsu2)) {
		$v2 = false;
		$merr2 = '<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us&a=' . $arScrUsu2 . '&edicion=' . $converTEnvio2 . '">POST <i class="fas fa-external-link-alt"></i></a>';
	}
	if (!file_exists($arScrUsu3)) {
		$v3 = false;
		$merr3 = '<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us&a=' . $arScrUsu3 . '&edicion=' . $converTEnvio3 . '">Displa <i class="fas fa-external-link-alt"></i></a>';
	}
	$vf = $v1 + $v2 + $v3;
	if ($vf === 3) {
		$perScriptsML = true;
		$chekScripts = 'checked';
	} else {
		echo $merr . '<p class="texini">';
		if (isset($merr1)) {
			echo $merr1;
		}
		if (isset($merr2)) {
			echo $merr2;
		}
		if (isset($merr3)) {
			echo $merr3;
		}
		echo '</p>';
	}
}
?>
<div class="flex flex-evenly">
	<form method="post" class="flex flex-column gap-0" style="width: 100%; max-width: 920px;">
		<details class="formulario" style="width: 99%;">
			<summary class="p-4 t-strong">
				Plantilla
			</summary>
			<div class="flex flex-column gap-4">
				<div>
					<label class="boton2">
						<span style="margin-right: 8px;">Cargar Scripts</span>
						<input type="checkbox" name="dis_cscr" <?php if (isset($chekScripts)) {
																	echo $chekScripts;
																} ?>>
					</label>
					<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us">
						Scripts <i class="fas fa-external-link-alt"></i>
					</a>
				</div>
			</div>
		</details>
		<hr>
		<?php #CONTENIDO >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		for ($idi = 0; $idi < 5; $idi++):
			switch ($idi) {
				case 0:
					$seccion = 'Header';
					$entrada = 'Cabeza';
					$entradamin = 'cabeza';
					break;
				case 1:
					$seccion = 'Menu';
					$entrada = 'Menu';
					$entradamin = 'menu';
					break;
				case 2:
					$seccion = 'Contenido Extra';
					$entrada = 'ContenidoExtra';
					$entradamin = 'contenidoextra';
					break;
				case 3:
					$seccion = 'Menu Lateral';
					$entrada = 'MenuLateral';
					$entradamin = 'menulateral';
					break;
				case 4:
					$seccion = 'Pie de Pagina';
					$entrada = 'PiedePagina';
					$entradamin = 'piedepagina';
					break;
			} ?>
			<details class="formulario">
				<summary class="p-4 t-strong">
					<?= $seccion ?>
				</summary>
				<div class="flex flex-column gap-4">
					<hr>
					<div class="flex flex-between flex-wrap gap-8 items-center">
						<select name="dis_m<?= $idi ?>">
							<option value="">Hidden</option>
							<option value="on" <?= !empty($displadi[$idi][0]) ? "selected" : "" ?>>Show</option>
						</select>
						<label>
							<span>Elementos</span>
							<input type="number" class="codigo " name="dis_ce<?= $idi; ?>" min="1" max="4" value="<?= $displadi[$idi][1]; ?>">
						</label>
					</div>
					<hr>
					<?php $elena = 1;
					if ($displadi[$idi][1] > 0) {
						$elena = $displadi[$idi][1];
					}
					for ($i = 0; $i < $elena; $i++): ?>
						<b>Elemento: #<?php echo $i + 1; ?></b>
						<hr>
						<input type="text" name="dis_ti_<?php echo $idi . '_' . $i; ?>" placeholder="Titulo" value="<?php echo htmlspecialchars($displadi[$idi][2][$i][1]); ?>"><br>
						<textarea class="texeditor2" name="dis_con_<?php echo $idi . '_' . $i; ?>" placeholder="Contenido" title="Las variables se convierten, debes volver a ponerlas."><?php echo htmlspecialchars($displadi[$idi][2][$i][2]); ?></textarea>
						<span>Mostrar elemento <input type="checkbox" name="dis_me_<?php echo $idi . '_' . $i; ?>" <?php if ($displadi[$idi][2][$i][0] != '') { echo 'checked'; } ?>></span>

						<?php #SCRIPTS POR EL USUARIO >>>>>>>>>>>>>>

						if (isset($perScriptsML) && $perScriptsML == true) {
							require $arScrUsu;
						}

						#SCRIPTS POR EL USUARIO >>>>>>>>>>>>>> 
						?>

					<?php endfor; ?>
				</div>
			</details>

		<?php endfor; ?>
		<hr>
		<div class="flex flex-between p-8">
			<button class="boton2" type="reset">
				❌ Cancelar
			</button>
			<button class="boton" type="submit" name="proccess" value="template">
				💾 Guardar
			</button>
		</div>
	</form>
</div>