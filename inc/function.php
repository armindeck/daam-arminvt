<?php

# -------- PATHS --------
function raiz(): string
{
  return __DIR__ . "/..";
}

function pathData(): string
{
  return raiz() . "/data";
}

function pathDataConfig(): string
{
  return pathData() . "/config.json";
}

function pathDataCore(): string
{
  return pathData() . "/core.json";
}

function pathDataTimezone(): string
{
  return pathData() . "/timezone.json";
}

function pathDataAlerts(): string
{
  return pathData() . "/alerts.json";
}

function pathDataVisits(): string
{
  return pathData() . "/visits.json";
}

function pathDataUsers(): string
{
  return pathData() . "/users.json";
}

function pathDataPosts(): string
{
  return pathData() . "/posts.json";
}

function pathDataAdmin(): string
{
  return pathData() . "/admin.json";
}

function secureString(string $string): string
{
  return trim(htmlspecialchars($string));
}

function writeJson(string $file_path, array $data): bool
{
  $json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  if ($json_data === false) {
    throw new \Exception("Failed to encode data to JSON.");
  }
  return file_put_contents($file_path, $json_data) !== false;
}

function readJson(string $file_path): array
{
  if (!file_exists($file_path)) {
    throw new \Exception("File not found: " . $file_path);
  }
  $content = file_get_contents($file_path);
  return json_decode($content, true) ?? [];
}

function generateFilesData(): void
{
  foreach (["core", "config", "admin", "timezone", "alerts", "visits", "users", "posts"] as $value) {
    if (!file_exists(pathData() . "/$value.json"))
      writeJson(pathData() . "/$value.json", []);
  }
}

function redirect(string $route): void
{
  header("location: $route");
  exit;
}

function imagesList(): array
{
  $images = glob(raiz() . "/assets/img/*.*");
  $base = array_map(fn($images) => "assets/img/" . basename($images), $images);
  return $base;
}

function imagesListAndBaseName(): array
{
  return array_map(fn($images) => ["complete" => $images, "base" => basename($images)], imagesList());
}

function auth(): bool
{
  return isset($_SESSION["user_id"]) && isset($_SESSION["user_rol"]);
}

function authVerify(array $users): bool
{
  if (!auth()) return false;

  $user = userLoginSearch($users);
  return !empty($user) && $user["value"]["is_active"];
}

function isAdmin(): bool
{
  return auth() && $_SESSION["user_rol"] == "admin";
}

function loginAdminDeprecated(): void {
  if(!empty($_SESSION['id'])) return;
  $_SESSION['id'] = 1;
  $_SESSION['rol'] = 5;
}

function login(string $username_ord_email, string $password, array $users): bool
{
  $user = userSearchByUserNameOrdEmail($username_ord_email, $users, false);
  if (empty($user) || !$user["value"]["is_active"]) return false;

  $users[$user["key"]]["date_last_login"] = dateTime();
  $users[$user["key"]]["history"][] = ["login", dateTime()];
  if (writeJson(pathDataUsers(), $users)) {
    $_SESSION["user_id"] = $user["value"]["user_id"];
    $_SESSION["user_rol"] = $user["value"]["user_rol"];
    return true;
  }

  return false;
}

function userSearchById(int $user_id, array $users, bool $data_only = true): array
{
  foreach ($users as $key => $user) {
    if ($user_id == $user["user_id"]) {
      return $data_only ? $user : ["key" => $key, "value" => $user];
    }
  }

  return [];
}

function userSearchByUserName(string $username, array $users, bool $data_only = true): array
{
  foreach ($users as $key => $user) {
    if (strtolower($username) == strtolower($user["username"])) {
      return $data_only ? $user : ["key" => $key, "value" => $user];
    }
  }

  return [];
}

function userSearchByEmail(string $email, array $users, bool $data_only = true): array
{
  foreach ($users as $key => $user) {
    if (strtolower($email) == strtolower($user["email"])) {
      return $data_only ? $user : ["key" => $key, "value" => $user];
    }
  }

  return [];
}

