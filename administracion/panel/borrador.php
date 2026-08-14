<?php #BASE CREADA POR ARMIN
$AC_DIRECTORIO='../../';
if (!empty($_POST) || !empty($_GET)){
    if (isset($_POST['publicar'])) {
        $opc1=$_POST['opc1']; #Meta descripción
        $opc2=$_POST['opc2']; #Catalogo
        $opc3=$_POST['opc3']; #Meta etiqueta
        $opc4=$_POST['opc4']; #Imagen
        $opc5=$_POST['opc5']; #Titulo
        $opc6=$_POST['opc6']; #Descripción breve
        $opc7=$_POST['opc7']; #Contenido
        $opc8=$_POST['opc8']; #Anuncio
        $opc9=$_POST['opc9']; #Tipo
        $opc10=$_POST['opc10']; #Directorio
        $opc11=$_POST['opc11']; #Ubicacion : <Entradas>
        $opc12=$_POST['opc12']; #Archivo
    }
    
    if (isset($_GET['borradores']) && isset($_GET['opcBorrador'])) {
        $num=$_GET['opcBorrador'];
        $borradorE=false;
        $eliminar=true;
        if (!file_exists('borradores')) {
            $ex='IniCrearCarpeta';
            $acceso=true;
            require_once 'actualizar_acc.php';
        } else {
            $arc="borradores/$num.php";
            if (file_exists($arc)) {
                require_once $arc;
                $borradorE=true;
            } else {
                header("Location: panel.php?ac=creador&ms=err&msm=noexisarchivo");
            }
        }
    }

    if ($opc8=='si' or $opc8==true) {
        $anuncioS=true;
    }
    if ($opc8=='no' or $opc8==false) {
        $anuncioS=false;
    }
    if ($opc9!='normal'){
        $AC_CARPETA=$opc10;
        $TIPO=$opc9;
    }

    #CONTENIDO POR ARMIN
    require_once $AC_DIRECTORIO.'datos/datos.php';
    $AC_METADESCRIPCION=$opc1;
    $AC_METADESCRIPCION2=$opc1;
    $AC_METAETIQUETA=$opc3;
    $AC_IMG=$opc4.'.png';
    $AC_EXTRA=$anuncioS;
    $AC_TITULO=$opc5;
    $AC_CONTENIDO=$opc7;
    $informacion="Directorio: <b>$opc10</b> | Ubicación: <b>$opc11</b> | Archivo: <b>$opc12</b> | Tipo: <b>$opc9</b> | Anuncio: <b>$opc8</b> | Imagen: <b>$opc4</b> | Catalogo: <b>$opc2</b>";
    $datos_introducidos="&opc1=$opc1&opc2=$opc2&opc3=$opc3&opc4=$opc4&opc5=$opc5&opc6=$opc6&opc8=$opc8&opc9=$opc9&opc10=$opc10&opc11=$opc11&opc12=$opc12";
    $ubiBorrador='borrador';
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<header>
	<a class="boton2">Borrador</a>
	<div class="der">
        <div class="flexRow">
        <a class="boton" href="panel.php?ac=creador">Cancelar</a>
        <?php if (isset($_GET['opcBorrador'])) {  ?>
            <form action="crear_acc.php?eli=<?php echo $_GET['opcBorrador']; ?>" method="post">
                <input type="submit" name="eliminar" class="boton2" value="Eliminar">
            </form>
        <?php } ?>
		<form action="panel.php?ac=creador&di=true<?php if (isset($_GET['opcBorrador'])) { echo '&opcBorrador='.$_GET['opcBorrador']; } echo htmlspecialchars($datos_introducidos); ?>" method="post">
            <input class="oculto" type="text" name="opc7" value="<?php echo htmlspecialchars($opc7); ?>">
            <input class="boton" type="submit" value="Editar">
        </form>
        <form action="crear_acc.php?di=true<?php if (isset($_GET['opcBorrador'])) { echo '&opcBorrador='.$_GET['opcBorrador']; } echo htmlspecialchars($datos_introducidos); ?>&ms=exi&msm=datosactualizados" method="post">
            <input class="oculto" type="text" name="opc7" value="<?php echo htmlspecialchars($opc7); ?>">
            <input type="submit" name="guardar" class="boton" value="Guardar">
        </form>
        <?php if (!isset($publicar)) { ?>
            <form action="crear_acc.php?<?php if (isset($_GET['opcBorrador'])) { echo 'opcBorrador='.$_GET['opcBorrador']; } ?>" method="post">
    			<input type="submit" name="publicar" class="boton2" value="Publicar">
    		</form>
        <?php } ?>
        </div>
	</div>
</header><hr>
<ol>
	<li><?php if (isset($ubiCrearCC)) { echo $ubiCrearCC.' > '; } if (isset($ubiBorrador)) { echo $ubiBorrador; } echo ' || '.$informacion; ?></li>
</ol>
<?php require_once $AC_DIRECTORIO.'datos/displa.php'; ?>
</body>
</html>
<?php
    exit;
} else { $AC_DIREC='../../'; $AC_ENCONTRAR='creador/'; require_once $AC_DIREC.'error.php'; } ?>