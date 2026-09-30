<?php
$pageKey = 'franchise';
$pageTitle = 'Franchise Formats | RAW FIT GYM PRIME & LUXURY';
$metaDescription = 'Compare RAW FIT GYM franchise formats: PRIME from ₹1.80 Crore (3,000–4,000 SQ FT) and LUXURY from ₹3.20 Crore (6,000–8,000 SQ FT).';
$bodyClass = 'page-franchise';
require __DIR__ . '/includes/header.php';
?>

<section class="page-banner">
    <div class="container-raw">
        <p class="eyebrow">Franchise</p>
        <h1 class="page-banner__title display-lg">Choose Your Format</h1>
        <p class="page-banner__text">Two premium formats engineered for different markets, both built on the same operating standard.</p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span class="sep">/</span><span>Formats</span>
        </nav>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="grid grid-2">
            <?php foreach ($FORMATS as $format): ?>
                <article class="format-panel" data-reveal>
                    <div class="format-panel__media" style="<?= bg($format['key']) ?>" aria-hidden="true"></div>
                    <div class="format-panel__veil" aria-hidden="true"></div>
                    <div class="format-panel__body">
                        <h2 class="format-panel__name"><?= e($format['name']) ?></h2>
                        <div class="format-panel__meta">
                            <span><i class="bi bi-currency-rupee"></i> <?= e($format['price']) ?></span>
                            <span><i class="bi bi-rulers"></i> <?= e($format['area']) ?></span>
                        </div>
                        <p class="format-panel__text"><?= e($format['summary']) ?></p>
                        <a class="btn btn-gold" href="<?= e($format['href']) ?>">Explore <?= e($format['short']) ?> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--dark" id="formats-detail">
    <div class="container-raw">
        <div class="grid grid-2" style="gap: 3rem;">
            <?php foreach ($FORMATS as $format): ?>
                <div data-reveal>
                    <span class="section-index"><?= e(strtoupper($format['short'])) ?> Format</span>
                    <h2 class="display-sm mt-3"><?= e($format['name']) ?></h2>
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
                            <span class="spec-bar__label">Zones</span>
                            <span class="spec-bar__value"><?= count($format['facilities']) ?></span>
                        </div>
                    </div>
                    <ul class="check-list mt-4">
                        <?php foreach (array_slice($format['facilities'], 0, 6) as $facility): ?>
                            <li><?= e($facility) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="text-link mt-4" href="<?= e($format['href']) ?>">Full <?= e($format['short']) ?> details <i class="bi bi-arrow-right"></i></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" id="support">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">Franchise Support</span>
            <h2 class="display-md mt-3">From Property<br> To Opening Day</h2>
            <p class="mt-3">Structured support across two phases: pre-opening setup and ongoing operations &amp; growth.</p>
        </div>

        <div class="grid grid-2">
            <div class="timeline" data-reveal>
                <div class="timeline__item">
                    <h3 class="timeline__title">Pre-Opening Support</h3>
                    <p class="timeline__text">Foundations for a club that launches to standard.</p>
                </div>
                <?php foreach ($SUPPORT_PRE as $item): ?>
                    <div class="timeline__item">
                        <p class="timeline__text mb-0"><?= e($item) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="timeline" data-reveal data-reveal-delay="2">
                <div class="timeline__item">
                    <h3 class="timeline__title">Operations &amp; Growth</h3>
                    <p class="timeline__text">Systems that keep the club performing after launch.</p>
                </div>
                <?php foreach ($SUPPORT_OPS as $item): ?>
                    <div class="timeline__item">
                        <p class="timeline__text mb-0"><?= e($item) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="section section--dark" id="roadmap">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">Launch Roadmap</span>
            <h2 class="display-md mt-3">Seven Steps To Opening Day</h2>
        </div>
        <div class="roadmap">
            <?php foreach ($ROADMAP as $step): ?>
                <article class="roadmap__step" data-reveal>
                    <span class="roadmap__no"><?= e($step['no']) ?></span>
                    <h3 class="roadmap__title"><?= e($step['title']) ?></h3>
                    <p class="roadmap__text"><?= e($step['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" id="partner">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">Franchise Partner</span>
            <h2 class="display-lg mt-3">Is Raw Fit Right For You?</h2>
        </div>
        <div class="require-grid">
            <?php
            $requirements = [
                ['01', 'Capital', 'Understands the full investment requirement and maintains adequate working capital.'],
                ['02', 'Property', 'Has or can secure a suitable property.'],
                ['03', 'Execution', 'Ready to build a sales team, maintain standards and participate in local marketing.'],
            ];
            foreach ($requirements as $req):
            ?>
                <article class="require-item" data-reveal>
                    <span class="require-item__no"><?= e($req[0]) ?></span>
                    <h3 class="require-item__title"><?= e($req[1]) ?></h3>
                    <p class="require-item__text"><?= e($req[2]) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container-raw">
        <p class="eyebrow eyebrow--plain justify-content-center">Franchise Enquiry</p>
        <h2 class="display-lg">Start A<br> Conversation</h2>
        <div class="final-cta__prices">
            <span>Prime &mdash; <strong><?= e($FORMATS['prime']['price']) ?></strong></span>
            <span>Luxury &mdash; <strong><?= e($FORMATS['luxury']['price']) ?></strong></span>
        </div>
        <div class="btn-row">
            <a class="btn btn-gold" href="contact.php">Enquire Now <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
