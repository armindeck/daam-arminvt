<?php if(isset($TIPO) && $TIPO=='panel'){ ?>
<p class="texini">Verificar si todos los directorios se encuentran.</p>
    <div class="flexCon">
        <form class="formulario" action="actualizar.php" method="post">
            <p class="t14">Se verificara si los directorios existen, de lo contrario se crearan.</p><hr>
            <input type="submit" name="IniVerificar" value="Verificar &#xf002">
            <span class="t14">v0.3.1 Beta</span>
        </form>
    </div>
</div>
<?php } else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>