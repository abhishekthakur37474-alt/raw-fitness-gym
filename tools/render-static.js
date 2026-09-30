/**
 * Static preview generator for RAW FIT GYM.
 *
 * The real project is PHP. This script renders the same markup to static HTML
 * (into /preview) so it can be viewed without a PHP runtime. It mirrors the
 * PHP templates 1:1 so the preview matches the deployed site.
 *
 * Run: node tools/render-static.js
 */

const fs = require('fs');
const path = require('path');

const ROOT = path.join(__dirname, '..');
const OUT = path.join(ROOT, 'preview');

const SITE = {
    name: 'RAW FIT GYM',
    tagline: 'Premium Fitness \u2022 Premium Experience \u2022 Scalable Business',
    motto: 'Life In Progress',
    phone: '+91 90000 00000',
    phoneRaw: '+919000000000',
    email: 'franchise@rawfitgym.com',
    whatsapp: '919000000000',
    location: 'India',
    instagram: 'https://instagram.com/',
    facebook: 'https://facebook.com/',
    youtube: 'https://youtube.com/',
    version: '1.0.0',
};

const NAV = [
    { label: 'Home', href: 'index.html', key: 'home' },
    { label: 'About', href: 'about.html', key: 'about' },
    { label: 'Formats', href: 'franchise.html', key: 'franchise' },
    { label: 'Experience', href: 'about.html#experience', key: 'experience' },
    { label: 'Support', href: 'franchise.html#support', key: 'support' },
    { label: 'FAQ', href: 'index.html#faq', key: 'faq' },
];

const FORMATS = {
    prime: {
        key: 'prime', name: 'RAW FIT PRIME', short: 'Prime',
        price: '\u20B91.80 Crore', area: '3,000 \u2013 4,000 SQ FT',
        summary: 'Premium compact format engineered for high-density catchments and disciplined operations.',
        facilities: [
            'Premium strength zone', 'Dedicated cardio zone', 'Functional training',
            'Reception & member service', 'Professional changing / washroom', 'Sauna bath',
            'Recovery-focused environment', 'Premium branding', 'Supplement support',
        ],
        href: 'prime.html',
    },
    luxury: {
        key: 'luxury', name: 'RAW FIT LUXURY', short: 'Luxury',
        price: '\u20B93.20 Crore', area: '6,000 \u2013 8,000 SQ FT',
        summary: 'Flagship-scale premium format designed as a full fitness destination and brand flagship.',
        facilities: [
            'Large strength floor', 'Expanded cardio', 'Functional training', 'Ice bath / cold plunge',
            'Enhanced recovery zone', 'Premium shower experience', 'Recovery lounge',
            'Mobility & stretching area', "Members' lounge", 'Pool table / recreation zone',
            'Content / transformation studio', 'Smart access', 'VIP / consultation room',
            'Dedicated retail display',
        ],
        href: 'luxury.html',
    },
};

const VALUES = [
    { no: '01', title: 'Premium', text: 'Build a recognizable premium club identity.' },
    { no: '02', title: 'Performance', text: 'Prioritize serious training and measurable progress.' },
    { no: '03', title: 'Community', text: 'Create a culture members want to be part of.' },
    { no: '04', title: 'System', text: 'Standardize the business without making every location identical.' },
    { no: '05', title: 'Scale', text: 'Create a model that can be replicated across markets.' },
];

const JOURNEY = [
    { no: '01', title: 'Discover', text: 'Digital, local and referral marketing.' },
    { no: '02', title: 'Visit', text: 'Premium reception and facility tour.' },
    { no: '03', title: 'Join', text: 'Clear plans, consultation and onboarding.' },
    { no: '04', title: 'Train', text: 'Equipment, coaching and progress support.' },
    { no: '05', title: 'Retain', text: 'Community, service, events and follow-up.' },
];

const REVENUE = [
    { title: 'Memberships', text: 'Recurring membership plans built on clear tiers and long-term retention.' },
    { title: 'Personal Training', text: 'Coached, outcome-driven training delivered by certified professionals.' },
    { title: 'Group Programs', text: 'Structured group formats that strengthen community and average revenue.' },
    { title: 'Retail', text: 'Supplement and merchandise support aligned with member goals.' },
    { title: 'Events', text: 'Challenges, activations and transformation events that drive engagement.' },
    { title: 'Partnerships', text: 'Local brand and corporate tie-ups that broaden reach and credibility.' },
];

const CRITERIA = [
    { no: '01', title: 'Visibility', text: 'Strong frontage and presence in a location members can find easily.' },
    { no: '02', title: 'Access', text: 'Convenient entry, parking and approach for daily footfall.' },
    { no: '03', title: 'Catchment', text: 'A dense, relevant residential and working population around the site.' },
    { no: '04', title: 'Structure', text: 'Clear height, load capacity and column-free usability for equipment.' },
    { no: '05', title: 'Services', text: 'Reliable power, water, drainage and ventilation provisions.' },
    { no: '06', title: 'Lease', text: 'Commercially sound terms with a long, secure tenure.' },
];

const SUPPORT_PRE = [
    'Brand identity & usage guidelines', 'Site evaluation', 'Format selection', 'Space planning',
    'Design direction', 'Equipment planning', 'Procurement coordination', 'Pre-opening checklist', 'Staffing framework',
];

const SUPPORT_OPS = [
    'Sales process', 'Membership scripts', 'Launch marketing', 'Digital / social assets',
    'Opening campaign', 'Operating standards', 'Review framework', 'Post-launch improvement support',
];

const ROADMAP = [
    { no: '01', title: 'Discover', text: 'Share your city, property and investment range with our team.' },
    { no: '02', title: 'Site', text: 'Site evaluation against visibility, access and catchment criteria.' },
    { no: '03', title: 'Plan', text: 'Format selection, space planning and design direction.' },
    { no: '04', title: 'Build', text: 'Civil, branding and fit-out execution to brand standards.' },
    { no: '05', title: 'Equip', text: 'Equipment planning, procurement and installation.' },
    { no: '06', title: 'Staff', text: 'Team structure, training and operating system rollout.' },
    { no: '07', title: 'Launch', text: 'Pre-launch marketing, opening campaign and go live.' },
];

