<style type="text/css">
	body{
		background: <?php echo $opctema_fondo_fondo; ?>;
		color: <?php echo $opctema_fondo_color; ?>;
	}
	body::-webkit-scrollbar-thumb, textarea::-webkit-scrollbar-thumb, .noticias::-webkit-scrollbar-thumb {
		background: <?php echo $opctema_barra_fondo; ?>;
		border-radius: <?php echo $opctema_barra_borde; ?>;
	}
	header{
		background: <?php echo $opctema_cabeza_fondo; ?>;
		color: <?php echo $opctema_cabeza_color; ?>;
	}
	nav{
		background: <?php echo $opctema_menu_fondo; ?>;
		color: <?php echo $opctema_menu_color; ?>;
	}
	aside{
		background: <?php echo $opctema_izquierda_fondo; ?>;
		color: <?php echo $opctema_izquierda_color; ?>;
	}
	.menu-lateral{
		background: <?php echo $opctema_derecha_fondo; ?>;
		color: <?php echo $opctema_derecha_color; ?>;
	}
	footer{
		background: <?php echo $opctema_piedepagina_fondo; ?>;
		color: <?php echo $opctema_piedepagina_color; ?>;
	}
	
	marquee{
		background: <?php echo $opctema_marquee_fondo; ?>;
		color: <?php echo $opctema_marquee_color; ?>;
		border-radius: <?php echo $opctema_marquee_borde; ?>;
	}
	.texini, li, .contexcn{
		background: <?php echo $opctema_contenedores_fondo; ?>;
		color: <?php echo $opctema_contenedores_color; ?>;
		border-radius: <?php echo $opctema_texini_borde; ?>;
	}
	.texinimen{
		border-radius: <?php echo $opctema_texinimen_borde; ?>;
	}
	.m2 a{
		color: <?php echo $opctema_contenedorm2_color; ?>;
	}
	.m2 a:hover{
		color: <?php echo $opctema_contenedorm2_h_color; ?>;
	}
	.ctg{
		background: <?php echo $opctema_catalogo_fondo; ?>;
		color: <?php echo $opctema_catalogo_color; ?>;
		border-radius: <?php echo $opctema_catalogo_borde; ?>;
	}
	a{
		background: <?php echo $opctema_enlaces_fondo; ?>;
		color: <?php echo $opctema_enlaces_color; ?>;
	}
	a:hover{
		background: <?php echo $opctema_enlaces_h_fondo; ?>;
		color: <?php echo $opctema_enlaces_h_color; ?>;
	}
	nav a{
		background: <?php echo $opctema_menu_enlaces_fondo; ?>;
		color: <?php echo $opctema_menu_enlaces_color; ?>;
	}
	nav a:hover{
		background: <?php echo $opctema_menu_enlaces_h_fondo; ?>;
		color: <?php echo $opctema_menu_enlaces_h_color; ?>;
	}
	.titulo{
		background: <?php echo $opctema_ubicacion_fondo; ?>;
		color: <?php echo $opctema_ubicacion_color; ?>;
		border-radius: <?php echo $opctema_ubicacion_enlace_borde; ?>;
	}
	.titulo a, .titulo a i{
		background: <?php echo $opctema_ubicacion_enlace_iconos_fondo; ?>;
		color: <?php echo $opctema_ubicacion_enlace_iconos_color; ?>;
	}
	.titulo a:hover, .titulo a:hover i:hover{
		background: <?php echo $opctema_ubicacion_enlace_iconos_h_fondo; ?>;
		color: <?php echo $opctema_ubicacion_enlace_iconos_h_color; ?>;
	}
	hr{
		background: <?php echo $opctema_hr_fondo; ?>;
	}
	footer a, footer a i{
		background: <?php echo $opctema_footer_enlace_iconos_fondo; ?>;
		color: <?php echo $opctema_footer_enlace_iconos_color; ?>;
	}
	footer a:hover, footer a:hover i:hover{
		background: <?php echo $opctema_footer_enlace_iconos_h_fondo; ?>;
		color: <?php echo $opctema_footer_enlace_iconos_h_color; ?>;
	}
	.boton, .boton2, .formulario input[type=submit]{
		border-radius: <?php echo $opctema_boton_borde; ?>;
	}
	.boton, .formulario input[type=submit]{
		background: <?php echo $opctema_boton_fondo; ?>;
		color: <?php echo $opctema_boton_color; ?>;
	}
	.boton:hover, .formulario input[type=submit]:hover{
		background: <?php echo $opctema_boton_h_fondo; ?>;
		color: <?php echo $opctema_boton_h_color; ?>;
	}
	.boton2, .boton2 i{
		background: <?php echo $opctema_boton2_fondo; ?>;
		color: <?php echo $opctema_boton2_color; ?>;
	}
	.boton2:hover, .boton2:hover i:hover{
		background: <?php echo $opctema_boton2_h_fondo; ?>;
		color: <?php echo $opctema_boton2_h_color; ?>;
	}
	.bord .t12 svg, .bord .t12 i{
		background: <?php echo $opctema_derecha_iconos_fondo; ?>;
		color: <?php echo $opctema_derecha_iconos_color; ?>;
	}
	.iredes{
		background: <?php echo $opctema_derecha_enlace_iconos_fondo; ?>;
		color: <?php echo $opctema_derecha_enlace_iconos_color; ?>;
	}
	.iredes:hover{
		background: <?php echo $opctema_derecha_enlace_iconos_h_fondo; ?>;
		color: <?php echo $opctema_derecha_enlace_iconos_h_color; ?>;
	}
	.formulario{
		background: <?php echo $opctema_formulario_fondo; ?>;
		color: <?php echo $opctema_formulario_color; ?>;
		border-radius: <?php echo $opctema_formulario_borde; ?>;
	}
	.comentario{
		background: <?php echo $opctema_comentario_fondo; ?>;
		color: <?php echo $opctema_comentario_color; ?>;
		border-radius: <?php echo $opctema_comentario_borde; ?>;
	}
	.comentario .admin{
		background: <?php echo $opctema_comentario_admin_fondo; ?>;
		color: <?php echo $opctema_comentario_admin_color; ?>;
	}
	.comentario .admin:hover{
		background: <?php echo $opctema_comentario_admin_h_fondo; ?>;
		color: <?php echo $opctema_comentario_admin_h_color; ?>;
	}
	.comentario .id{
		background: <?php echo $opctema_comentario_id_fondo; ?>;
		color: <?php echo $opctema_comentario_id_color; ?>;
	}
	.comentario .link{
		background: <?php echo $opctema_comentario_enlace_fondo; ?>;
		color: <?php echo $opctema_comentario_enlace_color; ?>;
	}
	.repor a{
		background: <?php echo $opctema_comentario_enlace_reportes_fondo; ?>;
		color: <?php echo $opctema_comentario_enlace_reportes_color; ?>;
	}
	input[type=text], input[type=number], input[type=email], input[type=url], input[type=password], textarea, select, .campo{
		background: <?php echo $opctema_campo_fondo; ?>;
		color: <?php echo $opctema_campo_color; ?>;
	}
	.cverified{
		background: <?php echo $opctema_verificado_fondo; ?>;
		color: <?php echo $opctema_verificado_color; ?>;
	}
	.cuser{
		background: <?php echo $opctema_usuario_fondo; ?>;
		color: <?php echo $opctema_usuario_color; ?>;
	}
	.reaccion{
		background: <?php echo $opctema_reaccionar_fondo; ?>;
		color: <?php echo $opctema_reaccionar_color; ?>;
	}
	.reaccion:hover{
		background: <?php echo $opctema_reaccionar_h_fondo; ?>;
		color: <?php echo $opctema_reaccionar_h_color; ?>;
	}
	.tituloWeb:hover{
		border-radius: <?php echo $opctema_tituloweb_h_borde; ?>;
	}
	.bord{
		background: <?php echo $opctema_contenedor_derecha_fondo; ?>;
		color: <?php echo $opctema_contenedor_derecha_color; ?>;
		border-radius: <?php echo $opctema_derecha_contenedor_borde; ?>;
	}
	.imagen{
		border-radius: <?php echo $opctema_imagen_borde; ?>;
	}
	.imagen .img1{
		border-radius: <?php echo $opctema_imagen1_borde; ?>;
	}
	.imagen .img2{
		border-radius: <?php echo $opctema_imagen2_borde; ?>;
	}
	.anuncio, .anuncio2{
		border-radius: <?php echo $opctema_anuncios_borde; ?>;
	}
</style>