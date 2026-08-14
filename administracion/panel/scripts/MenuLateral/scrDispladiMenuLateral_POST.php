<?php #ENVIOS MEDIANTE POST PARA EL USUARIO
if($_POST["opcmenulateralscripts"]=="on"){
#REDES SOCIALES
if(isset($_POST['opcredes'])){ $opcredes=trim($_POST['opcredes']); } else { $opcredes=''; }
if(isset($_POST['opcredestitulo'])){ $opcredestitulo=trim($_POST['opcredestitulo']); } else { $opcredestitulo=''; }
if(isset($_POST['opcredesfb'])){ $opcredesfb=trim($_POST['opcredesfb']); } else { $opcredesfb=''; }
if(isset($_POST['opcredesyt'])){ $opcredesyt=trim($_POST['opcredesyt']); } else { $opcredesyt=''; }
if(isset($_POST['opcredestw'])){ $opcredestw=trim($_POST['opcredestw']); } else { $opcredestw=''; }
if(isset($_POST['opcredestk'])){ $opcredestk=trim($_POST['opcredestk']); } else { $opcredestk=''; }
if(isset($_POST['opcredespt'])){ $opcredespt=trim($_POST['opcredespt']); } else { $opcredespt=''; }
if(isset($_POST['opcredeskf'])){ $opcredeskf=trim($_POST['opcredeskf']); } else { $opcredeskf=''; }

#OTRAS
$opcnoticias=trim($_POST['opcnoticias']);
$opcfrases=trim($_POST['opcfrases']);
$opcforolink=trim($_POST['opcforolink']);
$opcvisitas=trim($_POST['opcvisitas']);
$opcversion=trim($_POST['opcversion']);

$archiD="\n<?php #CONTENIDO POR EL USUARIO\n".'$MenuLateralRedes='."'$opcredes';\n".'$MenuLateralRedesTitulo='."'$opcredestitulo';\n".'$MenuLateralRedesFB='."'$opcredesfb';\n".'$MenuLateralRedesYT='."'$opcredesyt';\n".'$MenuLateralRedesTW='."'$opcredestw';\n".'$MenuLateralRedesTK='."'$opcredestk';\n".'$MenuLateralRedesPT='."'$opcredespt';\n".'$MenuLateralRedesKF='."'$opcredeskf';\n".'$MenuLateralNoticias='."'$opcnoticias';\n".'$MenuLateralFrases='."'$opcfrases';\n".'$MenuLateralForolink='."'$opcforolink';\n".'$MenuLateralVisitas='."'$opcvisitas';\n".'$MenuLateralVersion='."'$opcversion';\n"."#ACTUALIZADO: $fechahora\n?>";
}
?>