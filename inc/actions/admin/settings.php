<?php

if(!isset($_POST["proccess"]) || $_POST["proccess"] != "settings") return;

$file_path = pathDataConfig();
$data_origin = readJson($file_path);

$data = [
  "page_name" => secureString($_POST["page_name"] ?? ""),
  "page_link" => rtrim(secureString($_POST["page_link"] ?? ""), "/"),
  "page_timezone" => secureString($_POST["page_timezone"] ?? ""),
  "page_language" => secureString($_POST["page_language"] ?? ""),
  "page_theme" => secureString($_POST["page_theme"] ?? ""),
  "page_style" => secureString($_POST["page_style"] ?? ""),
  "page_year" => secureString($_POST["page_year"] ?? ""),
  "page_about" => secureString($_POST["page_about"] ?? ""),
  "page_tags" => secureString($_POST["page_tags"] ?? ""),
  "page_scripts" => trim($_POST["page_scripts"] ?? ""),
  "page_scripts_active" => !empty($_POST["page_scripts_active"] ?? ""),
  "page_ssl_active" => !empty($_POST["page_ssl_active"] ?? ""),
  "page_extension_php_active" => !empty($_POST["page_extension_php_active"] ?? ""),
  "page_debug_active" => !empty($_POST["page_debug_active"] ?? ""),
  "captcha" => [
    "public" => secureString($_POST["captcha_public_key"] ?? ""),
    "private" => secureString($_POST["captcha_private_key"] ?? "")
  ],
  "page_links" => [
    400 => secureString($_POST["page_link_400"] ?? ""),
    401 => secureString($_POST["page_link_401"] ?? ""),
    403 => secureString($_POST["page_link_403"] ?? ""),
    404 => secureString($_POST["page_link_404"] ?? ""),
    500 => secureString($_POST["page_link_500"] ?? ""),
    503 => secureString($_POST["page_link_503"] ?? ""),
  ]
];

$data = array_merge($data_origin, $data);

$result = writeJson($file_path, $data) ? "datosactualizados" : "datosnoactualizados";


# HTACCESS
$file_path_htaccess = raiz()."/.htaccess";
$file_path_htaccess_data = pathData()."/htaccess.txt";
$read_htaccess_data = file_exists($file_path_htaccess_data) ? file_get_contents($file_path_htaccess_data) ?? "" : "";
$link_mod = rtrim($data["page_link"], '/') . '/';

$text_replace = [
  "debug" => "# REPLACE_SHOW_ERROR",
  "timezone" => "# REPLACE_TIMEZONE",
  "ssl" => "# REPLACE_REDIRECT_HTTPS",
  "links" => "# REPLACE_ERROR_LINK"
];

$code_show_error = "php_flag display_errors On\nphp_flag display_startup_errors On\nphp_value error_reporting -1";
$code_timezone = "php_value date.timezone \"{$data['page_timezone']}\"";
$code_redirect_https = "RewriteCond %{HTTPS} !=on\nRewriteRule ^(.*)$ {$link_mod}$1 [R=301,L]";
$code_change_error_link =
  "ErrorDocument 400 {$data['page_links'][400]}\n".
  "ErrorDocument 401 {$data['page_links'][401]}\n".
  "ErrorDocument 403 {$data['page_links'][403]}\n".
  "ErrorDocument 404 {$data['page_links'][404]}\n".
  "ErrorDocument 500 {$data['page_links'][500]}\n".
  "ErrorDocument 503 {$data['page_links'][503]}";

$modify = $read_htaccess_data;
$modify = $data["page_debug_active"] ? str_replace($text_replace["debug"], $code_show_error, $modify) : $modify;
$modify = $data["page_timezone"] ? str_replace($text_replace["timezone"], $code_timezone, $modify) : $modify;
$modify = $data["page_ssl_active"] ? str_replace($text_replace["ssl"], $code_redirect_https, $modify) : $modify;
$modify = str_replace($text_replace["links"], $code_change_error_link, $modify);

$save_htaccess = file_put_contents($file_path_htaccess, $modify);
redirect("./admin.php?sc=settings&ms=exi&msm=$result");
