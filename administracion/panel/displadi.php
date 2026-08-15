<?php if(isset($TIPO) && $TIPO=='panel'){ ?>
<?php $vinterna='v0.3.3 Beta'; ?>
<p class="texini">Diseño de la displa <span class="t12"><?php echo $vinterna; ?></span></p>
<?php
$arScrUsu='scripts/us/scrDispladiCUS.php';
$arScrUsu2='scripts/us/scrDispladiCUS_POST.php';
$arScrUsu3='scripts/us/scrDisplaCUS.php';
$perScriptsML=false; $chekScripts=''; $entrada='scrCUS';
	if($carScripts){
		$merr='<p class="texinimen bgrojo">Los scripts estan incompletos o no existen.</p>';
		$converTEnvio1=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1)%3A+%3F>%0D%0A<hr><span+title%3D"Se+muestra+al+final+del+elemento+1">Mostrar+texto+<input+type%3D"checkbox"+name%3D"opctexto"+<%3Fphp+if(isset(%24'.$entrada.'Texto)+%26%26+%24'.$entrada.'Texto%3D%3D"on"){+echo+"checked"%3B+}+%3F>><%2Fspan>%0D%0A<%3Fphp+endif%3B+%3F>');
		$converTEnvio2=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp%0D%0Aif(%24_POST["opcmostrarscripts"]%3D%3D"on"){%0D%0A%09if(isset(%24_POST["opctexto"])){+%24opctexto%3Dtrim(%24_POST["opctexto"])%3B+}+else+{+%24opctexto%3D""%3B+}%0D%0A%09%24archiD%3D"\n<%3Fphp+%23CONTENIDO+POR+EL+USUARIO\n".'."'%24".$entrada."Texto%3D'".'."'."'%24opctexto'%3B\n%3F>".'"%3B%0D%0A}%0D%0A%3F>');
		$converTEnvio3=htmlspecialchars('<%3Fphp+%23ESTE+ARCHIVO+NO+EXISTE%2C+PERO+ESTE+TEXTO+FUE+GENERADO+AUTOMATICAMENTE+%3F>%0D%0A<%3Fphp+%23ATENCION%2C+SE+MUESTRA+UN+CODIGO+DE+EJEMPLO+%3F>%0D%0A<%3Fphp+if(%24i%3D%3D%3D1+%26%26+isset(%24'.$entrada.'Texto)+%26%26+%24'.$entrada.'Texto%3D%3D"on")%3A+%3F>%0D%0A++++<hr><p+class%3D"t14"><%3Fphp+echo+"Hola+mundo"%3B+%3F><%2Fp>%0D%0A<%3Fphp+endif%3B+%3F>');
		$v1=true; $v2=true; $v3=true;
		if(!file_exists($arScrUsu)){ $v1=false; $merr1='<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us&a='.$arScrUsu.'&edicion='.$converTEnvio1.'">Displadi <i class="fas fa-external-link-alt"></i></a>'; }
		if(!file_exists($arScrUsu2)){ $v2=false; $merr2='<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us&a='.$arScrUsu2.'&edicion='.$converTEnvio2.'">POST <i class="fas fa-external-link-alt"></i></a>'; }
		if(!file_exists($arScrUsu3)){ $v3=false; $merr3='<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us&a='.$arScrUsu3.'&edicion='.$converTEnvio3.'">Displa <i class="fas fa-external-link-alt"></i></a>'; }
		$vf=$v1+$v2+$v3;
		if($vf===3){ $perScriptsML=true; $chekScripts='checked'; } else {
			echo $merr.'<p class="texini">';
			if(isset($merr1)){ echo $merr1; }
			if(isset($merr2)){ echo $merr2; }
			if(isset($merr3)){ echo $merr3; }
			echo '</p>';
		}
	}
?>
<form method="post" action="actualizar.php">
	<p class="texinimen t14">Cargar Scripts
		<input type="checkbox" name="dis_cscr" <?php if(isset($chekScripts)){ echo $chekScripts; } ?>>
		<a target="_blank" class="boton2" href="panel.php?ac=editor&u=scripts&c=us">
			Scripts <i class="fas fa-external-link-alt"></i>
		</a>
	</p>
