/* ==========================================================================
   RAW FIT GYM — interactions
   Vanilla JS only. Progressive enhancement; the site works without it.
   ========================================================================== */

(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ----------------------------------------------------------------
     * Sticky header: solid on scroll, auto-hide on scroll down
     * -------------------------------------------------------------- */
    var header = document.getElementById('siteHeader');
    var toTop = document.getElementById('toTop');
    var progress = document.getElementById('scrollProgress');
    var lastY = window.scrollY;

    function onScroll() {
        var y = window.scrollY;

        if (header) {
            if (y > 40) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

            var goingDown = y > lastY && y > 260;
            header.classList.toggle('is-hidden', goingDown && !document.body.classList.contains('nav-open'));
        }

        if (toTop) {
            toTop.classList.toggle('is-visible', y > 600);
        }

        if (progress) {
            var max = document.documentElement.scrollHeight - window.innerHeight;
            progress.style.width = (max > 0 ? (y / max) * 100 : 0) + '%';
        }

        lastY = y;
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    if (toTop) {
        toTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
        });
    }

    /* ----------------------------------------------------------------
     * Mobile drawer: lock scroll + keep burger in sync
     * -------------------------------------------------------------- */
    var drawer = document.getElementById('primaryNav');
    if (drawer) {
        drawer.addEventListener('show.bs.offcanvas', function () {
            document.body.classList.add('nav-open');
        });
        drawer.addEventListener('hidden.bs.offcanvas', function () {
            document.body.classList.remove('nav-open');
        });
        drawer.addEventListener('click', function (event) {
            if (event.target.closest('a')) {
                var instance = bootstrap.Offcanvas.getInstance(drawer);
                if (instance) { instance.hide(); }
            }
        });
    }

    /* ----------------------------------------------------------------
     * Scroll reveal
     * -------------------------------------------------------------- */
    var revealables = Array.prototype.slice.call(document.querySelectorAll('[data-reveal]'));

    if (!('IntersectionObserver' in window) || reduceMotion) {
        revealables.forEach(function (el) { el.classList.add('is-visible'); });
    } else {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        revealables.forEach(function (el) { revealObserver.observe(el); });
    }

    /* ----------------------------------------------------------------
     * Number counters
     * -------------------------------------------------------------- */
    var counters = Array.prototype.slice.call(document.querySelectorAll('[data-counter]'));

    function animateCounter(el) {
        var target = parseFloat(el.getAttribute('data-counter'));
        if (isNaN(target)) { return; }
        var decimals = (el.getAttribute('data-counter').split('.')[1] || '').length;
        var duration = 1400;
        var start = null;

        function step(timestamp) {
            if (start === null) { start = timestamp; }
            var progress = Math.min((timestamp - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = (target * eased).toFixed(decimals);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                el.textContent = target.toFixed(decimals);
            }
        }

        window.requestAnimationFrame(step);
    }

    if (counters.length) {
        if (!('IntersectionObserver' in window) || reduceMotion) {
            counters.forEach(function (el) { el.textContent = el.getAttribute('data-counter'); });
        } else {
            var counterObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.6 });

            counters.forEach(function (el) { counterObserver.observe(el); });
        }
    }

    /* ----------------------------------------------------------------
     * Hero parallax (subtle, disabled for reduced motion)
     * -------------------------------------------------------------- */
    var heroMedia = document.querySelector('.hero__media');
    if (heroMedia && !reduceMotion) {
        window.addEventListener('scroll', function () {
            var offset = Math.min(window.scrollY, 700);
            heroMedia.style.transform = 'translate3d(0,' + (offset * 0.14) + 'px,0) scale(1)';
        }, { passive: true });
    }

    /* ----------------------------------------------------------------
     * Enquiry form: lightweight client-side validation
     * -------------------------------------------------------------- */
    var form = document.getElementById('enquiryForm');
    if (form) {
        form.addEventListener('submit', function (event) {
            var valid = true;

            form.querySelectorAll('[required]').forEach(function (field) {
                var wrap = field.closest('.form-field');
                var errorEl = wrap ? wrap.querySelector('.field-error') : null;

                if (!field.checkValidity()) {
                    valid = false;
                    field.classList.add('is-invalid');
                    if (wrap) { wrap.classList.add('has-error'); }
                    if (errorEl) { errorEl.textContent = field.validationMessage; }
                } else {
                    field.classList.remove('is-invalid');
                    if (wrap) { wrap.classList.remove('has-error'); }
                    if (errorEl) { errorEl.textContent = ''; }
                }
            });

            if (!valid) {
                event.preventDefault();
                var firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) { firstInvalid.focus(); }
            }
        });

        form.querySelectorAll('.form-control, .form-select, .radio-pill input').forEach(function (field) {
            field.addEventListener('input', function () {
                if (field.checkValidity()) {
                    field.classList.remove('is-invalid');
                    var wrap = field.closest('.form-field');
                    if (wrap) { wrap.classList.remove('has-error'); }
                    if (wrap) {
                        var errorEl = wrap.querySelector('.field-error');
                        if (errorEl) { errorEl.textContent = ''; }
                    }
                }
            });
        });
    }
})();
