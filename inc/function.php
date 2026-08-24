<?php

function raiz(): string
{
  return __DIR__ . "/..";
}

function pathData(): string
{
  return raiz() . "/data";
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
  foreach (["core", "config"] as $value) {
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
  $images = glob(raiz() . "/img/*.*");
  $base = array_map(fn($images) => "img/" . basename($images), $images);
  return $base;
}

function imagesListAndBaseName(): array
{
  return array_map(fn($images) => ["complete" => $images, "base" => basename($images)], imagesList());
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

function viewSelect(string $name, array $list, string $selected = "", string $style = "max-width: 100%;", string $class = ""): string
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
  return "<select name=\"{$escName}\" style=\"$style\" class=\"$class\">" . $options . "</select>";
}


function viewSelectImg(string $name, string $selected, string $style = "max-width: 100%;", string $class = ""): string
{
  return "<select name=\"$name\" style=\"$style\" class=\"$class\">" .
    implode("", array_map(fn($images) => "<option value=\"{$images['complete']}\" " . ($images['complete'] == $selected ? "selected" : "") . ">{$images['base']}</option>", imagesListAndBaseName())) .
    "</select>";
}
