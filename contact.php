<?php
$pageKey = 'contact';
$pageTitle = 'Franchise Enquiry | RAW FIT GYM';
$metaDescription = 'Request RAW FIT GYM franchise details. Share your city, property size and investment range to explore the PRIME and LUXURY formats.';
$bodyClass = 'page-contact';
require __DIR__ . '/includes/header.php';

$errors = flash('errors', []);
$success = flash('success', false);
$old = flash('old', []);
$old = is_array($old) ? $old : [];

/**
 * Preserve a submitted value across a validation redirect.
 */
function old(string $key, array $source): string
{
    return isset($source[$key]) ? (string) $source[$key] : '';
}
?>

<section class="page-banner">
    <div class="container-raw">
        <p class="eyebrow">Franchise Enquiry</p>
        <h1 class="page-banner__title display-lg">Let's Build<br> Your Raw Fit</h1>
        <p class="page-banner__text">Share your city, property size and investment range. Our team will connect with you to discuss the right format and next steps.</p>
        <nav class="breadcrumb-raw" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span class="sep">/</span><span>Franchise Enquiry</span>
        </nav>
    </div>
</section>

<section class="section">
    <div class="container-raw">
        <div class="grid grid-3 mb-5">
            <div class="contact-card" data-reveal>
                <i class="bi bi-telephone contact-card__icon" aria-hidden="true"></i>
                <p class="contact-card__title">Call</p>
                <p class="contact-card__value"><a href="tel:<?= e(SITE_PHONE_RAW) ?>"><?= e(SITE_PHONE) ?></a></p>
            </div>
            <div class="contact-card" data-reveal data-reveal-delay="1">
                <i class="bi bi-envelope contact-card__icon" aria-hidden="true"></i>
                <p class="contact-card__title">Email</p>
                <p class="contact-card__value"><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
            </div>
            <div class="contact-card" data-reveal data-reveal-delay="2">
                <i class="bi bi-geo-alt contact-card__icon" aria-hidden="true"></i>
                <p class="contact-card__title">Location</p>
                <p class="contact-card__value"><?= e(SITE_LOCATION) ?></p>
            </div>
        </div>

        <div class="form-panel" data-reveal>
            <?php if ($success): ?>
                <div class="form-success" role="status">
                    <div class="form-success__icon"><i class="bi bi-check-lg" aria-hidden="true"></i></div>
                    <h2 class="display-sm">Request Received</h2>
                    <p class="lead-lg mx-auto" style="max-width: 560px;">Thank you for your interest in RAW FIT GYM. Our franchise team will review your details and connect with you shortly.</p>
                    <div class="btn-row mt-4 justify-content-center">
                        <a class="btn btn-gold" href="franchise.php">Explore Formats</a>
                        <a class="btn btn-ghost" href="index.php">Back To Home</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="section-head mb-4">
                    <span class="section-index">Request Franchise Details</span>
                    <h2 class="display-sm mt-3">Tell Us About Your Project</h2>
                </div>

                <?php if (!empty($errors)): ?>
                    <div class="form-alert form-alert--error" role="alert">
                        <?= e($errors['form'] ?? 'Please review the highlighted fields and try again.') ?>
                    </div>
                <?php endif; ?>

                <form id="enquiryForm" action="enquiry.php" method="post" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                    <input type="hidden" name="started_at" value="<?= e((string) time()) ?>">
                    <div class="honeypot" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-grid">
                        <div class="form-field">
                            <label class="form-label" for="full_name">Full Name <span class="req">*</span></label>
                            <input class="form-control" type="text" id="full_name" name="full_name" required minlength="2"
                                   value="<?= e(old('full_name', $old)) ?>" autocomplete="name">
                            <span class="field-error" aria-live="polite"><?= e($errors['full_name'] ?? '') ?></span>
                        </div>

                        <div class="form-field">
                            <label class="form-label" for="phone">Phone Number <span class="req">*</span></label>
                            <input class="form-control" type="tel" id="phone" name="phone" required
                                   pattern="[0-9+\-\s()]{7,18}" value="<?= e(old('phone', $old)) ?>" autocomplete="tel">
                            <span class="field-error" aria-live="polite"><?= e($errors['phone'] ?? '') ?></span>
                        </div>

                        <div class="form-field">
                            <label class="form-label" for="email">Email <span class="req">*</span></label>
                            <input class="form-control" type="email" id="email" name="email" required
                                   value="<?= e(old('email', $old)) ?>" autocomplete="email">
                            <span class="field-error" aria-live="polite"><?= e($errors['email'] ?? '') ?></span>
                        </div>

                        <div class="form-field">
                            <label class="form-label" for="city">City <span class="req">*</span></label>
                            <input class="form-control" type="text" id="city" name="city" required
                                   value="<?= e(old('city', $old)) ?>" autocomplete="address-level2">
                            <span class="field-error" aria-live="polite"><?= e($errors['city'] ?? '') ?></span>
                        </div>

                        <div class="form-field">
                            <label class="form-label" for="state">State <span class="req">*</span></label>
                            <input class="form-control" type="text" id="state" name="state" required
                                   value="<?= e(old('state', $old)) ?>" autocomplete="address-level1">
                            <span class="field-error" aria-live="polite"><?= e($errors['state'] ?? '') ?></span>
                        </div>

                        <div class="form-field">
                            <label class="form-label" for="property_size">Property Size</label>
                            <input class="form-control" type="text" id="property_size" name="property_size"
                                   placeholder="e.g. 3,500 SQ FT" value="<?= e(old('property_size', $old)) ?>">
                            <span class="field-error" aria-live="polite"><?= e($errors['property_size'] ?? '') ?></span>
                        </div>

                        <div class="form-field">
                            <span class="form-label">Property Available? <span class="req">*</span></span>
                            <div class="radio-row">
                                <?php foreach (['Yes', 'No'] as $opt): ?>
                                    <label class="radio-pill">
                                        <input type="radio" name="property_available" value="<?= e($opt) ?>" required
                                            <?= old('property_available', $old) === $opt ? 'checked' : '' ?>>
                                        <span><?= e($opt) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <span class="field-error" aria-live="polite"><?= e($errors['property_available'] ?? '') ?></span>
                        </div>

                        <div class="form-field">
                            <label class="form-label" for="investment_range">Investment Range <span class="req">*</span></label>
                            <select class="form-select" id="investment_range" name="investment_range" required>
                                <option value="">Select range</option>
                                <?php
                                $ranges = ['₹1.80 Cr (Prime)', '₹3.20 Cr (Luxury)', 'Above ₹3.20 Cr', 'Not sure yet'];
                                foreach ($ranges as $range):
                                ?>
                                    <option value="<?= e($range) ?>" <?= old('investment_range', $old) === $range ? 'selected' : '' ?>><?= e($range) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="field-error" aria-live="polite"><?= e($errors['investment_range'] ?? '') ?></span>
                        </div>

                        <div class="form-field form-field--full">
                            <span class="form-label">Preferred Format <span class="req">*</span></span>
                            <div class="radio-row">
                                <?php foreach (['Prime', 'Luxury', 'Not Sure'] as $opt): ?>
                                    <label class="radio-pill">
                                        <input type="radio" name="preferred_format" value="<?= e($opt) ?>" required
                                            <?= old('preferred_format', $old) === $opt ? 'checked' : '' ?>>
                                        <span><?= e($opt) ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <span class="field-error" aria-live="polite"><?= e($errors['preferred_format'] ?? '') ?></span>
                        </div>

                        <div class="form-field form-field--full">
                            <label class="form-label" for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" maxlength="1500"
                                      placeholder="Tell us about your city, property and timeline."><?= e(old('message', $old)) ?></textarea>
                            <span class="field-error" aria-live="polite"><?= e($errors['message'] ?? '') ?></span>
                        </div>
                    </div>

                    <div class="btn-row mt-4">
                        <button class="btn btn-gold" type="submit">Request Franchise Details <i class="bi bi-arrow-right"></i></button>
                    </div>
                    <p class="mt-3 mb-0" style="font-size: 0.85rem;">By submitting, you agree to be contacted by the RAW FIT GYM franchise team. Franchise information is indicative and subject to final commercial agreement.</p>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
