<?php

function template(string $templateId, array $templates, array $commands = []): string {
    if (!isset($templates[$templateId])) return "";
    return templateCommands($templateId, $templates, $commands);
}

function templateCommands(string $templateId, array $templates, array $commands = []): string {
    if (!isset($templates[$templateId])) return "";
    $layout = $templates[$templateId]['layout'] ?? "";
    foreach ($commands as $command => $replacement) {
        $layout = str_replace($command, $replacement, $layout);
    }
    return $layout;
}