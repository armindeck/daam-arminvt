<main class="flex flex-evenly flex-1">
	<form method="post" class="form-3" enctype="multipart/form-data">
		<div class="flex flex-column gap-6">
			<h2 class="p-8 t-center">Subir imagen</h2>
			<p>Antes de subir una imagen usa: <a target="_blank" href="https://tinypng.com/" rel="nofollow">TinyPNG</a>, para optimizar la imagen.</p>
			<input type="file" accept=".jpg,.jpeg,.png,.gif" name="image" required>
			<input type="text" name="image_name" placeholder="name.png (opcional)">
			<button class="boton" type="submit" name="proccess" value="upload-image">
				<i class="fas fa-upload"></i> Subir imagen
			</button>
		</div>
	</form>
</main>