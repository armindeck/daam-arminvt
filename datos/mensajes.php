<?php

$lugarMensaje = "";

if (empty($_GET['ms']) || empty($_GET['msm'])) return;

$bgc = match ($_GET['ms'] ?? "") {
	"exi" => "bgverde",
	"err" => "bgrojo",
	"act" => "bgazul",
	default => ""
};

$lugarMensaje = '<p class="texinimen ' . $bgc . '">' . (ALERTS[$_GET["msm"]] ?? ALERTS["default"] ?? "undefined") . '</p>';
