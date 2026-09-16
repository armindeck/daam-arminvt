<?php

if(!isset($_POST["proccess"]) || $_POST["proccess"] != "upload-image") return;

$file = "image";
$file_name = $_FILES[$file]['name'] ?? "";
$file_size = $_FILES[$file]['size'] ?? "";
$file_type = $_FILES[$file]['type'] ?? "";
$file_error = $_FILES[$file]['error'] ?? 1;
$file_tmp = $_FILES[$file]['tmp_name'] ?? "";

if (!isset($_FILES[$file]) || $file_error === UPLOAD_ERR_NO_FILE || $file_error > 0) {
  setAlert("error", "Error al subir la imagen");
  redirect(DIR."admin".PHP_EXTENSION."?sc=upload-image");
}

if (!in_array($file_type, ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'])) {
  setAlert("error", "El formato de la imagen no es soportado");
  redirect(DIR."admin".PHP_EXTENSION."?sc=upload-image");
}

$peso_maximo_megas = 2; // #mb ~ 1mb
$peso_maximo_total = 1048576 * $peso_maximo_megas;

if ($file_size > $peso_maximo_total) {
  setAlert("error", "La imagen tiene que tener un peso menor o igual a {$peso_maximo_megas}mb");
  redirect(DIR."admin".PHP_EXTENSION."?sc=upload-image");
}

$path_images = DIR . "assets/img/";
$path_extension = pathinfo($file_name, PATHINFO_EXTENSION);

$_POST['image_name'] = secureStringFile($_POST['image_name'] ?? "");
$new_name = !empty($_POST['image_name']) ? $_POST['image_name'] : secureStringFile($file_name);

$explode = explode(".", $new_name);
$extension = count($explode) > 1 ? $explode[count($explode)-1] : $path_extension;
$strlen = strlen($new_name);
$not_extencion = count($explode) > 1 ? substr($new_name, 0, ($strlen - strlen($extension) - 1)) : $new_name;
$name_end = $not_extencion . '.' . $path_extension;

$number = 0;
while(file_exists($path_images.$name_end)){
  $number++;
  $name_end = $not_extencion . '-' . $number .'.'. $path_extension;
}

$path_image_uploaded = $path_images.$name_end;

if(move_uploaded_file($file_tmp, $path_image_uploaded)){
  setAlert("success", "Se subio la imagen: <a target=\"_blank\" href=\"$path_image_uploaded\">Mostrar <i class=\"fas fa-external-link-alt\"></i></a>");
  redirect(DIR."admin".PHP_EXTENSION."?sc=upload-image");
}

setAlert("error", "Error al subir la imagen");
redirect(DIR."admin".PHP_EXTENSION."?sc=upload-image");