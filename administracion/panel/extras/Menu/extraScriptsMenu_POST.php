<?php
if($_POST["opcmenuscripts"]=="on"){
	if(isset($_POST["opcbotones"])){ $opcbotones=trim($_POST["opcbotones"]); } else { $opcbotones=""; }
	$archiD="\n<?php #CONTENIDO POR EL USUARIO\n".'$MenuBotones='."'$opcbotones';?>";
}
?>