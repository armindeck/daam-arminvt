<?php if($i===1 && $CabezaTituloWeb=='on'): ?>
<a class="tituloWeb t18" href="<?php echo $EnlaceWeb; ?>"><?php echo $NombreWeb; ?> <i class="fas fa-meteor"></i></a>
<?php endif; ?>
<?php if($i===4 && $CabezaRedes=='on'): ?><div class="der">
    <?php if (!empty($_SESSION['id'])){ echo '<a class="boton" href="'.$AC_DIRECTORIO.'perfil'.$AGREGAR_PHP.'">Perfil</a><a class="boton" href="?s=cerrar">Salir</a>'; } ?>
<?php if($CabezaTema=='on'): ?>
    <a href="<?php echo $colores; ?>"><i class="<?php echo $emojiTema; ?>"></i></a>
<?php endif; if($CabezaRedesFB=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceFacebook; ?>"><i class="fab fa-facebook"></i></a>
<?php endif; if($CabezaRedesYT=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceYouTube; ?>"><i class="fab fa-youtube"></i></a>
<?php endif; if($CabezaRedesTW=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceTwitter; ?>"><i class="fab fa-twitter"></i></a>
<?php endif; if($CabezaRedesTK=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceTiktok; ?>"><i class="fab fa-tiktok"></i></a>
<?php endif; if($CabezaRedesPT=='on'): ?>
    <a target="_blank" href="<?php echo $EnlacePatreon; ?>"><i class="fab fa-patreon"></i></a>
<?php endif; if($CabezaRedesKF=='on'): ?>
    <a target="_blank" href="<?php echo $EnlaceKofi; ?>"><i class="fas fa-mug-hot"></i></a>
<?php endif; echo '</div>'; endif; ?>