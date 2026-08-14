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
    <?php $AC_UBICACION=''; $AC_CARPETA='blog/'; $MLADO=true; $ActivoNoticias=true;
    require $AC_DIRECTORIO.'datos/foros/cargar.php'; ?>
    </div>
<?php endif; ?>
<?php if($i===3 && $MenuLateralFrases=='on'): ?>
    <p class="t12"><?php $ex='CargarFrases'; require $AC_DIRECTORIO.'datos/extenciones.php'; ?></p>
<?php endif; ?>
<?php if($i===4 && $MenuLateralForolink=='on'): ?>
    <?php $estados=$AC_DIRECTORIO.'forolink/datos/estados/'; ?>
    <p class="t12" title="Todos las publicaciones"><i class="fas fa-circle t12 azul"></i> <?php require $estados.'todos.txt'; echo ' total'; ?></p><hr>
<?php endif; ?>
<?php if($i===4 && $MenuLateralVisitas=='on'): ?>
    <p class="t12"><i class="fas fa-eye deri t12"></i> <?php $visi=file_get_contents($AC_DIRECTORIO.'visitas.txt'); echo $visi; ?></p><hr>
<?php endif; ?>
<?php if($i===4 && $MenuLateralVersion=='on'): ?>
    <p class="t12"><i class="fas fa-fire deri t12"></i> <?php echo $version; ?></p>
<?php endif; ?>