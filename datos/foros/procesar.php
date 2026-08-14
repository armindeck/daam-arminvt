<?php #BASE CREADA POR ARMIN
require_once $AC_DIRECTORIO.'datos/datos.php';
if (!empty($_POST['IniForo']) || !empty($_POST['IniComentarios']) || !empty($_POST['IniBlog'])){
$ex='DarFormato';
require $AC_DIRECTORIO.'datos/extenciones.php';

#CONVERTIR TEXTO
    #OBLIGATORIOS PRINCIPALES
$c_usuario = darFormatoNoSimbolos(trim($_POST['usuario']));
$c_comentario = darFormato(trim($_POST['comentario']));

    #OBLIGATORIOS FOROS
if (!empty($_POST['IniForo'])) {
    $c_enlace = darFormato(trim($_POST['enlace']));
}

    #OPCIONALES
$c_imagen = darFormato(trim($_POST['imagen']));
$c_codigo = darFormato(trim($_POST['codigo']));

#DIGITOS DE COMPROBACION
$d_usuario = (strlen($c_usuario) >= 4 && strlen($c_usuario) <= 15);
$d_comentario = (strlen($c_comentario) >= 10 && strlen($c_comentario) <= 1400);
$d_codigo=strlen($c_codigo) == strlen($adminprivado['codigo']);
$d_imagen = strlen($c_imagen) >= 15;

$digitos=$d_usuario+$d_comentario;
$digiFinal=2;

$tipo='comentario';
if (isset($c_enlace)) {
    $d_enlace=strlen($c_enlace) >= 20;
    if ($d_enlace==1) {
        $enlace=",\n'enlace'=>'$c_enlace'";
        if (isset($_POST['IniBlog'])) {
            $tipo='blog';
        } else if (isset($_POST['IniForo'])) {
            $tipo='forolink';
        }
    } else { $enlace=''; }
    $digitos=$digitos+$d_enlace;
    $digiFinal=3;
}

if (!$_POST['imagen']) {
    $imagen='';
} else {
    if ($d_imagen==1) {
        $imagen=",\n'imagen'=>'$c_imagen'";
    } else { $imagen=''; }
}

if($digitos == $digiFinal){
    #CREAR CARPETAS
    $ex='CrearCarpetas';
    $llamarcreador=$AC_DIRECTORIO.'datos/extenciones.php';
    $crear_carpetas=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/estados/'; require $llamarcreador;
    $crear_carpetas=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/reacciones/'; require $llamarcreador;
    $crear_carpetas=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/clic/'; require $llamarcreador;
    $crear_carpetas=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/reportes/'; require $llamarcreador;

    #GUARDAR ID Y LLAMAR ID
	$ex='Contador';
    $UbicacionArchivoContador=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/estados/todos.txt';
	require $AC_DIRECTORIO.'datos/extenciones.php';
    $id=$contador; if($id>9999){$id=9999;}

    $rol='usuario';
    #VERIFICACION DE ADMIN
    if($c_usuario===$adminprivado['usuario']){
        if($d_codigo == 1 && $c_codigo===$adminprivado['codigo']){
            $rol='admin'; $c_usuario=$adminprivado['nombre'];
        } else { $c_usuario='Juanito066'; }
    }

    #GUARDAR REACCIONES
    file_put_contents($AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/reacciones/l'.$id.'.txt', "0");
    file_put_contents($AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/datos/reacciones/d'.$id.'.txt', "0");

    #CARGAR Y GUARDAR CONTENIDO
    $archivo='datos/pubdatos.php';
    $guardar="[\n'id'=>$id,\n'tipo'=>'$tipo',\n'ubicacion'=>'$AC_UBICACION',\n'carpeta'=>'$AC_CARPETA',\n'rol'=>'$rol',\n'nombre'=>'$c_usuario'$enlace,\n'comentario'=>'$c_comentario'$imagen,\n'fecha'=>'$fechahora'\n]";

    if(!file_exists($archivo)){
        file_put_contents($archivo,"<?php\n".'$'."comentario=[\n".$guardar.'];');
    } else {
        $contenido=file_get_contents($archivo);
        $ultima_posicion=strrpos($contenido,']');
        $contenido=substr($contenido,0,$ultima_posicion);
        file_put_contents($archivo,$contenido.",\n".$guardar.'];');
    }

    $Vamos=$AC_DIRECTORIO.$AC_UBICACION.$AC_CARPETA.'/';
    header("location: {$Vamos}");
    exit;
} else { $AC_DIREC='../'; $AC_ENCONTRAR=$AC_UBICACION.$AC_CARPETA.'/'; require $AC_DIREC.'error.php'; }
} else { $AC_DIREC='../'; $AC_ENCONTRAR=$AC_UBICACION.$AC_CARPETA.'/'; require $AC_DIREC.'error.php'; }
?>