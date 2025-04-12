<?php
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception("Environment file not found: $path");
    }

    if (!is_readable($path)) {
        throw new Exception("Environment file is not readable: $path");
    }

    $envVars = [];
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Split the line into key and value
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            // Remove surrounding quotes if present
            if (preg_match('/^"(.*)"$/', $value, $matches) || preg_match("/^'(.*)'$/", $value, $matches)) {
                $value = $matches[1];
            }

            // Store in environment and array
            putenv("$key=$value");
            $envVars[$key] = $value;
        }
    }

    return $envVars;
}
?>