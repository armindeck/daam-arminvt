<?php

if (!isset($_POST["proccess"]) || !in_array($_POST["proccess"], ["template", "template-delete"])) return;

$file_path = pathDataTemplate();
$read = readJson($file_path);

$selected_template = strtolower(str_replace(".json", "", secureStringFile($_POST["templates"] ?? "")));
$id = strtolower(str_replace(".json", "", secureStringFile($_POST["template_id"] ?? $selected_template)));

if ($_POST["proccess"] === "template-delete") {
  if (empty($selected_template) || empty($id) || $selected_template !== $id || !isset($read[$id])) {
    setAlert("error", "La plantilla seleccionada no es válida para eliminar.");
    redirect(DIR . "admin" . PHP_EXTENSION . "?sc=template");
    return;
  }

  unset($read[$id]);
  $result = writeJson($file_path, $read);

  if ($result && (CONFIG["page_template"] ?? "") === $id) {
    $config_path = pathDataConfig();
    $config = readJson($config_path);
    $remaining_templates = array_keys($read);
    $config["page_template"] = $remaining_templates[0] ?? "classic";
    writeJson($config_path, $config);
  }

  setAlert($result ? "success" : "error", $result ? "Plantilla eliminada" : "Error al eliminar la plantilla");
  redirect(DIR . "admin" . PHP_EXTENSION . "?sc=template");
  return;
}

$components = [];
for ($i = 0; $i < count($_POST["component_id"] ?? []); $i++) {
  $components[] = [
    "id" => secureString($_POST["component_id"][$i] ?? ""),
    "layout" => $_POST["component_layout"][$i] ?? ""
  ];
}

$read[$id] = [
  "id" => $id,
  "layout" => $_POST["template_layout"] ?? "",
  "components" => $components,
  "date_created" => $read[$id]["date_created"] ?? dateTime(),
  "date_updated" => dateTime()
];

$result = writeJson($file_path, $read);
setAlert($result ? "success" : "error", $result ? "Datos actualizados" : "Error al actualizar los datos");
redirect(DIR . "admin" . PHP_EXTENSION . "?sc=template");
