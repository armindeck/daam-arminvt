<?php include $AC_DIRECTORIO.'descripciones.php';
$random=rand(1,7);
switch ($random){
    case 1: $mostrarFrase=$AC_DESCRIPCION_armin; $link=$EnlaceAdmin; break;
    case 2: $mostrarFrase=$AC_DESCRIPCION_index; $link=$AC_DIRECTORIOs; break;
    case 3: $mostrarFrase=$AC_DESCRIPCION_reglas; $link=$AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; break;
    case 4: $mostrarFrase=$AC_DESCRIPCION_reportar; $link=$AC_DIRECTORIOs.'reportar'.$AGREGAR_PHP; break;
    case 5: $mostrarFrase=$AC_DESCRIPCION_error; $link=$AC_DIRECTORIOs.'error'.$AGREGAR_PHP; break;
    case 6: $mostrarFrase=$AC_DESCRIPCION_forolink; $link=$AC_DIRECTORIOs.'forolink/'; break;
    case 7: $mostrarFrase=$AC_DESCRIPCION_reportarexito; $link=$AC_DIRECTORIOs.'reportarexito'.$AGREGAR_PHP; break;
}
echo '<a target="_blank" href="'.$link.'">'.$mostrarFrase.'</a>'; ?>