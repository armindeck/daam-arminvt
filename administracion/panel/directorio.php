<!-- © 2023 Armin | dbproject.rf.gd -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Directorio por Armin/DBHS</title>
</head>
<body>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
	@import url('https://fonts.googleapis.com/css?family=Boogaloo');

	*{
		font-size: 14px;
		text-decoration: none;
		list-style: none;
		font-family: 'Poppins', 'FontAwesome', sans-serif;
	}
	body{ background: #303D4F; color: #FFF; }
	form{ margin-bottom: 8px; }
	.ac{ /* color: #8700ff; */ color: #FFF; }
	.ad{ color: #8700ff; }
	a:hover{ color: #9520fd; transition: 0.5s; }
	input{ padding: 4px; }
	input[type=submit], input[type=reset]{
		border: none;
		border-radius: 2px;
		cursor: pointer;
		color: white;
		background: #8700ff;
		box-shadow: 0px 0px 0px 1px rgb(0,0,0,.1);
	}
	input[type=submit]:hover, input[type=reset]:hover{
		background: #9520fd;
	}
	.pd8l{ padding-left: 8px; }
	.tcen{ text-align: center; }
	.fnt2, .fnt2 a, .fnt2 span{ font-family: 'Boogaloo'; }
	.mrgb18{ margin: 25px; }
</style>
<?php session_start(); if(isset($_SESSION['usuario']) && $_SESSION['rol'] == 5){ ?>
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

	function darFormatoPNG($string) {
		$string = str_replace(array('.png'), '', $string );
		$string = str_replace(array('.PNG'), '', $string );
	return $string;
	}
?>

<?php
$dir=""; $paso=false;
if(!empty(darFormatoNoSimbolos($_GET))){
	$dir=darFormato($_GET['dir']);
	$paso=true;
}

?>

<form method="get">
	<input type="text" name="dir" value="<?php echo $dir; ?>">
	<input type="submit">
	<a class="ac pd8l" href="?dir=../..">Inicio</a>
</form>


<?php
if ($paso==true):
	$archivos = scandir($dir);
	foreach ($archivos as $archivo){
		if ($archivo !== '.' && $archivo !== '..') {
			$ruta=$dir.'/'.$archivo;
			if(is_dir($ruta)){ echo '<a class="ad" href="?dir='.$ruta.'">'.$archivo.'/</a><br>'; }
			if(!is_dir($ruta)){
				$vpng=darFormatoPNG($archivo).".png"; $vPNG=darFormatoPNG($archivo).".PNG";
				if($archivo==$vpng || $archivo==$vPNG){
					echo "<a target='_blank' class='ac' href='$dir/$archivo'>".$archivo."</a><br>";
				} else {
					echo "<a target='_blank' class='ac' href='ediadmin.php?tipo=modificar&u=".$dir."&a=/$archivo'>".$archivo."</a><br>";
				}
			}
		}
	}
endif;
?>

<?php } else { header("Location: ../../error?403"); } ?>
<p class="fnt2 tcen mrgb18">&copy; 2023 <a class="ac" target="_blank" href="https://dbproject.rf.gd">Armin/DBHS</a> <span class="t12">v0.3.2 Beta</span></p>
</body>
</html>