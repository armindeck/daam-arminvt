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

$opcscript1=trim($_POST['opcmenulateral_script1']);
$opcscript2=trim($_POST['opcmenulateral_script2']);
$opcscript3=trim($_POST['opcmenulateral_script3']);
$opcscript4=trim($_POST['opcmenulateral_script4']);

$archiD="\n<?php #CONTENIDO POR EL USUARIO\n".'$MenuLateralRedes='."'$opcredes';\n".'$MenuLateralRedesTitulo='."'$opcredestitulo';\n".'$MenuLateralRedesFB='."'$opcredesfb';\n".'$MenuLateralRedesYT='."'$opcredesyt';\n".'$MenuLateralRedesTW='."'$opcredestw';\n".'$MenuLateralRedesTK='."'$opcredestk';\n".'$MenuLateralRedesPT='."'$opcredespt';\n".'$MenuLateralRedesKF='."'$opcredeskf';\n".'$MenuLateralNoticias='."'$opcnoticias';\n".'$MenuLateralFrases='."'$opcfrases';\n".'$MenuLateralForolink='."'$opcforolink';\n".'$MenuLateralVisitas='."'$opcvisitas';\n".'$MenuLateralVersion='."'$opcversion';\n".'$MenuLateralScript1='."'$opcscript1';\n".'$MenuLateralScript2='."'$opcscript2';\n".'$MenuLateralScript3='."'$opcscript3';\n".'$MenuLateralScript4='."'$opcscript4';\n"."#ACTUALIZADO: $fechahora\n?>";
}
?>