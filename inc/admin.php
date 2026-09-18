<?php

$admin["get_sc"] = secureString($_GET['sc'] ?? "");
$admin["sc_in_section"] = in_array($admin['get_sc'], array_map(fn($section) => $section["id"], ADMIN["section"] ?? ""));
$admin["path_file_section_admin"] = __DIR__ . "/views/admin/{$admin['get_sc']}-view.php";
$admin["path_file_section_admin_process"] = __DIR__ . "/actions/admin/{$admin['get_sc']}.php";
$admin["file_exists_section_admin"] = file_exists($admin["path_file_section_admin"]);
$admin["file_exists_section_admin_process"] = file_exists($admin["path_file_section_admin_process"]);
$admin["show_message_admin"] = !empty($admin['get_sc']) && (!$admin["file_exists_section_admin"] || !$admin["sc_in_section"]);
$admin["load_section_admin"] = $admin["sc_in_section"] && $admin["file_exists_section_admin"];
$admin["show_sections"] = !$admin["load_section_admin"];
$admin["alert"] = [
    "active" => getAlert()["active"] ?? $admin["show_message_admin"] ?? false,
    "type" => getAlert()["type"] ?? ($admin["show_message_admin"] ? "error" : ""),
    "message" => getAlert()["message"] ?? ($admin["show_message_admin"] ? "No existe la sección <strong>{$admin['get_sc']}</strong> o esta en construcción." : "")
];

if ($admin["load_section_admin"] && $admin["file_exists_section_admin_process"]) {
    require_once $admin["path_file_section_admin_process"];
}
