<!-- © 2023 Armin | dbproject.rf.gd -->
<?php session_start();
$adusuario='admin';
$adcodigo='e64b78fc3bc91bcbc7dc232ba8ec59e0';
$ediadmin='ediadmin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editor por Armin/DBHS</title>
</head>
<body>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://fonts.googleapis.com/css?family=Boogaloo');

*{
	padding: 0px;
	margin: 0px;
	text-decoration: none;
	list-style: none;
	font-family: 'Poppins', 'FontAwesome', sans-serif;
}

body{
	display: flex;
	flex-wrap: wrap;
	justify-content: space-around;
	background: #303D4F;
	/* background: #d0d3d4; */
	color: #FFF;
	/* color: #434343; */
}
div{
	padding: 2px;
}

.contenido{
	max-width: 720px;
	padding: 4px;
	background: rgb(0,0,0,.1);
	/* background: white; */
	border-radius: 2px;
}

.titulo, form, .error, .bien{
	padding: 2px 6px;
	border-radius: 2px;
}

.titulo, form{ /* background: white; */ background: rgb(0,0,0,.1); }
.error, .bien{ margin: 4px 0px; color: white; font-weight: bold; }
.error{ background: red; }
.bien{ background: green; }
a{ /* color: #8700ff; */ color: #FFF; }
a:hover{ color: #9520fd; transition: 0.5s; }

.boton{ padding: 2px; /* color: #8700ff; */ color: #FFF; }
input{ padding: 4px; }

input[type=submit], input[type=reset], .boton{
	border: none;
	border-radius: 2px;
	cursor: pointer;
}

input[type=submit], input[type=reset]{
	color: white;
	background: #8700ff;
	box-shadow: 0px 0px 0px 1px rgb(0,0,0,.1);
}

input[type=submit]:hover, input[type=reset]:hover{
	background: #9520fd;
}
.boton:hover{ color: white; background: #8700ff; }
textarea{ padding: 4px; width: 95%; min-height: 250px; }

hr{ padding: none; margin: 8px 8px 8px 8px; border: none; box-shadow: 0px 0px 0px 1px rgb(0,0,0,.2); }

.flexRow{ display: flex; flex-direction: row; }
.der{ margin-left: auto; }

.t25{ font-size: 25px; }
.t18{ font-size: 18px; }
.tb{ font-weight: bold; }
.tcen{ text-align: center; }
.t14{ font-size: 14px; }
.t12{ font-size: 12px; }
.fnt2, .fnt2 a, .fnt2 span{ font-family: 'Boogaloo'; }
.mrgb18{ margin: 25px; }
.der{ text-align: right; }
.oculto{ display:none; width:0px; border:none; }

@media screen and (max-width: 288px) and (min-width: 0px) {
	form input[type=text],
	form input[type=url],
	form input[type=password],
	form input[type=email
		{ width: 80%; }
}
</style>

<?php #CONVERTIDORES

		function darFormato($string) {
			$string = str_replace(array('<'), '«', $string );
			$string = str_replace(array('>'), '»', $string );
			$string = str_replace(array("'"), ' &#039; ', $string );
			$string = str_replace(array('"'), ' &quot; ', $string );
			$string = str_replace(array('{'), ' &#123; ', $string );
			$string = str_replace(array('}'), ' &#125; ', $string );
		return $string;
		}

		function darFormatoNoSimbolos($string) {
			$string = str_replace(array('☺', '☻', '♥', '♦', '♣', '♠', '•', '◘', '○', '◙', '♂', '♀', '♪', '♫', '☼', '►', '◄', '↕', '‼', '¶', '§', '▬', '↨', '↑', '↓', '→', '←', '∟', '↔', '▲', '▼', '!', '"', '#', '$', '%', '&', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', ']', '^', '_', '`', '{', '|', '}', '~', '⌂', 'ª', 'º', '¿', '®', '¬', '½', '¼', '¡', '«', '»', '░', '▒', '▓', '│', '┤', '©', '╣', '║', '╗', '╝', '¢', '¥', '┐', '└', '‼', '┴', '┬', '├', '─', '┼', '╚', '╔', '╩', '╦', '╠', '═', '╬', '¤', 'ð', '┘', '┌', '█', '▄', '¦', '▀', '¯', '´', '±', '³', '²', '¶', '§', '÷', '¸', '°', '¨', '·', '¹', '³', '²', '■', "'", '“', '”'), '', $string );
			return $string;
		}

?>

<div>
<p class="titulo t25 tb tcen">Bienvenido a la zona de edicion!</p>
<?php
#MENSAJES
$mensaje='';
if (isset($_GET['ms'])) {
	switch ($_GET['ms']) {
		case 'datosingreinco':
			$mms='Los datos ingresados son incorrectos.';
			break;
		case 'sesionfinalizada':
			$mms='Sesión finalizada.';
			break;
		case 'noenviodatos':
			$mms='No se envio ninguna clase de datos.';
			break;
		case 'archicreado':
			$mms='El archivo fue creado!';
			$v=true;
			break;
		case 'archimodificado':
			$mms='El archivo fue modificado!';
			$v=true;
			break;
		case 'archinoexiste':
			$mms='Oh! el archivo no existe!';
			break;
		case 'archiexiste':
			$mms='Oh! el archivo existe!';
			break;
		case 'archieliminado':
			$mms='El archivo fue eliminado!';
			$v=true;
			break;
		case 'nocambiardatos':
			$mms='No cambiar los valores de los dos campos!';
			break;
		
		default:
			$mms='El GET enviado no existe!';
			break;
	}
	if(isset($v) && $v==true){ $tp='bien'; } else { $tp='error'; }
	$mensaje='<p class="'.$tp.'">'.$mms.'</h2>';
}
?>

<?php

if(!empty($_POST)){
	if($_POST['iniciar'] || $_POST['crear'] || $_POST['modificar'] || $_POST['eliminar']){
		$t=darFormato(trim($_POST['tipo']));
		$u=darFormato(trim($_POST['u']));
		$a=darFormato(trim($_POST['a']));
		$vu=darFormato(trim($_POST['vu']));
		$va=darFormato(trim($_POST['va']));
		$d=$_POST['d'];
		$dir=[
			"$ediadmin?tipo=modificar&u=$vu&a=$va&ms=",
			"$ediadmin?tipo=crear&u=$vu&a=$va&ms=",
			"$ediadmin?ms="
		]; #0,1,2 > EMPIEZA EN '0'
	}
	if($_POST['iniciar']) {
		$usuario=darFormatoNoSimbolos(trim($_POST['usuario']));
		$codigo=darFormato(md5(trim($_POST['codigo'])));

		if ($usuario==$adusuario && $codigo==$adcodigo) {
			$_SESSION['usuario']=$usuario; $_SESSION['codigo']=$codigo; $_SESSION['rol']=5;
			header("Location: $ediadmin?edi=true");
		} else {
			session_destroy();
			header("Location: $dir[2]datosingreinco");
		}
	} else
	if($_POST['crear'] || $_POST['modificar'] || $_POST['eliminar']){
		$MMSPE="$dir[2]archinoexiste"; $tipop='modificar'; $pasop1=false;
		if($_POST['crear']){
			$MMSP="$dir[0]archicreado";
			$MMSPE="$dir[2]archiexiste"; $tipop='crear';
			if(!file_exists("$vu$va")){ $pasop1=true; }
		}
		if($_POST['modificar']){
			$MMSP="$dir[0]archimodificado";
			if(file_exists("$vu$va")){ $pasop1=true; }
		}
		if($_POST['eliminar']){
			$MMSP="$dir[2]archieliminado";
			if(file_exists("$vu$va")){ $pasop1=true; }
		}

		if($pasop1==true){
			if($vu==$u && $va==$a && $t==$tipop){
				if($_POST['crear'] || $_POST['modificar']){ file_put_contents("$vu$va",$d); }
				if($_POST['eliminar']){ unlink("$vu$va"); }
				header("Location: $MMSP");
			} else { header("Location: $dir[0]nocambiardatos"); }
		} else { header("Location: $MMSPE"); }
	} else
	if($_POST['salir']){ session_destroy(); header("Location: $ediadmin?ms=sesionfinalizada"); }
	else { header("Location: $ediadmin?ms=noenviodatos"); }
	
}

#CONTENIDO
if (isset($_SESSION['rol']) && $_SESSION['rol']==5): ?>
	<?php #CONTENIDO SECUNDARIO
		echo $mensaje; ?><hr>
		<form method="post">
			<div class="flexRow">
				<div>
					<a class="boton" href="<?php echo $ediadmin; ?>">Inicio</a> |
					<a class="boton" href="<?php echo $ediadmin; ?>?tipo=crear">Crear</a> |
					<a class="boton" href="<?php echo $ediadmin; ?>?tipo=modificar">Modificar</a> |
					<a target="_blank" class="boton" href="directorio.php">Directorio</a> |
					<a target="_blank" class="boton" href="https://dbproject.rf.gd/ac/ediadmin">Actualizar</a>
					<input type="submit" name="salir" value="Cerrar sesión">
				</div>
			</div>
		</form>
		<hr>
		<?php if(isset($_GET['tipo'])): $tipo=$_GET['tipo']; endif;
		if(!isset($tipo)): ?>
		<div class="contenido">
			<p>Hola!, soy <a target="_blank" href="https://dbproject.rf.gd/">Armin</a> y soy vtuber, desarrollador de sitios web y juegos que comparto en mi <a target="_blank" href="https://youtube.com/@arminvtch">Canal de YouTube</a>. Además me gusta dibujar, editar y crear videos, los cuales son subidos al canal. Desarrollo páginas web como <a target="_blank" href="https://arminvt.site/">arminvt</a> donde subo mis contenidos de información y actualizaciones de ciertos temas. Ademas comparto animes en <a target="_blank" href="https://megaanime.rf.gd/">MegaAnime</a> todos los dias, asi que te espero! y <a target="_blank" href="https://dbproject.rf.gd/">¡Sigue a delante!</a></p>
		</div>
		<?php endif;
		if(isset($tipo)):
			if($tipo=='crear' or $tipo=='modificar'): $paso1=true;
				if($paso1==true):
		?>
		<form method="get" action="<?php echo $ediadmin; ?>">
			<input class="oculto" type="text" name="tipo" value="<?php echo $tipo; ?>" placeholder="tipo">
			<input type="text" name="u" placeholder="Ubicacion">
			<input type="text" name="a" placeholder="Archivo" required>
			<input type="submit" value="Mostrar">
		</form>
	<?php endif; endif; endif;
		if(isset($_GET['u']) && isset($_GET['a']) && isset($tipo) && isset($paso1) && $paso1==true): $paso2=false;
			$u=darFormato(trim($_GET['u']));
			$a=darFormato(trim($_GET['a']));
			$t=darFormato(trim($tipo));
			if($tipo=='crear'){
				if(!file_exists("$u$a")){ $paso2=true; $tex1='crear'; }
				else { echo '<p class="error">Oh! parece que el archivo: '.$a.', existe, use modificar!</p>'; }
			}
			if ($tipo=='modificar'){
				if(file_exists("$u$a")){ $paso2=true; $tex1='modificar'; }
				else { echo '<p class="error">Oh! parece que el archivo: '.$a.', no existe!</p>'; }
			}

			if(isset($paso2) && $paso2==true): ?>
				<hr>El archivo a <?php echo $tex1; ?>: <b><?php echo $a; ?></b><hr>
				<form method="post" action="<?php echo $ediadmin; ?>">
					<label><b>Atención:</b> no modificar los 2 primeros campos!</label><hr>
					<input class="oculto" type="text" name="tipo" value="<?php echo $tipo; ?>" placeholder="Tipo" required>
					<input type="text" name="u" value="<?php echo $u; ?>" placeholder="Ubicacion">
					<input class="oculto" type="text" name="vu" value="<?php echo $u; ?>" placeholder="Verificacion">
					<input type="text" name="a" value="<?php echo $a; ?>" placeholder="Archivo" required>
					<input class="oculto" type="text" name="va" value="<?php echo $a; ?>" placeholder="Verificacion"><hr>
					<textarea name="d"><?php if($tipo=='modificar'){ echo htmlspecialchars(file_get_contents("$u$a")); }?></textarea><hr>
					<div class="flexRow">
						<div>
							<input type="reset" value="Cancelar">
							<?php if($tipo=='modificar'): ?>
							<input type="submit" name="modificar" value="Modificar">
							<?php endif; ?>
							<?php if($tipo=='crear'): ?>
							<input type="submit" name="crear" value="Crear">
							<?php endif; ?>
						</div>
						<?php if($tipo=='modificar'): ?>
						<div class="der">
							<input type="submit" name="eliminar" value="Eliminar">
						</div>
					<?php endif; ?>
					</div>
				</form>
			<?php endif;
		endif;
endif; ?>



	<?php #FORMULARIO
	if(!isset($_SESSION['rol']) || $_SESSION['rol']!==5): ?>
	<form method="post" action="<?php echo $ediadmin; ?>">
	<input type="text" name="usuario" minlength="4" maxlength="150" placeholder="Usuario">
	<input type="password" name="codigo" minlength="4" maxlength="150" placeholder="Contraseña">
	<input type="submit" name="iniciar" value="Iniciar">
	</form>
	<?php echo $mensaje; endif; ?>
	<p class="fnt2 tcen mrgb18">&copy; 2023 <a target="_blank" href="https://dbproject.rf.gd">Armin/DBHS</a> <span class="t12">v0.3.2 Beta</span></p>
	</div>
</body>
</html>