<?php
$pageKey = 'home';
$pageTitle = 'RAW FIT GYM | Premium Gym Franchise';
$metaDescription = 'Explore RAW FIT GYM premium gym franchise opportunities with PRIME and LUXURY formats designed for premium fitness experiences and scalable business operations.';
$bodyClass = 'page-home';
require __DIR__ . '/includes/header.php';
?>

<!-- ============================= HERO ============================= -->
<section class="hero" aria-label="RAW FIT GYM franchise introduction">
    <div class="hero__media" style="<?= bg('hero') ?>" aria-hidden="true"></div>
    <div class="hero__veil" aria-hidden="true"></div>

    <div class="container-raw">
        <div class="hero__content">
            <p class="eyebrow">Premium Fitness &bull; Premium Experience</p>
            <h1 class="hero__title display-hero">
                Build The Next<br><span class="accent">Raw Fit Gym</span>
            </h1>
            <p class="hero__text lead-lg">
                A premium fitness franchise built around performance, experience and scalable operations.
            </p>
            <div class="btn-row">
                <a class="btn btn-gold" href="franchise.php">
                    Explore Franchise <i class="bi bi-arrow-right"></i>
                </a>
                <a class="btn btn-ghost" href="contact.php">Talk To Our Team</a>
            </div>

            <div class="hero__rail">
                <span>Raw Fit <span class="dot">/</span> <?= e(SITE_MOTTO) ?></span>
                <span>Prime <span class="dot">/</span> Luxury</span>
                <span class="scroll-cue">Scroll <i class="bi bi-arrow-down"></i></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================= TICKER ============================= -->
<section class="ticker" aria-hidden="true">
    <div class="ticker__track">
        <?php
        $tickerItems = ['Raw Fit Gym', 'Prime', 'Luxury', 'Performance', 'Recovery', 'Membership'];
        for ($pass = 0; $pass < 2; $pass++) {
            foreach ($tickerItems as $ti => $item) {
                $accent = in_array($item, ['Prime', 'Luxury'], true) ? ' ticker__item--accent' : '';
                echo '<span class="ticker__item' . $accent . '">' . e($item) . '</span>';
            }
        }
        ?>
    </div>
</section>

<!-- ============================= BRAND INTRO ============================= -->
<section class="section" id="brand">
    <div class="container-raw">
        <div class="split">
            <div class="split__body" data-reveal>
                <span class="section-index">01 / The Brand</span>
                <h2 class="display-lg mt-3">More Than A Gym.<br> A Fitness Destination.</h2>
                <hr class="gold-rule">
                <p class="lead-lg">
                    RAW FIT GYM combines a premium black-and-gold identity with professional training zones,
                    premium equipment planning and a structured member journey.
                </p>
                <ul class="check-list">
                    <li>Premium visual identity</li>
                    <li>Training-first environment</li>
                    <li>Defined strength &amp; cardio zones</li>
                    <li>Consistent member experience</li>
                    <li>Community, transformation and long-term retention</li>
                </ul>
                <div class="btn-row mt-4">
                    <a class="text-link" href="about.php">Discover the brand <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="split__media media-frame media-frame--offset" data-reveal data-reveal-delay="2">
                <img src="<?= e(img('brand')) ?>" alt="Premium training floor inside a RAW FIT GYM club" loading="lazy" width="900" height="1125">
                <span class="media-frame__tag">Life In Progress</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================= STATS ============================= -->
<section class="section section--tight" aria-label="Raw Fit at a glance">
    <div class="container-raw">
        <div class="stats">
            <div class="stats__item">
                <div class="stats__value">02</div>
                <div class="stats__label">Premium Formats</div>
            </div>
            <div class="stats__item">
                <div class="stats__value">06</div>
                <div class="stats__label">Revenue Streams</div>
            </div>
            <div class="stats__item">
                <div class="stats__value">07</div>
                <div class="stats__label">Launch Steps</div>
            </div>
            <div class="stats__item">
                <div class="stats__value">06</div>
                <div class="stats__label">Site Criteria</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================= BRAND VALUES ============================= -->
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