const FAQ = [
    { q: 'What is the minimum space required?', a: 'RAW FIT PRIME is planned for 3,000 \u2013 4,000 SQ FT and RAW FIT LUXURY for 6,000 \u2013 8,000 SQ FT. Final requirements are confirmed after site measurement, structural review and equipment planning.' },
    { q: 'What is the investment?', a: 'The indicative franchise investment is \u20B91.80 Crore for RAW FIT PRIME and \u20B93.20 Crore for RAW FIT LUXURY. Figures are indicative and subject to final commercial agreement.' },
    { q: 'Can I use my own property?', a: 'Yes. A suitable owned property can be evaluated against our visibility, access, catchment, structure, services and lease criteria. If you do not have a property, our team can support the site evaluation process.' },
    { q: 'Is IFBB Pro Rahul included?', a: 'Any endorsement, ambassador, appearance schedule, image rights or commercial association is subject to a separate written agreement. No athlete involvement is guaranteed as part of the franchise.' },
    { q: 'How is the format chosen?', a: 'The format is selected based on your property, catchment profile and investment range. Our team evaluates the site and recommends PRIME or LUXURY accordingly.' },
    { q: 'What happens next?', a: 'Share your city, property size and investment range through the franchise enquiry form. Our team will connect with you to discuss suitability, the right format and the next steps.' },
];

const IMAGES = {
    hero: 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=2000&q=80',
    brand: 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?auto=format&fit=crop&w=1400&q=80',
    prime: 'https://images.unsplash.com/photo-1540497077202-7c8a3999166f?auto=format&fit=crop&w=1600&q=80',
    luxury: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=1600&q=80',
    athlete: 'https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?auto=format&fit=crop&w=2000&q=80',
    strength: 'https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=1200&q=80',
    cardio: 'https://images.unsplash.com/photo-1594381898411-846e7d193883?auto=format&fit=crop&w=1200&q=80',
    recovery: 'https://images.unsplash.com/photo-1584735935682-2f2b69dff9d2?auto=format&fit=crop&w=1200&q=80',
    equipment: 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=1600&q=80',
    cta: 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=2000&q=80',
};

const esc = (s) => String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
const bg = (key) => `background-image:url(${IMAGES[key]});`;
const pad2 = (n) => String(n).padStart(2, '0');

/* ------------------------------------------------------------------ head --- */
function page({ key, title, description, bodyClass = '', body, isHome = false, extraScript = '' }) {
    const navItems = NAV.map((item) => {
        const active = item.key === key;
        return `                                <li class="nav-item">
                                    <a class="nav-link${active ? ' active' : ''}" href="${item.href}"${active ? ' aria-current="page"' : ''}>${item.label}</a>
                                </li>`;
    }).join('\n');

    return `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#050505">
    <title>${esc(title)}</title>
    <meta name="description" content="${esc(description)}">
    <link rel="canonical" href="https://rawfitgym.com/${key}.html">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="${SITE.name}">
    <meta property="og:title" content="${esc(title)}">
    <meta property="og:description" content="${esc(description)}">
    <meta property="og:image" content="assets/images/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <link rel="apple-touch-icon" href="assets/images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@400;500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/css/style.css?v=${SITE.version}" rel="stylesheet">
    <noscript><style>[data-reveal]{opacity:1 !important;transform:none !important}</style></noscript>
</head>
<body class="${bodyClass}${isHome ? ' is-home' : ''}">

    <a class="skip-link" href="#main">Skip to content</a>

    <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

    <header class="site-header${isHome ? ' site-header--overlay' : ''}" id="siteHeader">
        <nav class="navbar navbar-expand-lg">
            <div class="container-raw">
                <a class="navbar-brand brand" href="index.html" aria-label="${SITE.name} home">
                    <img src="assets/images/logo.png" alt="${SITE.name} logo" class="brand__mark" width="52" height="52">
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
                        <button type="button" class="drawer-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav nav-links">
${navItems}
                            <li class="nav-item nav-cta-mobile d-lg-none">
                                <a class="btn btn-gold btn-block" href="contact.html">Enquire Now</a>
                            </li>
                        </ul>
                        <a class="btn btn-gold nav-cta d-none d-lg-inline-flex" href="contact.html">
                            Enquire Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
${body}
    </main>

    ${footer()}

    <a class="whatsapp-float" href="https://wa.me/${SITE.whatsapp}?text=${encodeURIComponent('Hi RAW FIT GYM, I am interested in your franchise opportunity. I would like to know more about the Prime and Luxury formats.')}" target="_blank" rel="noopener" aria-label="Chat with RAW FIT GYM on WhatsApp">
        <i class="bi bi-whatsapp" aria-hidden="true"></i>
        <span class="whatsapp-float__label">WhatsApp</span>
    </a>
    <button class="to-top" id="toTop" type="button" aria-label="Back to top"><i class="bi bi-arrow-up" aria-hidden="true"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js?v=${SITE.version}" defer></script>
${extraScript}
</body>
</html>
`;
}

