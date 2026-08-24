<?php

if (!isset($_POST['IniAnuncio'])) return;

$file_path = pathData() . "/config.json";
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

$result = writeJson($file_path, $data) ? "datosactualizados" : "datosnoactualizados";
redirect("./panel.php?ac=anuncios&ms=exi&msm=$result");