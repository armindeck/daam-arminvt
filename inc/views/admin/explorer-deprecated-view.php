<?php
$E['version'] = file_get_contents(__DIR__.'/editor.x');
require_once __DIR__.'/extenciones.php';
?>
<?php #BUSCADOR
$E['directorios'] = [
	'inc/views/admin/',
	'inc/scripts/',
	'inc/scripts/us/',
	'datos/',
	'form/iobi/',
	'css/'
];
$E['archivos_peligro'] = [
	'actualizar.php','actualizar_acc.php','editor.php','editorMods.php','editorModsPost.php',
	'displa.php','extenciones.php','permisos_usuario.php','procesa.php','procesar.php','subir.php',
	'privado.php','system.php'
];

if(isset($_GET['eliminado'])){
	echo LocalMensaje(['tipo'=>'error','text' => 'El archivo '.normalizar($_GET['eliminado']).' fue eliminado.']);
}
if(!isset($_GET['editar'])){
	foreach ($E['directorios'] as $key => $value) {
		echo '<hr><b>' .($value == '' ? 'Panel' : LocalQuitarPuntoEslas($value)). '</b><hr>';
		foreach (LocalBuscar('../../'.$value.'*.{php,txt,css,x}') as $key2 => $value2) {
			$E['boton_class'] = 'boton';
			foreach ($E['archivos_peligro'] as $key3 => $value3) {
				if(LocalArchivoNombre(LocalQuitarPuntoEslas($value2)) == $value3) { $E['boton_class'] = 'boton2'; break; }
			}
			echo '<a class="'.$E['boton_class'].'" href="?ac=editor&editar='.$value2.'">'.LocalArchivoNombre(LocalQuitarPuntoEslas($value2)).'</a>';
		}
	}
} else {
	echo '<hr><a class="boton" href="panel.php?ac=editor"><i class="fas fa-search-plus"></i> Volver a buscar</a><hr>';
}
?>
<?php #EDITOR
if(isset($_GET['editar']) && !empty($_GET['editar'])){ $E['editar_get'] = normalizar($_GET['editar']);
	if(!file_exists($E['editar_get']) && !isset($_GET['permiso'])){
		echo LocalMensaje(['tipo'=>'error','text' => 'El archivo "' . (LocalArchivoNombre(LocalQuitarPuntoEslas($E['editar_get']))) .'" no existe.']);
	} else {
		$E['archivos_peligro_existe'] = false;
		foreach ($E['archivos_peligro'] as $key => $value) {
			if($value ==
				LocalArchivoNombre(LocalQuitarPuntoEslas($E['editar_get'])))
				{ $E['archivos_peligro_existe'] = true; break; }
		}
		if(isset($_GET['modificado']) && file_exists($E['editar_get'])){
			echo LocalMensaje(['tipo'=>'exito','text' => 'El archivo fue modificado exitosamente.']);
		}
		if(!file_exists($E['editar_get']) && isset($_GET['permiso'])){
			echo LocalMensaje(['tipo'=>'error','text' => 'El archivo no existe pero se puede crear.']);
		}
		if(!isset($_GET['modificado'])){
			if($E['archivos_peligro_existe']){
				echo LocalMensaje(['tipo'=>'peligro','text' => 'Atención: Tenga cuidado al modificar el archivo "' . LocalArchivoNombre(LocalQuitarPuntoEslas($E['editar_get'])) .'".']);
			}
		}
		echo LocalFormularioEditar($E);
	}
}
?>
<?php #FORMULARIO
function LocalFormularioEditar($E){ ?>
<form class="formulario" style="width:99%;" action="editor/procesa.php" method="post">
	<label>Editar: <?php echo $E['editar_get']; ?></label>
	<input type="hidden" name="archivo" value="<?php echo $E['editar_get']; ?>" placeholder="Archivo" required>
	<?php if(isset($_GET['permiso'])){ ?>
		<input type="hidden" name="permiso" value="true" placeholder="Permiso">
	<?php } ?>
	<hr>
	<textarea name="contenido" style="min-height: 400px;"><?php
		if(file_exists($E['editar_get'])){ echo htmlspecialchars(file_get_contents($E['editar_get'])); }
	?></textarea><hr>
	<style type="text/css">
		.editor-div-form-final {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}
		
		.check-delete ~ .div-delete2 input { display: none; }
		.check-delete:checked ~ .div-delete2 input { display: inline-block; }
		.div-delete, .div-delete2 { display: none; }
		.check-delete:checked ~ .editor-div-form-final .boton-check-delete a,
		.check-delete2:checked ~ .div-delete .boton-check-delete2 a {
            background: #2c3e50;
        }
        .check-delete:checked ~ .div-delete,
        .check-delete2:checked ~ .div-delete2 {
            display: block;
        }
	</style>
	<input type="checkbox" class="dp-none check-delete" id="check-delete">
	<input type="checkbox" class="dp-none check-delete2" id="check-delete2">
	<div class="editor-div-form-final">
		<input type="submit" name="modificar" value="Modificar &#xf044">
		<?php if(file_exists($E['editar_get'])){ ?>
            <label for="check-delete" class="boton-check boton-check-delete">
            	<a class="boton">Eliminar</a>
            </label>
		<?php } ?>
	</div>
	<div class="div-delete"><hr>
		<p><b>Atención:</b> La eliminación de algún archivo mostrado en este editor puede perjudicar el codigo de la pagina, hasta dejar de funcionar.</p>
		<p>Por favor verificar el codigo y solo eliminar en caso de ya no ser necesario.</p><hr>
		<label for="check-delete2" class="boton-check boton-check-delete2">
            <a class="boton">Estoy de acuerdo</a>
        </label>
	</div>
	<div class="div-delete2" style="text-align: right;"><hr>
		<input type="submit" name="eliminar" value="Eliminar &#xf1f8">
	</div>
</form>
<?php if(file_exists(__DIR__.'/historial/his_'.archivoAceptado(LocalQuitarPuntoEslas($E['editar_get'])).'.txt')){ ?>
<div class="formulario" style="width:99%;">
	<label>Historial de modificaciones</label><hr>
	<textarea style="min-height: 150px;"><?php
		echo htmlspecialchars(file_get_contents(__DIR__.'/historial/his_'.archivoAceptado(LocalQuitarPuntoEslas($E['editar_get'])).'.txt'));
	?></textarea>
</div>
<?php
	}
}
?>

<?php echo "<hr><p class='t12' style='margin-bottom:25px; margin-top:25px;'>{$E['version']}</p>"; ?>