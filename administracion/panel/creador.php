<?php if(isset($TIPO)){ if($TIPO='panel'){
if(isset($_GET['di']) && $_GET['di'] == true){
    $opc1=$_GET['opc1'];
    $opc2=$_GET['opc2'];
    $opc3=$_GET['opc3'];
    $opc4=$_GET['opc4'];
    $opc5=$_GET['opc5'];
    $opc6=$_GET['opc6'];
    $opc7=$_POST['opc7'];
    $opc8=$_GET['opc8'];
    $opc9=$_GET['opc9'];
    $opc10=$_GET['opc10'];
    $opc11=$_GET['opc11'];
    $opc12=$_GET['opc12'];
    
    if (isset($_GET['opcBorrador'])) {
        switch ($_GET['opcBorrador']) {
            case 2: $opcBorradorB='selected'; break;
            case 3: $opcBorradorC='selected'; break;
        }
    }
    
    if ($opc8 == 'no') { $opc8N='selected'; }
    switch ($opc9) {
        case 'foro': $opc9Foro='selected'; break;
        case 'entradas': $opc9Entradas='selected'; break;
        case 'blog': $opc9Blog='selected'; break;
    }
    switch ($opc10) {
        case '../': $opc10B='selected'; break;
        case '../../': $opc10C='selected'; break;
    }
}
?>
<p class="texini">Creemos algo epico!</p>
    <div class="flexCrear">
        <div class="formulario">
        <form action="borrador.php<?php if (isset($_GET['opcBorrador'])) { echo '?opcBorrador='.$_GET['opcBorrador']; } ?>" method="post">
            <p class="t14">Basado en AC_CONTENIDO</p><hr>
            <input type="text" value="<?php if(isset($opc1)){ echo $opc1; }; ?>" name="opc1" placeholder="Meta descripción" minlength="4" required>
            <input type="text" value="<?php if(isset($opc2)){ echo $opc2; }; ?>" name="opc2" placeholder="Catalogo" minlength="4" required>
            <input type="text" value="<?php if(isset($opc3)){ echo $opc3; }; ?>" name="opc3" placeholder="Meta etiqueta" minlength="4" required>
            <input type="text" value="<?php if(isset($opc4)){ echo $opc4; }; ?>" name="opc4" placeholder="Imagen" minlength="4" required>
            <input type="text" value="<?php if(isset($opc5)){ echo $opc5; }; ?>" name="opc5" placeholder="Titulo" minlength="4" required>
            <input type="text" value="<?php if(isset($opc6)){ echo $opc6; }; ?>" name="opc6" placeholder="Descripción breve" minlength="4" required>
            <textarea class="texeditor2" name="opc7" placeholder="Contenido" minlength="4" required><?php if(isset($opc7)){ echo $opc7; }; ?></textarea>
            <span>Anuncio</span> <select name="opc8">
                <option value="si">Si</option>
                <option value="no" <?php if(isset($opc8N)){ echo $opc8N; }; ?>>No</option>
            </select>
            <span>Tipo</span> <select name="opc9">
                <option value="normal">Normal</option>
                <option value="foro" <?php if(isset($opc9Foro)){ echo $opc9Foro; }; ?>>Foro</option>
                <option value="entradas" <?php if(isset($opc9Entradas)){ echo $opc9Entradas; }; ?>>Entradas</option>
                <option value="blog" <?php if(isset($opc9Blog)){ echo $opc9Blog; }; ?>>Blog</option>
            </select>
            <select name="opc10">
                <option value="./">./</option>
                <option value="../" <?php if(isset($opc10B)){ echo $opc10B; }; ?>>../</option>
                <option value="../../" <?php if(isset($opc10C)){ echo $opc10C; }; ?>>../../</option>
            </select><br>
            <input type="text" value="<?php if(isset($opc11)){ echo $opc11; }; ?>" name="opc11" placeholder="Ubicación <opcional/>" minlength="4">
            <input type="text" value="<?php if(isset($opc12)){ echo $opc12; }; ?>" name="opc12" placeholder="Nombre del archivo" minlength="4" required><hr>
            <input type="submit" name="publicar" value="Publicar &#xf044">
        </form><hr>
        <form action="borrador.php" method="get">
            <span>Borradores</span>
            <select name="opcBorrador">
                <option value="1">1</option>
                <option value="2" <?php if(isset($opcBorradorB)){ echo $opcBorradorB; }; ?>>2</option>
                <option value="3" <?php if(isset($opcBorradorC)){ echo $opcBorradorC; }; ?>>3</option>
            </select>
            <input class="oculto" type="text" name="IniCrearCarpeta" value="borradores">
            <input type="submit" name="borradores" value="Mostrar &#xf044">
        </form>
    </div>
        <div class="flexCrearSugerencias">
            <p class="texini">Sugerencias y recomendaciones para una mejor experiencia</p>
            <ol>
                <li>Recuerda que solo esta basado en AC_CONTENIDO, por lo cual estaras limitado.</li>
                <li>Solo tienes que poner la direccion y el nombre de la imagen.</li>
                <li>Solo tienes que poner el nombre del archivo.</li>
                <li>La descripción breve es la que se muestra en la entrada de la pagina.</li>
            </ol>
            <p class="texini">Etiquetas recomendadas y de uso cotidiano</p>
            <ol>
                <li>&lt;p class="texini"&gt;Hola!&lt;/p&gt;</li>
                <li>&lt;ol&gt; &lt;li class="t12"&gt;Información&lt;/li&gt; &lt;/ol&gt;</li>
                <li><?php echo $AC_DESCRIPCION_creador; ?></li>
                <li>Disfruta de la versión 0.2 Beta mejorada!</li>
            </ol>
        </div>
    </div>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>