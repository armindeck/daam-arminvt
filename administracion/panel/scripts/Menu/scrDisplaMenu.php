<?php if($i===1 && isset($MenuBotones) && $MenuBotones=="on"): ?>
<a title="<?php echo $NombreWeb; ?>" href="<?php echo $AC_DIRECTORIOs; ?>"><i class="fas fa-inicio"></i> Inicio</a><!-- home -->
<a title="ForoLink: <?php echo $NombreWeb; ?>" href="<?php echo $AC_DIRECTORIOs.'forolink'.$AGREGAR_PHP; ?>"><i class="fas fa-fire"></i> ForoLink</a>
<a title="Blog: <?php echo $NombreWeb; ?>" href="<?php echo $AC_DIRECTORIOs.'blog'.$AGREGAR_PHP; ?>"><i class="fas fa-blog"></i> Blog</a>
<a title="Canal: <?php echo $NombreWeb; ?>" href="<?php echo $EnlaceYouTube; ?>?sub_confirmation=1" target="_blank"><i class="fab fa-youtube"></i> Sígueme</a>
<?php endif; ?>