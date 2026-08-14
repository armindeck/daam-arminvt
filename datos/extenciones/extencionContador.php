<?php #CONTADOR
if (!file_exists($UbicacionArchivoContador)) {
    file_put_contents($UbicacionArchivoContador, "0");
}

$contador = file_get_contents($UbicacionArchivoContador);
if(!isset($NoAumentarContador)){ $contador++; }

file_put_contents($UbicacionArchivoContador, $contador);
?>