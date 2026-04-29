<footer class="site-footer">
    <div class="footer-grid-bg"></div>

    <div class="container mx-auto max-w-6xl px-4">
        <div class="footer-shell">
            <div class="footer-cursor-glow"></div>
            <div class="footer-wave"></div>

            <div class="footer-grid">
                <div class="footer-brand-block">
                    <a href="/WS03/Public/" class="footer-brand">
                        <span class="footer-brand-mark">P</span>
                        <span>Prosple</span>
                    </a>

                    <p>
                        Prosple helps job seekers discover better opportunities and helps employers
                        reach the right applicants faster.
                    </p>

                    <div class="footer-socials">
                        <a href="#" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <a href="#" aria-label="Twitter">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>

                        <a href="#" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-links-block">
                    <h4>Explore</h4>

                    <ul>
                        <li><a href="/WS03/Public/">Home</a></li>
                        <li><a href="/WS03/Public/listings">Browse Jobs</a></li>
                        <li><a href="/WS03/Public/listings/create">Post a Job</a></li>
                    </ul>
                </div>

                <div class="footer-links-block">
                    <h4>Account</h4>

                    <ul>
                        <li><a href="/WS03/Public/login">Login</a></li>
                        <li><a href="/WS03/Public/register">Register</a></li>
                        <li><a href="/WS03/Public/listings/details">View Details</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> Prosple. Built for smarter career discovery.</p>

                <a href="/WS03/Public/listings" class="footer-bottom-link">
                    Browse Opportunities
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
    document.querySelectorAll('.footer-shell').forEach((footer) => {
        footer.addEventListener('mousemove', (event) => {
            const rect = footer.getBoundingClientRect();

            const x = ((event.clientX - rect.left) / rect.width) * 100;
            const y = ((event.clientY - rect.top) / rect.height) * 100;

            footer.style.setProperty('--footer-x', `${x}%`);
            footer.style.setProperty('--footer-y', `${y}%`);
            footer.style.setProperty('--footer-x-number', x.toFixed(2));
            footer.style.setProperty('--footer-y-number', y.toFixed(2));
        });

        footer.addEventListener('mouseenter', () => {
            footer.classList.add('is-hovering');
        });

        footer.addEventListener('mouseleave', () => {
            footer.classList.remove('is-hovering');

            footer.style.setProperty('--footer-x', '50%');
            footer.style.setProperty('--footer-y', '50%');
            footer.style.setProperty('--footer-x-number', '50');
            footer.style.setProperty('--footer-y-number', '50');
        });
    });
</script>