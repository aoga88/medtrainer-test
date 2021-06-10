<?php

$files = [
    '/usr/share/nginx/wordpress/wp-content/themes/index.php',
    '/usr/share/nginx/wordpress/wp-content/themes/mytheme.php',
    '/usr/share/nginx/wordpress/wp-content/plugins/myplugin.php',
    '/usr/share/nginx/wordpress/wp-content/plugins/akismet.php',
    '/usr/share/nginx/wordpress/wp-content/uploads/november.jpg',
];

$exclude = [
    '/usr/share/nginx/wordpress/wp-content/uploads',
    '/usr/share/nginx/wordpress/wp-content/plugins/myplugin.php',
];

foreach ($exclude as $excludedValue) {
    $files = array_filter($files, function ($item) use ($excludedValue) {
        return strpos($excludedValue, $item) === false;
    });
}

var_dump($files);