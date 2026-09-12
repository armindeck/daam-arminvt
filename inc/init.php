<?php

session_start([
  "cookie_secure" => true, // Solo HTTPS
  "cookie_httponly" => true, // No accesible desde JS
  "cookie_samesite" => "lax", // Protección CSRF
  "use_strict_mode" => true // Evita session fixation
]);

require_once __DIR__ . "/function.php";
require_once __DIR__ . "/function-deprecated.php";
require_once __DIR__ . "/lib/Markdown.php";
require_once __DIR__ . "/lib/MarkdownExtra.php";

generateFilesData();

define("DIR", $AC_DIRECTORIO ?? $id[0] ?? "./");
define("FILEPATH", !empty(($AC_UBICACION ?? "") . ($AC_ARCHIVO ?? "")) ? $AC_UBICACION . $AC_ARCHIVO : $id[1] ?? "");
define("SLUG", "/" . (ltrim(str_replace(".php", "", FILEPATH), "/")));
define("CORE", readJson(pathDataCore()));
define("CONFIG", readJson(pathDataConfig()));
define("ADMIN", readJson(pathDataAdmin()));
define("ALERTS", readJson(pathDataAlerts()));
define("VISITS", readJson(pathDataVisits()));
define("TIMEZONE", readJson(pathDataTimezone()));
define("USERS", readJson(pathDataUsers()));
define("POSTS", readJson(pathDataPosts()));
define("POST", postSearchBySlug(SLUG, POSTS));
define("PHP_EXTENSION", (CONFIG["page_extension_php_active"] ?? false) ? ".php" : "");
define("URL", (CONFIG["page_link"] ?? "") . SLUG);
define("URL_NOT_INDEX", (CONFIG["page_link"] ?? "") . rtrim(SLUG, "index"));

date_default_timezone_set(CONFIG["page_timezone"] ?? "America/Bogota");
error_reporting(CONFIG["page_debug_active"] ?? false);

loginAdminDeprecated();
//register("admin", "Admin", "admin@example.com", "admin123", "admin123", USERS);
//var_dump(login("admin", "admin123", USERS));
//var_dump(auth());
# AUTH VERIFY
setTheme();
setVisits(SLUG, VISITS);

require_once __DIR__ . "/web.php";

require_once __DIR__ . "/scripts/scrPosts.php";

$adminprivado = readJson(pathData() . "/admin-private-deprecated.json");

require_once DIR . 'datos/mensajes.php';
$ex = 'CargarTema';
require_once DIR . 'datos/extenciones.php';
