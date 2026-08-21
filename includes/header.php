<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="<?= h($routes[$page]['description']) ?>">
    <meta name="theme-color" content="#031c35">
    <title><?= h($routes[$page]['title']) ?> | Smart Global Group</title>
    <link rel="icon" type="image/png" href="<?= h(asset_url('All Logo/logo-transparent.png')) ?>">
    <link rel="stylesheet" href="<?= h(asset_url('assets/css/style.css')) ?>">
</head>
<body class="page-<?= h($page) ?>">
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="site-header" data-header>
    <div class="container header-inner">
        <a class="brand" href="<?= h(page_url()) ?>" aria-label="Smart Global Group home">
            <img src="<?= h(asset_url('All Logo/logo-transparent.png')) ?>" alt="Smart Global Group" width="1254" height="1254">
        </a>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" data-menu-toggle>
            <span class="menu-icon menu-open-icon"><?= icon('menu') ?></span>
            <span class="menu-icon menu-close-icon"><?= icon('close') ?></span>
            <span class="sr-only">Toggle navigation</span>
        </button>

        <nav class="primary-nav" id="primary-nav" aria-label="Primary navigation" data-menu>
            <a class="<?= $page === 'home' ? 'active' : '' ?>" href="<?= h(page_url()) ?>">Home</a>
            <a class="<?= $page === 'about' ? 'active' : '' ?>" href="<?= h(page_url('about')) ?>">About Us</a>
            <div class="nav-dropdown <?= $servicePage ? 'active' : '' ?>">
                <button type="button" aria-expanded="false" data-dropdown-toggle>Solutions <span aria-hidden="true">⌄</span></button>
                <div class="dropdown-panel">
                    <?php foreach ($services as $slug => $item): ?>
                        <a href="<?= h(page_url($slug)) ?>">
                            <span><?= h($item['number']) ?></span>
                            <strong><?= h($item['eyebrow']) ?></strong>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <a class="<?= $page === 'packages' ? 'active' : '' ?>" href="<?= h(page_url('packages')) ?>">Packages</a>
            <a class="<?= $page === 'presence' ? 'active' : '' ?>" href="<?= h(page_url('presence')) ?>">Global Presence</a>
            <a class="<?= $page === 'insights' ? 'active' : '' ?>" href="<?= h(page_url('insights')) ?>">Insights</a>
            <a class="<?= $page === 'contact' ? 'active' : '' ?>" href="<?= h(page_url('contact')) ?>">Contact Us</a>
            <a class="button button-gold nav-cta" href="<?= h(page_url('contact')) ?>">Request Free Assessment <?= icon('arrow') ?></a>
        </nav>
    </div>
</header>
<main id="main-content">
