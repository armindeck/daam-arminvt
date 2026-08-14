<?php if(isset($TIPO) && $TIPO=='panel'){ ?>

<p class="texini">Configuración avanzada <span class="t12">v0.3.2 Beta</span></p>


<?php #CONTENIDO >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
for($idi=1; $idi<=5; $idi++):
	switch($idi){
		case 1: $seccion='Cabeza'; $entrada='Cabeza'; $entradamin='cabeza'; break;
		case 2: $seccion='Menu'; $entrada='Menu'; $entradamin='menu'; break;
		case 3: $seccion='Contenido Extra'; $entrada='ContenidoExtra'; $entradamin='contenidoextra'; break;
		case 4: $seccion='Menu Lateral'; $entrada='MenuLateral'; $entradamin='menulateral'; break;
		case 5: $seccion='Pie de Pagina'; $entrada='PiedePagina'; $entradamin='piedepagina'; break; 
	}
?>

<form method="post" action="actualizar.php">
	<p class="texinimen tb bgamarillo c48">Sección > <?php echo $seccion; ?></p>
	<?php $perScriptsML=false; $chekScripts=''; $paso1=false;
	switch($entrada){
		case 'Cabeza': if(isset($CabezaScripts) && $CabezaScripts=='on'): $paso1=true; endif; break;
		case 'Menu': if(isset($MenuScripts) && $MenuScripts=='on'): $paso1=true; endif; break;
		case 'ContenidoExtra': if(isset($ContenidoExtraScripts) && $ContenidoExtraScripts=='on'): $paso1=true; endif; break;
		case 'MenuLateral': if(isset($MenuLateralScripts) && $MenuLateralScripts=='on'): $paso1=true; endif; break;
		case 'PiedePagina': if(isset($PiedePaginaScripts) && $PiedePaginaScripts=='on'): $paso1=true; endif; break;
		default: echo "No existe esta entrada: $seccion"; break;
	}
	if ($paso1==true) {
		$arScrUsu='scripts/'.$entrada.'/scrDispladi'.$entrada.'.php';
		$arScrUsu2='scripts/'.$entrada.'/scrDispladi'.$entrada.'_POST.php';
		$arScrUsu3='scripts/'.$entrada.'/scrDispla'.$entrada.'.php';

		$merr='<p class="texinimen bgrojo">Los scripts estan incompletos o no existen.</p>';

		$converTEnvio1=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1)%3A+%3F>%0D%0A<hr><span+title%3D"Se+muestra+al+final+del+elemento+1">Mostrar+texto+<input+type%3D"checkbox"+name%3D"opctexto"+<%3Fphp+if(isset(%24'.$entrada.'Texto)+%26%26+%24'.$entrada.'Texto%3D%3D"on"){+echo+"checked"%3B+}+%3F>><%2Fspan>%0D%0A<%3Fphp+endif%3B+%3F>');

		$converTEnvio2=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp%0D%0Aif(%24_POST["opcmostrarscripts"]%3D%3D"on"){%0D%0A%09if(isset(%24_POST["opctexto"])){+%24opctexto%3Dtrim(%24_POST["opctexto"])%3B+}+else+{+%24opctexto%3D""%3B+}%0D%0A%09%24archiD%3D"\n<%3Fphp+%23CONTENIDO+POR+EL+USUARIO\n".'."'%24".$entrada."Texto%3D'".'."'."'%24opctexto'%3B\n%3F>".'"%3B%0D%0A}%0D%0A%3F>');

		$converTEnvio3=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1+%26%26+isset(%24'.$entrada.'Texto)+%26%26+%24'.$entrada.'Texto%3D%3D"on")%3A+%3F>%0D%0A++++<hr><p+class%3D"t14"><%3Fphp+echo+"Hola+mundo"%3B+%3F><%2Fp>%0D%0A<%3Fphp+endif%3B+%3F>');

		if(file_exists($arScrUsu)){ $v1=true; } else { $v1=false; $merr1='<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c='.$entrada.'&a=scrDispladi'.$entrada.'&edicion='.$converTEnvio1.'">Displadi <i class="fas fa-external-link-alt"></i></a>'; }

		if(file_exists($arScrUsu2)){ $v2=true; } else { $v2=false; $merr2='<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c='.$entrada.'&a=scrDispladi'.$entrada.'_POST&edicion='.$converTEnvio2.'">POST <i class="fas fa-external-link-alt"></i></a>'; }

		if(file_exists($arScrUsu3)){ $v3=true; } else { $v3=false; $merr3='<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c='.$entrada.'&a=scrDispla'.$entrada.'&edicion='.$converTEnvio3.'">Displa <i class="fas fa-external-link-alt"></i></a>'; }

		$vf=$v1+$v2+$v3;

		if($vf===3){ $perScriptsML=true; $chekScripts='checked'; } else {

			echo $merr.'<p class="texini">';

			if(isset($merr1)){ echo $merr1; }

			if(isset($merr2)){ echo $merr2; }

			if(isset($merr3)){ echo $merr3; }

			echo '</p>';

		}
	}
	#ERRORES >>>>>>>>>>>>>>
	

		 ?>


	<p class="texini t14"><b>Mostrar <?php echo $seccion; ?>

		<input type="checkbox" name="opcmostrar"
		<?php
		switch($entrada){ 
			case 'Cabeza': if(isset($Cabeza) && $Cabeza=='on'){ echo 'checked'; } break;
			case 'Menu': if(isset($Menu) && $Menu=='on'){ echo 'checked'; } break;
			case 'ContenidoExtra': if(isset($ContenidoExtra) && $ContenidoExtra=='on'){ echo 'checked'; } break;
			case 'MenuLateral': if(isset($MenuLateral) && $MenuLateral=='on'){ echo 'checked'; } break;
			case 'PiedePagina': if(isset($PiedePagina) && $PiedePagina=='on'){ echo 'checked'; } break;
			default: echo "No existe esta entrada: $seccion"; break;
		}
		?>
		></b>

		Codigos <input type="checkbox" name="opcmostrarcodigos"
		<?php
		switch($entrada){ 
			case 'Cabeza': if(isset($CabezaCodigos) && $CabezaCodigos=='on'){ echo 'checked'; } break;
			case 'Menu': if(isset($MenuCodigos) && $MenuCodigos=='on'){ echo 'checked'; } break;
			case 'ContenidoExtra': if(isset($ContenidoExtraCodigos) && $ContenidoExtraCodigos=='on'){ echo 'checked'; } break;
			case 'MenuLateral': if(isset($MenuLateralCodigos) && $MenuLateralCodigos=='on'){ echo 'checked'; } break;
			case 'PiedePagina': if(isset($PiedePaginaCodigos) && $PiedePaginaCodigos=='on'){ echo 'checked'; } break;
			default: echo "No existe esta entrada: $seccion"; break;
		}
		?>
		>

		Scripts <input type="checkbox" name="opcmostrarscripts" <?php if(isset($chekScripts)){ echo $chekScripts; } ?>>

		<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=<?php echo $entrada; ?>">Scripts <i class="fas fa-external-link-alt"></i></a>

	</p>

	<div class="flexCon">
	<?php $elena=1;
	switch($entrada){ 
			case 'Cabeza': if(isset($CabezaElementos) && $CabezaElementos > 0){ $elena=$CabezaElementos; } break;
			case 'Menu': if(isset($MenuElementos) && $MenuElementos > 0){ $elena=$MenuElementos; } break;
			case 'ContenidoExtra': if(isset($ContenidoExtraElementos) && $ContenidoExtraElementos > 0){ $elena=$ContenidoExtraElementos; } break;
			case 'MenuLateral': if(isset($MenuLateralElementos) && $MenuLateralElementos > 0){ $elena=$MenuLateralElementos; } break;
			case 'PiedePagina': if(isset($PiedePaginaElementos) && $PiedePaginaElementos > 0){ $elena=$PiedePaginaElementos; } break;
			default: echo "No existe esta entrada: $seccion"; break;
		}
	?>
	<?php for ($i=1; $i <=$elena; $i++): ?>

		<?php $ex=$entrada.'Elementos'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?>

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

		<?php $paso2=false;
		switch($entrada){ 
			case 'Cabeza': if(isset($CabezaCodigos) && $CabezaCodigos=='on'): $paso2=true; endif; break;
			case 'Menu': if(isset($MenuCodigos) && $MenuCodigos=='on'): $paso2=true; endif; break;
			case 'ContenidoExtra': if(isset($ContenidoExtraCodigos) && $ContenidoExtraCodigos=='on'): $paso2=true; endif; break;
			case 'MenuLateral': if(isset($MenuLateralCodigos) && $MenuLateralCodigos=='on'): $paso2=true; endif; break;
			case 'PiedePagina': if(isset($PiedePaginaCodigos) && $PiedePaginaCodigos=='on'): $paso2=true; endif; break;
			default: echo "No existe esta entrada: $seccion"; break;
		}
		if($paso2==true){ ?>
			<div class="comentario">

			<textarea class="texeditor2 w100">

				<?php $con='scripts/'.$entrada.'/scr'.$entrada.'.php';

				if(file_exists($con)){ $mos=htmlspecialchars(file_get_contents($con)); echo $mos; }

				?>

			</textarea>

		</div>
		<?php } ?><hr>
		<input type="number" class="codigo " name="opcelementos" min="1" max="4" value="<?php $msa=$i-1; echo $msa; ?>">
		<input class="oculto" type="text" name="opcentrada" value="<?php echo $entrada; ?>">
		<input class="boton" type="reset" value="Cancelar &#xf00d">
		<input class="boton" type="submit" name="IniDispladi" value="Actualizar &#xf044">

	</div>

</form>
<?php endfor; ?>
<?php #AVERIGUAR ENVIOS

	$av=false;

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

<?php } else {

    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }

    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");

} ?>