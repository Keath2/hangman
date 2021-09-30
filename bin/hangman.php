<?php

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once(__DIR__ . '/../vendor/autoload.php');
} else {
    require_once(__DIR__ . '/../../../autoload.php');
}

use function Keath2\hangman\Controller\menu;

if (isset($argv[1])) {
    $key = $argv[1];
    menu($key);
} else {
    $key = "-n";
    menu($key);
}
