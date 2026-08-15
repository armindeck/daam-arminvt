<?php
function Read(string $file, array $array = null){ global $AC_DIRECTORIO;
	return file_exists("{$AC_DIRECTORIO}$file.json") ?
		json_decode(file_get_contents("{$AC_DIRECTORIO}$file.json"), true) : 'Undefined';
}

function Text(string $string, array $array = null) {
	if ($array != null) {
		foreach ($array as $key => $value) {
			if (is_string($key)) {
				$string = str_replace("{{{$key}}}", $value, $string);
			}
		}
	}

	return $string;
}
$info = Read("datos/info");
$info['copyright'] = Text($info['copy'], [
	'author' => '<a href="'.($info['author-url']).'" target="_blank">'.($info['author']).'</a>',
	'system-name' => '<a href="'.($info['url']).'" target="_blank">'.($info['name']).'</a>',
	'version' => $info['version'],
	'updated' => $info['updated'],
'state' => $info['state']
]);

define("INFO", $info);