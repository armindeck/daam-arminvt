<?php

$AC_DIRECTORIO = $AC_DIRECTORIO ?? "../../";
if(!isset($TIPO) || $TIPO != "panel"){
  redirect($AC_DIRECTORIO."error.php?ms=err&msm=accdenegado");
}

?>
<div class="flex flex-evenly">
  <form method="post" action="actualizar.php" style="width: 100%; max-width: 720px;">
    <div class="formulario" style="width: 99%;">
      <div class="p-4 t-strong">
        Anuncios > Mensaje
      </div>
      <div class="flex flex-column gap-2">
        <textarea class="textarea-full" rows="5" name="message_content" placeholder="Mensaje"><?= CONFIG["ads"]["message"]["content"] ?? "" ?></textarea>
        <input type="url" name="message_link" placeholder="Enlace" value="<?= CONFIG["ads"]["message"]["link"] ?? "" ?>">
        <?= viewSelect("message_active", [["" => "No mostrar"], ["1" => "Mostrar"]], CONFIG["ads"]["message"]["active"] ?? "") ?>
      </div>
      <div class="p-4 t-strong">
        Banner
      </div>
      <div class="flex flex-column gap-2">
        <?= viewSelectImg("banner_image", CONFIG["ads"]["banner"]["image"] ?? "") ?>
        <input type="url" name="banner_link" placeholder="Enlace" value="<?= CONFIG["ads"]["banner"]["link"] ?? "" ?>">
        <?= viewSelect("banner_active", [["" => "No mostrar"], ["1" => "Mostrar"]], CONFIG["ads"]["banner"]["active"] ?? "") ?>
      </div>
      <div class="p-4 t-strong">
        Miniatura
      </div>
      <div class="flex flex-column gap-2">
        <?= viewSelectImg("thumbnail_image", CONFIG["ads"]["thumbnail"]["image"] ?? "") ?>
        <input type="url" name="thumbnail_link" placeholder="Enlace" value="<?= CONFIG["ads"]["thumbnail"]["link"] ?? "" ?>">
        <?= viewSelect("thumbnail_active", [["" => "No mostrar"], ["1" => "Mostrar"]], CONFIG["ads"]["thumbnail"]["active"] ?? "") ?>
      </div>
      <hr>
      <div class="flex flex-between p-8">
        <input class="boton2" type="reset" value="Cancelar">
        <input class="boton" type="submit" name="IniAnuncio" value="Actualizar">
      </div>
    </div>
  </form>
</div>