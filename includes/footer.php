<?php
/**
 * Shared site footer, floating actions and closing scripts.
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}

$waMessage = "Hi RAW FIT GYM, I am interested in your franchise opportunity. I would like to know more about the Prime and Luxury formats.";
$waLink = 'https://wa.me/' . SITE_WHATSAPP . '?text=' . rawurlencode($waMessage);
?>
    </main>

    <footer class="site-footer" id="siteFooter">
        <div class="container-raw">
            <div class="footer-top">
                <div class="footer-brand">
                    <img src="assets/images/logo.png" alt="<?= e(SITE_NAME) ?> emblem" class="footer-brand__mark" width="72" height="72" loading="lazy">
                    <h2 class="footer-brand__name"><?= e(SITE_NAME) ?></h2>
                    <p class="footer-brand__tagline"><?= e(SITE_TAGLINE) ?></p>
                </div>

                <nav class="footer-col" aria-label="Footer navigation">
                    <h3 class="footer-col__title">Explore</h3>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="franchise.php">Formats</a></li>
                        <li><a href="about.php#experience">Experience</a></li>
                        <li><a href="franchise.php#support">Support</a></li>
                        <li><a href="index.php#faq">FAQ</a></li>
                        <li><a href="contact.php">Franchise Enquiry</a></li>
                    </ul>
                </nav>

                <div class="footer-col">
                    <h3 class="footer-col__title">Contact</h3>
                    <ul class="footer-links footer-links--contact">
                        <li><a href="tel:<?= e(SITE_PHONE_RAW) ?>"><i class="bi bi-telephone"></i> <?= e(SITE_PHONE) ?></a></li>
                        <li><a href="mailto:<?= e(SITE_EMAIL) ?>"><i class="bi bi-envelope"></i> <?= e(SITE_EMAIL) ?></a></li>
                        <li><span><i class="bi bi-geo-alt"></i> <?= e(SITE_LOCATION) ?></span></li>
                    </ul>

                    <h3 class="footer-col__title footer-col__title--spaced">Follow</h3>
                    <ul class="footer-social">
                        <li><a href="<?= e(SITE_INSTAGRAM) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="<?= e(SITE_FACEBOOK) ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="<?= e(SITE_YOUTUBE) ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-copy">&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?>. All Rights Reserved.</p>
                <p class="footer-note">Franchise information is indicative and subject to final commercial agreement.</p>
            </div>
        </div>
    </footer>

    <a class="whatsapp-float" href="<?= e($waLink) ?>" target="_blank" rel="noopener" aria-label="Chat with RAW FIT GYM on WhatsApp">
        <i class="bi bi-whatsapp" aria-hidden="true"></i>
        <span class="whatsapp-float__label">WhatsApp</span>
    </a>

    <button class="to-top" id="toTop" type="button" aria-label="Back to top">
        <i class="bi bi-arrow-up" aria-hidden="true"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js?v=<?= e(ASSET_VERSION) ?>" defer></script>
</body>
</html>
