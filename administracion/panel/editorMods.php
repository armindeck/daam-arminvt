<?php #CONTENIDO POR ARMIN

#TRATAR CON CUIDADO!!!!

#CREADO: 10/05/23


if(isset($TIPO) && $TIPO=='panel'){ #PRINCIPALES ?>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio">Inicio</a>
<a class="boton" href="panel.php?ac=editor&c=css">Css</a>
<a class="boton" href="panel.php?ac=editor&c=datos">Datos</a>
<a class="boton" href="panel.php?ac=editor&c=form">Form</a>
<a class="boton" href="panel.php?ac=editor&c=scripts">Scripts</a>

<hr>
<?php #ENTRADAS EXTENDIBLES ?>

<?php if(isset($c) && $c=='inicio'): ?>

<a class="boton2" href="panel.php?ac=editor&u=inicio&c=inicio&a=htaccess">htaccess</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=donar">Donar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=entradas">Entradas</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=registrar">Registrar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=iniciar">Iniciar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=salir">Salir</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=perfil">Perfil</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=perfil_editar">P. Editar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=perfil_editar_contrasena">P. E. Contraseña</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=perfil_eliminar">P. Eliminar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=perfil_procesar">P. Procesar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=perfil_procesar_contrasena">P. P.Contraseña</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=perfil_procesar_eliminar">P. P. Eliminar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=reportar">Reportar</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=reportarexito">R. Exito</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=version">Versión</a>
<a class="boton" href="panel.php?ac=editor&u=inicio&c=inicio&a=LEEME<?php if(isset($ledb)){ echo $ledb; } ?>">Leeme</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='css'): ?>

<a class="boton" href="panel.php?ac=editor&c=css&a=estilo">Estilo</a>
<a class="boton" href="panel.php?ac=editor&c=css&a=light">Light</a>
<a class="boton" href="panel.php?ac=editor&c=css&a=dark">Dark</a>
<a class="boton" href="panel.php?ac=editor&c=css&a=temafinal">Tema Final</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='datos'): ?>

<a class="boton" href="panel.php?ac=editor&c=datos&a=anuncio">Anuncio</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=datos">Datos</a>
<a class="boton2" href="panel.php?ac=editor&c=datos&a=displa">Displa</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=mensajes">Mensajes</a>
<a class="boton2" href="panel.php?ac=editor&c=datos&a=extenciones">Extenciones</a>
<a class="boton" href="panel.php?ac=editor&c=datos&a=permisos_usuarios">Permisos</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='form' || isset($u) && $u=='form'): ?>

<a class="boton" href="panel.php?ac=editor&u=form&c=data">Data</a>
<a class="boton" href="panel.php?ac=editor&u=form&c=iobi">iobi</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='data' && isset($u) && $u=='form'): ?>

<a class="boton" href="panel.php?ac=editor&u=form&c=data&a=actualizaciones">Actualizaciones</a>
<a class="boton" href="panel.php?ac=editor&u=form&c=data&a=blog">Blog</a>
<a class="boton" href="panel.php?ac=editor&u=form&c=data&a=forolink">ForoLink</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='iobi' && isset($u) && $u=='form'): ?>

<a class="boton" href="panel.php?ac=editor&u=form&c=iobi&a=cargar">Cargar</a>
<a class="boton" href="panel.php?ac=editor&u=form&c=iobi&a=formulario">Formulario</a>
<a class="boton" href="panel.php?ac=editor&u=form&c=iobi&a=procesar">Procesar</a>
<a class="boton" href="panel.php?ac=editor&u=form&c=iobi&a=reacciones">Reacciones</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='scripts' || isset($u) && $u=='scripts'): ?>

<a class="boton" href="panel.php?ac=editor&u=scripts&c=Cabeza">Cabeza</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=Menu">Menu</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=ContenidoExtra">Contenido Extra</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=MenuLateral">Menu Lateral</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=PiedePagina">Pie de Pagina</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='Cabeza' && isset($u) && $u=='scripts'): ?>

<a class="boton" href="panel.php?ac=editor&u=scripts&c=Cabeza&a=scrDisplaCabeza">Displa</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=Cabeza&a=scrDispladiCabeza">Displadi</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=Cabeza&a=scrDispladiCabeza_POST">POST</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='Menu' && isset($u) && $u=='scripts'): ?>

<a class="boton" href="panel.php?ac=editor&u=scripts&c=Menu&a=scrDisplaMenu">Displa</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=Menu&a=scrDispladiMenu">Displadi</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=Menu&a=scrDispladiMenu_POST">POST</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='ContenidoExtra' && isset($u) && $u=='scripts'): ?>

<a class="boton" href="panel.php?ac=editor&u=scripts&c=ContenidoExtra&a=scrDisplaContenidoExtra">Displa</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=ContenidoExtra&a=scrDispladiContenidoExtra">Displadi</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=ContenidoExtra&a=scrDispladiContenidoExtra_POST">POST</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='MenuLateral' && isset($u) && $u=='scripts'): ?>

<a class="boton" href="panel.php?ac=editor&u=scripts&c=MenuLateral&a=scrDisplaMenuLateral">Displa</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=MenuLateral&a=scrDispladiMenuLateral">Displadi</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=MenuLateral&a=scrDispladiMenuLateral_POST">POST</a>

<hr>
<?php endif; ?>

<?php if(isset($c) && $c=='PiedePagina' && isset($u) && $u=='scripts'): ?>

<a class="boton" href="panel.php?ac=editor&u=scripts&c=PiedePagina&a=scrDisplaPiedePagina">Displa</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=PiedePagina&a=scrDispladiPiedePagina">Displadi</a>
<a class="boton" href="panel.php?ac=editor&u=scripts&c=PiedePagina&a=scrDispladiPiedePagina_POST">POST</a>

<hr>
<?php endif; ?>

<?php } else { if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
        $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}"); } ?>