/* ---------------------------------------------------------------- footer --- */
function footer() {
    return `<footer class="site-footer" id="siteFooter">
        <div class="container-raw">
            <div class="footer-top">
                <div class="footer-brand">
                    <img src="assets/images/logo.png" alt="${SITE.name} emblem" class="footer-brand__mark" width="72" height="72" loading="lazy">
                    <h2 class="footer-brand__name">${SITE.name}</h2>
                    <p class="footer-brand__tagline">${SITE.tagline}</p>
                </div>
                <nav class="footer-col" aria-label="Footer navigation">
                    <h3 class="footer-col__title">Explore</h3>
                    <ul class="footer-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="franchise.html">Formats</a></li>
                        <li><a href="about.html#experience">Experience</a></li>
                        <li><a href="franchise.html#support">Support</a></li>
                        <li><a href="index.html#faq">FAQ</a></li>
                        <li><a href="contact.html">Franchise Enquiry</a></li>
                    </ul>
                </nav>
                <div class="footer-col">
                    <h3 class="footer-col__title">Contact</h3>
                    <ul class="footer-links footer-links--contact">
                        <li><a href="tel:${SITE.phoneRaw}"><i class="bi bi-telephone"></i> ${SITE.phone}</a></li>
                        <li><a href="mailto:${SITE.email}"><i class="bi bi-envelope"></i> ${SITE.email}</a></li>
                        <li><span><i class="bi bi-geo-alt"></i> ${SITE.location}</span></li>
                    </ul>
                    <h3 class="footer-col__title footer-col__title--spaced">Follow</h3>
                    <ul class="footer-social">
                        <li><a href="${SITE.instagram}" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="${SITE.facebook}" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="${SITE.youtube}" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="footer-copy">&copy; ${new Date().getFullYear()} ${SITE.name}. All Rights Reserved.</p>
                <p class="footer-note">Franchise information is indicative and subject to final commercial agreement.</p>
            </div>
        </div>
    </footer>`;
}

/* ------------------------------------------------------ reusable blocks --- */
function eyebrow(text, plain = false) {
    return `<p class="eyebrow${plain ? ' eyebrow--plain' : ''}">${text}</p>`;
}

function journeyGrid() {
    return JOURNEY.map((s) => `                <article class="journey__step" data-reveal>
                    <div class="journey__no">${s.no}</div>
                    <h3 class="journey__title">${esc(s.title)}</h3>
                    <p class="journey__text">${esc(s.text)}</p>
                </article>`).join('\n');
}

function valuesList() {
    return VALUES.map((v) => `                <article class="value-row" data-reveal>
                    <span class="value-row__no">${v.no}</span>
                    <h3 class="value-row__title">${esc(v.title)}</h3>
                    <p class="value-row__text">${esc(v.text)}</p>
                </article>`).join('\n');
}

function revenueGrid() {
    return REVENUE.map((r) => `                <article class="revenue-item" data-reveal>
                    <h3 class="revenue-item__title">${esc(r.title)}</h3>
                    <p class="revenue-item__text">${esc(r.text)}</p>
                </article>`).join('\n');
}

function requirementGrid() {
    const reqs = [
        ['01', 'Capital', 'Understands the full investment requirement and maintains adequate working capital.'],
        ['02', 'Property', 'Has or can secure a suitable property.'],
        ['03', 'Execution', 'Ready to build a sales team, maintain standards and participate in local marketing.'],
    ];
    return reqs.map((r) => `                <article class="require-item" data-reveal>
                    <span class="require-item__no">${r[0]}</span>
                    <h3 class="require-item__title">${esc(r[1])}</h3>
                    <p class="require-item__text">${esc(r[2])}</p>
                </article>`).join('\n');
}

function roadmapGrid() {
    return ROADMAP.map((s) => `                <article class="roadmap__step" data-reveal>
                    <span class="roadmap__no">${s.no}</span>
                    <h3 class="roadmap__title">${esc(s.title)}</h3>
                    <p class="roadmap__text">${esc(s.text)}</p>
                </article>`).join('\n');
}

function faqAccordion() {
    return FAQ.map((f, i) => `                    <div class="accordion-item">
                        <h3 class="accordion-header" id="faqHead${i}">
                            <button class="accordion-button${i === 0 ? '' : ' collapsed'}" type="button" data-bs-toggle="collapse" data-bs-target="#faqBody${i}" aria-expanded="${i === 0}" aria-controls="faqBody${i}">${esc(f.q)}</button>
                        </h3>
                        <div id="faqBody${i}" class="accordion-collapse collapse${i === 0 ? ' show' : ''}" aria-labelledby="faqHead${i}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">${esc(f.a)}</div>
                        </div>
                    </div>`).join('\n');
}

function formatPanels(index = 'h2', cta = 'link') {
    return Object.values(FORMATS).map((f) => {
        const btn = cta === 'button'
            ? `<a class="btn btn-gold" href="${f.href}">Explore ${f.short} <i class="bi bi-arrow-right"></i></a>`
            : `<a class="text-link" href="${f.href}">Explore ${f.short} <i class="bi bi-arrow-right"></i></a>`;
        return `                <article class="format-panel" data-reveal>
                    <div class="format-panel__media" style="${bg(f.key)}" aria-hidden="true"></div>
                    <div class="format-panel__veil" aria-hidden="true"></div>
                    <div class="format-panel__body">
                        <${index} class="format-panel__name">${index === 'h2' ? esc(f.name) : esc(f.short)}</${index}>
                        <div class="format-panel__meta">
                            <span><i class="bi bi-currency-rupee"></i> ${f.price}</span>
                            <span><i class="bi bi-rulers"></i> ${f.area}</span>
                        </div>
                        <p class="format-panel__text">${esc(f.summary)}</p>
                        ${btn}
                    </div>
                </article>`;
    }).join('\n');
}

function athleteSection(sectionIndex) {
    return `<section class="athlete">
    <div class="athlete__media" style="${bg('athlete')}" aria-hidden="true"></div>
    <div class="athlete__veil" aria-hidden="true"></div>
    <div class="container-raw">
        <div class="athlete__content">
            ${eyebrow(sectionIndex)}
            <h2 class="athlete__title">The Face Of Performance</h2>
            <p class="athlete__name">IFBB Pro Rahul</p>
            <p class="lead-lg">RAW FIT GYM is associated with IFBB Pro athlete culture where contracted, including bodybuilding and fitness work, potential grand-opening appearances, member workout sessions, meet &amp; greets, content collaboration and transformation events.</p>
            <p class="disclaimer mb-0">Any endorsement, ambassador, appearance schedule, image rights or commercial association is subject to a separate written agreement.</p>
        </div>
    </div>
</section>`;
}

