<?php
/**
 * Shared document head, sticky navbar and page opening.
 *
 * Pages define these before including this file:
 *   $pageKey          string  active nav key
 *   $pageTitle        string  <title> and og:title
 *   $metaDescription  string  meta description
 *   $bodyClass        string  optional body modifier
 */

require_once __DIR__ . '/config.php';

$pageKey = $pageKey ?? 'home';
$pageTitle = $pageTitle ?? (SITE_NAME . ' | Premium Gym Franchise');
$metaDescription = $metaDescription ?? 'Explore RAW FIT GYM premium gym franchise opportunities with PRIME and LUXURY formats designed for premium fitness experiences and scalable business operations.';
$bodyClass = $bodyClass ?? '';
$ogImage = 'assets/images/logo.png';

$current = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$isHome = $current === 'index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#050505">

    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($metaDescription) ?>">
    <meta name="author" content="<?= e(SITE_NAME) ?>">
    <link rel="canonical" href="<?= e(canonical_url()) ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($metaDescription) ?>">
    <meta property="og:url" content="<?= e(canonical_url()) ?>">
    <meta property="og:image" content="<?= e($ogImage) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($metaDescription) ?>">

    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <link rel="apple-touch-icon" href="assets/images/logo.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@400;500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/css/style.css?v=<?= e(ASSET_VERSION) ?>" rel="stylesheet">

    <noscript><style>[data-reveal]{opacity:1 !important;transform:none !important}</style></noscript>

    <script type="application/ld+json"><?= json_encode($SCHEMA, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
</head>
<body class="<?= e($bodyClass) ?><?= $isHome ? ' is-home' : '' ?>">

    <a class="skip-link" href="#main">Skip to content</a>

    <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

    <header class="site-header<?= $isHome ? ' site-header--overlay' : '' ?>" id="siteHeader">
        <nav class="navbar navbar-expand-lg">
            <div class="container-raw">
                <a class="navbar-brand brand" href="index.php" aria-label="<?= e(SITE_NAME) ?> home">
                    <img src="assets/images/logo.png" alt="<?= e(SITE_NAME) ?> logo" class="brand__mark" width="52" height="52">
                    <span class="brand__text">
                        <span class="brand__name">RAW FIT</span>
                        <span class="brand__sub">GYM</span>
                    </span>
                </a>

                <button class="navbar-toggler nav-burger" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryNav" aria-controls="primaryNav" aria-label="Open navigation">
                    <span></span><span></span><span></span>
                </button>

                <div class="offcanvas offcanvas-lg offcanvas-end site-drawer" tabindex="-1" id="primaryNav" aria-labelledby="primaryNavLabel">
                    <div class="offcanvas-header">
                        <span class="drawer-label" id="primaryNavLabel">Menu</span>
                        <button type="button" class="drawer-close" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav nav-links">
                            <?php foreach ($NAV as $item): ?>
                                <?php $active = ($item['key'] === $pageKey); ?>
                                <li class="nav-item">
                                    <a class="nav-link<?= $active ? ' active' : '' ?>" href="<?= e($item['href']) ?>"<?= $active ? ' aria-current="page"' : '' ?>>
                                        <?= e($item['label']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <li class="nav-item nav-cta-mobile d-lg-none">
                                <a class="btn btn-gold btn-block" href="contact.php">Enquire Now</a>
                            </li>
                        </ul>
                        <a class="btn btn-gold nav-cta d-none d-lg-inline-flex" href="contact.php">
                            Enquire Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
