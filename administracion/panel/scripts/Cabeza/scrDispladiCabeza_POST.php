<?php #ENVIOS MEDIANTE POST PARA EL USUARIO
if($_POST["opcmostrarscripts"]=="on"){
#REDES SOCIALES
if(isset($_POST['opcredes'])){ $opcredes=trim($_POST['opcredes']); } else { $opcredes=''; }
if(isset($_POST['opctituloweb'])){ $opctituloweb=trim($_POST['opctituloweb']); } else { $opctituloweb=''; }
if(isset($_POST['opctema'])){ $opctema=trim($_POST['opctema']); } else { $opctema=''; }
if(isset($_POST['opcredesfb'])){ $opcredesfb=trim($_POST['opcredesfb']); } else { $opcredesfb=''; }
if(isset($_POST['opcredesyt'])){ $opcredesyt=trim($_POST['opcredesyt']); } else { $opcredesyt=''; }
if(isset($_POST['opcredestw'])){ $opcredestw=trim($_POST['opcredestw']); } else { $opcredestw=''; }
if(isset($_POST['opcredestk'])){ $opcredestk=trim($_POST['opcredestk']); } else { $opcredestk=''; }
if(isset($_POST['opcredespt'])){ $opcredespt=trim($_POST['opcredespt']); } else { $opcredespt=''; }
if(isset($_POST['opcredeskf'])){ $opcredeskf=trim($_POST['opcredeskf']); } else { $opcredeskf=''; }


$archiD="\n<?php #CONTENIDO POR EL USUARIO\n".'$CabezaRedes='."'$opcredes';\n".'$CabezaTituloWeb='."'$opctituloweb';\n".'$CabezaTema='."'$opctema';\n".'$CabezaRedesFB='."'$opcredesfb';\n".'$CabezaRedesYT='."'$opcredesyt';\n".'$CabezaRedesTW='."'$opcredestw';\n".'$CabezaRedesTK='."'$opcredestk';\n".'$CabezaRedesPT='."'$opcredespt';\n".'$CabezaRedesKF='."'$opcredeskf';\n"."#ACTUALIZADO: $fechahora\n?>";
}
?>