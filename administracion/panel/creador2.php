<?php if(isset($TIPO)){ if($TIPO='panel'){ ?>
<p class="texini">Creemos algo epico!</p>
    <div class="flexCrear">
        <form class="formulario" action="crear.php" method="post">
            <p class="t14">Basado en AC_CONTENIDO</p><hr>
            <input type="text" name="opc1" placeholder="Meta descripción" minlength="4" required>
            <input type="text" name="opc2" placeholder="Meta descripción*2" minlength="4" required>
            <input type="text" name="opc3" placeholder="Meta etiqueta" minlength="4" required>
            <input type="text" name="opc4" placeholder="Imagen" minlength="4" required>
            <input type="text" name="opc5" placeholder="Titulo" minlength="4" required>
            <input type="text" name="opc6" placeholder="Descripción breve" minlength="4" required>
            <textarea class="texeditor2" name="opc7" placeholder="Contenido" minlength="4" required></textarea>
            <span>Extra</span> <select name="opc8">
                <option value="true">Si</option>
                <option value="false">No</option>
            </select>
            <span>Foro</span> <select name="opc11">
                <option value="no">No</option>
                <option value="si">Si</option>
            </select>
            <select name="opc9">
                <option value="./">./</option>
                <option value="../">../</option>
                <option value="../../">../../</option>
            </select><br>
            <input type="text" name="opc10" placeholder="Nombre del archivo" minlength="4" required>
            <input type="submit" value="Publicar &#xf044">
        </form>
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
                <li>Disfruta de la versión 0.1 Beta mejorada!</li>
            </ol>
        </div>
    </div>
<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>