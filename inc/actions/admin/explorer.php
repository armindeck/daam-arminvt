<?php
if(empty($_POST) or !isset($_POST)){
	header("Location: ../panel.php?ac=editor");
	exit;
} else {
	require_once 'extenciones.php';
	$E['directorio'] = '../';
	$E['archivo'] = normalizar($_POST['archivo']);
	$E['contenido'] = $_POST['contenido'];
	$E['permiso'] = isset($_POST['permiso']) ? true : false;

	# EDITAR Y ELIMINAR
	if(!empty($_POST['modificar'])){ $E['modeli'] = 'Modificado';
		$E['direccion'] = "editar={$E['archivo']}&modificado=true";
		if(!file_exists($E['directorio'].$E['archivo']) && !$E['permiso']){ die("El archivo no existe."); } else {
			file_put_contents($E['directorio'].$E['archivo'], $E['contenido']);
		}
	} elseif(!empty($_POST['eliminar'])){  $E['modeli'] = 'Eliminado';
		$E['direccion'] = "eliminado={$E['archivo']}";
		if(!file_exists($E['directorio'].$E['archivo']) && !$E['permiso']){ die("El archivo no existe."); } else {
			unlink($E['directorio'].$E['archivo']);
		}
	}

	#HISTORIAL
	date_default_timezone_set("America/Bogota");
	$fechahora=date('Y-m-d - g:ia');
	$E['archivo_historial'] = 'historial/his_'.archivoAceptado(LocalQuitarPuntoEslas($E['archivo'])).'.txt';
	if(!file_exists($E['archivo_historial'])){ file_put_contents($E['archivo_historial'], ''); }
	$E['leer_archivo_historial'] = file_get_contents($E['archivo_historial']);
	$E['saltar']="";
	if($E['leer_archivo_historial'] != '') { $E['saltar']="\n"; }

	file_put_contents($E['archivo_historial'], $fechahora." ~ {$E['modeli']}" . $E['saltar'] . $E['leer_archivo_historial']);

	#DIRECCION
	header("Location: ../panel.php?ac=editor&{$E['direccion']}");
}
?>