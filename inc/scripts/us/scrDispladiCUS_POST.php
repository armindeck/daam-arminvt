<?php #ENVIOS MEDIANTE POST PARA EL USUARIO > scrCUS
if($_POST["dis_cscr"]){
	#REDES SOCIALES & OTROS
	if(isset($_POST['opccabezaredes'])){ $opccabezaredes=trim($_POST['opccabezaredes']); } else { $opccabezaredes=''; }
	if(isset($_POST['opccabezatituloweb'])){ $opccabezatituloweb=trim($_POST['opccabezatituloweb']); } else { $opccabezatituloweb=''; }
	if(isset($_POST['opccabezatitulowebicono'])){ $opccabezatitulowebicono=trim($_POST['opccabezatitulowebicono']); } else { $opccabezatitulowebicono=''; }
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
	if(isset($_POST['opcmenulateralnoticiascarpeta'])){ $opcmenulateralnoticiascarpeta=trim($_POST['opcmenulateralnoticiascarpeta']); } else { $opcmenulateralnoticiascarpeta=''; }
	if(isset($_POST['opcmenulateralrandom'])){ $opcmenulateralrandom=trim($_POST['opcmenulateralrandom']); } else { $opcmenulateralrandom=''; }
	if(isset($_POST['opcmenulateralextras'])){ $opcmenulateralextras=trim($_POST['opcmenulateralextras']); } else { $opcmenulateralextras=''; }
	if(isset($_POST['opcmenulateralcontadorcomentarios'])){ $opcmenulateralcontadorcomentarios=trim($_POST['opcmenulateralcontadorcomentarios']); } else { $opcmenulateralcontadorcomentarios=''; }
	if(isset($_POST['opcmenulateralcontadorcomentarioscarpeta'])){ $opcmenulateralcontadorcomentarioscarpeta=trim($_POST['opcmenulateralcontadorcomentarioscarpeta']); } else { $opcmenulateralcontadorcomentarioscarpeta=''; }
	if(isset($_POST['opcmenulateralvisitas'])){ $opcmenulateralvisitas=trim($_POST['opcmenulateralvisitas']); } else { $opcmenulateralvisitas=''; }
	if(isset($_POST['opcmenulateralversion'])){ $opcmenulateralversion=trim($_POST['opcmenulateralversion']); } else { $opcmenulateralversion=''; }
	if(isset($_POST['opcpiedepaginaderechos'])){ $opcpiedepaginaderechos=trim($_POST['opcpiedepaginaderechos']); } else { $opcpiedepaginaderechos=''; }

	if(isset($_POST['opccontenidoextra'])){ $opccontenidoextra=trim($_POST['opccontenidoextra']); } else { $opccontenidoextra=''; }
	if(isset($_POST['opccontenidoextra_enlace'])){ $opccontenidoextra_enlace=trim($_POST['opccontenidoextra_enlace']); } else { $opccontenidoextra_enlace=''; }
	if(isset($_POST['opccontenidoextra_enlace_imagen'])){ $opccontenidoextra_enlace_imagen=trim($_POST['opccontenidoextra_enlace_imagen']); } else { $opccontenidoextra_enlace_imagen=''; }
	if(isset($_POST['opccontenidoextra_contenido'])){ $opccontenidoextra_contenido=trim($_POST['opccontenidoextra_contenido']); } else { $opccontenidoextra_contenido=''; }

	if(isset($_POST['opcmenubotones_cantidad'])){ $opcmenubotones_cantidad=trim($_POST['opcmenubotones_cantidad']); } else { $opcmenubotones_cantidad=1; }

	$opcmenubotones_contenido_contenido = '';
	for($i=1; $i <= $opcmenubotones_cantidad; $i++){
		if(isset($_POST['opcmenubotones_icono_'.$i])){
			$opcmenubotones_contenido_contenido .= '$scrUS_MenuBotones_Icono_['.$i."]='"
				. trim($_POST['opcmenubotones_icono_'.$i]) ."';\n";
		}
		if(isset($_POST['opcmenubotones_texto_'.$i])){
			$opcmenubotones_contenido_contenido .= '$scrUS_MenuBotones_Texto_['.$i."]='"
				. trim($_POST['opcmenubotones_texto_'.$i]) ."';\n";
		}
		if(isset($_POST['opcmenubotones_enlace_'.$i])){
			$opcmenubotones_contenido_contenido .= '$scrUS_MenuBotones_Enlace_['.$i."]='"
				. trim($_POST['opcmenubotones_enlace_'.$i]) ."';\n";
		}
		if(isset($_POST['opcmenubotones_enlace_http_'.$i])){
			$opcmenubotones_contenido_contenido .= '$scrUS_MenuBotones_Enlace_Http_['.$i."]='"
				. trim($_POST['opcmenubotones_enlace_http_'.$i]) ."';\n";
		}
		if(isset($_POST['opcmenubotones_enlace_externo_'.$i])){
			$opcmenubotones_contenido_contenido .= '$scrUS_MenuBotones_Enlace_Externo_['.$i."]='"
				. trim($_POST['opcmenubotones_enlace_externo_'.$i]) ."';\n";
		}
	}


$archiD="<?php #Contenido por el usuario".'
$scrUS_CabezaRedes='."'$opccabezaredes';".'
$scrUS_CabezaTituloWeb='."'$opccabezatituloweb';".'
$scrUS_CabezaTituloWebIcono='."'$opccabezatitulowebicono';".'
$scrUS_CabezaTema='."'$opccabezatema';".'
$scrUS_CabezaRedesFB='."'$opccabezaredesfb';".'
$scrUS_CabezaRedesYT='."'$opccabezaredesyt';".'
$scrUS_CabezaRedesTW='."'$opccabezaredestw';".'
$scrUS_CabezaRedesTK='."'$opccabezaredestk';".'
$scrUS_CabezaRedesPT='."'$opccabezaredespt';".'
$scrUS_CabezaRedesKF='."'$opccabezaredeskf';".'
$scrUS_MenuBotones='."'$opcmenubotones';".'
$scrUS_MenuBotones_Cantidad='."'$opcmenubotones_cantidad';".'
'.$opcmenubotones_contenido_contenido.
'$scrUS_ContenidoExtra='."'$opccontenidoextra';".'
$scrUS_ContenidoExtra_Enlace='."'$opccontenidoextra_enlace';".'
$scrUS_ContenidoExtra_Enlace_Imagen='."'$opccontenidoextra_enlace_imagen';".'
$scrUS_ContenidoExtra_Contenido='."'$opccontenidoextra_contenido';".'
$scrUS_MenuLateralRedes='."'$opcmenulateralredes';".'
$scrUS_MenuLateralRedesTitulo='."'$opcmenulateralredestitulo';".'
$scrUS_MenuLateralRedesFB='."'$opcmenulateralredesfb';".'
$scrUS_MenuLateralRedesYT='."'$opcmenulateralredesyt';".'
$scrUS_MenuLateralRedesTW='."'$opcmenulateralredestw';".'
$scrUS_MenuLateralRedesTK='."'$opcmenulateralredestk';".'
$scrUS_MenuLateralRedesPT='."'$opcmenulateralredespt';".'
$scrUS_MenuLateralRedesKF='."'$opcmenulateralredeskf';".'
$scrUS_MenuLateralNoticias='."'$opcmenulateralnoticias';".'
$scrUS_MenuLateralNoticiasCarpeta='."'$opcmenulateralnoticiascarpeta';".'
$scrUS_MenuLateralRandom='."'$opcmenulateralrandom';".'
$scrUS_MenuLateralExtras='."'$opcmenulateralextras';".'
$scrUS_MenuLateralContadorComentarios='."'$opcmenulateralcontadorcomentarios';".'
$scrUS_MenuLateralContadorComentariosCarpeta='."'$opcmenulateralcontadorcomentarioscarpeta';".'
$scrUS_MenuLateralVisitas='."'$opcmenulateralvisitas';".'
$scrUS_MenuLateralVersion='."'$opcmenulateralversion';".'
$scrUS_PiedePaginaDerechos='."'$opcpiedepaginaderechos';"."
#ACTUALIZADO: $fechahora ~ $vinterna\n?>";
}