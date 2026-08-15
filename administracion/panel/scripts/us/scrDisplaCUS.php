<?php #Se muestra en la displa

if($elem==0): #CABEZA

	if($ii==0){

		if(isset($scrUS_CabezaTituloWeb) && $scrUS_CabezaTituloWeb!=''){

			echo '<a class="tituloWeb t18" href="'.$AC_DIRECTORIOs.'">'.$NombreWeb.' <i class="fas fa-meteor"></i></a>';

		}

	}

	if($ii==1){

		if(isset($scrUS_CabezaRedes) && $scrUS_CabezaRedes!=''){

			echo '<div class="der">';

				if (!empty($_SESSION['id'])){

					echo '<a class="boton" href="'.$AC_DIRECTORIO.'perfil'.$AGREGAR_PHP.'">Perfil</a><a class="boton" href="?s=cerrar">Salir</a> ';

				}

				if($scrUS_CabezaTema!=''){ echo '<a href="'.$colores.'"><i class="'.$emojiTema.'"></i></a> '; }

				if($scrUS_CabezaRedesFB!=''){ echo '<a target="_blank" href="'.$EnlaceFacebook.'"><i class="fab fa-facebook"></i></a> '; }

				if($scrUS_CabezaRedesYT!=''){ echo '<a target="_blank" href="'.$EnlaceYouTube.'"><i class="fab fa-youtube"></i></a> '; }

				if($scrUS_CabezaRedesTW!=''){ echo '<a target="_blank" href="'.$EnlaceTwitter.'"><i class="fab fa-twitter"></i></a> '; }

				if($scrUS_CabezaRedesTK!=''){ echo '<a target="_blank" href="'.$EnlaceTiktok.'"><i class="fab fa-tiktok"></i></a> '; }

				if($scrUS_CabezaRedesPT!=''){ echo '<a target="_blank" href="'.$EnlacePatreon.'"><i class="fab fa-patreon"></i></a> '; }

				if($scrUS_CabezaRedesKF!=''){ echo '<a target="_blank" href="'.$EnlaceKofi.'"><i class="fas fa-mug-hot"></i></a>'; }

			echo '</div>';

		}

	}

endif;

if($elem==1): #MENU

	if($ii==0){ $s=''; if(isset($_GET['s'])){ $s = $_GET['s']; }

		if(isset($scrUS_MenuBotones) && $scrUS_MenuBotones!=''){

			echo '<div><a title="'.$NombreWeb.'" href="'.$AC_DIRECTORIOs.'"><i class="fas fa-inicio"></i> Inicio</a><!-- home -->

			<a title="ForoLink: '.$NombreWeb.'" href="'.$AC_DIRECTORIOs.'forolink'.$AGREGAR_PHP.'"><i class="fas fa-fire"></i> ForoLink</a>

			<a title="Actualizaciones: '.$NombreWeb.'" href="'.$AC_DIRECTORIOs.'actualizaciones'.$AGREGAR_PHP.'"><i class="fas fa-blog"></i> Actualizaciones</a>

			<a title="Canal: '.$NombreWeb.'" href="'.$EnlaceYouTube.'?sub_confirmation=1" target="_blank"><i class="fab fa-youtube"></i> Sígueme</a></div>

			<form method="get" action="'.$AC_DIRECTORIO.'buscar'.$AGREGAR_PHP.'"><input name="s" type="text" value="'. htmlspecialchars($s) .'" placeholder="Buscar"></form>';

		}

	}

endif;

