<?php #BASE CREADA POR ARMIN
$AC_DIRECTORIO='../../';
require_once $AC_DIRECTORIO.'datos/datos.php';
$verificado=false; $verificado2=false;
if (!empty($_POST['IniForo']) || !empty($_POST['IniComentarios']) || !empty($_POST['IniBlog'])){$verificado=true;
    if(isset($_GET['ubi']) && isset($_GET['arc'])){ $verificado2=true;

        $ubi=$_GET['ubi']; $arc=$_GET['arc'];

        $ex='DarFormato'; require $AC_DIRECTORIO.'datos/extenciones.php';
        $AC_ARCHIVO=$arc;
        $AC_UBICACION=$ubi;

        $cdir=darFormatoIobi($ubi).$arc;
        $NUEVA_UBICACION=$AC_DIRECTORIO.'form/data/data#'.$cdir;

            #OBLIGATORIOS PRINCIPALES
        $c_usuario = darFormatoNoSimbolos(trim($_POST['usuario']));
        $c_comentario = darFormato(trim($_POST['comentario']));

            #OBLIGATORIOS FOROS
        if (!empty($_POST['IniForo']) || !empty($_POST['IniBlog'])) {
            $c_enlace = darFormato(trim($_POST['enlace']));
        }

            #OPCIONALES
        $c_imagen = darFormato(trim($_POST['imagen']));
        $c_codigo = darFormato(trim($_POST['codigo']));

        #DIGITOS DE COMPROBACION
        $d_usuario = (strlen($c_usuario) >= 4 && strlen($c_usuario) <= 15);
        $d_comentario = (strlen($c_comentario) >= 10 && strlen($c_comentario) <= 5000);
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
            $crear_carpetas=$NUEVA_UBICACION.'/estados/'; require $llamarcreador;
            $crear_carpetas=$NUEVA_UBICACION.'/reacciones/'; require $llamarcreador;
            $crear_carpetas=$NUEVA_UBICACION.'/clic/'; require $llamarcreador;
            $crear_carpetas=$NUEVA_UBICACION.'/reportes/'; require $llamarcreador;

            #GUARDAR ID Y LLAMAR ID
        	$ex='Contador';
            $UbicacionArchivoContador=$NUEVA_UBICACION.'/estados/todos.txt';
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
            file_put_contents($NUEVA_UBICACION.'/reacciones/l'.$id.'.txt', "0");
            file_put_contents($NUEVA_UBICACION.'/reacciones/d'.$id.'.txt', "0");

            #CARGAR Y GUARDAR CONTENIDO
            $archivo=$NUEVA_UBICACION.'/pubdatos.php';
            $guardar="[\n'id'=>$id,\n'tipo'=>'$tipo',\n'ubicacion'=>'$AC_UBICACION',\n'archivo'=>'$AC_ARCHIVO',\n'rol'=>'$rol',\n'nombre'=>'$c_usuario'$enlace,\n'comentario'=>'$c_comentario'$imagen,\n'fecha'=>'$fechahora'\n]";

            if(!file_exists($archivo)){
                file_put_contents($archivo,"<?php\n".'$'."comentario=[\n".$guardar.'];');
            } else {
                $contenido=file_get_contents($archivo);
                $ultima_posicion=strrpos($contenido,']');
                $contenido=substr($contenido,0,$ultima_posicion);
                file_put_contents($archivo,$contenido.",\n".$guardar.'];');
            }

            $Vamos=$AC_DIRECTORIO.$ubi.$arc.'?ms=exi&msm=publicado';
            header("location: {$Vamos}");
        }
    }
}
if($verificado==false || $verificado2==false) {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
}
?>