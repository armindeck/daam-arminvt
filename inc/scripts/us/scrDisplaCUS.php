<?php #Se muestra en la displa
if($elem==0): #CABEZA
	if($ii==0){
		if(isset($scrUS_CabezaTituloWeb) && $scrUS_CabezaTituloWeb!=''){
			echo '<a class="tituloWeb t18" href="'.DIR.'">'.(CONFIG["page_name"] ?? "").' <i class="'.(isset($scrUS_CabezaTituloWebIcono) ? $scrUS_CabezaTituloWebIcono : '').'"></i></a>';
		}
	}
	if($ii==1){
		if(isset($scrUS_CabezaRedes) && $scrUS_CabezaRedes!=''){
			echo '<div class="der">';
				if (!empty($_SESSION['id'])){
					echo '<a class="boton" href="'.DIR.'perfil'.PHP_EXTENSION.'">Perfil</a><a class="boton" href="?s=cerrar">Salir</a> ';
				}
				if($scrUS_CabezaTema!=''){ echo '<a href="?theme='.(getTheme() == "dark" ? "light" : "dark").'"><i class="fas fa-'.(getTheme() == "dark" ? "sun" : "moon").'"></i></a> '; }
				if($scrUS_CabezaRedesFB!=''){ echo '<a target="_blank" href=""><i class="fab fa-facebook"></i></a> '; }
				if($scrUS_CabezaRedesYT!=''){ echo '<a target="_blank" href=""><i class="fab fa-youtube"></i></a> '; }
				if($scrUS_CabezaRedesTW!=''){ echo '<a target="_blank" href=""><i class="fab fa-twitter"></i></a> '; }
				if($scrUS_CabezaRedesTK!=''){ echo '<a target="_blank" href=""><i class="fab fa-tiktok"></i></a> '; }
				if($scrUS_CabezaRedesPT!=''){ echo '<a target="_blank" href=""><i class="fab fa-patreon"></i></a> '; }
				if($scrUS_CabezaRedesKF!=''){ echo '<a target="_blank" href=""><i class="fas fa-mug-hot"></i></a>'; }
			echo '</div>';
		}
	}
endif;
if($elem==1): #MENU
	if($ii==0){
		if(isset($scrUS_MenuBotones) && $scrUS_MenuBotones!=''){
			if(isset($scrUS_MenuBotones_Cantidad)){
				for($i=1; $i <= $scrUS_MenuBotones_Cantidad; $i++){ ?>
					<a href="<?php
						if(isset($scrUS_MenuBotones_Enlace_[$i])){
							if(isset($scrUS_MenuBotones_Enlace_Http_[$i]) && $scrUS_MenuBotones_Enlace_Http_[$i] != ''){
								echo $scrUS_MenuBotones_Enlace_[$i];
							} else {
								echo DIR.$scrUS_MenuBotones_Enlace_[$i].
								($scrUS_MenuBotones_Enlace_[$i]!='' ? PHP_EXTENSION : '');
							}
						}
					?>"<?php echo isset($scrUS_MenuBotones_Enlace_Externo_[$i]) && $scrUS_MenuBotones_Enlace_Externo_[$i] != '' ? ' target="_blank"' : ''; ?>><i class="<?php echo isset($scrUS_MenuBotones_Icono_[$i]) ? $scrUS_MenuBotones_Icono_[$i] : ''; ?>"></i> <?php echo isset($scrUS_MenuBotones_Texto_[$i]) ? $scrUS_MenuBotones_Texto_[$i] : ''; ?></a>
				<?php }
			}
		}
	}
endif;