if($elem==3): #MENU LATERAL

	if($ii==0){

		if(isset($scrUS_MenuLateralRedes) && $scrUS_MenuLateralRedes!=''){

			echo '<hr><p class="t14">'.$scrUS_MenuLateralRedesTitulo.'</p><hr>';

			if($scrUS_MenuLateralRedesFB!=''){ echo '<a target="_blank" href="'.$EnlaceFacebook.'"><i class="fab fa-facebook iredes"></i></a>'; }

			if($scrUS_MenuLateralRedesYT!=''){ echo '<a target="_blank" href="'.$EnlaceYouTube.'"><i class="fab fa-youtube iredes"></i></a>'; }

			if($scrUS_MenuLateralRedesTW!=''){ echo '<a target="_blank" href="'.$EnlaceTwitter.'"><i class="fab fa-twitter iredes"></i></a>'; }

			if($scrUS_MenuLateralRedesTK!=''){ echo '<a target="_blank" href="'.$EnlaceTiktok.'"><i class="fab fa-tiktok iredes"></i></a>'; }

			if($scrUS_MenuLateralRedesPT!=''){ echo '<a target="_blank" href="'.$EnlacePatreon.'"><i class="fab fa-patreon iredes"></i></a>'; }

			if($scrUS_MenuLateralRedesKF!=''){ echo '<hr><a target="_blank" class="t14 boton" href="'.$EnlaceKofi.'">Invitame un Cafe <i class="fas fa-mug-hot"></i></a>'; }

		}

	}

	if($ii==1){

		if(isset($scrUS_MenuLateralNoticias) && $scrUS_MenuLateralNoticias!=''){

			echo '<div class="noticias" style="height: 300px; overflow: auto;">';

			$AC_UBICACION=''; $AC_ARCHIVO='actualizaciones'; $MLADO=true; $ActivoNoticias=true; $TIPO='blog';  $AccesoCargar=true;

			require $AC_DIRECTORIO.'form/iobi/cargar.php';

			echo '</div>';

		}

	}

	if($ii==2){

		if(isset($scrUS_MenuLateralRandom) && $scrUS_MenuLateralRandom!=''){

			echo '<p class="t12">';

			$random=rand(1,6);

			switch ($random){

				case 1: $mostrarFrase='Soy una persona amable que le gusta ser Vtuber y crear paginas web de distintos temas, como las store de app y juegos, además me gusta crear foros como forolink y las demás paginas que e creado a lo largo de mis días estudiando y aprendiendo HTML, CSS y PHP.'; $link=$EnlaceAdmin; break;

				case 2: $mostrarFrase=$NombreWeb.' es un sitio web donde puede divertirte comentando en los forolink, viendo videos, publicaciones, descargando juegos, aplicaciones y muchas cosas más.'; $link=$AC_DIRECTORIOs; break;

				case 3: $mostrarFrase='Las reglas mantienen el equilibrio de los forolink y brindan una mejor comunidad para el entretenimiento y la diversión de los usuarios en la plataforma.'; $link=$AC_DIRECTORIOs.'reglas'.$AGREGAR_PHP; break;

				case 4: $mostrarFrase='Muchas veces cometemos errores en la vida, pero seguimos a delante y mejoramos nuestro punto de vista de las cosas, es por eso que es mejor avanzar y no quedarnos en el pasado, sigue a delante mi estimado.'; $link=$AC_DIRECTORIOs.'error'.$AGREGAR_PHP; break;

				case 5: $mostrarFrase='ForoLink es un apartado donde se pueden compartir enlaces de forma anonima, comparte tus enlaces sin tener que registrarte, solo publica lo que quieras y cuando quieras!'; $link=$AC_DIRECTORIOs.'forolink'.$AGREGAR_PHP; break;

				case 6: $mostrarFrase=$EnlaceWebNoHttps.' es la página oficial de '.$NombreAdmin.', vtuber, desarrollador y diseñador independiente y dueño del canal de youtube '.$NombreYouTube; $link=$AC_DIRECTORIOs.'acerca'.$AGREGAR_PHP; break;

			}

			echo '<a target="_blank" href="'.$link.'">'.$mostrarFrase.'</a></p>';

		}

	}

	if($ii==3){

		if(isset($scrUS_MenuLateralPublicaciones) && $scrUS_MenuLateralPublicaciones!=''){

	    	$estados=$AC_DIRECTORIO.'form/data/forolink/estados/';

	    	echo '<p class="t12" title="Todos las publicaciones"><i class="fas fa-circle t12 azul"></i> ';

	    	if(file_exists($estados)){

	    		$estados_todos=file_get_contents($estados.'todos.txt');

	    		echo $estados_todos.' total';

	    	}

	    	echo '</p><hr>';

	    	if(isset($scrUS_MenuLateralVisitas) && $scrUS_MenuLateralVisitas!=''){

	    		echo '<p class="t12"><i class="fas fa-eye deri t12"></i> ';

	    		$visi=file_get_contents($AC_DIRECTORIO.'visitas.txt');

	    		echo $visi.'</p><hr>';

	    	}

	    	if(isset($scrUS_MenuLateralVersion) && $scrUS_MenuLateralVersion!=''){

	    		echo '<p class="t12"><i class="fas fa-fire deri t12"></i> '.$version.'</p>';

	    	}

	    }

	}

endif;

if($elem==4): #PIE DE PAGINA

	if($ii==0){

		if(isset($scrUS_PiedePaginaDerechos) && $scrUS_PiedePaginaDerechos!=''){

			echo '&copy; '.$Año.' '.$NombreWeb.'<br><span class="t12">Theme '.$version.' by <a target="_blank" href="https://dbproject.rf.gd/">Armin</a></span>';

		}

	}

endif; ?>