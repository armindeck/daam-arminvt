<?php
if($_POST["opcpiedepaginascripts"]=="on"){
	if(isset($_POST["opcderechos"])){ $opcderechos=trim($_POST["opcderechos"]); } else { $opcderechos=""; }
	$archiD="\n<?php #CONTENIDO POR EL USUARIO\n".'$PiedePaginaDerechos='."'$opcderechos';?>";
}
?>