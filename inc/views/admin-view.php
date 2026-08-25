<?php

$sc = secureString($_GET['sc'] ?? "");
$sc_in_section = in_array($sc, array_map(fn($section) => $section["id"], ADMIN["section"] ?? ""));
$path_file = __DIR__."/admin/{$sc}-view.php";
$file_exists = file_exists($path_file);
$file_exists_process = file_exists($path_file);
$show_message = !empty($sc) && (!$file_exists || !$sc_in_section);
$load_section = $sc_in_section && $file_exists;


$sections = implode("", array_map(fn($section) => "<a href=\"?sc={$section['id']}\"><i class=\"{$section['icon']}\"></i> {$section['label']}</a>", ADMIN["section"] ?? ""));

echo "<nav>$sections</nav>";

echo $show_message ? "<div class=\"p-8 t-center\">No existe la sección <strong>$sc</strong> o esta en construcción.</div>" : "";

if(!$load_section) return;

require_once __DIR__."/admin/{$sc}-view.php";