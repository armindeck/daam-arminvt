<?php #EXTENCION CREADA POR ARMIN
function darFormato($string) {
	$string = str_replace(array('<'), '«', $string );
	$string = str_replace(array('>'), '»', $string );
	$string = str_replace(array("'"), '&#039;', $string );
	$string = str_replace(array('"'), '&quot;', $string );
	$string = str_replace(array('{'), '&#123;', $string );
	$string = str_replace(array('}'), '&#125;', $string );
	$string = str_replace(array('#ET_B#'), '<br>', $string);
	$string = str_replace(array('#ET_AN#'), '<b>', $string);
	$string = str_replace(array('#ET_CN#'), '</b>', $string);

	return $string;
}

function darFormatoNoSimbolos($string) {
	$string = str_replace(array('☺', '☻', '♥', '♦', '♣', '♠', '•', '◘', '○', '◙', '♂', '♀', '♪', '♫', '☼', '►', '◄', '↕', '‼', '¶', '§', '▬', '↨', '↑', '↓', '→', '←', '∟', '↔', '▲', '▼', '!', '"', '#', '$', '%', '&', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', ']', '^', '_', '`', '{', '|', '}', '~', '⌂', 'ª', 'º', '¿', '®', '¬', '½', '¼', '¡', '«', '»', '░', '▒', '▓', '│', '┤', '©', '╣', '║', '╗', '╝', '¢', '¥', '┐', '└', '‼', '┴', '┬', '├', '─', '┼', '╚', '╔', '╩', '╦', '╠', '═', '╬', '¤', 'ð', '┘', '┌', '█', '▄', '¦', '▀', '¯', '´', '±', '³', '²', '¶', '§', '÷', '¸', '°', '¨', '·', '¹', '³', '²', '■', "'", '“', '”'), '', $string );
	return $string;
}
?>