<!-- ============================= FRANCHISE FORMATS ============================= -->
<section class="section" id="formats">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">03 / Franchise Formats</span>
            <h2 class="display-lg mt-3">Choose Your Format</h2>
            <p class="mt-3">Two premium formats engineered for different markets, both built on the same operating standard.</p>
        </div>

        <div class="grid grid-2">
            <?php foreach ($FORMATS as $format): ?>
                <article class="format-panel" data-reveal>
                    <div class="format-panel__media" style="<?= bg($format['key']) ?>" aria-hidden="true"></div>
                    <div class="format-panel__veil" aria-hidden="true"></div>
                    <div class="format-panel__body">
                        <h3 class="format-panel__name"><?= e($format['short']) ?></h3>
                        <div class="format-panel__meta">
                            <span><i class="bi bi-currency-rupee"></i> <?= e($format['price']) ?></span>
                            <span><i class="bi bi-rulers"></i> <?= e($format['area']) ?></span>
                        </div>
                        <p class="format-panel__text"><?= e($format['summary']) ?></p>
                        <a class="text-link" href="<?= e($format['href']) ?>">Explore <?= e($format['short']) ?> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================= PROPERTY & SITE CRITERIA ============================= -->
<section class="section section--dark" id="criteria">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">04 / Property &amp; Site</span>
            <h2 class="display-md mt-3">The Right Property<br> Builds The Right Club</h2>
        </div>

        <div class="criteria-list">
            <?php foreach ($CRITERIA as $item): ?>
                <article class="criteria-item" data-reveal>
                    <div class="criteria-item__no"><?= e($item['no']) ?></div>
                    <h3 class="criteria-item__title"><?= e($item['title']) ?></h3>
                    <p class="criteria-item__text"><?= e($item['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================= CLUB SPACE PLANNING ============================= -->
<section class="section" id="planning">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">05 / Club Space Planning</span>
            <h2 class="display-md mt-3">A Floor Designed Around Movement</h2>
        </div>

        <div class="plan-board" data-reveal>
            <div class="plan-grid">
                <?php
                $zones = ['Reception', 'Strength', 'Cardio', 'Functional', 'PT / Coaching', 'Support'];
                foreach ($zones as $i => $zone):
                ?>
                    <div class="plan-cell">
                        <span class="plan-cell__label">Zone <?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                        <h3 class="plan-cell__title"><?= e($zone) ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="plan-note">
                <h3 class="plan-note__title">Planning The Flow</h3>
                <p>Every club is planned around sightlines, member movement and equipment clearances so the space feels premium and performs commercially.</p>
                <p class="disclaimer mb-0">Final layout is created only after site measurement, structural review and equipment planning.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================= EQUIPMENT & EXPERIENCE ============================= -->
<section class="section section--charcoal" id="equipment">
    <div class="container-raw">
        <div class="split split--reverse">
            <div class="split__media media-frame media-frame--wide" data-reveal>
                <img src="<?= e(img('equipment')) ?>" alt="Modern strength equipment in a premium gym" loading="lazy" width="1200" height="825">
                <span class="media-frame__tag">Built For Performance</span>
            </div>
            <div class="split__body" data-reveal data-reveal-delay="2">
                <span class="section-index">06 / Equipment &amp; Training</span>
                <h2 class="display-md mt-3">Built For Performance</h2>
                <hr class="gold-rule">
                <p class="lead-lg">Strength, free weights, cardio and functional training are planned as dedicated zones, supported by a structured member journey.</p>
                <div class="tag-strip mt-4">
                    <?php
                    $look = [
                        'Consistent finishes',
                        'Integrated branding',
                        'Organized equipment',
                        'Quality flooring',
                        'Professional lighting',
                        'Clean sightlines',
                    ];
                    foreach ($look as $tag):
                    ?>
                        <span class="tag-chip"><?= e($tag) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================= MEMBER EXPERIENCE ============================= -->
<section class="section" id="experience">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">07 / Member Experience</span>
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

<!-- ============================= REVENUE MODEL ============================= -->
<section class="section section--dark" id="revenue">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">08 / Revenue Model</span>
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

<!-- ============================= ATHLETE ============================= -->
<section class="athlete" id="athlete">
    <div class="athlete__media" style="<?= bg('athlete') ?>" aria-hidden="true"></div>
    <div class="athlete__veil" aria-hidden="true"></div>
    <div class="container-raw">
        <div class="athlete__content">
            <p class="eyebrow">09 / Performance</p>
            <h2 class="athlete__title">The Face Of Performance</h2>
            <p class="athlete__name">IFBB Pro Rahul</p>
            <p class="lead-lg">
                RAW FIT GYM is associated with IFBB Pro athlete culture where contracted,
                including bodybuilding and fitness work, potential grand-opening appearances,
                member workout sessions, meet &amp; greets, content collaboration and transformation events.
            </p>
            <p class="disclaimer mb-0">
                Any endorsement, ambassador, appearance schedule, image rights or commercial association
                is subject to a separate written agreement.
            </p>
        </div>
    </div>
</section>

<!-- ============================= MARKETING & GRAND OPENING ============================= -->
<section class="section section--dark" id="marketing">
    <div class="container-raw">
        <div class="split">
            <div class="split__body" data-reveal>
                <span class="section-index">10 / Marketing &amp; Grand Opening</span>
                <h2 class="display-md mt-3">From Build-Up To Momentum</h2>
                <p class="mt-3">A planned launch sequence that converts awareness into founding members and long-term retention.</p>
                <a class="text-link mt-3" href="franchise.php">See franchise support <i class="bi bi-arrow-right"></i></a>
            </div>
            <div data-reveal data-reveal-delay="2">
                <div class="timeline">
                    <?php
                    $marketing = [
                        ['Pre-Launch', 'Teaser campaign, lead collection, local influencer outreach and a founding-member offer.'],
                        ['Opening Week', 'Grand opening, trials, transformation challenge and athlete activation where contracted.'],
                        ['Month 1–3', 'Referral campaign, member content, progress stories and local partnerships.'],
                        ['Ongoing', 'Social media, seasonal campaigns, events and retention communication.'],
                    ];
                    foreach ($marketing as $stage):
                    ?>
                        <div class="timeline__item">
                            <h3 class="timeline__title"><?= e($stage[0]) ?></h3>
                            <p class="timeline__text"><?= e($stage[1]) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================= OPERATING SYSTEM ============================= -->
<section class="section" id="operating-system">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">11 / Operating System</span>
            <h2 class="display-md mt-3">A Business That Runs On System</h2>
        </div>

        <div class="facility-grid" data-reveal>
            <?php
            $pillars = ['People', 'Sales', 'Service', 'Retention', 'Data', 'Standards'];
            foreach ($pillars as $i => $pillar):
            ?>
                <div class="facility">
                    <span class="facility__no"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <h3 class="facility__name"><?= e($pillar) ?></h3>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="tag-strip mt-4" data-reveal data-reveal-delay="2">
            <?php
            $flow = ['Lead', 'Follow-Up', 'Tour', 'Consultation', 'Membership', 'Onboarding'];
            foreach ($flow as $i => $step):
            ?>
                <span class="tag-chip"><?= e($step) ?><?= $i < count($flow) - 1 ? ' &rarr;' : '' ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================= LAUNCH ROADMAP ============================= -->
<section class="section section--dark" id="roadmap">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">12 / Launch Roadmap</span>
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

<!-- ============================= FRANCHISE PARTNER ============================= -->
<section class="section" id="partner">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">13 / Franchise Partner</span>
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

        <div class="text-center mt-5" data-reveal>
            <a class="btn btn-gold" href="contact.php">Start A Conversation <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ============================= FAQ ============================= -->
<section class="section section--dark" id="faq">
    <div class="container-raw">
        <div class="grid grid-2" style="gap: 3rem;">
            <div data-reveal>
                <span class="section-index">14 / FAQ</span>
                <h2 class="display-md mt-3">Questions,<br> Answered</h2>
                <p class="mt-3">Everything a prospective franchise partner needs to know before starting a conversation.</p>
                <a class="text-link mt-3" href="contact.php">Enquire now <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="faq-accordion accordion" id="faqAccordion" data-reveal data-reveal-delay="2">
                <?php foreach ($FAQ as $i => $faq): ?>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="faqHead<?= $i ?>">
                            <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faqBody<?= $i ?>"
                                    aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="faqBody<?= $i ?>">
                                <?= e($faq['q']) ?>
                            </button>
                        </h3>
                        <div id="faqBody<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>"
                             aria-labelledby="faqHead<?= $i ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body"><?= e($faq['a']) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================= FINAL CTA ============================= -->
<section class="final-cta" id="final-cta">
    <div class="container-raw">
        <p class="eyebrow eyebrow--plain justify-content-center">Franchise Enquiry</p>
        <h2 class="display-lg">Let's Build<br> Your Raw Fit</h2>
        <div class="final-cta__prices">
            <span>Prime &mdash; <strong><?= e($FORMATS['prime']['price']) ?></strong></span>
            <span>Luxury &mdash; <strong><?= e($FORMATS['luxury']['price']) ?></strong></span>
        </div>
        <p class="lead-lg mx-auto" style="max-width: 620px;">Share your city, property size and investment range.</p>
        <div class="btn-row mt-4">
            <a class="btn btn-gold" href="contact.php">Enquire Now <i class="bi bi-arrow-right"></i></a>
            <a class="btn btn-ghost" href="tel:<?= e(SITE_PHONE_RAW) ?>">Call Our Team</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
