<?php

if (!isset($_POST["proccess"]) || $_POST["proccess"] != "ads") return;

$file_path = pathDataConfig();
$data = readJson($file_path);
$data["ads"] = [
  "message" => [
    "active" => !empty($_POST["message_active"]),
    "content" => secureString($_POST["message_content"] ?? ""),
    "link" => secureString($_POST["message_link"] ?? ""),
  ],
  "banner" => [
    "active" => !empty($_POST["banner_active"]),
    "image" => secureString($_POST["banner_image"] ?? ""),
    "link" => secureString($_POST["banner_link"] ?? ""),
  ],
  "thumbnail" => [
    "active" => !empty($_POST["thumbnail_active"]),
    "image" => secureString($_POST["thumbnail_image"] ?? ""),
    "link" => secureString($_POST["thumbnail_link"] ?? "")
  ]
];

$result = writeJson($file_path, $data);
setAlert($result ? "success" : "error", $result ? "Datos actualizados" : "Error al actualizar los datos");
redirect(DIR . "admin" . PHP_EXTENSION . "?sc=ads");
