<?php #BASE CREADA POR ARMIN
$AC_DIRECTORIO='../../';
require_once $AC_DIRECTORIO.'datos/datos.php';
if (!empty($_POST) || !empty($_GET)){
    if (isset($_POST['publicar'])) {
        $exP='exPMetodo'; $exP_Metodo='POST'; require 'extencionesPanel.php'; 
    }
    
    if (isset($_GET['borradores']) && isset($_GET['opcBorrador'])) {
        $num=$_GET['opcBorrador'];
        #$borradorE=false;
        #$eliminar=true;
        
        $arc="borradores/$num.php";
        if (file_exists($arc)) {
            require_once $arc;
            #$borradorE=true;
        } else {
            header("Location: panel.php?ac=creador&ms=err&msm=noexisarchivo");
        }
    }

    $exP='exPOpc8'; require 'extencionesPanel.php';

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
    $AC_EXTRA=$opc8V;
    $AC_TITULO=$opc5;
    $AC_CONTENIDO=$opc7;
    if (!empty($_POST['ModArchivo'])) {
        $ArchivoEditable=$_POST['ModArchivo'];
        $ArchivoOpcEditable=$_POST['opcModArchivo'];
        $SeModifica=true;
    } else if (isset($opcEdi) && isset($opcEdi2)) {
        $ArchivoEditable=$opcEdi;
        $ArchivoOpcEditable=$opcEdi2;
        $SeModifica=true;
    } else { $ArchivoEditable = ''; $ArchivoOpcEditable = ''; $SeModifica=false; }

    if ($SeModifica) {
        $ModArchivo='&ModArchivo='.$ArchivoEditable;
        $opcModArchivo='&opcModArchivo='.$ArchivoOpcEditable;
        $InfoEditable='ArchivoEditable: <b>'.$ArchivoEditable.'</b> | ';
        $InfoOpcEditable='Modifica: <b>'.$ArchivoOpcEditable.'</b> |';
    } else { $InfoEditable=''; $InfoOpcEditable=''; $ModArchivo=$ArchivoEditable; $opcModArchivo=$ArchivoOpcEditable; }

    $informacion="Directorio: <b>$opc10</b> | Ubicación: <b>$opc11</b> | $InfoEditable$InfoOpcEditable Archivo: <b>$opc12</b> | Tipo: <b>$opc9</b> | Anuncio: <b>$opc8V</b> | Imagen: <b>$opc4</b> | Catalogo: <b>$opc2</b> | Emergentes: <b>$opcXMensaje</b> | Privado: <b>$opcXAccesoAdmin</b>  | Galeria: <b>$opcXGaleria</b>";
    $datos_introducidos="&opc1=$opc1&opc2=$opc2&opc3=$opc3&opc4=$opc4&opc5=$opc5&opc6=$opc6&opc8=$opc8V&opc9=$opc9&opc10=$opc10&opc11=$opc11&opc12=$opc12&opcXMensaje=$opcXMensaje&opcXAccesoAdmin=$opcXAccesoAdmin&opcXGaleria=$opcXGaleria".$ModArchivo.$opcModArchivo;
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
        <?php if (isset($_GET['opcBorrador']) || isset($SeModifica)): 
            if (isset($_GET['opcBorrador'])) { $vamosaeli=$_GET['opcBorrador'].'&tipo=borrador'; $DenegarEliBo=true; }
            if (isset($SeModifica) && !isset($DenegarEliBo)) { $vamosaeli=$ArchivoEditable.'&tipo=publicada'; }
        ?>
            <form action="crear_acc.php?eli=<?php echo $vamosaeli; ?>" method="post">
                <input type="submit" name="eliminar" class="boton2" value="Eliminar">
            </form>
        <?php endif; ?>
		<form action="panel.php?ac=creador&di=true<?php if (isset($_GET['opcBorrador'])) { echo '&opcBorrador='.$_GET['opcBorrador']; } echo htmlspecialchars($datos_introducidos); ?>" method="post">
            <input class="oculto" type="text" name="opc7" value="<?php echo htmlspecialchars($opc7); ?>">
            <input class="boton" type="submit" value="Editar">
        </form>
        <?php if (!empty($_POST['publicar'])): ?>
        <form action="crear_acc.php?di=true<?php if (isset($_GET['opcBorrador'])) { echo '&opcBorrador='.$_GET['opcBorrador']; } echo htmlspecialchars($datos_introducidos); ?>&ms=exi&msm=datosactualizados" method="post">
            <input class="oculto" type="text" name="opc7" value="<?php echo htmlspecialchars($opc7); ?>">
            <input type="submit" name="guardar" class="boton" value="Guardar">
        </form>
        <?php endif; ?>
        <?php if (!empty($_GET['borradores'])): ?>
            <form action="crear_acc.php?<?php if (isset($_GET['opcBorrador'])) { echo 'opcBorrador='.$_GET['opcBorrador']; } ?>" method="post">
    			<input type="submit" name="publicar" class="boton2" value="Publicar">
    		</form>
        <?php endif; ?>
        </div>
	</div>
</header><hr>
<p class="texini"><?php if (isset($ubiCrearCC)) { echo $ubiCrearCC.' > '; } if (isset($ubiBorrador)) { echo $ubiBorrador; } echo ' || '.$informacion; ?></p>
<?php require_once $AC_DIRECTORIO.'datos/displa.php'; ?>
</body>
</html>
<?php } else { if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}"); } ?>