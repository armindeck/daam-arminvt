<?php
#ACTUALIZAR ANUNCIOS ----------------------->
if ($_POST['IniAnuncio']){
    $sms=$_POST['mensaje'];
    $enlace=$_POST['enlace'];
    $enlaceanuncio=$_POST['anuncio'];
    $enlaceanuncio2=$_POST['anuncio2'];
    $linkimga=$_POST['imga'];
    $linkimga2=$_POST['imga2'];
    $texMensaje=$_POST['texMensaje'];
    $mosAnuncio=$_POST['mosAnuncio'];
    $mosAnuncio2=$_POST['mosAnuncio2'];
    file_put_contents('../dependencias/dpanuncio.php',"<?php\n".'$sms='."'$sms';\n".'$link='."'$enlace';\n".'$linkanuncio='."'$enlaceanuncio';\n".'$linkanuncio2='."'$enlaceanuncio2';\n".'$linkimga='."'$linkimga';\n".'$linkimga2='."'$linkimga2';\n".'$texMensaje='."'$texMensaje';\n".'$mosAnuncio='."'$mosAnuncio';\n".'$mosAnuncio2='."'$mosAnuncio2';\n?>");
    header("location: ../panel.php?ac=anuncios&ms=exi&msm=datosactualizados");
}
?>