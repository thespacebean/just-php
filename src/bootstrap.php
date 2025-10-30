<?php

// Prefer vendor inside web root (container), then fallback to project root (local dev)
$autoloadCandidates = [
    __DIR__ . '/vendor/autoload.php',
    __DIR__ . '/../vendor/autoload.php',
];
foreach ($autoloadCandidates as $autoload) {
    if (file_exists($autoload)) {
        require_once $autoload;
        break;
    }
}

require_once __DIR__ . '/app/bootstrap_runtime.php';
