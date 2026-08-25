<?php

if(!isset($_POST["proccess"]) || $_POST["proccess"] != "settings") return;

$file_path = pathDataConfig();
$data_origin = readJson($file_path);

$data = [
  "page_name" => secureString($_POST["page_name"] ?? ""),
  "page_link" => secureString($_POST["page_link"] ?? ""),
  "page_timezone" => secureString($_POST["page_timezone"] ?? ""),
  "page_year" => secureString($_POST["page_year"] ?? ""),
  "page_about" => secureString($_POST["page_about"] ?? ""),
  "page_tags" => secureString($_POST["page_tags"] ?? ""),
  "page_scripts" => trim($_POST["page_scripts"] ?? ""),
  "page_scripts_active" => !empty($_POST["page_scripts_active"] ?? ""),
  "page_ssl_active" => !empty($_POST["page_ssl_active"] ?? ""),
  "page_extension_php_active" => !empty($_POST["page_extension_php_active"] ?? ""),
  "page_debug_active" => !empty($_POST["page_debug_active"] ?? ""),
];

$data = array_merge($data_origin, $data);

$result = writeJson($file_path, $data) ? "datosactualizados" : "datosnoactualizados";
redirect("./admin.php?sc=settings&ms=exi&msm=$result");
