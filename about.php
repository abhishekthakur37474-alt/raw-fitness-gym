<?php
$pageKey = 'about';
$pageTitle = 'About RAW FIT GYM | Premium Fitness Brand';
$metaDescription = 'RAW FIT GYM is a premium fitness brand built on a black-and-gold identity, professional training zones and a structured, scalable member journey.';
$bodyClass = 'page-about';
require __DIR__ . '/includes/header.php';
?>

<section class="page-banner">
    <div class="container-raw">
        <p class="eyebrow">The Brand</p>
        <h1 class="page-banner__title display-lg">More Than A Gym.<br> A Fitness Destination.</h1>
        <p class="page-banner__text">RAW FIT GYM combines a premium black-and-gold identity with professional training zones, premium equipment planning and a structured member journey.</p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span class="sep">/</span><span>About</span>
        </nav>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="split">
            <div class="split__body" data-reveal>
                <span class="section-index">01 / Our Identity</span>
                <h2 class="display-md mt-3">A Premium Standard,<br> Consistently Delivered</h2>
                <hr class="gold-rule">
                <p class="lead-lg">RAW FIT GYM is designed as a premium fitness destination, not a local gym. Every club follows the same visual identity, training-focused environment and member experience.</p>
                <p>The brand is built for franchise scale: the identity, zones, equipment planning and member journey are standardized so each location feels unmistakably RAW FIT, while adapting to its own market and property.</p>
                <ul class="check-list">
                    <li>Premium visual identity</li>
                    <li>Training-first environment</li>
                    <li>Defined strength &amp; cardio zones</li>
                    <li>Consistent member experience</li>
                    <li>Community, transformation and long-term retention</li>
                </ul>
            </div>
            <div class="split__media media-frame" data-reveal data-reveal-delay="2">
                <img src="<?= e(img('brand')) ?>" alt="RAW FIT GYM premium training environment" loading="lazy" width="900" height="1125">
                <span class="media-frame__tag"><?= e(SITE_MOTTO) ?></span>
            </div>
        </div>
    </div>
</section>

<section class="section section--dark section--hairline" id="values">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">02 / What Defines Us</span>
            <h2 class="display-md mt-3">The Standard Behind Every Club</h2>
        </div>
        <div class="values-list">
            <?php foreach ($VALUES as $value): ?>
                <article class="value-row" data-reveal>
                    <span class="value-row__no"><?= e($value['no']) ?></span>
                    <h3 class="value-row__title"><?= e($value['title']) ?></h3>
                    <p class="value-row__text"><?= e($value['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" id="experience">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">03 / Member Experience</span>
            <h2 class="display-md mt-3">The Member Journey</h2>
            <p class="mt-3">A structured path from first contact to long-term retention.</p>
        </div>
        <div class="journey">
            <?php foreach ($JOURNEY as $step): ?>
                <article class="journey__step" data-reveal>
                    <div class="journey__no"><?= e($step['no']) ?></div>
                    <h3 class="journey__title"><?= e($step['title']) ?></h3>
                    <p class="journey__text"><?= e($step['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--charcoal" id="equipment">
    <div class="container-raw">
        <div class="split split--reverse">
            <div class="split__media media-frame media-frame--wide" data-reveal>
                <img src="<?= e(img('strength')) ?>" alt="Strength training zone" loading="lazy" width="1200" height="825">
                <span class="media-frame__tag">Training Zones</span>
            </div>
            <div class="split__body" data-reveal data-reveal-delay="2">
                <span class="section-index">04 / Equipment &amp; Training</span>
                <h2 class="display-md mt-3">Built For Performance</h2>
                <hr class="gold-rule">
                <p class="lead-lg">Strength, free weights, cardio and functional training are planned as dedicated zones, supported by a structured member journey.</p>
                <div class="tag-strip mt-4">
                    <?php
                    $look = ['Consistent finishes', 'Integrated branding', 'Organized equipment', 'Quality flooring', 'Professional lighting', 'Clean sightlines'];
                    foreach ($look as $tag):
                    ?>
                        <span class="tag-chip"><?= e($tag) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="athlete">
    <div class="athlete__media" style="<?= bg('athlete') ?>" aria-hidden="true"></div>
    <div class="athlete__veil" aria-hidden="true"></div>
    <div class="container-raw">
        <div class="athlete__content">
            <p class="eyebrow">05 / Performance</p>
            <h2 class="athlete__title">The Face Of Performance</h2>
            <p class="athlete__name">IFBB Pro Rahul</p>
            <p class="lead-lg">RAW FIT GYM is associated with IFBB Pro athlete culture where contracted, including bodybuilding and fitness work, potential grand-opening appearances, member workout sessions, meet &amp; greets, content collaboration and transformation events.</p>
            <p class="disclaimer mb-0">Any endorsement, ambassador, appearance schedule, image rights or commercial association is subject to a separate written agreement.</p>
        </div>
    </div>
</section>

<section class="section" id="revenue">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">06 / Revenue Model</span>
            <h2 class="display-md mt-3">Diversified By Design</h2>
        </div>
        <div class="revenue-grid">
            <?php foreach ($REVENUE as $stream): ?>
                <article class="revenue-item" data-reveal>
                    <h3 class="revenue-item__title"><?= e($stream['title']) ?></h3>
                    <p class="revenue-item__text"><?= e($stream['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container-raw">
        <p class="eyebrow eyebrow--plain justify-content-center">Franchise Enquiry</p>
        <h2 class="display-lg">Build A Club<br> That Performs</h2>
        <div class="btn-row mt-4">
            <a class="btn btn-gold" href="franchise.php">View Formats <i class="bi bi-arrow-right"></i></a>
            <a class="btn btn-ghost" href="contact.php">Talk To Our Team</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
