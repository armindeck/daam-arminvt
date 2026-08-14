<?php if(isset($TIPO)){ if($TIPO='panel'){ ?>
<p class="texini">Configuración avanzada <span class="t12">v0.3 Beta</span></p>
<form method="post" action="actualizar.php">
	<p class="texini tb bgamarillo c48">Sección > Cabeza</p>
	<?php #VERIFICAR SCRIPTS
		$perScriptsML=false; $chekScripts='';
		if(isset($CabezaScripts) && $CabezaScripts=='on'):
			$arScrUsu='extras/Cabeza/extraScriptsCabeza.php';
			$arScrUsu2='extras/Cabeza/extraScriptsCabeza_POST.php';
			$arScrUsu3='extras/Cabeza/extraDisplaCabeza.php';
			$merr='<p class="texini bgrojo">Los scripts estan incompletos o no existen.</p>';

			$converTEnvio1=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1)%3A+%3F>%0D%0A<hr><span+title%3D"Se+muestra+al+final+del+elemento+1">Mostrar+texto+<input+type%3D"checkbox"+name%3D"opctexto"+<%3Fphp+if(isset(%24CabezaTexto)+%26%26+%24CabezaTexto%3D%3D"on"){+echo+"checked"%3B+}+%3F>><%2Fspan>%0D%0A<%3Fphp+endif%3B+%3F>');

			$converTEnvio2=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp%0D%0Aif(%24_POST["opccabezascripts"]%3D%3D"on"){%0D%0A%09if(isset(%24_POST["opctexto"])){+%24opctexto%3Dtrim(%24_POST["opctexto"])%3B+}+else+{+%24opctexto%3D""%3B+}%0D%0A%09%24archiD%3D"\n<%3Fphp+%23CONTENIDO+POR+EL+USUARIO\n".'."'%24CabezaTexto%3D'".'."'."'%24opctexto'%3B\n%3F>".'"%3B%0D%0A}%0D%0A%3F>');

			$converTEnvio3=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1+%26%26+isset(%24CabezaTexto)+%26%26+%24CabezaTexto%3D%3D"on")%3A+%3F>%0D%0A++++<hr><p+class%3D"t14"><%3Fphp+echo+"Hola+mundo"%3B+%3F><%2Fp>%0D%0A<%3Fphp+endif%3B+%3F>');

			if(file_exists($arScrUsu)){ $v1=true; } else { $v1=false; $merr1='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Cabeza&a=extraScriptsCabeza&edicion='.$converTEnvio1.'">Scripts <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu2)){ $v2=true; } else { $v2=false; $merr2='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Cabeza&a=extraScriptsCabeza_POST&edicion='.$converTEnvio2.'">POST <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu3)){ $v3=true; } else { $v3=false; $merr3='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Cabeza&a=extraDisplaCabeza&edicion='.$converTEnvio3.'">Displa <i class="fas fa-external-link-alt"></i></a>'; }
			$vf=$v1+$v2+$v3;
			if($vf===3){ $perScriptsML=true; $chekScripts='checked'; } else {
				echo $merr.'<p class="texini">';
					if(isset($merr1)){ echo $merr1; }
					if(isset($merr2)){ echo $merr2; }
					if(isset($merr3)){ echo $merr3; }
				echo '</p>';
			}
		endif; ?>
	<p class="texini t14"><b>Mostrar cabeza
		<input type="checkbox" name="opccabeza" <?php if(isset($Cabeza) && $Cabeza=='on'){ echo 'checked'; } ?>></b>
		Codigos <input type="checkbox" name="opccabezacodigos" <?php if(isset($CabezaCodigos) && $CabezaCodigos=='on'){ echo 'checked'; } ?>>
		Scripts <input type="checkbox" name="opccabezascripts" <?php if(isset($chekScripts)){ echo $chekScripts; } ?>>
		<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Cabeza">Scripts <i class="fas fa-external-link-alt"></i></a>
		v0.3 Beta
	</p>
	<div class="flexCon">
	<?php for ($i=1; $i <=4; $i++): ?>
		<?php $ex='CabezaElementos'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>
		<div class="formulario">
			<b>Elemento: #<?php echo $i; ?></b><hr><input type="text" name="opctitulo<?php echo $i; ?>" placeholder="Titulo" value="<?php echo htmlspecialchars($vaLT); ?>"><br>
			<textarea class="texeditor2" name="opccontenido<?php echo $i; ?>" placeholder="Contenido" title="Las variables se convierten, debes volver a ponerlas."><?php echo htmlspecialchars($vaLC); ?></textarea>
			<span>Mostrar elemento <input type="checkbox" name="opcmostrar<?php echo $i; ?>" <?php if($vaLM=='on'){ echo 'checked'; } ?>></span>
			<?php #SCRIPTS POR EL USUARIO >>>>>>>>>>>>>>
			if(isset($perScriptsML) && $perScriptsML==true){ require $arScrUsu; }
			#SCRIPTS POR EL USUARIO >>>>>>>>>>>>>> ?>
		</div>
	<?php endfor; ?>
	</div>
	<div class="cen">
		<input type="number" class="codigo oculto" name="opcelementos" value="<?php $msa=$i-1; echo $msa; ?>">
		<?php if(isset($CabezaCodigos) && $CabezaCodigos=='on'): ?>
		<div class="comentario">
			<textarea class="texeditor2 w100">
				<?php $con='extras/Cabeza/extraCabeza.php';
				if(file_exists($con)){ $mos=htmlspecialchars(file_get_contents($con)); echo $mos; }
				?>
			</textarea>
		</div>
		<?php endif; ?>
		<input class="boton" type="reset" value="Cancelar &#xf00d">
		<input class="boton" type="submit" name="IniDispladiCabeza" value="Actualizar &#xf044">
	</div>
</form>
<form method="post" action="actualizar.php">
	<p class="texini tb bgamarillo c48">Sección > Menu</p>
	<?php #VERIFICAR SCRIPTS
		$perScriptsML=false; $chekScripts='';
		if(isset($MenuScripts) && $MenuScripts=='on'):
			$arScrUsu='extras/Menu/extraScriptsMenu.php';
			$arScrUsu2='extras/Menu/extraScriptsMenu_POST.php';
			$arScrUsu3='extras/Menu/extraDisplaMenu.php';
			$merr='<p class="texini bgrojo">Los scripts estan incompletos o no existen.</p>';

			$converTEnvio1=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1)%3A+%3F>%0D%0A<hr><span+title%3D"Se+muestra+al+final+del+elemento+1">Mostrar+texto+<input+type%3D"checkbox"+name%3D"opctexto"+<%3Fphp+if(isset(%24MenuTexto)+%26%26+%24MenuTexto%3D%3D"on"){+echo+"checked"%3B+}+%3F>><%2Fspan>%0D%0A<%3Fphp+endif%3B+%3F>');

			$converTEnvio2=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp%0D%0Aif(%24_POST["opcmenuscripts"]%3D%3D"on"){%0D%0A%09if(isset(%24_POST["opctexto"])){+%24opctexto%3Dtrim(%24_POST["opctexto"])%3B+}+else+{+%24opctexto%3D""%3B+}%0D%0A%09%24archiD%3D"\n<%3Fphp+%23CONTENIDO+POR+EL+USUARIO\n".'."'%24MenuTexto%3D'".'."'."'%24opctexto'%3B\n%3F>".'"%3B%0D%0A}%0D%0A%3F>');

			$converTEnvio3=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1+%26%26+isset(%24MenuTexto)+%26%26+%24MenuTexto%3D%3D"on")%3A+%3F>%0D%0A++++<hr><p+class%3D"t14"><%3Fphp+echo+"Hola+mundo"%3B+%3F><%2Fp>%0D%0A<%3Fphp+endif%3B+%3F>');

			if(file_exists($arScrUsu)){ $v1=true; } else { $v1=false; $merr1='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Menu&a=extraScriptsMenu&edicion='.$converTEnvio1.'">Scripts <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu2)){ $v2=true; } else { $v2=false; $merr2='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Menu&a=extraScriptsMenu_POST&edicion='.$converTEnvio2.'">POST <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu3)){ $v3=true; } else { $v3=false; $merr3='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Menu&a=extraDisplaMenu&edicion='.$converTEnvio3.'">Displa <i class="fas fa-external-link-alt"></i></a>'; }
			$vf=$v1+$v2+$v3;
			if($vf===3){ $perScriptsML=true; $chekScripts='checked'; } else {
				echo $merr.'<p class="texini">';
					if(isset($merr1)){ echo $merr1; }
					if(isset($merr2)){ echo $merr2; }
					if(isset($merr3)){ echo $merr3; }
				echo '</p>';
			}
		endif; ?>
	<p class="texini t14"><b>Mostrar Menu
		<input type="checkbox" name="opcmenu" <?php if(isset($Menu) && $Menu=='on'){ echo 'checked'; } ?>></b>
		Codigos <input type="checkbox" name="opcmenucodigos" <?php if(isset($MenuCodigos) && $MenuCodigos=='on'){ echo 'checked'; } ?>>
		Scripts <input type="checkbox" name="opcmenuscripts" <?php if(isset($chekScripts)){ echo $chekScripts; } ?>>
		<a target="_blank" class="boton2" href="panel.php?ac=editor&c=Menu">Scripts <i class="fas fa-external-link-alt"></i></a>
		v0.3 Beta
	</p>
	<div class="flexCon">
	<?php for ($i=1; $i <=4; $i++): ?>
		<?php $ex='MenuElementos'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>
		<div class="formulario">
			<b>Elemento: #<?php echo $i; ?></b><hr><input type="text" name="opctitulo<?php echo $i; ?>" placeholder="Titulo" value="<?php echo htmlspecialchars($vaLT); ?>"><br>
			<textarea class="texeditor2" name="opccontenido<?php echo $i; ?>" placeholder="Contenido" title="Las variables se convierten, debes volver a ponerlas."><?php echo htmlspecialchars($vaLC); ?></textarea>
			<span>Mostrar elemento <input type="checkbox" name="opcmostrar<?php echo $i; ?>" <?php if($vaLM=='on'){ echo 'checked'; } ?>></span>
			<?php #SCRIPTS POR EL USUARIO >>>>>>>>>>>>>>
			if(isset($perScriptsML) && $perScriptsML==true){ require $arScrUsu; }
			#SCRIPTS POR EL USUARIO >>>>>>>>>>>>>> ?>
		</div>
	<?php endfor; ?>
	</div>
	<div class="cen">
		<input type="number" class="codigo oculto" name="opcelementos" value="<?php $msa=$i-1; echo $msa; ?>">
		<?php if(isset($MenuCodigos) && $MenuCodigos=='on'): ?>
		<div class="comentario">
			<textarea class="texeditor2 w100">
				<?php $con='extras/Menu/extraMenu.php';
				if(file_exists($con)){ $mos=htmlspecialchars(file_get_contents($con)); echo $mos; }
				?>
			</textarea>
		</div>
		<?php endif; ?>
		<input class="boton" type="reset" value="Cancelar &#xf00d">
		<input class="boton" type="submit" name="IniDispladiMenu" value="Actualizar &#xf044">
	</div>
</form>
<form method="post" action="actualizar.php">
	<p class="texini tb bgamarillo c48">Sección > Menu lateral</p>
	<?php #VERIFICAR SCRIPTS
		$perScriptsML=false; $chekScripts='';
		if(isset($MenuLateralScripts) && $MenuLateralScripts=='on'):
			$arScrUsu='extras/MenuLateral/extraScriptsMenuLateral.php';
			$arScrUsu2='extras/MenuLateral/extraScriptsMenuLateral_POST.php';
			$arScrUsu3='extras/MenuLateral/extraDisplaMenuLateral.php';
			$merr='<p class="texini bgrojo">Los scripts estan incompletos o no existen.</p>';

			$converTEnvio1=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1)%3A+%3F>%0D%0A<hr><span+title%3D"Se+muestra+al+final+del+elemento+1">Mostrar+texto+<input+type%3D"checkbox"+name%3D"opctexto"+<%3Fphp+if(isset(%24MenuLateralTexto)+%26%26+%24MenuLateralTexto%3D%3D"on"){+echo+"checked"%3B+}+%3F>><%2Fspan>%0D%0A<%3Fphp+endif%3B+%3F>');

			$converTEnvio2=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp%0D%0Aif(%24_POST["opcmenulateralscripts"]%3D%3D"on"){%0D%0A%09if(isset(%24_POST["opctexto"])){+%24opctexto%3Dtrim(%24_POST["opctexto"])%3B+}+else+{+%24opctexto%3D""%3B+}%0D%0A%09%24archiD%3D"\n<%3Fphp+%23CONTENIDO+POR+EL+USUARIO\n".'."'%24MenuLateralTexto%3D'".'."'."'%24opctexto'%3B\n%3F>".'"%3B%0D%0A}%0D%0A%3F>');

			$converTEnvio3=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1+%26%26+isset(%24MenuLateralTexto)+%26%26+%24MenuLateralTexto%3D%3D"on")%3A+%3F>%0D%0A++++<hr><p+class%3D"t14"><%3Fphp+echo+"Hola+mundo"%3B+%3F><%2Fp>%0D%0A<%3Fphp+endif%3B+%3F>');

			if(file_exists($arScrUsu)){ $v1=true; } else { $v1=false; $merr1='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=MenuLateral&a=extraScriptsMenuLateral&edicion='.$converTEnvio1.'">Scripts <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu2)){ $v2=true; } else { $v2=false; $merr2='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=MenuLateral&a=extraScriptsMenuLateral_POST&edicion='.$converTEnvio2.'">POST <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu3)){ $v3=true; } else { $v3=false; $merr3='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=MenuLateral&a=extraDisplaMenuLateral&edicion='.$converTEnvio3.'">Displa <i class="fas fa-external-link-alt"></i></a>'; }
			$vf=$v1+$v2+$v3;
			if($vf===3){ $perScriptsML=true; $chekScripts='checked'; } else {
				echo $merr.'<p class="texini">';
					if(isset($merr1)){ echo $merr1; }
					if(isset($merr2)){ echo $merr2; }
					if(isset($merr3)){ echo $merr3; }
				echo '</p>';
			}
		endif; ?>
	<p class="texini t14"><b>Mostrar menu lateral
		<input type="checkbox" name="opcmenulateral" <?php if(isset($MenuLateral) && $MenuLateral=='on'){ echo 'checked'; } ?>></b>
		Codigos <input type="checkbox" name="opcmenulateralcodigos" <?php if(isset($MenuLateralCodigos) && $MenuLateralCodigos=='on'){ echo 'checked'; } ?>>
		Scripts <input type="checkbox" name="opcmenulateralscripts" <?php if(isset($chekScripts)){ echo $chekScripts; } ?>>
		<a target="_blank" class="boton2" href="panel.php?ac=editor&c=MenuLateral">Scripts <i class="fas fa-external-link-alt"></i></a>
		v0.3 Beta
	</p>
	<div class="flexCon">
	<?php for ($i=1; $i <=4; $i++): ?>
		<?php $ex='MenuLateralElementos'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>
		<div class="formulario">
			<b>Elemento: #<?php echo $i; ?></b><hr><input type="text" name="opctitulo<?php echo $i; ?>" placeholder="Titulo" value="<?php echo htmlspecialchars($vaLT); ?>"><br>
			<textarea class="texeditor2" name="opccontenido<?php echo $i; ?>" placeholder="Contenido" title="Las variables se convierten, debes volver a ponerlas."><?php echo htmlspecialchars($vaLC); ?></textarea>
			<span>Mostrar elemento <input type="checkbox" name="opcmostrar<?php echo $i; ?>" <?php if($vaLM=='on'){ echo 'checked'; } ?>></span>
			<?php #SCRIPTS POR EL USUARIO >>>>>>>>>>>>>>
			if(isset($perScriptsML) && $perScriptsML==true){ require $arScrUsu; }
			#SCRIPTS POR EL USUARIO >>>>>>>>>>>>>> ?>
		</div>
	<?php endfor; ?>
	</div>
	<div class="cen">
		<input type="number" class="codigo oculto" name="opcelementos" value="<?php $msa=$i-1; echo $msa; ?>">
		<?php if(isset($MenuLateralCodigos) && $MenuLateralCodigos=='on'): ?>
		<div class="comentario">
			<textarea class="texeditor2 w100">
				<?php $con='extras/MenuLateral/extraMenuLateral.php';
				if(file_exists($con)){ $mos=htmlspecialchars(file_get_contents($con)); echo $mos; }
				?>
			</textarea>
		</div>
		<?php endif; ?>
		<input class="boton" type="reset" value="Cancelar &#xf00d">
		<input class="boton" type="submit" name="IniDispladiMenuLateral" value="Actualizar &#xf044">
	</div>
</form>
<form method="post" action="actualizar.php">
	<p class="texini tb bgamarillo c48">Sección > Pie de pagina</p>
	<?php #VERIFICAR SCRIPTS
		$perScriptsML=false; $chekScripts='';
		if(isset($PiedePaginaScripts) && $PiedePaginaScripts=='on'):
			$arScrUsu='extras/PiedePagina/extraScriptsPiedePagina.php';
			$arScrUsu2='extras/PiedePagina/extraScriptsPiedePagina_POST.php';
			$arScrUsu3='extras/PiedePagina/extraDisplaPiedePagina.php';
			$merr='<p class="texini bgrojo">Los scripts estan incompletos o no existen.</p>';

			$converTEnvio1=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1)%3A+%3F>%0D%0A<hr><span+title%3D"Se+muestra+al+final+del+elemento+1">Mostrar+texto+<input+type%3D"checkbox"+name%3D"opctexto"+<%3Fphp+if(isset(%24PiedePaginaTexto)+%26%26+%24PiedePaginaTexto%3D%3D"on"){+echo+"checked"%3B+}+%3F>><%2Fspan>%0D%0A<%3Fphp+endif%3B+%3F>');

			$converTEnvio2=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp%0D%0Aif(%24_POST["opcpiedepaginascripts"]%3D%3D"on"){%0D%0A%09if(isset(%24_POST["opctexto"])){+%24opctexto%3Dtrim(%24_POST["opctexto"])%3B+}+else+{+%24opctexto%3D""%3B+}%0D%0A%09%24archiD%3D"\n<%3Fphp+%23CONTENIDO+POR+EL+USUARIO\n".'."'%24PiedePaginaTexto%3D'".'."'."'%24opctexto'%3B\n%3F>".'"%3B%0D%0A}%0D%0A%3F>');

			$converTEnvio3=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1+%26%26+isset(%24PiedePaginaTexto)+%26%26+%24PiedePaginaTexto%3D%3D"on")%3A+%3F>%0D%0A++++<hr><p+class%3D"t14"><%3Fphp+echo+"Hola+mundo"%3B+%3F><%2Fp>%0D%0A<%3Fphp+endif%3B+%3F>');

			if(file_exists($arScrUsu)){ $v1=true; } else { $v1=false; $merr1='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=PiedePagina&a=extraScriptsPiedePagina&edicion='.$converTEnvio1.'">Scripts <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu2)){ $v2=true; } else { $v2=false; $merr2='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=PiedePagina&a=extraScriptsPiedePagina_POST&edicion='.$converTEnvio2.'">POST <i class="fas fa-external-link-alt"></i></a>'; }
			if(file_exists($arScrUsu3)){ $v3=true; } else { $v3=false; $merr3='<a target="_blank" class="boton2" href="panel.php?ac=editor&c=PiedePagina&a=extraDisplaPiedePagina&edicion='.$converTEnvio3.'">Displa <i class="fas fa-external-link-alt"></i></a>'; }
			$vf=$v1+$v2+$v3;
			if($vf===3){ $perScriptsML=true; $chekScripts='checked'; } else {
				echo $merr.'<p class="texini">';
					if(isset($merr1)){ echo $merr1; }
					if(isset($merr2)){ echo $merr2; }
					if(isset($merr3)){ echo $merr3; }
				echo '</p>';
			}
		endif; ?>
	<p class="texini t14"><b>Mostrar pie
		<input type="checkbox" name="opcpiedepagina" <?php if(isset($PiedePagina) && $PiedePagina=='on'){ echo 'checked'; } ?>></b>
		Codigos <input type="checkbox" name="opcpiedepaginacodigos" <?php if(isset($PiedePaginaCodigos) && $PiedePaginaCodigos=='on'){ echo 'checked'; } ?>>
		Scripts <input type="checkbox" name="opcpiedepaginascripts" <?php if(isset($chekScripts)){ echo $chekScripts; } ?>>
		<a target="_blank" class="boton2" href="panel.php?ac=editor&c=PiedePagina">Scripts <i class="fas fa-external-link-alt"></i></a>
		v0.3 Beta
	</p>
	<div class="flexCon">
	<?php for ($i=1; $i <=4; $i++): ?>
		<?php $ex='PiedePaginaElementos'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>
		<div class="formulario">
			<b>Elemento: #<?php echo $i; ?></b><hr><input type="text" name="opctitulo<?php echo $i; ?>" placeholder="Titulo" value="<?php echo htmlspecialchars($vaLT); ?>"><br>
			<textarea class="texeditor2" name="opccontenido<?php echo $i; ?>" placeholder="Contenido" title="Las variables se convierten, debes volver a ponerlas."><?php echo htmlspecialchars($vaLC); ?></textarea>
			<span>Mostrar elemento <input type="checkbox" name="opcmostrar<?php echo $i; ?>" <?php if($vaLM=='on'){ echo 'checked'; } ?>></span>
			<?php #SCRIPTS POR EL USUARIO >>>>>>>>>>>>>>
			if(isset($perScriptsML) && $perScriptsML==true){ require $arScrUsu; }
			#SCRIPTS POR EL USUARIO >>>>>>>>>>>>>> ?>
		</div>
	<?php endfor; ?>
	</div>
	<div class="cen">
		<input type="number" class="codigo oculto" name="opcelementos" value="<?php $msa=$i-1; echo $msa; ?>">
		<?php if(isset($PiedePaginaCodigos) && $PiedePaginaCodigos=='on'): ?>
		<div class="comentario">
			<textarea class="texeditor2 w100">
				<?php $con='extras/PiedePagina/extraPiedePagina.php';
				if(file_exists($con)){ $mos=htmlspecialchars(file_get_contents($con)); echo $mos; }
				?>
			</textarea>
		</div>
		<?php endif; ?>
		<input class="boton" type="reset" value="Cancelar &#xf00d">
		<input class="boton" type="submit" name="IniDispladiPiedePagina" value="Actualizar &#xf044">
	</div>
</form>
<?php #AVERIGUAR ENVIOS
	$av=true;
$ave="<?php #ESTE ARCHIVO NO EXISTE, PERO ESTE TEXTO FUE GENERADO AUTOMATICAMENTE ?>\n<?php #ATENCION, SE MUESTRA UN CODIGO DE EJEMPLO ?>\n";
$av1="<?php if(".'$i'."===1):\nif(isset(".'$MenuLateralTexto'.") && ".'$MenuLateralTexto'."==".'"on"'."): ?>\n<p class=".'"t12"'."><?php echo ".'$MenuLateralTextoContenido'."; ?></p>\n<?php endif; endif; ?>";
	if($av==true):
?>
<form method="get" class="comentario">
	<textarea class="w100 mnh250" name="edicion">
<?php echo htmlspecialchars("$ave") ?>
	</textarea>
	<input class="boton" type="submit">
</form>
<?php endif; ?>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>