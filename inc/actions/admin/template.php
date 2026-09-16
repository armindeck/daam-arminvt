<?php

if(!isset($_POST["proccess"]) || $_POST["proccess"] != "template") return;

$file_path = pathDataTemplate();
$read = readJson($file_path);

$id = strtolower(str_replace(".json", "", secureString($_POST["template_id"] ?? "")));

$read[$id] = [
    "id" => $id,
    "layout" => $_POST["template_layout"] ?? "",
    "date_created" => $read[$id]["date_created"] ?? dateTime(),
    "date_updated" => dateTime()
];

$result = writeJson($file_path, $read);
setAlert($result ? "success" : "error", $result ? "Datos actualizados" : "Error al actualizar los datos");
redirect(DIR."admin".PHP_EXTENSION."?sc=template");