/* ----------------------------------------------------------------- pages --- */
function indexPage() {
    const body = `<!-- HERO -->
<section class="hero" aria-label="RAW FIT GYM franchise introduction">
    <div class="hero__media" style="${bg('hero')}" aria-hidden="true"></div>
    <div class="hero__veil" aria-hidden="true"></div>
    <div class="container-raw">
        <div class="hero__content">
            ${eyebrow('Premium Fitness &bull; Premium Experience')}
            <h1 class="hero__title display-hero">Build The Next<br><span class="accent">Raw Fit Gym</span></h1>
            <p class="hero__text lead-lg">A premium fitness franchise built around performance, experience and scalable operations.</p>
            <div class="btn-row">
                <a class="btn btn-gold" href="franchise.html">Explore Franchise <i class="bi bi-arrow-right"></i></a>
                <a class="btn btn-ghost" href="contact.html">Talk To Our Team</a>
            </div>
            <div class="hero__rail">
                <span>Raw Fit <span class="dot">/</span> ${SITE.motto}</span>
                <span>Prime <span class="dot">/</span> Luxury</span>
                <span class="scroll-cue">Scroll <i class="bi bi-arrow-down"></i></span>
            </div>
        </div>
    </div>
</section>

<!-- TICKER -->
<section class="ticker" aria-hidden="true">
    <div class="ticker__track">
${['Raw Fit Gym', 'Prime', 'Luxury', 'Performance', 'Recovery', 'Membership'].concat(['Raw Fit Gym', 'Prime', 'Luxury', 'Performance', 'Recovery', 'Membership']).map((t) => `        <span class="ticker__item${['Prime', 'Luxury'].includes(t) ? ' ticker__item--accent' : ''}">${esc(t)}</span>`).join('\n')}
    </div>
</section>

<!-- BRAND INTRO -->
<section class="section" id="brand">
    <div class="container-raw">
        <div class="split">
            <div class="split__body" data-reveal>
                <span class="section-index">01 / The Brand</span>
                <h2 class="display-lg mt-3">More Than A Gym.<br> A Fitness Destination.</h2>
                <hr class="gold-rule">
                <p class="lead-lg">RAW FIT GYM combines a premium black-and-gold identity with professional training zones, premium equipment planning and a structured member journey.</p>
                <ul class="check-list">
                    <li>Premium visual identity</li>
                    <li>Training-first environment</li>
                    <li>Defined strength &amp; cardio zones</li>
                    <li>Consistent member experience</li>
                    <li>Community, transformation and long-term retention</li>
                </ul>
                <div class="btn-row mt-4"><a class="text-link" href="about.html">Discover the brand <i class="bi bi-arrow-right"></i></a></div>
            </div>
            <div class="split__media media-frame media-frame--offset" data-reveal data-reveal-delay="2">
                <img src="${IMAGES.brand}" alt="Premium training floor inside a RAW FIT GYM club" loading="lazy" width="900" height="1125">
                <span class="media-frame__tag">${SITE.motto}</span>
            </div>
        </div>
    </div>
</section>

<!-- STATS -->
<section class="section section--tight" aria-label="Raw Fit at a glance">
    <div class="container-raw">
        <div class="stats">
            <div class="stats__item"><div class="stats__value">02</div><div class="stats__label">Premium Formats</div></div>
            <div class="stats__item"><div class="stats__value">06</div><div class="stats__label">Revenue Streams</div></div>
            <div class="stats__item"><div class="stats__value">07</div><div class="stats__label">Launch Steps</div></div>
            <div class="stats__item"><div class="stats__value">06</div><div class="stats__label">Site Criteria</div></div>
        </div>
    </div>
</section>

<!-- VALUES -->
<section class="section section--dark section--hairline" id="values">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">02 / What Defines Us</span>
            <h2 class="display-md mt-3">The Standard Behind Every Club</h2>
        </div>
        <div class="values-list">
${valuesList()}
        </div>
    </div>
</section>

<!-- FORMATS -->
<section class="section" id="formats">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">03 / Franchise Formats</span>
            <h2 class="display-lg mt-3">Choose Your Format</h2>
            <p class="mt-3">Two premium formats engineered for different markets, both built on the same operating standard.</p>
        </div>
        <div class="grid grid-2">
${formatPanels('h3', 'link')}
        </div>
    </div>
</section>

<!-- CRITERIA -->
<section class="section section--dark" id="criteria">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">04 / Property &amp; Site</span>
            <h2 class="display-md mt-3">The Right Property<br> Builds The Right Club</h2>
        </div>
        <div class="criteria-list">
${CRITERIA.map((c) => `                <article class="criteria-item" data-reveal>
                    <div class="criteria-item__no">${c.no}</div>
                    <h3 class="criteria-item__title">${esc(c.title)}</h3>
                    <p class="criteria-item__text">${esc(c.text)}</p>
                </article>`).join('\n')}
        </div>
    </div>
</section>

<!-- PLANNING -->
<section class="section" id="planning">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">05 / Club Space Planning</span>
            <h2 class="display-md mt-3">A Floor Designed Around Movement</h2>
        </div>
        <div class="plan-board" data-reveal>
            <div class="plan-grid">
${['Reception', 'Strength', 'Cardio', 'Functional', 'PT / Coaching', 'Support'].map((z, i) => `                <div class="plan-cell">
                    <span class="plan-cell__label">Zone ${pad2(i + 1)}</span>
                    <h3 class="plan-cell__title">${esc(z)}</h3>
                </div>`).join('\n')}
            </div>
            <div class="plan-note">
                <h3 class="plan-note__title">Planning The Flow</h3>
                <p>Every club is planned around sightlines, member movement and equipment clearances so the space feels premium and performs commercially.</p>
                <p class="disclaimer mb-0">Final layout is created only after site measurement, structural review and equipment planning.</p>
            </div>
        </div>
    </div>
</section>

<!-- EQUIPMENT -->
<section class="section section--charcoal" id="equipment">
    <div class="container-raw">
        <div class="split split--reverse">
            <div class="split__media media-frame media-frame--wide" data-reveal>
                <img src="${IMAGES.equipment}" alt="Modern strength equipment in a premium gym" loading="lazy" width="1200" height="825">
                <span class="media-frame__tag">Built For Performance</span>
            </div>
            <div class="split__body" data-reveal data-reveal-delay="2">
                <span class="section-index">06 / Equipment &amp; Training</span>
                <h2 class="display-md mt-3">Built For Performance</h2>
                <hr class="gold-rule">
                <p class="lead-lg">Strength, free weights, cardio and functional training are planned as dedicated zones, supported by a structured member journey.</p>
                <div class="tag-strip mt-4">
${['Consistent finishes', 'Integrated branding', 'Organized equipment', 'Quality flooring', 'Professional lighting', 'Clean sightlines'].map((t) => `                    <span class="tag-chip">${esc(t)}</span>`).join('\n')}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EXPERIENCE -->
<section class="section" id="experience">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">07 / Member Experience</span>
            <h2 class="display-md mt-3">The Member Journey</h2>
            <p class="mt-3">A structured path from first contact to long-term retention.</p>
        </div>
        <div class="journey">
${journeyGrid()}
        </div>
    </div>
</section>

<!-- REVENUE -->
<section class="section section--dark" id="revenue">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">08 / Revenue Model</span>
            <h2 class="display-md mt-3">Diversified By Design</h2>
        </div>
        <div class="revenue-grid">
${revenueGrid()}
        </div>
    </div>
</section>

${athleteSection('09 / Performance')}

<!-- MARKETING -->
<section class="section section--dark" id="marketing">
    <div class="container-raw">
        <div class="split">
            <div class="split__body" data-reveal>
                <span class="section-index">10 / Marketing &amp; Grand Opening</span>
                <h2 class="display-md mt-3">From Build-Up To Momentum</h2>
                <p class="mt-3">A planned launch sequence that converts awareness into founding members and long-term retention.</p>
                <a class="text-link mt-3" href="franchise.html">See franchise support <i class="bi bi-arrow-right"></i></a>
            </div>
            <div data-reveal data-reveal-delay="2">
                <div class="timeline">
${[['Pre-Launch', 'Teaser campaign, lead collection, local influencer outreach and a founding-member offer.'], ['Opening Week', 'Grand opening, trials, transformation challenge and athlete activation where contracted.'], ['Month 1\u20133', 'Referral campaign, member content, progress stories and local partnerships.'], ['Ongoing', 'Social media, seasonal campaigns, events and retention communication.']].map((s) => `                    <div class="timeline__item">
                        <h3 class="timeline__title">${esc(s[0])}</h3>
                        <p class="timeline__text">${esc(s[1])}</p>
                    </div>`).join('\n')}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OPERATING SYSTEM -->
<section class="section" id="operating-system">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">11 / Operating System</span>
            <h2 class="display-md mt-3">A Business That Runs On System</h2>
        </div>
        <div class="facility-grid" data-reveal>
${['People', 'Sales', 'Service', 'Retention', 'Data', 'Standards'].map((p, i) => `            <div class="facility">
                <span class="facility__no">${pad2(i + 1)}</span>
                <h3 class="facility__name">${esc(p)}</h3>
            </div>`).join('\n')}
        </div>
        <div class="tag-strip mt-4" data-reveal data-reveal-delay="2">
${['Lead', 'Follow-Up', 'Tour', 'Consultation', 'Membership', 'Onboarding'].map((s, i, a) => `            <span class="tag-chip">${esc(s)}${i < a.length - 1 ? ' &rarr;' : ''}</span>`).join('\n')}
        </div>
    </div>
</section>

<!-- ROADMAP -->
<section class="section section--dark" id="roadmap">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">12 / Launch Roadmap</span>
            <h2 class="display-md mt-3">Seven Steps To Opening Day</h2>
        </div>
        <div class="roadmap">
${roadmapGrid()}
        </div>
    </div>
</section>

<!-- PARTNER -->
<section class="section" id="partner">
    <div class="container-raw">
        <div class="section-head section-head--center">
            <span class="section-index">13 / Franchise Partner</span>
            <h2 class="display-lg mt-3">Is Raw Fit Right For You?</h2>
        </div>
        <div class="require-grid">
${requirementGrid()}
        </div>
        <div class="text-center mt-5" data-reveal><a class="btn btn-gold" href="contact.html">Start A Conversation <i class="bi bi-arrow-right"></i></a></div>
    </div>
</section>

<!-- FAQ -->
<section class="section section--dark" id="faq">
    <div class="container-raw">
        <div class="grid grid-2" style="gap: 3rem;">
            <div data-reveal>
                <span class="section-index">14 / FAQ</span>
                <h2 class="display-md mt-3">Questions,<br> Answered</h2>
                <p class="mt-3">Everything a prospective franchise partner needs to know before starting a conversation.</p>
                <a class="text-link mt-3" href="contact.html">Enquire now <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="faq-accordion accordion" id="faqAccordion" data-reveal data-reveal-delay="2">
${faqAccordion()}
            </div>
        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section class="final-cta" id="final-cta">
    <div class="container-raw">
        ${eyebrow('Franchise Enquiry', true)}
        <h2 class="display-lg">Let's Build<br> Your Raw Fit</h2>
        <div class="final-cta__prices">
            <span>Prime &mdash; <strong>${FORMATS.prime.price}</strong></span>
            <span>Luxury &mdash; <strong>${FORMATS.luxury.price}</strong></span>
        </div>
        <p class="lead-lg mx-auto" style="max-width: 620px;">Share your city, property size and investment range.</p>
        <div class="btn-row mt-4">
            <a class="btn btn-gold" href="contact.html">Enquire Now <i class="bi bi-arrow-right"></i></a>
            <a class="btn btn-ghost" href="tel:${SITE.phoneRaw}">Call Our Team</a>
        </div>
    </div>
</section>`;

    return page({
        key: 'home', isHome: true, bodyClass: 'page-home',
        title: 'RAW FIT GYM | Premium Gym Franchise',
        description: 'Explore RAW FIT GYM premium gym franchise opportunities with PRIME and LUXURY formats designed for premium fitness experiences and scalable business operations.',
        body,
    });
}

