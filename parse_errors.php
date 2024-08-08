<?php
// parse_errors.php

$error_log_path = __DIR__ . '/error.log';

if (!file_exists($error_log_path)) {
    echo "No error log found.\n";
    exit(0);
}

$error_log = file($error_log_path);
$errors_found = false;

foreach ($error_log as $line) {
    if (strpos($line, 'Error: [256]') !== false) { // E_USER_ERROR code is 256
        echo $line;
        $errors_found = true;
    }
}

if (!$errors_found) {
    echo "No critical errors found.\n";
    exit(0);
} else {
    echo "Critical errors detected.\n";
}
