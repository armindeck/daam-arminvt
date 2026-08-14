<?php #ENVIOS MEDIANTE POST PARA EL USUARIO > scrCUS
if($_POST["dis_cscr"]){
	#REDES SOCIALES & OTROS
	if(isset($_POST['opccabezaredes'])){ $opccabezaredes=trim($_POST['opccabezaredes']); } else { $opccabezaredes=''; }
	if(isset($_POST['opccabezatituloweb'])){ $opccabezatituloweb=trim($_POST['opccabezatituloweb']); } else { $opccabezatituloweb=''; }
	if(isset($_POST['opccabezatema'])){ $opccabezatema=trim($_POST['opccabezatema']); } else { $opccabezatema=''; }
	if(isset($_POST['opccabezaredesfb'])){ $opccabezaredesfb=trim($_POST['opccabezaredesfb']); } else { $opccabezaredesfb=''; }
	if(isset($_POST['opccabezaredesyt'])){ $opccabezaredesyt=trim($_POST['opccabezaredesyt']); } else { $opccabezaredesyt=''; }
	if(isset($_POST['opccabezaredestw'])){ $opccabezaredestw=trim($_POST['opccabezaredestw']); } else { $opccabezaredestw=''; }
	if(isset($_POST['opccabezaredestk'])){ $opccabezaredestk=trim($_POST['opccabezaredestk']); } else { $opccabezaredestk=''; }
	if(isset($_POST['opccabezaredespt'])){ $opccabezaredespt=trim($_POST['opccabezaredespt']); } else { $opccabezaredespt=''; }
	if(isset($_POST['opccabezaredeskf'])){ $opccabezaredeskf=trim($_POST['opccabezaredeskf']); } else { $opccabezaredeskf=''; }
	if(isset($_POST['opcmenubotones'])){ $opcmenubotones=trim($_POST['opcmenubotones']); } else { $opcmenubotones=''; }
	if(isset($_POST['opcmenulateralredes'])){ $opcmenulateralredes=trim($_POST['opcmenulateralredes']); } else { $opcmenulateralredes=''; }
	if(isset($_POST['opcmenulateralredestitulo'])){ $opcmenulateralredestitulo=trim($_POST['opcmenulateralredestitulo']); } else { $opcmenulateralredestitulo=''; }
	if(isset($_POST['opcmenulateralredesfb'])){ $opcmenulateralredesfb=trim($_POST['opcmenulateralredesfb']); } else { $opcmenulateralredesfb=''; }
	if(isset($_POST['opcmenulateralredesyt'])){ $opcmenulateralredesyt=trim($_POST['opcmenulateralredesyt']); } else { $opcmenulateralredesyt=''; }
	if(isset($_POST['opcmenulateralredestw'])){ $opcmenulateralredestw=trim($_POST['opcmenulateralredestw']); } else { $opcmenulateralredestw=''; }
	if(isset($_POST['opcmenulateralredestk'])){ $opcmenulateralredestk=trim($_POST['opcmenulateralredestk']); } else { $opcmenulateralredestk=''; }
	if(isset($_POST['opcmenulateralredespt'])){ $opcmenulateralredespt=trim($_POST['opcmenulateralredespt']); } else { $opcmenulateralredespt=''; }
	if(isset($_POST['opcmenulateralredeskf'])){ $opcmenulateralredeskf=trim($_POST['opcmenulateralredeskf']); } else { $opcmenulateralredeskf=''; }
	if(isset($_POST['opcmenulateralnoticias'])){ $opcmenulateralnoticias=trim($_POST['opcmenulateralnoticias']); } else { $opcmenulateralnoticias=''; }
	if(isset($_POST['opcmenulateralrandom'])){ $opcmenulateralrandom=trim($_POST['opcmenulateralrandom']); } else { $opcmenulateralrandom=''; }
	if(isset($_POST['opcmenulateralpublicaciones'])){ $opcmenulateralpublicaciones=trim($_POST['opcmenulateralpublicaciones']); } else { $opcmenulateralpublicaciones=''; }
	if(isset($_POST['opcmenulateralvisitas'])){ $opcmenulateralvisitas=trim($_POST['opcmenulateralvisitas']); } else { $opcmenulateralvisitas=''; }
	if(isset($_POST['opcmenulateralversion'])){ $opcmenulateralversion=trim($_POST['opcmenulateralversion']); } else { $opcmenulateralversion=''; }
	if(isset($_POST['opcpiedepaginaderechos'])){ $opcpiedepaginaderechos=trim($_POST['opcpiedepaginaderechos']); } else { $opcpiedepaginaderechos=''; }


$archiD="<?php #Mostrar u ocultar elementos".'
$scrUS_CabezaRedes='."'$opccabezaredes';".'
$scrUS_CabezaTituloWeb='."'$opccabezatituloweb';".'
$scrUS_CabezaTema='."'$opccabezatema';".'
$scrUS_CabezaRedesFB='."'$opccabezaredesfb';".'
$scrUS_CabezaRedesYT='."'$opccabezaredesyt';".'
$scrUS_CabezaRedesTW='."'$opccabezaredestw';".'
$scrUS_CabezaRedesTK='."'$opccabezaredestk';".'
$scrUS_CabezaRedesPT='."'$opccabezaredespt';".'
$scrUS_CabezaRedesKF='."'$opccabezaredeskf';".'
$scrUS_MenuBotones='."'$opcmenubotones';".'
$scrUS_MenuLateralRedes='."'$opcmenulateralredes';".'
$scrUS_MenuLateralRedesTitulo='."'$opcmenulateralredestitulo';".'
$scrUS_MenuLateralRedesFB='."'$opcmenulateralredesfb';".'
$scrUS_MenuLateralRedesYT='."'$opcmenulateralredesyt';".'
$scrUS_MenuLateralRedesTW='."'$opcmenulateralredestw';".'
$scrUS_MenuLateralRedesTK='."'$opcmenulateralredestk';".'
$scrUS_MenuLateralRedesPT='."'$opcmenulateralredespt';".'
$scrUS_MenuLateralRedesKF='."'$opcmenulateralredeskf';".'
$scrUS_MenuLateralNoticias='."'$opcmenulateralnoticias';".'
$scrUS_MenuLateralRandom='."'$opcmenulateralrandom';".'
$scrUS_MenuLateralPublicaciones='."'$opcmenulateralpublicaciones';".'
$scrUS_MenuLateralVisitas='."'$opcmenulateralvisitas';".'
$scrUS_MenuLateralVersion='."'$opcmenulateralversion';".'
$scrUS_PiedePaginaDerechos='."'$opcpiedepaginaderechos';"."
#ACTUALIZADO: $fechahora ~ $vinterna\n?>";
}