function userSearchByUserNameOrdEmail(string $username_ord_email, array $users, bool $data_only = true, bool $primary_searched = true, string $email = ""): array
{
  $searched = [];
  $primary = [];
  foreach ($users as $key => $user) {
    if (strtolower($username_ord_email) == strtolower($user["username"])) {
      $searched["username"] = $data_only ? $user : ["key" => $key, "value" => $user];
      if ($primary_searched) return $searched["username"];
    }

    if (strtolower($email ?? $username_ord_email) == strtolower($user["email"])) {
      $searched["email"] = $data_only ? $user : ["key" => $key, "value" => $user];
      if ($primary_searched) return $searched["email"];
    }

    if (!$primary_searched && !empty($searched["username"]) && !empty($searched["email"])) {
      return $searched;
    }
  }

  return $searched;
}

function userLoginSearch(array $users, bool $data_only = true): array
{
  if (!auth()) return [];
  return userSearchById($_SESSION["user_id"], $users, $data_only);
}

function register(string $username, string $name, string $email, string $password, string $password_confirm, array $users): array
{
  $search = userSearchByUserNameOrdEmail($username, $users, false, false, $email);
  if (!empty($search)) {
    $isset_username = isset($search["username"]);
    $isset_email = isset($search["email"]);

    $message = $isset_username && $isset_email ? "username_and_email_exists" : (
      $isset_username ? "username_exists" : ($isset_email ? "email_exists" : "")
    );

    return [
      "success" => false,
      "message" => $message
    ];
  }

  if ($password != $password_confirm) return ["success" => false, "message" => "password_is_diferent"];

  $id = count($users);

  $users[$id] = [
    "user_id" => $id,
    "username" => secureString($username),
    "name" => secureString($name),
    "password" => passwordHash($password),
    "email" => strtolower(secureString($email)),
    "avatar" => "",
    "rol" => "user",
    "is_active" => true,
    "state" => "active",
    "recovery_code" => generatePin(),
    "date_last_login" => "",
    "date_registered" => dateTime(),
    "history" => []
  ];

  if (writeJson(pathDataUsers(), $users)) {
    return login($username, $password, $users) ? [
      "success" => true,
      "message" => "account_create_and_login"
    ] : [
      "success" => false,
      "message" => "account_create_not_login"
    ];
  }

  return [
    "success" => false,
    "message" => "error_create_account"
  ];
}

function logout(): bool
{
  unset($_SESSION["user_id"]);
  unset($_SESSION["user_rol"]);
  return true;
}

function postSearchById(int $post_id, array $posts, bool $data_only = true): array
{
  foreach ($posts as $key => $post) {
    if ($post_id == $post["post_id"]) {
      return $data_only ? $post : ["key" => $key, "value" => $post];
    }
  }

  return [];
}

function postSearchBySlug(string $slug, array $posts, bool $data_only = true): array
{
  foreach ($posts as $key => $post) {
    if (strtolower($slug) == strtolower($post["slug"])) {
      return $data_only ? $post : ["key" => $key, "value" => $post];
    }
  }

  return [];
}

function passwordHash(string $password): string
{
  return password_hash($password, PASSWORD_DEFAULT);
}

function passwordVerify(string $password, string $passwordHash): bool
{
  return password_verify($password, $passwordHash);
}

function dateTime(): string
{
  return date("Y-m-d H:i:s");
}

function is_par_letter($numero)
{
  $letras = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "K", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
  //$letras = ['A','E','I','O','U'];
  return ($numero % 2 == 0) ? $letras[rand(0, count($letras) - 1)] : $numero;
}

function generatePin(array $cantidad = [4, 5, 7]): string
{
  $numeros = '';
  foreach ($cantidad as $key => $valor) {
    $numeros .= $key >= 1 ? '-' : '';
    for ($i = 0; $i < $valor; $i++) {
      $numeros .= is_par_letter(rand(0, 9));
    }
  }

  return $numeros;
}