if($elem==3): #MENU LATERAL
	if($ii==0){
		if(isset($scrUS_MenuLateralRedes) && $scrUS_MenuLateralRedes!=''){
			echo '<hr><p class="t14">'.$scrUS_MenuLateralRedesTitulo.'</p><hr>';
			if($scrUS_MenuLateralRedesFB!=''){ echo '<a target="_blank" href=""><i class="fab fa-facebook iredes"></i></a>'; }
			if($scrUS_MenuLateralRedesYT!=''){ echo '<a target="_blank" href=""><i class="fab fa-youtube iredes"></i></a>'; }
			if($scrUS_MenuLateralRedesTW!=''){ echo '<a target="_blank" href=""><i class="fab fa-twitter iredes"></i></a>'; }
			if($scrUS_MenuLateralRedesTK!=''){ echo '<a target="_blank" href=""><i class="fab fa-tiktok iredes"></i></a>'; }
			if($scrUS_MenuLateralRedesPT!=''){ echo '<a target="_blank" href=""><i class="fab fa-patreon iredes"></i></a>'; }
			if($scrUS_MenuLateralRedesKF!=''){ echo '<hr><a target="_blank" class="t14 boton" href="">Invitame un Cafe <i class="fas fa-mug-hot"></i></a>'; }
		}
	}
	if($ii==1){
		if(isset($scrUS_MenuLateralNoticias) && $scrUS_MenuLateralNoticias!=''){
			echo '<div class="noticias" style="height: 300px; overflow: auto;">';
			$AC_UBICACION=''; $AC_ARCHIVO=isset($scrUS_MenuLateralNoticiasCarpeta) ? $scrUS_MenuLateralNoticiasCarpeta : ''; $MLADO=true; $ActivoNoticias=true; $TIPO='blog';  $AccesoCargar=true;
			require DIR.'form/iobi/cargar.php';
			echo '</div>';
		}
	}
	if($ii==2){
		if(isset($scrUS_MenuLateralRandom) && $scrUS_MenuLateralRandom!=''){
			echo '<p class="t12">';
			$random=rand(1,6);
			switch ($random){
				case 1: $mostrarFrase='Soy una persona amable que le gusta ser Vtuber y crear paginas web de distintos temas, como las store de app y juegos, además me gusta crear foros como forolink y las demás paginas que e creado a lo largo de mis días estudiando y aprendiendo HTML, CSS y PHP.'; $link=DIR; break;
				case 2: $mostrarFrase='Sitio web donde puede divertirte comentando en los forolink, viendo videos, publicaciones, descargando juegos, aplicaciones y muchas cosas más.'; $link=DIR; break;
				case 3: $mostrarFrase='Las reglas mantienen el equilibrio de los forolink y brindan una mejor comunidad para el entretenimiento y la diversión de los usuarios en la plataforma.'; $link=DIR.'reglas'.PHP_EXTENSION; break;
				case 4: $mostrarFrase='Muchas veces cometemos errores en la vida, pero seguimos a delante y mejoramos nuestro punto de vista de las cosas, es por eso que es mejor avanzar y no quedarnos en el pasado, sigue a delante mi estimado.'; $link=DIR.'error'.PHP_EXTENSION; break;
				case 5: $mostrarFrase='ForoLink es un apartado donde se pueden compartir enlaces de forma anonima, comparte tus enlaces sin tener que registrarte, solo publica lo que quieras y cuando quieras!'; $link=DIR.'forolink'.PHP_EXTENSION; break;
				case 6: $mostrarFrase='Vuber, desarrollador y diseñador independiente y dueño del canal de youtube Tobix64'; $link=DIR.'acerca'.PHP_EXTENSION; break;
			}
			echo '<a target="_blank" href="'.$link.'">'.$mostrarFrase.'</a></p>';
		}
	}
	if($ii==3){
		if(isset($scrUS_MenuLateralExtras) && $scrUS_MenuLateralExtras!=''){
			if(isset($scrUS_MenuLateralContadorComentarios) && $scrUS_MenuLateralContadorComentarios != ''){
	    		$estados=DIR.'form/data/'.$scrUS_MenuLateralContadorComentariosCarpeta.'/estados/';
	    		echo '<p class="t12" title="Comentarios"><i class="fas fa-circle t12 azul"></i> ';
	    		if(file_exists($estados)){
	    			$estados_todos=file_get_contents($estados.'todos.txt');
	    			echo $estados_todos.' total';
	    		}
	    		echo '</p><hr>';
	    	}
	    	if(isset($scrUS_MenuLateralVisitas) && $scrUS_MenuLateralVisitas!=''){
	    		echo '<p class="t12"><i class="fas fa-eye deri t12"></i> '. (VISITS["total"] ?? 0) .'</p><hr>';
	    	}
	    	if(isset($scrUS_MenuLateralVersion) && $scrUS_MenuLateralVersion!=''){
	    		echo '<p class="t12"><i class="fas fa-fire deri t12"></i> '.CORE['core_version'].' '.CORE['core_state'].'</p>';
	    	}
	    }
	}
endif;
if($elem==4): #PIE DE PAGINA
	if($ii==0){
		if(isset($scrUS_PiedePaginaDerechos) && $scrUS_PiedePaginaDerechos!=''){
			echo '<span class="t12">Powered by <a target="_blank" href="' . (CORE["core_creator_link"] ?? "") . '">' . (CORE["core_creator_name"] ?? "") . '</a>: <a target="_blank" href="' . (CORE["core_link"] ?? "") . '">' . (CORE["core_name"] ?? "") . '</a> v' . (CORE["core_version"] ?? "") . '-' . (CORE["core_state"] ?? "") . '.</span>';
		}
	}
endif; ?>