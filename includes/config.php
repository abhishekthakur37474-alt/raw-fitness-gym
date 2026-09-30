<?php
/**
 * RAW FIT GYM — Global configuration & shared data
 *
 * Central place for site constants, navigation and reusable content blocks.
 * Keeping content here lets pages stay declarative and avoids duplicated markup.
 */

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ---------------------------------------------------------------------------
 * Site identity
 * ------------------------------------------------------------------------- */
define('SITE_NAME', 'RAW FIT GYM');
define('SITE_TAGLINE', 'Premium Fitness • Premium Experience • Scalable Business');
define('SITE_MOTTO', 'Life In Progress');

/* Replace these placeholders with the real franchise contact details. */
define('SITE_PHONE', '+91 90000 00000');
define('SITE_PHONE_RAW', '+919000000000');
define('SITE_EMAIL', 'franchise@rawfitgym.com');
define('SITE_WHATSAPP', '919000000000');
define('SITE_LOCATION', 'India');

define('SITE_INSTAGRAM', 'https://instagram.com/');
define('SITE_FACEBOOK', 'https://facebook.com/');
define('SITE_YOUTUBE', 'https://youtube.com/');

define('ASSET_VERSION', '1.0.0');

/**
 * Multibyte-safe string length with a graceful fallback.
 */
function str_length(string $value): int
{
    return function_exists('mb_strlen') ? mb_strlen($value) : strlen($value);
}

/**
 * Build an internal URL relative to the project root.
 */
function url(string $path = ''): string
{
    return $path === '' ? 'index.php' : $path;
}

/**
 * Absolute URL for the current request path (used for canonical links).
 */
function canonical_url(): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
    return $scheme . '://' . $host . $path;
}

/**
 * Escape a value for safe HTML output.
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/**
 * Persistent CSRF token for the enquiry form.
 */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Pop a one-time session value (flash data).
 *
 * @param mixed $default
 * @return mixed
 */
function flash(string $key, $default = null)
{
    if (!isset($_SESSION['flash'][$key])) {
        return $default;
    }
    $value = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return $value;
}

/* ---------------------------------------------------------------------------
 * Imagery
 *
 * Central image map. These point at cinematic fitness photography during
 * development. To ship production assets, drop files into assets/images/ and
 * replace the value with a relative path, e.g. 'assets/images/hero.jpg'.
 * ------------------------------------------------------------------------- */
$IMAGES = [
    'hero'        => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=2000&q=80',
    'brand'       => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?auto=format&fit=crop&w=1400&q=80',
    'prime'       => 'https://images.unsplash.com/photo-1540497077202-7c8a3999166f?auto=format&fit=crop&w=1600&q=80',
    'luxury'      => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=1600&q=80',
    'athlete'     => 'https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?auto=format&fit=crop&w=2000&q=80',
    'strength'    => 'https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=1200&q=80',
    'cardio'      => 'https://images.unsplash.com/photo-1594381898411-846e7d193883?auto=format&fit=crop&w=1200&q=80',
    'recovery'    => 'https://images.unsplash.com/photo-1584735935682-2f2b69dff9d2?auto=format&fit=crop&w=1200&q=80',
    'equipment'   => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=1600&q=80',
    'experience'  => 'https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?auto=format&fit=crop&w=1600&q=80',
    'cta'         => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=2000&q=80',
];

/**
 * Resolve an image key to a URL. Falls back to the raw value when not mapped.
 */
function img(string $key): string
{
    global $IMAGES;
    return $IMAGES[$key] ?? $key;
}

/**
 * Build an inline `background-image` style attribute safely.
 */
function bg(string $key): string
{
    return 'background-image:url(' . e(img($key)) . ');';
}

/* ---------------------------------------------------------------------------
 * Primary navigation
 * ------------------------------------------------------------------------- */
$NAV = [
    ['label' => 'Home', 'href' => 'index.php', 'key' => 'home'],
    ['label' => 'About', 'href' => 'about.php', 'key' => 'about'],
    ['label' => 'Formats', 'href' => 'franchise.php', 'key' => 'franchise'],
    ['label' => 'Experience', 'href' => 'about.php#experience', 'key' => 'experience'],
    ['label' => 'Support', 'href' => 'franchise.php#support', 'key' => 'support'],
    ['label' => 'FAQ', 'href' => 'index.php#faq', 'key' => 'faq'],
];