<?php #CONTENIDO >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
for($idi=0; $idi<5; $idi++):
	switch($idi){
		case 0: $seccion='Cabeza'; $entrada='Cabeza'; $entradamin='cabeza'; break;
		case 1: $seccion='Menu'; $entrada='Menu'; $entradamin='menu'; break;
		case 2: $seccion='Contenido Extra'; $entrada='ContenidoExtra'; $entradamin='contenidoextra'; break;
		case 3: $seccion='Menu Lateral'; $entrada='MenuLateral'; $entradamin='menulateral'; break;
		case 4: $seccion='Pie de Pagina'; $entrada='PiedePagina'; $entradamin='piedepagina'; break; 
	} ?>
	<p class="texinimen tb bgamarillo c48">Sección > <?php echo $seccion; ?></p>
	<p class="texini t14"><?php echo $seccion; ?>
		<input type="checkbox" name="dis_m<?php echo $idi; ?>" <?php if($displadi[$idi][0] != ''){ echo 'checked'; } ?>>
		Elementos 
		<input type="number" class="codigo " name="dis_ce<?php echo $idi; ?>" min="1" max="4" value="<?php echo $displadi[$idi][1]; ?>">
	</p>

	<div class="flexCon">
	<?php $elena=1;
	if($displadi[$idi][1] > 0){ $elena=$displadi[$idi][1]; }
	for ($i=0; $i <$elena; $i++): ?>
		<div class="formulario">
			<b>Elemento: #<?php echo $i+1; ?></b><hr>
			<input type="text" name="dis_ti_<?php echo $idi.'_'.$i; ?>" placeholder="Titulo" value="<?php echo htmlspecialchars($displadi[$idi][2][$i][1]); ?>"><br>
			<textarea class="texeditor2" name="dis_con_<?php echo $idi.'_'.$i; ?>" placeholder="Contenido" title="Las variables se convierten, debes volver a ponerlas."><?php echo htmlspecialchars($displadi[$idi][2][$i][2]); ?></textarea>
			<span>Mostrar elemento <input type="checkbox" name="dis_me_<?php echo $idi.'_'.$i; ?>" <?php if($displadi[$idi][2][$i][0]!=''){ echo 'checked'; } ?>></span>

				<?php #SCRIPTS POR EL USUARIO >>>>>>>>>>>>>>

				if(isset($perScriptsML) && $perScriptsML==true){ require $arScrUsu; }

				#SCRIPTS POR EL USUARIO >>>>>>>>>>>>>> ?>
			</div>
	<?php endfor; ?>
	</div>

<?php endfor; ?>
	<p class="texinimen tb bgamarillo c48">Sección > Codigos</p>
	<p class="texini t14">Mostrar >
		<?php for ($i=0; $i < 5; $i++) { 
			switch ($i) {
				case 0: $txe='scrDispla'; break;
				case 1: $txe='scrCUS'; break;
				case 2: $txe='scrDisplaCUS'; break;
				case 3: $txe='scrDispladiCUS'; break;
				case 4: $txe='scrDispladiCUS_POST'; break;
			}
			echo ' '.$txe.' <input type="checkbox" name="dis_mscr'.$i.'"';
			if($mosScripts[$i]!=''){ echo ' checked'; } echo '>';
		} ?>
	</p>
	<?php
	for ($i=0; $i < 5; $i++) {
		$con=[
			'scripts/scrDispla.php',
			'scripts/us/scrCUS.php',
			'scripts/us/scrDisplaCUS.php',
			'scripts/us/scrDispladiCUS.php',
			'scripts/us/scrDispladiCUS_POST.php'
		];
		if($mosScripts[$i]!=''){ ?>
			<div class="cen">
				<div class="comentario">~ <?php echo $con[$i]; ?> ~
					<textarea class="texeditor2 w100">
						<?php 
						if(file_exists($con[$i])){ echo htmlspecialchars(file_get_contents($con[$i])); }
						?>
					</textarea>
				</div>
			</div>
		<?php }
	}
	?>
	<div class="cen">
		<hr>
		<input type="text" class="oculto" name="vinterna" value="<?php echo $vinterna; ?>">
		<input class="boton2" type="reset" value="Cancelar &#xf00d">
		<input class="boton" type="submit" name="IniDispladi" value="Actualizar &#xf044">
	</div>
</form>






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