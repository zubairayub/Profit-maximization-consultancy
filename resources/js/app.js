import './bootstrap';

import Alpine from 'alpinejs';
import Chart from 'chart.js/auto';

window.Alpine = Alpine;
window.Chart = Chart;

// Scroll Animation Observer
document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('pmc-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with animation classes
    document.querySelectorAll('.pmc-fade-in, .pmc-fade-in-up, .pmc-fade-in-left, .pmc-fade-in-right, .pmc-scale-in, .pmc-slide-up').forEach(el => {
        observer.observe(el);
    });

    // Parallax effect for background elements
    let parallaxElements = document.querySelectorAll('.pmc-parallax');
    if (parallaxElements.length > 0) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            parallaxElements.forEach((el, index) => {
                const speed = 0.5 + (index * 0.1);
                el.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    }

    // Smooth reveal for cards on scroll
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                cardObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.pmc-card-reveal').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        cardObserver.observe(card);
    });
});

// Alpine.js data for animations
document.addEventListener('alpine:init', () => {
    // Counter animation
    Alpine.data('pmcCounter', ({ to, suffix, label }) => ({
        value: '0' + (suffix ?? ''),
        label,
        _started: false,
        init() {
            const io = new IntersectionObserver(([entry]) => {
                if (!entry.isIntersecting || this._started) return;
                this._started = true;

                const start = performance.now();
                const duration = 1200;
                const from = 0;

                const tick = (now) => {
                    const t = Math.min(1, (now - start) / duration);
                    const easeOutCubic = 1 - Math.pow(1 - t, 3);
                    const current = Math.round(from + (to - from) * easeOutCubic);
                    this.value = `${current}${suffix ?? ''}`;
                    if (t < 1) requestAnimationFrame(tick);
                };

                requestAnimationFrame(tick);
            }, { threshold: 0.4 });

            io.observe(this.$el);
        },
    }));

    // Scroll progress indicator
    Alpine.data('pmcScrollProgress', () => ({
        progress: 0,
        init() {
            window.addEventListener('scroll', () => {
                const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
                const scrolled = window.scrollY;
                this.progress = (scrolled / windowHeight) * 100;
            });
        }
    }));

    // Mouse follower effect
    Alpine.data('pmcMouseFollower', () => ({
        x: 0,
        y: 0,
        init() {
            document.addEventListener('mousemove', (e) => {
                this.x = e.clientX;
                this.y = e.clientY;
            });
        }
    }));
});

Alpine.start();
