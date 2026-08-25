<?php

$sections = implode("", array_map(fn($section) => "<a href=\"?sc={$section['id']}\"><i class=\"{$section['icon']}\"></i> {$section['label']}</a>", ADMIN["section"] ?? ""));

echo "<nav>$sections</nav>";

echo $show_message_admin ? "<div class=\"p-8 t-center\">No existe la sección <strong>$get_sc</strong> o esta en construcción.</div>" : "";

if(!$load_section_admin) return;

require_once __DIR__."/admin/{$get_sc}-view.php";