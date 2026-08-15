<?php
#FUNCIONES
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

?>