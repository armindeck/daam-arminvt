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
define("DIR", $AC_DIRECTORIO ?? $id[0] ?? "./");
define("FILEPATH", !empty(($AC_UBICACION ?? "") . ($AC_ARCHIVO ?? "")) ? $AC_UBICACION.$AC_ARCHIVO : $id[1] ?? "");
define("SLUG", "/" . (ltrim(str_replace(".php", "", FILEPATH), "/")));

session_start([
  "cookie_secure" => true, // Solo HTTPS
  "cookie_httponly" => true, // No accesible desde JS
  "cookie_samesite" => "lax", // Protección CSRF
  "use_strict_mode" => true // Evita session fixation
]);

date_default_timezone_set(CONFIG["page_timezone"] ?? "America/Bogota");
error_reporting(CONFIG["page_debug_active"] ?? false);

loginAdminDeprecated();

# AUTH VERIFY
if (auth() && !authVerify(USERS)) {
  if (logout()) redirect(DIR."iniciar.php");
  redirect(DIR."error");
}

if (!empty($_GET["logout"])) {
  if (logout()) redirect(DIR."iniciar.php?ms=exi&msm=sesionfinalizada");
  redirect(DIR."error");
}

setTheme();

if (!empty($id) && $id[0].$id[1] == "./admin.php"){
  //if(!auth() || !isAdmin()) redirect(DIR."iniciar.php?ms=err&msm=accdenegado");
  require_once __DIR__."/admin.php";
}

#setVisits("/blog/los-mejores-momentos-del-2026", VISITS);

require_once __DIR__."/scripts/scrPosts.php";

$adminprivado = readJson(pathData()."/admin-private-deprecated.json");

require_once DIR.'datos/mensajes.php';
$ex='CargarTema';
require_once DIR.'datos/extenciones.php';