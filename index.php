<?php

declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$servicePage = isset($services[$page]);

require __DIR__ . '/includes/header.php';

if ($servicePage) {
    $service = $services[$page];
    require __DIR__ . '/pages/service.php';
} else {
    $template = __DIR__ . '/pages/' . $page . '.php';
    require is_file($template) ? $template : __DIR__ . '/pages/home.php';
}

require __DIR__ . '/includes/footer.php';
