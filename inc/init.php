<?php

require_once __DIR__ . "/function.php";
require_once __DIR__ . "/function-deprecated.php";

generateFilesData();

define("CORE", readJson(pathDataCore()));
define("CONFIG", readJson(pathDataConfig()));
define("ADMIN", readJson(pathDataAdmin()));
define("ALERTS", readJson(pathDataAlerts()));
define("VISITS", readJson(pathDataVisits()));
define("TIMEZONE", readJson(pathDataTimezone()));
define("USERS", readJson(pathDataUsers()));
define("POSTS", readJson(pathDataPosts()));
define("PHP_EXTENSION", (CONFIG["page_extension_php_active"] ?? false) ? ".php" : "");

session_start([
  "cookie_secure" => true, // Solo HTTPS
  "cookie_httponly" => true, // No accesible desde JS
  "cookie_samesite" => "lax", // Protección CSRF
  "use_strict_mode" => true // Evita session fixation
]);

date_default_timezone_set(CONFIG["page_timezone"] ?? "America/Bogota");
error_reporting(CONFIG["page_debug_active"] ?? false);

# AUTH VERIFY
if (auth() && !authVerify(USERS)) {
  if (logout()) redirect("./iniciar.php");
  redirect("./error");
}

if (!empty($_GET["logout"])) {
  if (logout()) redirect("./iniciar.php?ms=exi&msm=sesionfinalizada");
  redirect("./error");
}

#setVisits("/blog/los-mejores-momentos-del-2026", VISITS);

require_once __DIR__."/scripts/scrPosts.php";

$adminprivado = readJson(pathData()."/admin-private-deprecated.json");

require_once $AC_DIRECTORIO.'datos/mensajes.php';
$ex='CargarTema';
require_once $AC_DIRECTORIO.'datos/extenciones.php';