/* ---------------------------------------------------------------------------
 * Franchise formats — the commercial core of the site.
 * ------------------------------------------------------------------------- */
$FORMATS = [
    'prime' => [
        'key' => 'prime',
        'name' => 'RAW FIT PRIME',
        'short' => 'Prime',
        'price' => '₹1.80 Crore',
        'area' => '3,000 – 4,000 SQ FT',
        'summary' => 'Premium compact format engineered for high-density catchments and disciplined operations.',
        'facilities' => [
            'Premium strength zone',
            'Dedicated cardio zone',
            'Functional training',
            'Reception & member service',
            'Professional changing / washroom',
            'Sauna bath',
            'Recovery-focused environment',
            'Premium branding',
            'Supplement support',
        ],
        'href' => 'prime.php',
    ],
    'luxury' => [
        'key' => 'luxury',
        'name' => 'RAW FIT LUXURY',
        'short' => 'Luxury',
        'price' => '₹3.20 Crore',
        'area' => '6,000 – 8,000 SQ FT',
        'summary' => 'Flagship-scale premium format designed as a full fitness destination and brand flagship.',
        'facilities' => [
            'Large strength floor',
            'Expanded cardio',
            'Functional training',
            'Ice bath / cold plunge',
            'Enhanced recovery zone',
            'Premium shower experience',
            'Recovery lounge',
            'Mobility & stretching area',
            "Members' lounge",
            'Pool table / recreation zone',
            'Content / transformation studio',
            'Smart access',
            'VIP / consultation room',
            'Dedicated retail display',
        ],
        'href' => 'luxury.php',
    ],
];

/* ---------------------------------------------------------------------------
 * Brand values
 * ------------------------------------------------------------------------- */
$VALUES = [
    ['no' => '01', 'title' => 'Premium', 'text' => 'Build a recognizable premium club identity.'],
    ['no' => '02', 'title' => 'Performance', 'text' => 'Prioritize serious training and measurable progress.'],
    ['no' => '03', 'title' => 'Community', 'text' => 'Create a culture members want to be part of.'],
    ['no' => '04', 'title' => 'System', 'text' => 'Standardize the business without making every location identical.'],
    ['no' => '05', 'title' => 'Scale', 'text' => 'Create a model that can be replicated across markets.'],
];

/* ---------------------------------------------------------------------------
 * Member journey
 * ------------------------------------------------------------------------- */
$JOURNEY = [
    ['no' => '01', 'title' => 'Discover', 'text' => 'Digital, local and referral marketing.'],
    ['no' => '02', 'title' => 'Visit', 'text' => 'Premium reception and facility tour.'],
    ['no' => '03', 'title' => 'Join', 'text' => 'Clear plans, consultation and onboarding.'],
    ['no' => '04', 'title' => 'Train', 'text' => 'Equipment, coaching and progress support.'],
    ['no' => '05', 'title' => 'Retain', 'text' => 'Community, service, events and follow-up.'],
];

/* ---------------------------------------------------------------------------
 * Revenue streams
 * ------------------------------------------------------------------------- */
$REVENUE = [
    ['title' => 'Memberships', 'text' => 'Recurring membership plans built on clear tiers and long-term retention.'],
    ['title' => 'Personal Training', 'text' => 'Coached, outcome-driven training delivered by certified professionals.'],
    ['title' => 'Group Programs', 'text' => 'Structured group formats that strengthen community and average revenue.'],
    ['title' => 'Retail', 'text' => 'Supplement and merchandise support aligned with member goals.'],
    ['title' => 'Events', 'text' => 'Challenges, activations and transformation events that drive engagement.'],
    ['title' => 'Partnerships', 'text' => 'Local brand and corporate tie-ups that broaden reach and credibility.'],
];

/* ---------------------------------------------------------------------------
 * Property & site criteria
 * ------------------------------------------------------------------------- */
