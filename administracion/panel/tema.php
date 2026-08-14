<?php if(isset($TIPO) && $TIPO=='panel'){ ?>
<?php
	if (!empty($_POST['veriarchivo'])) {
		if (isset($_POST['opcnombrearchivo']) && $_POST['opcnombrearchivo'] != '') {
			$veri=$_POST['opcnombrearchivo'];
			$veridi=$AC_DIRECTORIO.'css/';
			if (file_exists("$veridi$veri")) {
				require "$veridi$veri";
				echo '<p class="texinimen bgamarillo c48 tb">El archivo se cargo exitosamente!</p>';
				$mov=true;
			} else {
				echo '<p class="texinimen bgrojo">Oh! parece que el archivo no existe!</p>';
			}
		} else {
			echo '<p class="texinimen bgrojo">Oh! no se envio el nombre del archivo!</p>';
		}
	}
	if (!empty($_POST['eliarchivo'])) {
		$veri=$_POST['opcnombrearchivo']; $veridi=$AC_DIRECTORIO.'css/';
		if(file_exists("$veridi$veri")){
			unlink("$veridi$veri");
			echo '<p class="texinimen bgrojo">El archivo se elimino!</p>';
		}
	}
?>
<p class="texini">Configuración avanzada <span class="t12">v0.3.1 Beta</span></p>
<form class="formulario" method="post">
	<input type="text" name="opcnombrearchivo" value="<?php if(isset($opctema_nombre)){ echo $opctema_nombre; } ?>" placeholder="Archivo.php" required>
	<input type="submit" name="veriarchivo" value="Verificar &#xf002">
	<?php if(isset($mov) && $mov==true){ ?> <a class="boton" href="panel.php?ac=tema&temamodificado=true&temamodificadoarc=<?php echo $veri; ?>">Mostrar</a> <a class="boton" href="panel.php?ac=tema&temamodificadono=false">Normal</a> <input class="boton2" type="submit" name="eliarchivo" value="Eliminar"> <?php } ?>
</form>
<form method="post" action="actualizar.php">
	<div class="flexCon">
		<div class="formulario">
			<b>Nombre del archivo</b><hr>
			<input type="text" name="opctema_nombre" placeholder="Nombre del archivo.php" value="<?php if(isset($opctema_nombre)){ echo $opctema_nombre; } ?>"><hr>
			<b>Estilos principales</b><hr>
			<b>Fondo</b><hr>
			BG <input type="text" name="opctema_fondo_fondo" placeholder="Fondo" value="<?php if(isset($opctema_fondo_fondo)){ echo $opctema_fondo_fondo; } ?>"><br>
			CO <input type="text" name="opctema_fondo_color" placeholder="Color" value="<?php if(isset($opctema_fondo_color)){ echo $opctema_fondo_color; } ?>"><hr>
			<b>Cabeza</b><hr>
			BG <input type="text" name="opctema_cabeza_fondo" placeholder="Fondo" value="<?php if(isset($opctema_cabeza_fondo)){ echo $opctema_cabeza_fondo; } ?>"><br>
			CO <input type="text" name="opctema_cabeza_color" placeholder="Color" value="<?php if(isset($opctema_cabeza_color)){ echo $opctema_cabeza_color; } ?>"><hr>
			<b>Menu</b><hr>
			BG <input type="text" name="opctema_menu_fondo" placeholder="Fondo" value="<?php if(isset($opctema_menu_fondo)){ echo $opctema_menu_fondo; } ?>"><br>
			CO <input type="text" name="opctema_menu_color" placeholder="Color" value="<?php if(isset($opctema_menu_color)){ echo $opctema_menu_color; } ?>"><hr>
			<b>Izquierda</b><hr>
			BG <input type="text" name="opctema_izquierda_fondo" placeholder="Fondo" value="<?php if(isset($opctema_izquierda_fondo)){ echo $opctema_izquierda_fondo; } ?>"><br>
			CO <input type="text" name="opctema_izquierda_color" placeholder="Color" value="<?php if(isset($opctema_izquierda_color)){ echo $opctema_izquierda_color; } ?>"><hr>
			<b>Derecha</b><hr>
			BG <input type="text" name="opctema_derecha_fondo" placeholder="Fondo" value="<?php if(isset($opctema_derecha_fondo)){ echo $opctema_derecha_fondo; } ?>"><br>
			CO <input type="text" name="opctema_derecha_color" placeholder="Color" value="<?php if(isset($opctema_derecha_color)){ echo $opctema_derecha_color; } ?>"><hr>
			<b>Pie de Pagina</b><hr>
			BG <input type="text" name="opctema_piedepagina_fondo" placeholder="Fondo" value="<?php if(isset($opctema_piedepagina_fondo)){ echo $opctema_piedepagina_fondo; } ?>"><br>
			CO <input type="text" name="opctema_piedepagina_color" placeholder="Color" value="<?php if(isset($opctema_piedepagina_color)){ echo $opctema_piedepagina_color; } ?>"><hr>
			<b>Barra</b><hr>
			BG <input type="text" name="opctema_barra_fondo" placeholder="Fondo" value="<?php if(isset($opctema_barra_fondo)){ echo $opctema_barra_fondo; } ?>">
		</div>
		<div class="formulario">
			<b>Estilos secundarios</b><hr>
			<b>Marquee</b><hr>
			BG <input type="text" name="opctema_marquee_fondo" placeholder="Fondo" value="<?php if(isset($opctema_marquee_fondo)){ echo $opctema_marquee_fondo; } ?>"><br>
			CO <input type="text" name="opctema_marquee_color" placeholder="Color" value="<?php if(isset($opctema_marquee_color)){ echo $opctema_marquee_color; } ?>"><hr>
			<b>Contenedores</b><hr>
			BG <input type="text" name="opctema_contenedores_fondo" placeholder="Fondo" value="<?php if(isset($opctema_contenedores_fondo)){ echo $opctema_contenedores_fondo; } ?>"><br>
			CO <input type="text" name="opctema_contenedores_color" placeholder="Color" value="<?php if(isset($opctema_contenedores_color)){ echo $opctema_contenedores_color; } ?>"><hr>
			<b>Contenedor M2</b><hr>
			CO <input type="text" name="opctema_contenedorm2_color" placeholder="Color" value="<?php if(isset($opctema_contenedorm2_color)){ echo $opctema_contenedorm2_color; } ?>"><hr>
			<b>Contenedor M2: Hover</b><hr>
			CO <input type="text" name="opctema_contenedorm2_h_color" placeholder="Color" value="<?php if(isset($opctema_contenedorm2_h_color)){ echo $opctema_contenedorm2_h_color; } ?>"><hr>
			<b>Contenedor: Derecha</b><hr>
			BG <input type="text" name="opctema_contenedor_derecha_fondo" placeholder="Fondo" value="<?php if(isset($opctema_contenedor_derecha_fondo)){ echo $opctema_contenedor_derecha_fondo; } ?>"><br>
			CO <input type="text" name="opctema_contenedor_derecha_color" placeholder="Color" value="<?php if(isset($opctema_contenedor_derecha_color)){ echo $opctema_contenedor_derecha_color; } ?>"><hr>
			<b>Catalogo</b><hr>
			BG <input type="text" name="opctema_catalogo_fondo" placeholder="Fondo" value="<?php if(isset($opctema_catalogo_fondo)){ echo $opctema_catalogo_fondo; } ?>"><br>
			CO <input type="text" name="opctema_catalogo_color" placeholder="Color" value="<?php if(isset($opctema_catalogo_color)){ echo $opctema_catalogo_color; } ?>"><hr>
			<b>Enlaces</b><hr>
			BG <input type="text" name="opctema_enlaces_fondo" placeholder="Fondo" value="<?php if(isset($opctema_enlaces_fondo)){ echo $opctema_enlaces_fondo; } ?>"><br>
			CO <input type="text" name="opctema_enlaces_color" placeholder="Color" value="<?php if(isset($opctema_enlaces_color)){ echo $opctema_enlaces_color; } ?>"><hr>
			<b>Enlaces: Hover</b><hr>
			BG <input type="text" name="opctema_enlaces_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_enlaces_h_fondo)){ echo $opctema_enlaces_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_enlaces_h_color" placeholder="Color" value="<?php if(isset($opctema_enlaces_h_color)){ echo $opctema_enlaces_h_color; } ?>"><hr>
			<b>Menu: Enlaces</b><hr>
			BG <input type="text" name="opctema_menu_enlaces_fondo" placeholder="Fondo" value="<?php if(isset($opctema_menu_enlaces_fondo)){ echo $opctema_menu_enlaces_fondo; } ?>"><br>
			CO <input type="text" name="opctema_menu_enlaces_color" placeholder="Color" value="<?php if(isset($opctema_menu_enlaces_color)){ echo $opctema_menu_enlaces_color; } ?>"><hr>
			<b>Menu: Enlace - Hover</b><hr>
			BG <input type="text" name="opctema_menu_enlace_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_menu_enlace_h_fondo)){ echo $opctema_menu_enlace_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_menu_enlace_h_color" placeholder="Color" value="<?php if(isset($opctema_menu_enlace_h_color)){ echo $opctema_menu_enlace_h_color; } ?>"><hr>
			<b>Ubicación</b><hr>
			BG <input type="text" name="opctema_ubicacion_fondo" placeholder="Fondo" value="<?php if(isset($opctema_ubicacion_fondo)){ echo $opctema_ubicacion_fondo; } ?>"><br>
			CO <input type="text" name="opctema_ubicacion_color" placeholder="Color" value="<?php if(isset($opctema_ubicacion_color)){ echo $opctema_ubicacion_color; } ?>"><hr>
			<b>Ubicación: Enlace & Iconos</b><hr>
			BG <input type="text" name="opctema_ubicacion_enlace_iconos_fondo" placeholder="Fondo" value="<?php if(isset($opctema_ubicacion_enlace_iconos_fondo)){ echo $opctema_ubicacion_enlace_iconos_fondo; } ?>"><br>
			CO <input type="text" name="opctema_ubicacion_enlace_iconos_color" placeholder="Color" value="<?php if(isset($opctema_ubicacion_enlace_iconos_color)){ echo $opctema_ubicacion_enlace_iconos_color; } ?>"><hr>
			<b>Ubicación: E & I - Hover</b><hr>
			BG <input type="text" name="opctema_ubicacion_enlace_iconos_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_ubicacion_enlace_iconos_h_fondo)){ echo $opctema_ubicacion_enlace_iconos_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_ubicacion_enlace_iconos_h_color" placeholder="Color" value="<?php if(isset($opctema_ubicacion_enlace_iconos_h_color)){ echo $opctema_ubicacion_enlace_iconos_h_color; } ?>"><hr>
			<b>HR</b><hr>
			BG <input type="text" name="opctema_hr_fondo" placeholder="Fondo" value="<?php if(isset($opctema_hr_fondo)){ echo $opctema_hr_fondo; } ?>"><hr>
			<b>Footer: Enlace & Iconos</b><hr>
			BG <input type="text" name="opctema_footer_enlace_iconos_fondo" placeholder="Fondo" value="<?php if(isset($opctema_footer_enlace_iconos_fondo)){ echo $opctema_footer_enlace_iconos_fondo; } ?>"><br>
			CO <input type="text" name="opctema_footer_enlace_iconos_color" placeholder="Color" value="<?php if(isset($opctema_footer_enlace_iconos_color)){ echo $opctema_footer_enlace_iconos_color; } ?>"><hr>
			<b>Footer: E & I - Hover</b><hr>
			BG <input type="text" name="opctema_footer_enlace_iconos_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_footer_enlace_iconos_h_fondo)){ echo $opctema_footer_enlace_iconos_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_footer_enlace_iconos_h_color" placeholder="Color" value="<?php if(isset($opctema_footer_enlace_iconos_h_color)){ echo $opctema_footer_enlace_iconos_h_color; } ?>"><hr>
			<b>Boton</b><hr>
			BG <input type="text" name="opctema_boton_fondo" placeholder="Fondo" value="<?php if(isset($opctema_boton_fondo)){ echo $opctema_boton_fondo; } ?>"><br>
			CO <input type="text" name="opctema_boton_color" placeholder="Color" value="<?php if(isset($opctema_boton_color)){ echo $opctema_boton_color; } ?>"><hr>
			<b>Boton: Hover</b><hr>
			BG <input type="text" name="opctema_boton_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_boton_h_fondo)){ echo $opctema_boton_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_boton_h_color" placeholder="Color" value="<?php if(isset($opctema_boton_h_color)){ echo $opctema_boton_h_color; } ?>"><hr>
			<b>Boton 2</b><hr>
			BG <input type="text" name="opctema_boton2_fondo" placeholder="Fondo" value="<?php if(isset($opctema_boton2_fondo)){ echo $opctema_boton2_fondo; } ?>"><br>
			CO <input type="text" name="opctema_boton2_color" placeholder="Color" value="<?php if(isset($opctema_boton2_color)){ echo $opctema_boton2_color; } ?>"><hr>
			<b>Boton 2: Hover</b><hr>
			BG <input type="text" name="opctema_boton2_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_boton2_h_fondo)){ echo $opctema_boton2_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_boton2_h_color" placeholder="Color" value="<?php if(isset($opctema_boton2_h_color)){ echo $opctema_boton2_h_color; } ?>"><hr>
			<b>Derecha: Iconos</b><hr>
			BG <input type="text" name="opctema_derecha_iconos_fondo" placeholder="Fondo" value="<?php if(isset($opctema_derecha_iconos_fondo)){ echo $opctema_derecha_iconos_fondo; } ?>"><br>
			CO <input type="text" name="opctema_derecha_iconos_color" placeholder="Color" value="<?php if(isset($opctema_derecha_iconos_color)){ echo $opctema_derecha_iconos_color; } ?>"><hr>
			<b>Derecha: Enlace & Iconos</b><hr>
			BG <input type="text" name="opctema_derecha_enlace_iconos_fondo" placeholder="Fondo" value="<?php if(isset($opctema_derecha_enlace_iconos_fondo)){ echo $opctema_derecha_enlace_iconos_fondo; } ?>"><br>
			CO <input type="text" name="opctema_derecha_enlace_iconos_color" placeholder="Color" value="<?php if(isset($opctema_derecha_enlace_iconos_color)){ echo $opctema_derecha_enlace_iconos_color; } ?>"><hr>
			<b>Derecha: E & I - Hover</b><hr>
			BG <input type="text" name="opctema_derecha_enlace_iconos_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_derecha_enlace_iconos_h_fondo)){ echo $opctema_derecha_enlace_iconos_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_derecha_enlace_iconos_h_color" placeholder="Color" value="<?php if(isset($opctema_derecha_enlace_iconos_h_color)){ echo $opctema_derecha_enlace_iconos_h_color; } ?>">
		</div>
		<div class="formulario">
			<b>Estilos terciarios</b><hr>
			<b>Formulario</b><hr>
			BG <input type="text" name="opctema_formulario_fondo" placeholder="Fondo" value="<?php if(isset($opctema_formulario_fondo)){ echo $opctema_formulario_fondo; } ?>"><br>
			CO <input type="text" name="opctema_formulario_color" placeholder="Color" value="<?php if(isset($opctema_formulario_color)){ echo $opctema_formulario_color; } ?>"><hr>
			<b>Comentario</b><hr>
			BG <input type="text" name="opctema_comentario_fondo" placeholder="Fondo" value="<?php if(isset($opctema_comentario_fondo)){ echo $opctema_comentario_fondo; } ?>"><br>
			CO <input type="text" name="opctema_comentario_color" placeholder="Color" value="<?php if(isset($opctema_comentario_color)){ echo $opctema_comentario_color; } ?>"><hr>
			<b>Comentario: Admin</b><hr>
			BG <input type="text" name="opctema_comentario_admin_fondo" placeholder="Fondo" value="<?php if(isset($opctema_comentario_admin_fondo)){ echo $opctema_comentario_admin_fondo; } ?>"><br>
			CO <input type="text" name="opctema_comentario_admin_color" placeholder="Color" value="<?php if(isset($opctema_comentario_admin_color)){ echo $opctema_comentario_admin_color; } ?>"><hr>
			<b>Comentario: Admin - Hover</b><hr>
			BG <input type="text" name="opctema_comentario_admin_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_comentario_admin_h_fondo)){ echo $opctema_comentario_admin_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_comentario_admin_h_color" placeholder="Color" value="<?php if(isset($opctema_comentario_admin_h_color)){ echo $opctema_comentario_admin_h_color; } ?>"><hr>
			<b>Comentario: ID</b><hr>
			BG <input type="text" name="opctema_comentario_id_fondo" placeholder="Fondo" value="<?php if(isset($opctema_comentario_id_fondo)){ echo $opctema_comentario_id_fondo; } ?>"><br>
			CO <input type="text" name="opctema_comentario_id_color" placeholder="Color" value="<?php if(isset($opctema_comentario_id_color)){ echo $opctema_comentario_id_color; } ?>"><hr>
			<b>Comentario: Enlace</b><hr>
			BG <input type="text" name="opctema_comentario_enlace_fondo" placeholder="Fondo" value="<?php if(isset($opctema_comentario_enlace_fondo)){ echo $opctema_comentario_enlace_fondo; } ?>"><br>
			CO <input type="text" name="opctema_comentario_enlace_color" placeholder="Color" value="<?php if(isset($opctema_comentario_enlace_color)){ echo $opctema_comentario_enlace_color; } ?>"><hr>
			<b>Comentario: E > Reporte</b><hr>
			BG <input type="text" name="opctema_comentario_enlace_reportes_fondo" placeholder="Fondo" value="<?php if(isset($opctema_comentario_enlace_reportes_fondo)){ echo $opctema_comentario_enlace_reportes_fondo; } ?>"><br>
			CO <input type="text" name="opctema_comentario_enlace_reportes_color" placeholder="Color" value="<?php if(isset($opctema_comentario_enlace_reportes_color)){ echo $opctema_comentario_enlace_reportes_color; } ?>"><hr>
			<b>Campo</b><hr>
			BG <input type="text" name="opctema_campo_fondo" placeholder="Fondo" value="<?php if(isset($opctema_campo_fondo)){ echo $opctema_campo_fondo; } ?>"><br>
			CO <input type="text" name="opctema_campo_color" placeholder="Color" value="<?php if(isset($opctema_campo_color)){ echo $opctema_campo_color; } ?>"><hr>
			<b>Select > Option</b><hr>
			BG <input type="text" name="opctema_select_fondo" placeholder="Fondo" value="<?php if(isset($opctema_select_fondo)){ echo $opctema_select_fondo; } ?>"><br>
			CO <input type="text" name="opctema_select_color" placeholder="Color" value="<?php if(isset($opctema_select_color)){ echo $opctema_select_color; } ?>"><hr>
			<b>Verificado</b><hr>
			BG <input type="text" name="opctema_verificado_fondo" placeholder="Fondo" value="<?php if(isset($opctema_verificado_fondo)){ echo $opctema_verificado_fondo; } ?>"><br>
			CO <input type="text" name="opctema_verificado_color" placeholder="Color" value="<?php if(isset($opctema_verificado_color)){ echo $opctema_verificado_color; } ?>"><hr>
			<b>Usuario</b><hr>
			BG <input type="text" name="opctema_usuario_fondo" placeholder="Fondo" value="<?php if(isset($opctema_usuario_fondo)){ echo $opctema_usuario_fondo; } ?>"><br>
			CO <input type="text" name="opctema_usuario_color" placeholder="Color" value="<?php if(isset($opctema_usuario_color)){ echo $opctema_usuario_color; } ?>"><hr>
			<b>Reaccionar</b><hr>
			BG <input type="text" name="opctema_reaccionar_fondo" placeholder="Fondo" value="<?php if(isset($opctema_reaccionar_fondo)){ echo $opctema_reaccionar_fondo; } ?>"><br>
			CO <input type="text" name="opctema_reaccionar_color" placeholder="Color" value="<?php if(isset($opctema_reaccionar_color)){ echo $opctema_reaccionar_color; } ?>"><hr>
			<b>Reaccionar: Hover</b><hr>
			BG <input type="text" name="opctema_reaccionar_h_fondo" placeholder="Fondo" value="<?php if(isset($opctema_reaccionar_h_fondo)){ echo $opctema_reaccionar_h_fondo; } ?>"><br>
			CO <input type="text" name="opctema_reaccionar_h_color" placeholder="Color" value="<?php if(isset($opctema_reaccionar_h_color)){ echo $opctema_reaccionar_h_color; } ?>">
		</div>
		<div class="formulario">
			<b>Estilos: Bordes</b><hr>
			<b>Barra</b><hr>
			BD <input type="text" name="opctema_barra_borde" placeholder="Borde PX" value="<?php if(isset($opctema_barra_borde)){ echo $opctema_barra_borde; } ?>"><hr>
			<b>TituloWeb: Hover</b><hr>
			BD <input type="text" name="opctema_tituloweb_h_borde" placeholder="Borde PX" value="<?php if(isset($opctema_tituloweb_h_borde)){ echo $opctema_tituloweb_h_borde; } ?>"><hr>
			<b>Marquee</b><hr>
			BD <input type="text" name="opctema_marquee_borde" placeholder="Borde PX" value="<?php if(isset($opctema_marquee_borde)){ echo $opctema_marquee_borde; } ?>"><hr>
			<b>Texini</b><hr>
			BD <input type="text" name="opctema_texini_borde" placeholder="Borde PX" value="<?php if(isset($opctema_texini_borde)){ echo $opctema_texini_borde; } ?>"><hr>
			<b>Texinimen</b><hr>
			BD <input type="text" name="opctema_texinimen_borde" placeholder="Borde PX" value="<?php if(isset($opctema_texinimen_borde)){ echo $opctema_texinimen_borde; } ?>"><hr>
			<b>Ubicación: Enlace</b><hr>
			BD <input type="text" name="opctema_ubicacion_enlace_borde" placeholder="Borde PX" value="<?php if(isset($opctema_ubicacion_enlace_borde)){ echo $opctema_ubicacion_enlace_borde; } ?>"><hr>
			<b>Derecha: Contenedor</b><hr>
			BD <input type="text" name="opctema_derecha_contenedor_borde" placeholder="Borde PX" value="<?php if(isset($opctema_derecha_contenedor_borde)){ echo $opctema_derecha_contenedor_borde; } ?>"><hr>
			<b>Imagen</b><hr>
			BD <input type="text" name="opctema_imagen_borde" placeholder="Borde PX" value="<?php if(isset($opctema_imagen_borde)){ echo $opctema_imagen_borde; } ?>"><hr>
			<b>Imagen1</b><hr>
			BD <input type="text" name="opctema_imagen1_borde" placeholder="Borde PX" value="<?php if(isset($opctema_imagen1_borde)){ echo $opctema_imagen1_borde; } ?>"><hr>
			<b>Imagen2</b><hr>
			BD <input type="text" name="opctema_imagen2_borde" placeholder="Borde PX" value="<?php if(isset($opctema_imagen2_borde)){ echo $opctema_imagen2_borde; } ?>"><hr>
			<b>Catalogo</b><hr>
			BD <input type="text" name="opctema_catalogo_borde" placeholder="Borde PX" value="<?php if(isset($opctema_catalogo_borde)){ echo $opctema_catalogo_borde; } ?>"><hr>
			<b>Formulario</b><hr>
			BD <input type="text" name="opctema_formulario_borde" placeholder="Borde PX" value="<?php if(isset($opctema_formulario_borde)){ echo $opctema_formulario_borde; } ?>"><hr>
			<b>Boton</b><hr>
			BD <input type="text" name="opctema_boton_borde" placeholder="Borde PX" value="<?php if(isset($opctema_boton_borde)){ echo $opctema_boton_borde; } ?>"><hr>
			<b>Comentario</b><hr>
			BD <input type="text" name="opctema_comentario_borde" placeholder="Borde PX" value="<?php if(isset($opctema_comentario_borde)){ echo $opctema_comentario_borde; } ?>"><hr>
			<b>Anuncios</b><hr>
			BD <input type="text" name="opctema_anuncios_borde" placeholder="Borde PX" value="<?php if(isset($opctema_anuncios_borde)){ echo $opctema_anuncios_borde; } ?>">
		</div>
	</div>
	<div class="cen">
	    <input class="boton" type="reset" value="Cancelar &#xf00d">
	    <input class="boton" type="submit" name="IniTema" value="Actualizar &#xf044">
    </div>
</form>
<?php } else {
    if(isset($AC_DIRECTORIO)){ $AC_DIRECTORIO=$AC_DIRECTORIO; } else { $AC_DIRECTORIO='../../'; }
    $vamos=$AC_DIRECTORIO."error.php?ms=err&msm=accdenegado"; header("Location: {$vamos}");
} ?>