function aboutPage() {
    const body = `<section class="page-banner">
    <div class="container-raw">
        ${eyebrow('The Brand')}
        <h1 class="page-banner__title display-lg">More Than A Gym.<br> A Fitness Destination.</h1>
        <p class="page-banner__text">RAW FIT GYM combines a premium black-and-gold identity with professional training zones, premium equipment planning and a structured member journey.</p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb"><a href="index.html">Home</a><span class="sep">/</span><span>About</span></nav>
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
                <img src="${IMAGES.brand}" alt="RAW FIT GYM premium training environment" loading="lazy" width="900" height="1125">
                <span class="media-frame__tag">${SITE.motto}</span>
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
${valuesList()}
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
${journeyGrid()}
        </div>
    </div>
</section>

<section class="section section--charcoal" id="equipment">
    <div class="container-raw">
        <div class="split split--reverse">
            <div class="split__media media-frame media-frame--wide" data-reveal>
                <img src="${IMAGES.strength}" alt="Strength training zone" loading="lazy" width="1200" height="825">
                <span class="media-frame__tag">Training Zones</span>
            </div>
            <div class="split__body" data-reveal data-reveal-delay="2">
                <span class="section-index">04 / Equipment &amp; Training</span>
                <h2 class="display-md mt-3">Built For Performance</h2>
                <hr class="gold-rule">
                <p class="lead-lg">Strength, free weights, cardio and functional training are planned as dedicated zones, supported by a structured member journey.</p>
                <div class="tag-strip mt-4">
${['Consistent finishes', 'Integrated branding', 'Organized equipment', 'Quality flooring', 'Professional lighting', 'Clean sightlines'].map((t) => `                    <span class="tag-chip">${esc(t)}</span>`).join('\n')}
                </div>
            </div>
        </div>
    </div>
</section>

${athleteSection('05 / Performance')}

<section class="section" id="revenue">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">06 / Revenue Model</span>
            <h2 class="display-md mt-3">Diversified By Design</h2>
        </div>
        <div class="revenue-grid">
${revenueGrid()}
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container-raw">
        ${eyebrow('Franchise Enquiry', true)}
        <h2 class="display-lg">Build A Club<br> That Performs</h2>
        <div class="btn-row mt-4">
            <a class="btn btn-gold" href="franchise.html">View Formats <i class="bi bi-arrow-right"></i></a>
            <a class="btn btn-ghost" href="contact.html">Talk To Our Team</a>
        </div>
    </div>
</section>`;

    return page({
        key: 'about', bodyClass: 'page-about',
        title: 'About RAW FIT GYM | Premium Fitness Brand',
        description: 'RAW FIT GYM is a premium fitness brand built on a black-and-gold identity, professional training zones and a structured, scalable member journey.',
        body,
    });
}

