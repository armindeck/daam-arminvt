<?php

$get_sc = secureString($_GET['sc'] ?? "");
$sc_in_section = in_array($get_sc, array_map(fn($section) => $section["id"], ADMIN["section"] ?? ""));
$path_file_section_admin = __DIR__."/views/admin/{$get_sc}-view.php";
$path_file_section_admin_process = __DIR__."/actions/admin/{$get_sc}.php";
$file_exists_section_admin = file_exists($path_file_section_admin);
$file_exists_section_admin_process = file_exists($path_file_section_admin_process);
$show_message_admin = !empty($get_sc) && (!$file_exists_section_admin || !$sc_in_section);
$load_section_admin = $sc_in_section && $file_exists_section_admin;

if($load_section_admin && $file_exists_section_admin_process){
    require_once $path_file_section_admin_process;
}