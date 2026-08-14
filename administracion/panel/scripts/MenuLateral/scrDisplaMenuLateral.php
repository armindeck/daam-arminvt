<?php #CONTENIDO DE DISPLA Y MODIFICACION POR EL USUARIO ?>
<?php if($i===1 && $MenuLateralRedes=='on'): ?>
    <hr><p class="t14"><?php echo $MenuLateralRedesTitulo; ?></p><hr>
<?php if($MenuLateralRedesFB=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceFacebook; ?>"><i class="fab fa-facebook iredes"></i></a>
<?php endif; if($MenuLateralRedesYT=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceYouTube; ?>"><i class="fab fa-youtube iredes"></i></a>
<?php endif; if($MenuLateralRedesTW=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceTwitter; ?>"><i class="fab fa-twitter iredes"></i></a>
<?php endif; if($MenuLateralRedesTK=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceTiktok; ?>"><i class="fab fa-tiktok iredes"></i></a>
<?php endif; if($MenuLateralRedesPT=='on'): ?>
    <a target="_blank" href="<?php echo $EnlacePatreon; ?>"><i class="fab fa-patreon iredes"></i></a>
<?php endif; if($MenuLateralRedesKF=='on'): ?>
    <hr><a target="_blank" class="t14 boton" href="<?php echo $EnlaceKofi; ?>">Invitame un Cafe <i class="fas fa-mug-hot"></i></a>
<?php endif; endif; ?>
<?php if($i===2 && $MenuLateralNoticias=='on'): ?>
    <div class="noticias" style="height: 300px; overflow: auto;">
    <?php $AC_UBICACION=''; $AC_ARCHIVO='blog'; $MLADO=true; $ActivoNoticias=true;  $AccesoCargar=true;
    require $AC_DIRECTORIO.'form/iobi/cargar.php'; ?>
    </div>
<?php endif; ?>
<?php if($i===3 && $MenuLateralFrases=='on'): ?>
    <p class="t12"><?php
$random=rand(1,6);

	switch ($random){

		case 1: $mostrarFrase='Soy una persona amable que le gusta ser Vtuber y crear paginas web de distintos temas, como las store de app y juegos, además me gusta crear foros como forolink y las demás paginas que e creado a lo largo de mis días estudiando y aprendiendo HTML, CSS y PHP.'; $link=$EnlaceAdmin; break;

		case 2: $mostrarFrase=$NombreWeb.' es un sitio web donde puede divertirte comentando en los forolink, viendo videos, publicaciones, descargando juegos, aplicaciones y muchas cosas más.'; $link=$AC_DIRECTORIOs; break;

		case 3: $mostrarFrase='Las reglas mantienen el equilibrio de los forolink y brindan una mejor comunidad para el entretenimiento y la diversión de los usuarios en la plataforma.'; $link=$AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; break;

		case 4: $mostrarFrase='Muchas veces cometemos errores en la vida, pero seguimos a delante y mejoramos nuestro punto de vista de las cosas, es por eso que es mejor avanzar y no quedarnos en el pasado, sigue a delante mi estimado.'; $link=$AC_DIRECTORIOs.'error'.$AGREGAR_PHP; break;

		case 5: $mostrarFrase='ForoLink es un apartado donde se pueden compartir enlaces de forma anonima, comparte tus enlaces sin tener que registrarte, solo publica lo que quieras y cuando quieras!'; $link=$AC_DIRECTORIOs.'forolink'.$AGREGAR_PHP; break;

		case 6: $mostrarFrase=$EnlaceWebNoHttps.' es la página oficial de '.$NombreAdmin.', vtuber, desarrollador y diseñador independiente y dueño del canal de youtube '.$NombreYouTube; $link=$AC_DIRECTORIOs.'acerca'.$AGREGAR_PHP; break;

	}

	echo '<a target="_blank" href="'.$link.'">'.$mostrarFrase.'</a>';
?></p>
<?php endif; ?>
<?php if($i===4 && $MenuLateralForolink=='on'): ?>
    <?php $estados=$AC_DIRECTORIO.'form/data/data#forolink/estados/'; ?>
    <p class="t12" title="Todos las publicaciones"><i class="fas fa-circle t12 azul"></i> <?php $estados_todos=file_get_contents($estados.'todos.txt'); echo $estados_todos.' total'; ?></p><hr>
<?php endif; ?>
<?php if($i===4 && $MenuLateralVisitas=='on'): ?>
    <p class="t12"><i class="fas fa-eye deri t12"></i> <?php $visi=file_get_contents($AC_DIRECTORIO.'visitas.txt'); echo $visi; ?></p><hr>
<?php endif; ?>
<?php if($i===4 && $MenuLateralVersion=='on'): ?>
    <p class="t12"><i class="fas fa-fire deri t12"></i> <?php echo $version; ?></p>
<?php endif; ?>