function franchisePage() {
    const detail = Object.values(FORMATS).map((f) => `            <div data-reveal>
                <span class="section-index">${f.short.toUpperCase()} Format</span>
                <h2 class="display-sm mt-3">${esc(f.name)}</h2>
                <div class="spec-bar">
                    <div class="spec-bar__item"><span class="spec-bar__label">Investment</span><span class="spec-bar__value">${f.price}</span></div>
                    <div class="spec-bar__item"><span class="spec-bar__label">Area</span><span class="spec-bar__value">${f.area}</span></div>
                    <div class="spec-bar__item"><span class="spec-bar__label">Zones</span><span class="spec-bar__value" data-counter="${f.facilities.length}">${f.facilities.length}</span></div>
                </div>
                <ul class="check-list mt-4">
${f.facilities.slice(0, 6).map((x) => `                    <li>${esc(x)}</li>`).join('\n')}
                </ul>
                <a class="text-link mt-4" href="${f.href}">Full ${f.short} details <i class="bi bi-arrow-right"></i></a>
            </div>`).join('\n');

    const timeline = (title, lead, items) => `            <div class="timeline" data-reveal>
                <div class="timeline__item">
                    <h3 class="timeline__title">${esc(title)}</h3>
                    <p class="timeline__text">${esc(lead)}</p>
                </div>
${items.map((i) => `                <div class="timeline__item"><p class="timeline__text mb-0">${esc(i)}</p></div>`).join('\n')}
            </div>`;

    const body = `<section class="page-banner">
    <div class="container-raw">
        ${eyebrow('Franchise')}
        <h1 class="page-banner__title display-lg">Choose Your Format</h1>
        <p class="page-banner__text">Two premium formats engineered for different markets, both built on the same operating standard.</p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb"><a href="index.html">Home</a><span class="sep">/</span><span>Formats</span></nav>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="grid grid-2">
${formatPanels('h2', 'button')}
        </div>
    </div>
</section>

<section class="section section--dark" id="formats-detail">
    <div class="container-raw">
        <div class="grid grid-2" style="gap: 3rem;">
${detail}
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
${timeline('Pre-Opening Support', 'Foundations for a club that launches to standard.', SUPPORT_PRE)}
${timeline('Operations & Growth', 'Systems that keep the club performing after launch.', SUPPORT_OPS)}
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
${roadmapGrid()}
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
${requirementGrid()}
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container-raw">
        ${eyebrow('Franchise Enquiry', true)}
        <h2 class="display-lg">Start A<br> Conversation</h2>
        <div class="final-cta__prices">
            <span>Prime &mdash; <strong>${FORMATS.prime.price}</strong></span>
            <span>Luxury &mdash; <strong>${FORMATS.luxury.price}</strong></span>
        </div>
        <div class="btn-row"><a class="btn btn-gold" href="contact.html">Enquire Now <i class="bi bi-arrow-right"></i></a></div>
    </div>
</section>`;

    return page({
        key: 'franchise', bodyClass: 'page-franchise',
        title: 'Franchise Formats | RAW FIT GYM PRIME & LUXURY',
        description: 'Compare RAW FIT GYM franchise formats: PRIME from \u20B91.80 Crore (3,000\u20134,000 SQ FT) and LUXURY from \u20B93.20 Crore (6,000\u20138,000 SQ FT).',
        body,
    });
}

