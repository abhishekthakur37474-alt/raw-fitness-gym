<?php
/**
 * Shared template for the PRIME and LUXURY format detail pages.
 * Set $formatKey ('prime' | 'luxury') before including this file.
 */

require_once __DIR__ . '/config.php';

$formatKey = $formatKey ?? 'prime';
if (!isset($FORMATS[$formatKey])) {
    $formatKey = 'prime';
}
$format = $FORMATS[$formatKey];
$isFlagship = ($formatKey === 'luxury');

$pageKey = 'franchise';
$pageTitle = $format['name'] . ' | RAW FIT GYM Franchise Format';
$metaDescription = $format['name'] . ' franchise format — ' . $format['price'] . ', ' . $format['area'] . '. ' . $format['summary'];
$bodyClass = 'page-format page-format--' . $formatKey;

require __DIR__ . '/header.php';
?>

<section class="page-banner">
    <div class="container-raw">
        <p class="eyebrow"><?= e($format['short']) ?> Format<?= $isFlagship ? ' &bull; Flagship' : '' ?></p>
        <h1 class="page-banner__title display-lg"><?= e($format['name']) ?></h1>
        <p class="page-banner__text"><?= e($format['summary']) ?></p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span class="sep">/</span>
            <a href="franchise.php">Formats</a><span class="sep">/</span>
            <span><?= e($format['short']) ?></span>
        </nav>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="split">
            <div class="split__body" data-reveal>
                <span class="section-index"><?= $isFlagship ? 'The Flagship Experience' : 'Premium Compact Format' ?></span>
                <h2 class="display-md mt-3"><?= e($format['name']) ?></h2>
                <hr class="gold-rule">
                <p class="lead-lg"><?= e($format['summary']) ?></p>
                <p><?= $isFlagship
                    ? 'RAW FIT LUXURY is the flagship-scale format: a full fitness destination that pairs an expanded training floor with recovery, lounge and recreation zones for a complete premium experience.'
                    : 'RAW FIT PRIME is a premium compact format designed for high-density catchments, with every essential zone planned to premium standard and disciplined operations.' ?></p>

                <div class="spec-bar">
                    <div class="spec-bar__item">
                        <span class="spec-bar__label">Investment</span>
                        <span class="spec-bar__value"><?= e($format['price']) ?></span>
                    </div>
                    <div class="spec-bar__item">
                        <span class="spec-bar__label">Area</span>
                        <span class="spec-bar__value"><?= e($format['area']) ?></span>
                    </div>
                    <div class="spec-bar__item">
                        <span class="spec-bar__label">Facilities</span>
                        <span class="spec-bar__value" data-counter="<?= count($format['facilities']) ?>"><?= count($format['facilities']) ?></span>
                    </div>
                </div>
            </div>
            <div class="split__media media-frame" data-reveal data-reveal-delay="2">
                <img src="<?= e(img($formatKey)) ?>" alt="<?= e($format['name']) ?> club interior" loading="lazy" width="900" height="1125">
                <span class="media-frame__tag"><?= e($format['short']) ?> &bull; <?= e($format['area']) ?></span>
            </div>
        </div>
    </div>
</section>

<section class="section section--dark section--hairline">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index"><?= $isFlagship ? 'Flagship Facilities' : 'Included Facilities' ?></span>
            <h2 class="display-md mt-3">Every Zone, Planned</h2>
        </div>
        <div class="facility-grid" data-reveal>
            <?php foreach ($format['facilities'] as $i => $facility): ?>
                <div class="facility">
                    <span class="facility__no"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <h3 class="facility__name"><?= e($facility) ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="split split--reverse">
            <div class="split__media media-frame media-frame--wide" data-reveal>
                <img src="<?= e(img($isFlagship ? 'recovery' : 'cardio')) ?>" alt="<?= e($format['name']) ?> training zone" loading="lazy" width="1200" height="825">
                <span class="media-frame__tag"><?= $isFlagship ? 'Recovery &amp; Lounge' : 'Strength &amp; Cardio' ?></span>
            </div>
            <div class="split__body" data-reveal data-reveal-delay="2">
                <span class="section-index">Space Planning</span>
                <h2 class="display-md mt-3">Planned Around The Member</h2>
                <hr class="gold-rule">
                <p>Each zone is planned for clear sightlines, safe clearances and easy member movement, so the club feels premium from the entrance to the last rep.</p>
                <p class="disclaimer mb-0">Final layout is created only after site measurement, structural review and equipment planning.</p>
                <div class="btn-row mt-4">
                    <a class="btn btn-gold" href="contact.php">Request Franchise Details <i class="bi bi-arrow-right"></i></a>
                    <a class="btn btn-ghost" href="franchise.php">Compare Formats</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container-raw">
        <p class="eyebrow eyebrow--plain justify-content-center"><?= e($format['short']) ?> Enquiry</p>
        <h2 class="display-lg">Build <?= e($format['name']) ?></h2>
        <div class="final-cta__prices">
            <span>Investment &mdash; <strong><?= e($format['price']) ?></strong></span>
            <span>Area &mdash; <strong><?= e($format['area']) ?></strong></span>
        </div>
        <div class="btn-row">
            <a class="btn btn-gold" href="contact.php">Enquire Now <i class="bi bi-arrow-right"></i></a>
            <a class="btn btn-ghost" href="tel:<?= e(SITE_PHONE_RAW) ?>">Call Our Team</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/footer.php'; ?>