$CRITERIA = [
    ['no' => '01', 'title' => 'Visibility', 'text' => 'Strong frontage and presence in a location members can find easily.'],
    ['no' => '02', 'title' => 'Access', 'text' => 'Convenient entry, parking and approach for daily footfall.'],
    ['no' => '03', 'title' => 'Catchment', 'text' => 'A dense, relevant residential and working population around the site.'],
    ['no' => '04', 'title' => 'Structure', 'text' => 'Clear height, load capacity and column-free usability for equipment.'],
    ['no' => '05', 'title' => 'Services', 'text' => 'Reliable power, water, drainage and ventilation provisions.'],
    ['no' => '06', 'title' => 'Lease', 'text' => 'Commercially sound terms with a long, secure tenure.'],
];

/* ---------------------------------------------------------------------------
 * Franchise support
 * ------------------------------------------------------------------------- */
$SUPPORT_PRE = [
    'Brand identity & usage guidelines',
    'Site evaluation',
    'Format selection',
    'Space planning',
    'Design direction',
    'Equipment planning',
    'Procurement coordination',
    'Pre-opening checklist',
    'Staffing framework',
];

$SUPPORT_OPS = [
    'Sales process',
    'Membership scripts',
    'Launch marketing',
    'Digital / social assets',
    'Opening campaign',
    'Operating standards',
    'Review framework',
    'Post-launch improvement support',
];

/* ---------------------------------------------------------------------------
 * Launch roadmap
 * ------------------------------------------------------------------------- */
$ROADMAP = [
    ['no' => '01', 'title' => 'Discover', 'text' => 'Share your city, property and investment range with our team.'],
    ['no' => '02', 'title' => 'Site', 'text' => 'Site evaluation against visibility, access and catchment criteria.'],
    ['no' => '03', 'title' => 'Plan', 'text' => 'Format selection, space planning and design direction.'],
    ['no' => '04', 'title' => 'Build', 'text' => 'Civil, branding and fit-out execution to brand standards.'],
    ['no' => '05', 'title' => 'Equip', 'text' => 'Equipment planning, procurement and installation.'],
    ['no' => '06', 'title' => 'Staff', 'text' => 'Team structure, training and operating system rollout.'],
    ['no' => '07', 'title' => 'Launch', 'text' => 'Pre-launch marketing, opening campaign and go live.'],
];

/* ---------------------------------------------------------------------------
 * FAQ
 * ------------------------------------------------------------------------- */
$FAQ = [
    [
        'q' => 'What is the minimum space required?',
        'a' => 'RAW FIT PRIME is planned for 3,000 – 4,000 SQ FT and RAW FIT LUXURY for 6,000 – 8,000 SQ FT. Final requirements are confirmed after site measurement, structural review and equipment planning.',
    ],
    [
        'q' => 'What is the investment?',
        'a' => 'The indicative franchise investment is ₹1.80 Crore for RAW FIT PRIME and ₹3.20 Crore for RAW FIT LUXURY. Figures are indicative and subject to final commercial agreement.',
    ],
    [
        'q' => 'Can I use my own property?',
        'a' => 'Yes. A suitable owned property can be evaluated against our visibility, access, catchment, structure, services and lease criteria. If you do not have a property, our team can support the site evaluation process.',
    ],
    [
        'q' => 'Is IFBB Pro Rahul included?',
        'a' => 'Any endorsement, ambassador, appearance schedule, image rights or commercial association is subject to a separate written agreement. No athlete involvement is guaranteed as part of the franchise.',
    ],
    [
        'q' => 'How is the format chosen?',
        'a' => 'The format is selected based on your property, catchment profile and investment range. Our team evaluates the site and recommends PRIME or LUXURY accordingly.',
    ],
    [
        'q' => 'What happens next?',
        'a' => 'Share your city, property size and investment range through the franchise enquiry form. Our team will connect with you to discuss suitability, the right format and the next steps.',
    ],
];

/* ---------------------------------------------------------------------------
 * Society / schema helpers
 * ------------------------------------------------------------------------- */
$SCHEMA = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => SITE_NAME,
    'slogan' => SITE_MOTTO,
    'description' => 'Premium gym franchise opportunities with PRIME and LUXURY formats designed for premium fitness experiences and scalable business operations.',
    'url' => canonical_url(),
    'logo' => 'assets/images/logo.png',
    'telephone' => SITE_PHONE_RAW,
    'email' => SITE_EMAIL,
    'areaServed' => SITE_LOCATION,
];