function formatPage(key) {
    const f = FORMATS[key];
    const isFlagship = key === 'luxury';
    const zoneImg = isFlagship ? 'recovery' : 'cardio';
    const body = `<section class="page-banner">
    <div class="container-raw">
        ${eyebrow(`${f.short} Format${isFlagship ? ' &bull; Flagship' : ''}`)}
        <h1 class="page-banner__title display-lg">${esc(f.name)}</h1>
        <p class="page-banner__text">${esc(f.summary)}</p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb"><a href="index.html">Home</a><span class="sep">/</span><a href="franchise.html">Formats</a><span class="sep">/</span><span>${f.short}</span></nav>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="split">
            <div class="split__body" data-reveal>
                <span class="section-index">${isFlagship ? 'The Flagship Experience' : 'Premium Compact Format'}</span>
                <h2 class="display-md mt-3">${esc(f.name)}</h2>
                <hr class="gold-rule">
                <p class="lead-lg">${esc(f.summary)}</p>
                <p>${isFlagship ? 'RAW FIT LUXURY is the flagship-scale format: a full fitness destination that pairs an expanded training floor with recovery, lounge and recreation zones for a complete premium experience.' : 'RAW FIT PRIME is a premium compact format designed for high-density catchments, with every essential zone planned to premium standard and disciplined operations.'}</p>
                <div class="spec-bar">
                    <div class="spec-bar__item"><span class="spec-bar__label">Investment</span><span class="spec-bar__value">${f.price}</span></div>
                    <div class="spec-bar__item"><span class="spec-bar__label">Area</span><span class="spec-bar__value">${f.area}</span></div>
                    <div class="spec-bar__item"><span class="spec-bar__label">Facilities</span><span class="spec-bar__value" data-counter="${f.facilities.length}">${f.facilities.length}</span></div>
                </div>
            </div>
            <div class="split__media media-frame" data-reveal data-reveal-delay="2">
                <img src="${IMAGES[key]}" alt="${esc(f.name)} club interior" loading="lazy" width="900" height="1125">
                <span class="media-frame__tag">${f.short} &bull; ${f.area}</span>
            </div>
        </div>
    </div>
</section>

<section class="section section--dark section--hairline">
    <div class="container-raw">
        <div class="section-head">
            <span class="section-index">${isFlagship ? 'Flagship Facilities' : 'Included Facilities'}</span>
            <h2 class="display-md mt-3">Every Zone, Planned</h2>
        </div>
        <div class="facility-grid" data-reveal>
${f.facilities.map((x, i) => `            <div class="facility">
                <span class="facility__no">${pad2(i + 1)}</span>
                <h3 class="facility__name">${esc(x)}</h3>
            </div>`).join('\n')}
        </div>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="split split--reverse">
            <div class="split__media media-frame media-frame--wide" data-reveal>
                <img src="${IMAGES[zoneImg]}" alt="${esc(f.name)} training zone" loading="lazy" width="1200" height="825">
                <span class="media-frame__tag">${isFlagship ? 'Recovery &amp; Lounge' : 'Strength &amp; Cardio'}</span>
            </div>
            <div class="split__body" data-reveal data-reveal-delay="2">
                <span class="section-index">Space Planning</span>
                <h2 class="display-md mt-3">Planned Around The Member</h2>
                <hr class="gold-rule">
                <p>Each zone is planned for clear sightlines, safe clearances and easy member movement, so the club feels premium from the entrance to the last rep.</p>
                <p class="disclaimer mb-0">Final layout is created only after site measurement, structural review and equipment planning.</p>
                <div class="btn-row mt-4">
                    <a class="btn btn-gold" href="contact.html">Request Franchise Details <i class="bi bi-arrow-right"></i></a>
                    <a class="btn btn-ghost" href="franchise.html">Compare Formats</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container-raw">
        ${eyebrow(`${f.short} Enquiry`, true)}
        <h2 class="display-lg">Build ${esc(f.name)}</h2>
        <div class="final-cta__prices">
            <span>Investment &mdash; <strong>${f.price}</strong></span>
            <span>Area &mdash; <strong>${f.area}</strong></span>
        </div>
        <div class="btn-row">
            <a class="btn btn-gold" href="contact.html">Enquire Now <i class="bi bi-arrow-right"></i></a>
            <a class="btn btn-ghost" href="tel:${SITE.phoneRaw}">Call Our Team</a>
        </div>
    </div>
</section>`;

    return page({
        key: 'franchise', bodyClass: `page-format page-format--${key}`,
        title: `${f.name} | RAW FIT GYM Franchise Format`,
        description: `${f.name} franchise format \u2014 ${f.price}, ${f.area}. ${f.summary}`,
        body,
    });
}

