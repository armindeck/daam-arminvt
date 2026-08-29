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
				echo !empty($scrUS_CabezaTema) ? '<a href="?theme='.(getTheme() == "dark" ? "light" : "dark").'"><i class="fas fa-'.(getTheme() == "dark" ? "sun" : "moon").'"></i></a> ' : "";
				echo !empty($scrUS_CabezaRedesFB) ? '<a target="_blank" href=""><i class="fab fa-facebook"></i></a> ' : "";
				echo !empty($scrUS_CabezaRedesYT) ? '<a target="_blank" href=""><i class="fab fa-youtube"></i></a> ' : "";
				echo !empty($scrUS_CabezaRedesTW) ? '<a target="_blank" href=""><i class="fab fa-twitter"></i></a> ' : "";
				echo !empty($scrUS_CabezaRedesTK) ? '<a target="_blank" href=""><i class="fab fa-tiktok"></i></a> ' : "";
				echo !empty($scrUS_CabezaRedesPT) ? '<a target="_blank" href=""><i class="fab fa-patreon"></i></a> ' : "";
				echo !empty($scrUS_CabezaRedesKF) ? '<a target="_blank" href=""><i class="fas fa-mug-hot"></i></a>' : "";
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
		if(isset($scrUS_MenuLateralNoticias) && $scrUS_MenuLateralNoticias!=''){
			echo '<div class="noticias" style="height: 270px; overflow: auto;"><iframe frameborder="0" width="100%" style="min-height: 250px; width: 100%;" src="https://dbproject.rf.gd/main_external.php?tema=' . (getTheme(CONFIG["page_theme"] ?? "light")) . '&cantidad=7&background=none&contenido=daamper-actualizaciones&font-size=14px&max-width=100%"></iframe></div>';
		}
	}
	if($ii==2){
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