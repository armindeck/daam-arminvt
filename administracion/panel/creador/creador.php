<?php if(isset($TIPO) && $TIPO=='panel'){ ?>

<?php
define('panel_creador_carpeta', 'creador/');

if (isset($_GET['archiguar'])) {

    echo '<p class="texinimen bgazul">Se guardo en el borrador '.$_GET['archiguar'];

}

if (isset($_POST['IniModificar'])) {

    $ModArchivo=$_POST['archivo'];

    $UbiArchivo=$AC_DIRECTORIO.'datos/contenidos/'.$ModArchivo.'.php';

    if (file_exists($UbiArchivo)) {

        require_once $UbiArchivo;

        $permiExtras=true;

        $PermiEditar=true;    

    } else {

        $permiExtras=false;

        $PermiEditar=false;

        echo '<p class="texinimen bgrojo">El archivo no existe!</p>';

    }

}

if(isset($_GET['di']) && $_GET['di'] == true){

    $exP='exPMetodo'; $exP_Metodo='GET'; require 'extencionesPanel.php';



    if (isset($_GET['ModArchivo'])) {

        $ModArchivo=$_GET['ModArchivo'];

        $UbiArchivo=$AC_DIRECTORIO.'datos/contenidos/'.$ModArchivo.'.php';

    

        if (file_exists($UbiArchivo)) {

            require_once $UbiArchivo;

            $opcModArchivo=$_GET['opcModArchivo'];

            $permiExtras=true;

            $PermiEditar=true;

            switch ($opcModArchivo) {

                case 'complementos': $opcModArchivoB='selected'; break;

                case 'ambos': $opcModArchivoC='selected'; break;

            }

        } else {

            $permiExtras=false;

            $PermiEditar=false;

            echo '<p class="texinimen bgrojo">El archivo no existe!</p>';

        }

        

    }

    

    if (isset($_GET['opcBorrador'])) {
        $permiExtras=true;
    }

}



if (isset($permiExtras) && $permiExtras == true) {

    $exP='exPOpc8'; require_once 'extencionesPanel.php';

    if ($opcXMensaje=='on') {

        $opcXMensajeS='checked';

    }

    if ($opcXAccesoAdmin=='on') {

        $opcXAccesoAdminS='checked';

    }

    if ($opcXGaleria=='on') {

        $opcXGaleriaS='checked';

    }

}



?>

<p class="texini">Creemos algo epico!</p>

    <div class="flexCrear">

        <div>
        <div class="formulario">Herramientas<hr>
            <form action="<?php echo panel_creador_carpeta; ?>borrador.php" method="get">

                <span>Borradores</span>
                <select name="opcBorrador">
                    <option class="optg">Ninguno</option>
                    <?php
                        $g_files_borradores = glob(panel_creador_carpeta.'borradores/*');
                        function g_files_borradores_normalizar($string){
                            $string = str_replace(panel_creador_carpeta.'borradores/', '', $string);
                            $string = str_replace('.php', '', $string);
                            return $string;
                        }
                        foreach ($g_files_borradores as $key => $value) {
                            echo '<option>'.g_files_borradores_normalizar($value).'</option>';
                        }
                    ?>
                </select>

                <input class="oculto" type="text" name="IniCrearCarpeta" value="borradores">

                <input type="submit" name="borradores" value="Mostrar &#xf044">

            </form><hr>
            <form method="post" action="panel.php?ac=creador">
                <input class="oculto" type="text" name="ac" value="creador">
                <label>Modificador</label>
                <select name="archivo">
                <option class="optg">Ninguno</option>
                    <?php
                        $g_files = glob($AC_DIRECTORIO.'datos/contenidos/cn_*');
                        function g_files_normalizar($string){
                            $string = str_replace('../../datos/contenidos/', '', $string);
                            $string = str_replace('.php', '', $string);
                            return $string;
                        }
                        foreach ($g_files as $key => $value) {
                            echo '<option>'.g_files_normalizar($value).'</option>';
                        }
                    ?>
                </select>
                <input name="IniModificar" type="submit" value="Modificar &#xf044">
            </form><hr>
            Extras <a target="_blank" class="boton2" href="<?php echo $AC_DIRECTORIO.'imagenes'.$AGREGAR_PHP; ?>">Imagenes <i class="fas fa-external-link-alt"></i></a>
        </div><hr>
        <form class="formulario" action="<?php echo panel_creador_carpeta; ?>borrador.php<?php if (isset($_GET['opcBorrador'])) { echo '?opcBorrador='.$_GET['opcBorrador']; } ?>" method="post">

            <p class="t14">Basado en AC_CONTENIDO</p><hr>

            <input type="text" value="<?php if(isset($opc1)){ echo $opc1; }; ?>" name="opc1" placeholder="Meta descripción" minlength="4" required>
            <select name="opc2">
                <option class="optg">Catalogo</option>
                <?php $creador_opciones_catalogo = [
                        'Anime',
                        'Episodio',
                        'Pelicula',
                        'Ova',
                        'Estreno',
                        'Completo',
                        'Juego',
                        'Actualizacion',
                        'Video',
                        'Curso',
                        'Proyecto',
                        'Armin',
                        'index',
                        'error'
                    ]; ?>
                <?php
                    foreach ($creador_opciones_catalogo as $key => $value) {
                        echo '<option '.(isset($opc2) ? ($value == $opc2 ? 'selected' : '') : '').'>'.$value.'</option>';
                    }
                ?>
            </select>

            <input type="text" value="<?php if(isset($opc3)){ echo $opc3; }; ?>" name="opc3" placeholder="Meta etiqueta" minlength="4" required>

            <select name="opc4">
                <option class="optg">Miniatura</option>
            <?php
                $g_files_img = glob($AC_DIRECTORIO.'img/*');
                function g_files_img_normalizar($string){
                    $string = str_replace('../../img/', '', $string);
                    return $string;
                }
                foreach ($g_files_img as $key => $value) {
                    echo '<option '.(isset($opc4) ? (g_files_img_normalizar($value) == $opc4 ? 'selected' : '') : '').'>'
                        .g_files_img_normalizar($value).
                    '</option>';
                }
            ?>
            </select>

            <input type="text" value="<?php if(isset($opc5)){ echo $opc5; }; ?>" name="opc5" placeholder="Titulo" minlength="4" required>

            <input type="text" value="<?php if(isset($opc6)){ echo $opc6; }; ?>" name="opc6" placeholder="Descripción breve" minlength="4" required>

            <?php $CreadorScripts=false; if(isset($CreadorScripts) && $CreadorScripts == true): ?><hr>
            <label>Mostrar Scripts <input type="checkbox"> </label><hr>

            <label>Stream</label><br>
            <input type="text" name="" value="" placeholder="Nombre">
            <input type="text" name="" value="" placeholder="Link"><br>
            <label>Stream2</label><br>
            <input type="text" name="" value="" placeholder="Nombre">
            <input type="text" name="" value="" placeholder="Link"><br>
            <label>Stream default</label><br>
            <input type="text" name="" value="" placeholder="Link"><hr>
            <label>Descarga</label><br>
            <input type="text" name="" value="" placeholder="Nombre">
            <input type="text" name="" value="" placeholder="Link"><br>
            <label>Descarga2</label><br>
            <input type="text" name="" value="" placeholder="Nombre">
            <input type="text" name="" value="" placeholder="Link">

            <hr><?php endif; ?>

            <?php if(isset($PermiEditar) && $PermiEditar==true or isset($_GET['opcBorrador'])): ?>

            <p class="texinimen bgrojo">Recuerde: Si usas codigos, copie en editor.</p>

            <?php endif; ?>

            <textarea class="texeditor2" name="opc7" placeholder="Contenido" minlength="4" required><?php if(isset($opc7)){ echo $opc7; }; ?></textarea>

            <?php $paccodigos=false;

            if(isset($PermiEditar) && $PermiEditar==true) { $Cmodi=$AC_DIRECTORIO.'datos/contenidos/'.$ModArchivo.'.php'; $paccodigos=true; }

            if(isset($_GET['opcBorrador'])){ $Cmodi=panel_creador_carpeta.'borradores/'.$_GET['opcBorrador'].'.php'; $paccodigos=true; }

            if($paccodigos==true){

                if(file_exists($Cmodi)){

                    $mos=htmlspecialchars(file_get_contents($Cmodi)); echo '<hr>Codigos: <span class="t12">'.$Cmodi.'</span><hr><textarea>'.$mos.'</textarea>';

                }

            } ?>

            <select name="opc9">
                <option class="optg">Tipo</option>
                <?php $creador_opciones_catalogo = [
                        'normal',
                        'comentarios',
                        'foro',
                        'entradas',
                        'blog'
                    ]; ?>
                <?php
                    foreach ($creador_opciones_catalogo as $key => $value) {
                        echo '<option value="'.$value.'"'.(isset($opc9) ? ($value == $opc9 ? ' selected' : '') : '').'>'.$value.'</option>';
                    }
                ?>
            </select>

            <select name="opc10">
                <option class="optg">Directorio</option>
                <?php $creador_opciones_directorio = [
                    './','../','../../','../../../','../../../../'
                ]; ?>
                <?php
                    foreach ($creador_opciones_directorio as $key => $value) {
                        echo '<option '.(isset($opc10) ? ($value == $opc10 ? 'selected' : '') : '').'>'.$value.'</option>';
                    }
                ?>
            </select><hr>

            <!--Anuncio Check -->
            <input type="checkbox" class="dp-none check-anuncio" id="opc8" name="opc8"<?php
                if(isset($opc8) && $opc8!='no' && $opc8!=''){ echo 'checked'; } ?>>
            <label for="opc8" class="boton-check boton-check-anuncio"><a class="boton">Anuncio</a></label>


            <input type="checkbox" class="dp-none check-mensaje" id="opcXMensaje" name="opcXMensaje"<?php if(isset($opcXMensajeS) && $opcXMensajeS=='checked'){ echo 'checked'; }; ?>>
            <label for="opcXMensaje" class="boton-check boton-check-mensaje"><a class="boton">Mensaje</a></label>

            <input type="checkbox" class="dp-none check-privado" id="opcXAccesoAdmin" name="opcXAccesoAdmin"<?php if(isset($opcXAccesoAdminS) && $opcXAccesoAdminS=='checked'){ echo 'checked'; }; ?>>
            <label for="opcXAccesoAdmin" class="boton-check boton-check-privado"><a class="boton">Privado</a></label>

            <input type="checkbox" class="dp-none check-galeria" id="opcXGaleria" name="opcXGaleria"<?php if(isset($opcXGaleriaS) && $opcXGaleriaS=='checked'){ echo 'checked'; }; ?>>
            <label for="opcXGaleria" class="boton-check boton-check-galeria"><a class="boton">Galeria</a></label>

            <hr>

            <input type="text" value="<?php if(isset($opc11)){ echo $opc11; }; ?>" name="opc11" placeholder="Ubicación <opcional/>" minlength="4">

            <input type="text" value="<?php if(isset($opc12)){ echo $opc12; }; ?>" name="opc12" placeholder="Nombre del archivo" minlength="4" required>

            <?php if (isset($PermiEditar) && $PermiEditar==true) { ?><hr>

                <input type="text" name="ModArchivo" value="<?php echo $ModArchivo; ?>">

                <select name="opcModArchivo">

                <option value="datos">Datos</option>

                <option value="complementos" <?php if(isset($opcModArchivoB)){ echo $opcModArchivoB; }; ?>>Complementos</option>

                <option value="ambos" <?php if(isset($opcModArchivoC)){ echo $opcModArchivoC; }; ?>>Ambos</option>

            </select>

            <?php } ?>

            <hr>

            <input type="submit" name="publicar" value="Mostrar &#xf044">

        </form>

    </div>

        <div class="flexCrearSugerencias">

            <p class="texini">Sugerencias y recomendaciones para una mejor experiencia</p>

            <ol>

                <li>Recuerda que solo esta basado en AC_CONTENIDO, por lo cual estaras limitado.</li>

                <li>Solo tienes que poner la direccion, nombre de la imagen y el archivo.</li>

                <li>La descripción breve es la que se muestra en la entrada de la pagina.</li>

            </ol>

            <p class="texini">Etiquetas recomendadas y de uso cotidiano</p>

            <ol>

                <li>&lt;p class="texini"&gt;Hola!&lt;/p&gt;</li>

                <li>&lt;ol&gt; &lt;li class="t12"&gt;Información&lt;/li&gt; &lt;/ol&gt;</li>

                <li>&lt;div class="flexCon"&gt;<br>&lt;div class="m2"&gt;<br>&lt;a href=""&gt;<br>&lt;p class="ctg"&gt;Catalogo&lt;/p&gt;<br>&lt;div class="imagen"&gt;<br>&lt;img class="img1" src="" loading="lazy" alt=""&gt;<br>&lt;/div&gt;<br>&lt;p class="contexcn t14"&gt;Texto&lt;/p&gt;<br>&lt;/a&gt;<br>&lt;/div&gt;<br>&lt;/div&gt;</li>

                <li>El sistema de creación de paginas se encarga de generar las paginas de una forma más rápida y optimizado con el formulario sin necesidad de tener que crear un archivo y copiar los códigos. Este sistema fue creado por Armin/DBHS</li>

                <li>Creador <?php echo file_get_contents(panel_creador_carpeta.'creador.x'); ?>.</li>

            </ol>

        </div>

    </div>

<?php } else {

    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }

    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");

} ?>