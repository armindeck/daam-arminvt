<?php # FUNCIONES DEPRECATES

# ----------- DEPRECATED ---------------

function darFormato($string)
{
  $string = str_replace(array('<'), '«', $string);
  $string = str_replace(array('>'), '»', $string);
  $string = str_replace(array("'"), ' &#039; ', $string);
  $string = str_replace(array('"'), ' &quot; ', $string);
  $string = str_replace(array('{'), ' &#123; ', $string);
  $string = str_replace(array('}'), ' &#125; ', $string);
  $string = str_replace(array('#BR#'), ' <br> ', $string);
  $string = str_replace(array('#BA#'), ' <b> ', $string);
  $string = str_replace(array('#BC#'), ' </b> ', $string);
  $string = str_replace(array('#IA#'), ' <i> ', $string);
  $string = str_replace(array('#IC#'), ' </i> ', $string);
  $string = str_replace(array('#HR#'), ' <hr> ', $string);
  $string = str_replace(array('#TA#'), ' <span> ', $string);
  $string = str_replace(array('#TA18#'), ' <span class="t18"> ', $string);
  $string = str_replace(array('#TA14#'), ' <span class="t14"> ', $string);
  $string = str_replace(array('#TA12#'), ' <span class="t12"> ', $string);
  $string = str_replace(array('#TC#'), ' </span> ', $string);
  return $string;
}

function darFormatoNoSimbolos($string)
{
  $string = str_replace(array('☺', '☻', '♥', '♦', '♣', '♠', '•', '◘', '○', '◙', '♂', '♀', '♪', '♫', '☼', '►', '◄', '↕', '‼', '¶', '§', '▬', '↨', '↑', '↓', '→', '←', '∟', '↔', '▲', '▼', '!', '"', '#', '$', '%', '&', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', ']', '^', '_', '`', '{', '|', '}', '~', '⌂', 'ª', 'º', '¿', '®', '¬', '½', '¼', '¡', '«', '»', '░', '▒', '▓', '│', '┤', '©', '╣', '║', '╗', '╝', '¢', '¥', '┐', '└', '‼', '┴', '┬', '├', '─', '┼', '╚', '╔', '╩', '╦', '╠', '═', '╬', '¤', 'ð', '┘', '┌', '█', '▄', '¦', '▀', '¯', '´', '±', '³', '²', '¶', '§', '÷', '¸', '°', '¨', '·', '¹', '³', '²', '■', "'", '“', '”'), '', $string);
  return $string;
}

function darFormatoIobi($string): string
{
  return str_replace('/', '-', $string);
}


/* ----------- EDITOR|EXPLORER ------------- */
function LocalBuscar($buscar){
	return glob($buscar, GLOB_BRACE);
}
function LocalQuitarPuntoEslas($string){
	return str_replace('../', '', $string);
}
function normalizar($valor){
    $valor = htmlspecialchars($valor);
    $valor = trim($valor);
    $valor = stripcslashes($valor);
	return $valor;
}
function archivoAceptado($string){
    $string = str_replace('/','-',$string);
    return $string;
}
function LocalCambiarPHPaTXT($string){
    $string = str_replace('.php','.txt',$string);
    return $string;
}
function LocalMensaje($list){
	$back = 'white';
	if($list['tipo'] == 'exito'){ $back = 'green'; } else
	if($list['tipo'] == 'error'){ $back = 'red'; } else
	if($list['tipo'] == 'peligro'){ $back = 'yellow'; }
?>
<style type="text/css">
	.editor-mensaje {
		padding: 8px;
		margin: 8px 0px;
		display: block;
		font-weight: bold;
		text-align: center;
		color: <?php echo ($back == 'yellow' ? 'black': 'white'); ?>;
		background: <?php echo $back; ?>;
		border-radius: 4px;
		border: 1px solid rgb(0,0,0,.3);
	}
</style>
<div class="editor-mensaje"><?php echo $list['text']; ?></div>
<?php }

function LocalArchivoNombre($string){
	return basename($string);
}