function contactPage() {
    const fields = [
        { id: 'full_name', label: 'Full Name', type: 'text', req: true, extra: 'autocomplete="name" minlength="2"' },
        { id: 'phone', label: 'Phone Number', type: 'tel', req: true, extra: 'autocomplete="tel" pattern="[0-9+\\-\\s()]{7,18}"' },
        { id: 'email', label: 'Email', type: 'email', req: true, extra: 'autocomplete="email"' },
        { id: 'city', label: 'City', type: 'text', req: true, extra: 'autocomplete="address-level2"' },
        { id: 'state', label: 'State', type: 'text', req: true, extra: 'autocomplete="address-level1"' },
        { id: 'property_size', label: 'Property Size', type: 'text', req: false, extra: 'placeholder="e.g. 3,500 SQ FT"' },
    ];

    const fieldHtml = fields.map((f) => `                        <div class="form-field">
                            <label class="form-label" for="${f.id}">${f.label}${f.req ? ' <span class="req">*</span>' : ''}</label>
                            <input class="form-control" type="${f.type}" id="${f.id}" name="${f.id}"${f.req ? ' required' : ''} ${f.extra}>
                            <span class="field-error" aria-live="polite"></span>
                        </div>`).join('\n');

    const radios = ['Yes', 'No'].map((o) => `                                    <label class="radio-pill"><input type="radio" name="property_available" value="${o}" required><span>${o}</span></label>`).join('\n');
    const formats = ['Prime', 'Luxury', 'Not Sure'].map((o) => `                                    <label class="radio-pill"><input type="radio" name="preferred_format" value="${o}" required><span>${o}</span></label>`).join('\n');
    const ranges = ['\u20B91.80 Cr (Prime)', '\u20B93.20 Cr (Luxury)', 'Above \u20B93.20 Cr', 'Not sure yet'].map((r) => `                                    <option>${r}</option>`).join('\n');

    const success = `<div class="form-success" role="status">
                    <div class="form-success__icon"><i class="bi bi-check-lg" aria-hidden="true"></i></div>
                    <h2 class="display-sm">Request Received</h2>
                    <p class="lead-lg mx-auto" style="max-width: 560px;">Thank you for your interest in RAW FIT GYM. Our franchise team will review your details and connect with you shortly.</p>
                    <div class="btn-row mt-4 justify-content-center">
                        <a class="btn btn-gold" href="franchise.html">Explore Formats</a>
                        <a class="btn btn-ghost" href="index.html">Back To Home</a>
                    </div>
                </div>`;

    const body = `<section class="page-banner">
    <div class="container-raw">
        ${eyebrow('Franchise Enquiry')}
        <h1 class="page-banner__title display-lg">Let's Build<br> Your Raw Fit</h1>
        <p class="page-banner__text">Share your city, property size and investment range. Our team will connect with you to discuss the right format and next steps.</p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb"><a href="index.html">Home</a><span class="sep">/</span><span>Franchise Enquiry</span></nav>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="grid grid-3 mb-5">
            <div class="contact-card" data-reveal><i class="bi bi-telephone contact-card__icon" aria-hidden="true"></i><p class="contact-card__title">Call</p><p class="contact-card__value"><a href="tel:${SITE.phoneRaw}">${SITE.phone}</a></p></div>
            <div class="contact-card" data-reveal data-reveal-delay="1"><i class="bi bi-envelope contact-card__icon" aria-hidden="true"></i><p class="contact-card__title">Email</p><p class="contact-card__value"><a href="mailto:${SITE.email}">${SITE.email}</a></p></div>
            <div class="contact-card" data-reveal data-reveal-delay="2"><i class="bi bi-geo-alt contact-card__icon" aria-hidden="true"></i><p class="contact-card__title">Location</p><p class="contact-card__value">${SITE.location}</p></div>
        </div>

        <div class="form-panel" data-reveal>
            <div class="section-head mb-4">
                <span class="section-index">Request Franchise Details</span>
                <h2 class="display-sm mt-3">Tell Us About Your Project</h2>
            </div>
            <form id="enquiryForm" action="#" method="post" novalidate>
                <div class="form-grid">
${fieldHtml}
                    <div class="form-field">
                        <span class="form-label">Property Available? <span class="req">*</span></span>
                        <div class="radio-row">
${radios}
                        </div>
                        <span class="field-error" aria-live="polite"></span>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="investment_range">Investment Range <span class="req">*</span></label>
                        <select class="form-select" id="investment_range" name="investment_range" required>
                            <option value="">Select range</option>
${ranges}
                        </select>
                        <span class="field-error" aria-live="polite"></span>
                    </div>
                    <div class="form-field form-field--full">
                        <span class="form-label">Preferred Format <span class="req">*</span></span>
                        <div class="radio-row">
${formats}
                        </div>
                        <span class="field-error" aria-live="polite"></span>
                    </div>
                    <div class="form-field form-field--full">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" maxlength="1500" placeholder="Tell us about your city, property and timeline."></textarea>
                        <span class="field-error" aria-live="polite"></span>
                    </div>
                </div>
                <div class="btn-row mt-4">
                    <button class="btn btn-gold" type="submit">Request Franchise Details <i class="bi bi-arrow-right"></i></button>
                </div>
                <p class="mt-3 mb-0" style="font-size: 0.85rem;">By submitting, you agree to be contacted by the RAW FIT GYM franchise team. Franchise information is indicative and subject to final commercial agreement.</p>
            </form>
        </div>
    </div>
</section>`;

    const extraScript = `    <script>
    /* Static preview: show the success panel instead of posting to PHP. */
    (function () {
        var form = document.getElementById('enquiryForm');
        if (!form) { return; }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (form.checkValidity()) {
                form.closest('.form-panel').innerHTML = ${JSON.stringify(success)};
                window.scrollTo({ top: form.closest('.form-panel').getBoundingClientRect().top + window.scrollY - 120 });
            }
        });
    })();
    </script>`;

    return page({
        key: 'contact', bodyClass: 'page-contact',
        title: 'Franchise Enquiry | RAW FIT GYM',
        description: 'Request RAW FIT GYM franchise details. Share your city, property size and investment range to explore the PRIME and LUXURY formats.',
        body, extraScript,
    });
}

/* ------------------------------------------------------------------ run --- */
fs.mkdirSync(OUT, { recursive: true });

const pages = {
    'index.html': indexPage(),
    'about.html': aboutPage(),
    'franchise.html': franchisePage(),
    'prime.html': formatPage('prime'),
    'luxury.html': formatPage('luxury'),
    'contact.html': contactPage(),
};

Object.entries(pages).forEach(([file, html]) => {
    fs.writeFileSync(path.join(OUT, file), html, 'utf8');
});

console.log('Static preview written to preview/ :');
console.log(Object.keys(pages).map((f) => '  - ' + f).join('\n'));
