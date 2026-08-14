<?php if(isset($TIPO) && $TIPO=='panel'){ #PRINCIPALES ?>
<?php #ENTRADAS
if($c=='css'){
	$final=$c.'/'.$a.'.css';
	if($a=='temafinal'){ $final=$c.'/'.$a.'.php'; }
}

if($c=='datos'){
	$final=$c.'/'.$a.'.php';
	if($a=='datos'){ $final=$AdPa.$a.'.php'; }
}

if($c=='inicio'){
	if($a=='htaccess'){ $final='.'.$a; }
	if($a=='version'){ $final=$a.'.txt'; }
	if($a=='entradas'){ $final=$AdPa.'entradas.php'; }

}
if($c=='Cabeza' || $c=='Menu' || $c=='MenuLateral' || $c=='PiedePagina'){

	$final=$AdPa.'scripts/'.$c.'/'.$a.'.php';
	$final2=$AdPa.'scripts/'.$c.'/';
}

if($c=='iobi'){ $final='form/'.$c.'/'.$a.'.php'; } 

if($c=='data'){ $final='form/data/data#'.$a.'/pubdatos.php'; }


#TERMINA ?>

<?php } else { if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}"); } ?>