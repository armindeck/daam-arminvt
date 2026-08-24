<?php

require_once __DIR__."/function.php";

generateFilesData();

define("CORE", readJson(pathData()."/core.json"));
define("CONFIG", readJson(pathData()."/config.json"));