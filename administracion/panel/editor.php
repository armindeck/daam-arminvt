<?php #CONTENIDO POR ARMIN
#TRATAR CON CUIDADO!!!!
#CREADO: 10/05/23

if(isset($TIPO)){ if($TIPO='panel'){
require_once 'editorModificable.php';

if($_GET['c']){ $carpeta=$_GET['c'];
	if ($carpeta=='extras') {
#CONTENIDO EXTRA ----> ?>
<a class="boton2" href="panel.php?ac=editor&c=extras&a=editor">Editor</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=editorModificable">Modificable</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=contenido">Contenido</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=actualizar">Actualizar</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=actualizar_acc">ActualizarAcc</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=anuncios">Anuncios</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=panel">Panel</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=panel_acc">PanelAcc</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=formblog">Blog</a>
<a class="boton" href="panel.php?ac=editor&c=extras&a=configuraciones">Configuraciones</a>
<?php #CONTENIDO EXTRA ---->
	}
}

if($_GET['a']){
	$c=$_GET['c'];
	$a=$_GET['a'];

	if($_GET['c']=='extras'){
		if($_GET['a']=='editor'){
			$final='administracion/panel/'.$a.'.php';
		} else if($_GET['a']=='extra'){
			$final='datos/'.$a.'.php';
		} else { $final='administracion/panel/'.$a.'.php'; }
	}
	$dire='?ac=editor&c='.$c.'&a='.$a;
	$mostrar=htmlspecialchars(file_get_contents($AC_DIRECTORIO.$final));
	echo '<hr>
		<form method="post" action="actualizar.php">
		<div class="formulario" style="width:100%;">
		<input class="oculto" type="text" name="direccion" value="'.$dire.'">
		<input class="oculto" type="text" name="archivo" value="'.$final.'">
		<label>El archivo es: '.$a.'</label><hr>
		<textarea class="texeditor" name="editar" placeholder="Editor">'.$mostrar.'</textarea></div>
		<div>
	        <input class="boton" type="reset" value="Cancelar &#xf00d">
	        <input class="boton" type="submit" name="IniEditor" value="Actualizar &#xf044">
	    </div>
	</form>';
}

?>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>