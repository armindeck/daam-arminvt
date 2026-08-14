<?php if(isset($TIPO)){ if($TIPO='panel'){ ?>
	<?php
		if(isset($_GET['dc']) && $_GET['dc'] == 'creados'){
			echo '<p class="texini bgazul t14">Los directorios: ';
			if(isset($_GET['ca1'])) echo '<b>'.$_GET['ca1'].'</b>, ';
			if(isset($_GET['ca2'])) echo '<b>'.$_GET['ca2'].'</b>, ';
			if(isset($_GET['ca3'])) echo '<b>'.$_GET['ca3'].'</b>';
			if(isset($_GET['ca4'])) echo '<b>'.$_GET['ca4'].'</b>';
			if(isset($_GET['ca5'])) echo '<b>'.$_GET['ca5'].'</b>';
			if(isset($_GET['ca6'])) echo '<b>'.$_GET['ca6'].'</b>';
			if(isset($_GET['ca7'])) echo '<b>'.$_GET['ca7'].'</b>';
			echo ' fueron creadas.</p>';
		} else if(isset($_GET['dc']) && $_GET['dc'] == 'bien'){
			echo '<p class="texini bgverde">Todos los directorios se encuentran bien.</p>';
		}
	?>
<p class="texini">Verificar si todos los directorios se encuentran.</p>
    <div class="flexCon">
        <form class="formulario" action="actualizar.php" method="post">
            <p class="t14">Se verificara si los directorios existen, de lo contrario se crearan.</p><hr>
            <input type="submit" name="IniVerificar" value="Verificar &#xf002">
            <span class="t14">v0.3 Beta</span>
        </form>
    </div>
</div>

<?php } } else { $AC_DIREC='../../'; $AC_ENCONTRAR=''; include $AC_DIREC.'error.php'; } ?>