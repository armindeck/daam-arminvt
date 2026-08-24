<?php

if ($_POST['IniDispladi']){
/*
m = Mostrar
me = Mostrar Elemento
mscr = Mostrar Scripts
cscr = Cargar Scripts
ti = Titulo
con = Contenido
ce = cantidad de elementos
*/
	$vinterna=trim($_POST['vinterna']);
	$dis_cscr=trim($_POST['dis_cscr']);
	if($dis_cscr!=''){ $dis_cscr='true'; } else { $dis_cscr='false'; }
	for ($i=0; $i < 5; $i++) {
		$dis_mscr[$i]=trim($_POST['dis_mscr'.$i]);
		if(!isset($_POST['dis_ce'.$i])){ $dis_ce[$i]=1; }
		if(isset($_POST['dis_ce'.$i])){ $dis_ce[$i]=trim($_POST['dis_ce'.$i]); }
		if(isset($_POST['dis_m'.$i])){ $dis_m[$i]=trim($_POST['dis_m'.$i]); } else { $dis_m[$i]=''; }
		if(isset($_POST['dis_ti_0_'.$i])){ $dis_ti_0_[$i]=trim($_POST['dis_ti_0_'.$i]); } else { $dis_ti_0_[$i]=''; }
		if(isset($_POST['dis_ti_1_'.$i])){ $dis_ti_1_[$i]=trim($_POST['dis_ti_1_'.$i]); } else { $dis_ti_1_[$i]=''; }
		if(isset($_POST['dis_ti_2_'.$i])){ $dis_ti_2_[$i]=trim($_POST['dis_ti_2_'.$i]); } else { $dis_ti_2_[$i]=''; }
		if(isset($_POST['dis_ti_3_'.$i])){ $dis_ti_3_[$i]=trim($_POST['dis_ti_3_'.$i]); } else { $dis_ti_3_[$i]=''; }
		if(isset($_POST['dis_ti_4_'.$i])){ $dis_ti_4_[$i]=trim($_POST['dis_ti_4_'.$i]); } else { $dis_ti_4_[$i]=''; }
		if(isset($_POST['dis_con_0_'.$i])){ $dis_con_0_[$i]=trim($_POST['dis_con_0_'.$i]); }
		if(isset($_POST['dis_con_1_'.$i])){ $dis_con_1_[$i]=trim($_POST['dis_con_1_'.$i]); }
		if(isset($_POST['dis_con_2_'.$i])){ $dis_con_2_[$i]=trim($_POST['dis_con_2_'.$i]); }
		if(isset($_POST['dis_con_3_'.$i])){ $dis_con_3_[$i]=trim($_POST['dis_con_3_'.$i]); }
		if(isset($_POST['dis_con_4_'.$i])){ $dis_con_4_[$i]=trim($_POST['dis_con_4_'.$i]); }
		if(isset($_POST['dis_me_0_'.$i])){ $dis_me_0_[$i]=trim($_POST['dis_me_0_'.$i]); } else { $dis_me_0_[$i]=''; }
		if(isset($_POST['dis_me_1_'.$i])){ $dis_me_1_[$i]=trim($_POST['dis_me_1_'.$i]); } else { $dis_me_1_[$i]=''; }
		if(isset($_POST['dis_me_2_'.$i])){ $dis_me_2_[$i]=trim($_POST['dis_me_2_'.$i]); } else { $dis_me_2_[$i]=''; }
		if(isset($_POST['dis_me_3_'.$i])){ $dis_me_3_[$i]=trim($_POST['dis_me_3_'.$i]); } else { $dis_me_3_[$i]=''; }
		if(isset($_POST['dis_me_4_'.$i])){ $dis_me_4_[$i]=trim($_POST['dis_me_4_'.$i]); } else { $dis_me_4_[$i]=''; }
	}

    $guardar="<?php #scrDispla\n#0.Cabeza, 1. Menu, 2. Contenido, 3. Menu Lateral, 4. Pie\n#0.Mostrar, 1. Cantidad de Elementos, 2. C. Scripts, 3. Elementos
$"."displadi[0]=['".$dis_m[0]."',".$dis_ce[0].",[
		['".$dis_me_0_[0]."','".$dis_ti_0_[0]."','".$dis_con_0_[0]."'],
		['".$dis_me_0_[1]."','".$dis_ti_0_[1]."','".$dis_con_0_[1]."'],
		['".$dis_me_0_[2]."','".$dis_ti_0_[2]."','".$dis_con_0_[2]."'],
		['".$dis_me_0_[3]."','".$dis_ti_0_[3]."','".$dis_con_0_[3]."']
	]
];
$"."displadi[1]=['".$dis_m[1]."',".$dis_ce[1].",[
		['".$dis_me_1_[0]."','".$dis_ti_1_[0]."','".$dis_con_1_[0]."'],
		['".$dis_me_1_[1]."','".$dis_ti_1_[1]."','".$dis_con_1_[1]."'],
		['".$dis_me_1_[2]."','".$dis_ti_1_[2]."','".$dis_con_1_[2]."'],
		['".$dis_me_1_[3]."','".$dis_ti_1_[3]."','".$dis_con_1_[3]."']
	]
];
$"."displadi[2]=['".$dis_m[2]."',".$dis_ce[2].",[
		['".$dis_me_2_[0]."','".$dis_ti_2_[0]."','".$dis_con_2_[0]."'],
		['".$dis_me_2_[1]."','".$dis_ti_2_[1]."','".$dis_con_2_[1]."'],
		['".$dis_me_2_[2]."','".$dis_ti_2_[2]."','".$dis_con_2_[2]."'],
		['".$dis_me_2_[3]."','".$dis_ti_2_[3]."','".$dis_con_2_[3]."']
	]
];
$"."displadi[3]=['".$dis_m[3]."',".$dis_ce[3].",[
		['".$dis_me_3_[0]."','".$dis_ti_3_[0]."','".$dis_con_3_[0]."'],
		['".$dis_me_3_[1]."','".$dis_ti_3_[1]."','".$dis_con_3_[1]."'],
		['".$dis_me_3_[2]."','".$dis_ti_3_[2]."','".$dis_con_3_[2]."'],
		['".$dis_me_3_[3]."','".$dis_ti_3_[3]."','".$dis_con_3_[3]."']
	]
];
$"."displadi[4]=['".$dis_m[4]."',".$dis_ce[4].",[
		['".$dis_me_4_[0]."','".$dis_ti_4_[0]."','".$dis_con_4_[0]."'],
		['".$dis_me_4_[1]."','".$dis_ti_4_[1]."','".$dis_con_4_[1]."'],
		['".$dis_me_4_[2]."','".$dis_ti_4_[2]."','".$dis_con_4_[2]."'],
		['".$dis_me_4_[3]."','".$dis_ti_4_[3]."','".$dis_con_4_[3]."']
	]
];
$"."carScripts=".$dis_cscr.";
$"."mosScripts=['".$dis_mscr[0]."','".$dis_mscr[1]."','".$dis_mscr[2]."','".$dis_mscr[3]."','".$dis_mscr[4]."']; #MOSTRAR SCRIPTS EN DISPLADI
#Modificado: ".$fechahora.' ~ '.$vinterna."\n?>";
	$scrCUS='../scripts/us/scrCUS.php';
	$scrCUSPOST='../scripts/us/scrDispladiCUS_POST.php';
	$archiD='pepe';
	if(file_exists($scrCUSPOST)){ require $scrCUSPOST; file_put_contents($scrCUS,$archiD); }
    file_put_contents('../scripts/scrDispla.php',$guardar);

    header("location: ../panel.php?ac=displadi&ms=exi&msm=datosactualizados");
    exit;
}

?>