function setVisits(string $slug, array $visits): bool
{
  $visits[$slug] = ($visits[$slug] ?? 0) + 1;
  $visits["total"] = ($visits["total"] ?? 0) + 1;
  return writeJson(pathDataVisits(), $visits);
}

function getTheme(string $theme = "light"): string {
  return $_SESSION['tmp']['theme'] ?? $theme;
}

function setTheme(): void {
  if(empty($_GET["theme"])) return;

  $theme = match($_GET["theme"]){
    "light" => "light",
    "dark" => "dark",
    default => "light"
  };

  $_SESSION['tmp']['theme'] = $theme;
}

function stringCommands(string $string, array $commands, string $directory = ""): string{
  foreach($commands as $command => $value){
    if($command == "img["){
      $value .= $directory . "assets/img/";
    }
    $string = str_replace($command, $value, $string);
  }
  return $string;
}

# ------------- ViewsComponents --------------

function viewAdsMessageMovement(array $ads): string
{
  if (($ads["message"]["active"] ?? false) == false) return "";

  $link = $ads["message"]["link"] ?? "";
  $message = $ads["message"]["content"] ?? "";

  return <<<HTML
		<a href="{$link}" target="_blank">
			<marquee direction="left" onmouseout="start();" onmouseover="stop();" scrollamount="10" scrolldelay="145">
				<span>$message</span>
			</marquee>
		</a>
	HTML;
};

function viewAdsBanner(array $ads, string $directory): string
{
  if (($ads["banner"]["active"] ?? false) == false) return "";

  $link = $ads["banner"]["link"] ?? "";
  $image = $ads["banner"]["image"] ?? "";

  return <<<HTML
		<a target="_blank" href="{$link}">
			<img class="anuncio" src="{$directory}{$image}">
		</a>
	HTML;
};

function viewAdsThumbnail(array $ads, string $directory): string
{
  if (($ads["thumbnail"]["active"] ?? false) == false) return "";

  $link = $ads["thumbnail"]["link"] ?? "";
  $image = $ads["thumbnail"]["image"] ?? "";

  return <<<HTML
		<a target="_blank" href="{$link}">
			<img class="anuncio2" src="{$directory}{$image}">
		</a>
	HTML;
};

function viewAdsMessageMovementAndBanner(array $ads, string $directory): string
{
  return "<center>" . viewAdsMessageMovement($ads) . (($ads["message"]["active"] ?? false) == true ? "<hr>" : "") . viewAdsBanner($ads, $directory) . "</center>";
}

function viewSelect(string $name, array $list, string $selected = "", string $style = "max-width: 100%;", string $class = "", string $id = ""): string
{
  $options = implode("", array_map(function ($item) use ($selected) {
    if (is_array($item)) {
      if (array_key_exists(0, $item) && array_key_exists(1, $item)) {
        $value = $item[0];
        $label = $item[1];
      } elseif (count($item) === 1) {
        foreach ($item as $k => $v) {
          $value = $k;
          $label = $v;
        }
      } else {
        $value = key($item);
        $label = reset($item);
      }
    } else {
      $value = $item;
      $label = $item;
    }

    $escValue = htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    $escLabel = htmlspecialchars((string) $label, ENT_QUOTES, 'UTF-8');
    $sel = ((string) $value === (string) $selected) ? ' selected' : '';

    return "<option value=\"{$escValue}\"{$sel}>{$escLabel}</option>";
  }, $list));

  $escName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  return "<select name=\"{$escName}\" id=\"$id\" style=\"$style\" class=\"$class\">" . $options . "</select>";
}


function viewSelectImg(string $name, string $selected, string $style = "max-width: 100%;", string $class = ""): string
{
  return "<select name=\"$name\" style=\"$style\" class=\"$class\">" .
    implode("", array_map(fn($images) => "<option value=\"{$images['complete']}\" " . ($images['complete'] == $selected ? "selected" : "") . ">{$images['base']}</option>", imagesListAndBaseName())) .
    "</select>";
}
