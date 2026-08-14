<?php #CONTENIDO POR ARMIN



#TRATAR CON CUIDADO!!!!



#CREADO: 10/05/23





if(isset($TIPO) && $TIPO=='panel'){ #PRINCIPALES ?>

<hr><a class="boton2" href="panel.php?ac=editor&u=extras&c=extras">Extras</a>

<?php #CAPTURAS >>>>>>>>>>

if(isset($_GET['u'])){ $u=$_GET['u']; } #UBICACION

if(isset($_GET['c'])){ $c=$_GET['c']; } #CARPETA

if(isset($_GET['c1'])){ $c1=$_GET['c1']; }

if(isset($_GET['c2'])){ $c2=$_GET['c2']; }

if(isset($_GET['a'])){ $a=$_GET['a']; } #ARCHIVO

$AdPa='administracion/panel/';

#CAPTURAS >>>>>>>>>>>>>>>>



$ediMod='editorMods.php'; if(file_exists($ediMod)){ require $ediMod; }



if (isset($u) && $u=='extras'):



#CONTENIDOS PRINCIPALES DE FUNCIONAMIENTO ?>



<a class="boton2" href="panel.php?ac=editor&u=extras&c=extras&a=editor">Editor</a>

<a class="boton2" href="panel.php?ac=editor&u=extras&c=extras&a=ediadmin">EdiAdmin</a>



<a class="boton2" href="panel.php?ac=editor&u=extras&c=extras&a=editorMods">MODS</a>

<a class="boton2" href="panel.php?ac=editor&u=extras&c=extras&a=editorModsPost">M. POST</a>



<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=actualizar">Actualizar</a>

<a class="boton2" href="panel.php?ac=editor&u=extras&c=extras&a=actualizar_acc">A. Acc</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=anuncios">Anuncios</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=archivos">Archivos</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=panel">Panel</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=panel_acc">P. Acc</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=configuraciones">Configuraciones</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=contenido">Contenido</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=displadi">Displadi</a>
<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=directorio">Directorio</a>
<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=imagen">Imagen</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=tema">Tema</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=verificar">Verificar</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=creador">Creador</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=borrador">C. Borrador</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=extencionesPanel">C. Extención</a>

<a class="boton" href="panel.php?ac=editor&u=extras&c=extras&a=crear_acc">C. Acc</a>



<hr>

<?php endif;

if(isset($a)){

	$final=$a.'.php';

	if($c=='extras'){

		$final=$AdPa.$a.'.php';

		if($a=='extra'){ $final='datos/'.$a.'.php'; }

	}



	$ediModPost='editorModsPost.php'; if(file_exists($ediModPost)){ require $ediModPost; }



	if(isset($_GET['permiso']) && $_GET['permiso']==true){ $final3=$final; }



	if(isset($u)){ $pasa='&u='.$u; } else { $pasa=''; }

	$dire='?ac=editor'.$pasa.'&c='.$c.'&a='.$a; #MEJORAR PARA MAS ENTRADAS



	if(file_exists($AC_DIRECTORIO.$final)){

		$mostrar=htmlspecialchars(file_get_contents($AC_DIRECTORIO.$final));

		$permiEditarArc=true;

	} else { echo '<p class="texinimen bgrojo">Oh! parece que el archivo no existe!';

		$senomo='no'; $permiEditarArc=false; $mostrar='';

		if(isset($final2) && file_exists($AC_DIRECTORIO.$final2)):

			$senomo='se'; $permiEditarArc=true;

		endif;

		if(isset($_GET['permiso']) && $_GET['permiso']==true && !file_exists($AC_DIRECTORIO.$final)):

			$senomo='se'; $permiEditarArc=true;

		endif;

		if($senomo=='no'){ $senomo='no se puede crear...'; }

		if($senomo=='se'){ $senomo='pero se puede crear!'; }

		echo '<span class="t12">,'.$senomo.'</span></p>'; }



	if($permiEditarArc==true){

		if(isset($_GET['edicion'])){ $mostrar=$mostrar.$_GET['edicion']; }

		if(isset($_GET['replace'])){ $mostrar=$_GET['replace']; }

		

		$fevec=darFormatoIobi(darFormatoConTXT($final));

		$fevea=$AC_DIRECTORIO.$AdPa.'etc/fechas/'.$fevec;

		$feve='';

		if(file_exists($fevea)){ $feve=htmlspecialchars(file_get_contents($fevea)); }

		echo '



		<form method="post" action="actualizar.php">



			<div class="formulario" style="width:99%;">

			<input class="ocultos" type="text" value="'.$feve.'" placeholder="Fecha">

			<input class="oculto" type="text" name="direccion" value="'.$dire.'">



			<input class="oculto" type="text" name="archivo" value="'.$final.'">



			<label>El archivo es: '.$a.'</label><hr>



			<textarea class="texeditor" name="editar" placeholder="Editor">'.$mostrar.'</textarea></div>



			<div>



		        <input class="boton" type="reset" value="Cancelar &#xf00d">



		        <input class="boton" type="submit" name="IniEditor" value="Actualizar &#xf044">

		        <input class="oculto" type="text" name="fechae" value="'.$fevec.'">

		        <input class="oculto" type="text" name="archivo" value="'.$final.'">

		        <input class="boton2" type="submit" name="IniEliminarArchivo" value="Eliminar &#xf1f8">



		    </div>



		</form>';

	}

}







?>

<span class="t14">v0.3.1 Beta</span>

<?php } else { if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }

        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}"); } ?>